<?php


class QuestionPaper extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuestionPaperModel');
		$this->load->model('QuestionModel');
		$this->load->model('ClassModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function view()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('exams/question_papers/view', $data);
	}

	public function display()
	{
		$data['questionPapers'] = $this->QuestionPaperModel->get();
		$this->load->view('exams/question_papers/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['questionPapers'] = $this->QuestionPaperModel->getFilteredData($year, $month, $class);
		$this->load->view('exams/question_papers/table', $data);
	}

	public function create()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('exams/question_papers/create', $data);
	}

	public function filterQuestions($class, $subject)
	{
		$data['classes'] = $this->ClassModel->getAll();
		$data['questions'] = $this->QuestionModel->getFilteredQuestions($class, $subject);
		$this->load->view('exams/question_papers/select', $data);
	}

	public function displayQuestions()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$data['questions'] = $this->QuestionModel->get();
		$this->load->view('exams/question_papers/select', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules($this->config->item('questionPaper'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('exams/question_papers/create', $data);
		} else {
			$questionPaper = array(
				'exam' => $this->input->post('exam'),
				'subject' => $this->input->post('subject'),
				'class' => $this->input->post('class'),
				'duration' => $this->input->post('duration'),
				'max_marks' => $this->input->post('max'),
				'questions_id' => implode(",", $this->input->post('questions'))
			);

			if ($this->QuestionPaperModel->insert($questionPaper)) {
				$this->session->set_flashdata('success', "Saved Successfully");
				redirect('questionPaper/view');
			} else {
				$this->session->set_flashdata('error', "Failed to Save");
				redirect('questionPaper/view');
			}
		}

	}

	public function generate($questionPaperId)
	{
		$data['questionPaper'] = $this->QuestionPaperModel->getOne($questionPaperId);
		$data['questions'] = $this->QuestionPaperModel->getQuestions($questionPaperId);
		$this->load->view('exams/question_papers/generate', $data);
	}

	public function delete($id)
	{
		if ($this->QuestionPaperModel->delete($id)) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect('questionPaper/view');
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect('questionPaper/view');
		}
	}
}
