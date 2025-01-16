<?php


class Assignment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AssignmentModel');
		$this->load->model('ClassModel');
		$this->load->model('QuestionModel');
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
		$this->load->view('assignments/view', $data);
	}

	public function display()
	{
		$data['assignments'] = $this->AssignmentModel->get();
		$this->load->view('assignments/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['assignments'] = $this->AssignmentModel->getFilteredData($year, $month, $class);
		$this->load->view('assignments/table', $data);
	}

	public function create()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('assignments/create', $data);
	}

	public function filterQuestions($class, $subject)
	{
		$data['classes'] = $this->ClassModel->getAll();
		$data['questions'] = $this->QuestionModel->getFilteredQuestions($class, $subject);
		$this->load->view('assignments/select', $data);
	}

	public function displayQuestions()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$data['questions'] = $this->QuestionModel->get();
		$this->load->view('assignments/select', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules($this->config->item('assignment'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('assignments/create', $data);
		} else {
			$assignment = array(
				'name' => $this->input->post('name'),
				'subject' => $this->input->post('subject'),
				'class' => $this->input->post('class'),
				'questions_id' => implode(",", $this->input->post('questions'))
			);

			if ($this->AssignmentModel->insert($assignment)) {
				$this->session->set_flashdata('success', "Saved Successfully");
				redirect('assignment/view');
			} else {
				$this->session->set_flashdata('error', "Failed to Save");
				redirect('assignment/view');
			}
		}
	}

	public function generate($assignmentId)
	{
		$data['assignment'] = $this->AssignmentModel->getOne($assignmentId);
		$data['questions'] = $this->AssignmentModel->getQuestions($assignmentId);
		$this->load->view('assignments/generate', $data);
	}

	public function delete($id)
	{
		if ($this->AssignmentModel->delete($id)) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect('assignment/view');
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect('assignment/view');
		}
	}


}
