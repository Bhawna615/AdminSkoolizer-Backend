<?php


class Quiz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuizModel');
		$this->load->model('ClassModel');
		$this->load->model('TimetableModel');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function index()
	{
		$data['quizzes'] = $this->QuizModel->get();
		$this->load->view('exams/quizzes/view', $data);
	}

	public function add()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('exams/quizzes/add', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('quiz'));
		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('exams/quizzes/add', $data);
		} else {
			$newQuiz = array(
				'name' => $this->input->post('name'),
				'class' => $this->input->post('class'),
				'expiry_date' => $this->input->post('date'),
				'created_at' => date("Y-m-d H:i:s")
			);

			if ($this->QuizModel->insert($newQuiz)) {
				$this->session->set_flashdata('success', "Quiz Added Successfully");
				redirect('quiz');
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect('quiz');
			}
		}
	}

	public function delete($id)
	{
		if ($this->QuizModel->delete($id)) {
			$this->session->set_flashdata('success', "Quiz Deleted Successfully");
			redirect('quiz');
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect('quiz');
		}
	}
}
