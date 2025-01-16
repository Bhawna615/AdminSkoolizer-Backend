<?php


class Question extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		$this->load->view('exams/question_papers/questions/view', $data);
	}

	public function display()
	{
		$data['questions'] = $this->QuestionModel->get();
		$this->load->view('exams/question_papers/questions/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['questions'] = $this->QuestionModel->getFilteredData($year, $month, $class);
		$this->load->view('exams/question_papers/questions/table', $data);
	}

	public function create()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('exams/question_papers/questions/create', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules($this->config->item('question'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('exams/question_papers/questions/create', $data);
		} else {
			$question = array(
				'content' => $this->input->post('content'),
				'weightage' => $this->input->post('weightage'),
				'class' => $this->input->post('class'),
				'subject' => $this->input->post('subject'),
			);

			if ($this->QuestionModel->insert($question)) {
				$this->session->set_flashdata('success', "Saved Successfully");
				redirect('question/view');
			} else {
				$this->session->set_flashdata('error', "Failed to Save");
				redirect('question/view');
			}
		}
	}
}
