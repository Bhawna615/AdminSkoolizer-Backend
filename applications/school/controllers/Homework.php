<?php

require "Notification.php";

class Homework extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeworkModel');
		$this->load->model('StudentModel');
		$this->load->model('MessageModel');
		$this->load->model('TimetableModel');
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

	public function homework()
	{
		$data['homework'] = $this->HomeworkModel->get();
		$data['classes']=$this->ClassModel->getAll();
		$this->load->view('homework/loadhomework', $data);
	}

	public function view()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('homework/viewhomework', $data);
	}

	public function display()
	{
		$data['homework'] = $this->HomeworkModel->get();
		$this->load->view('homework/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['homework'] = $this->HomeworkModel->getFilteredData($year, $month, $class);
		$this->load->view('homework/table', $data);
	}

	public function assign()
	{
		$class = $_POST['class'];
		$data['class'] = $class;
		$data['subjects'] = $this->TimetableModel->getsubjects($class);
		$this->load->view('homework/details', $data);
	}

	public function submit()
	{
		$this->form_validation->set_rules($this->config->item('homework'));

		if ($this->form_validation->run() === FALSE) {
			$data['class'] = $this->input->post('class');
			$data['subjects'] = $this->TimetableModel->getsubjects($this->input->post('class'));
			$this->load->view('homework/details', $data);
		} else {
			$date = date('Y-m-d');

			$homework = array(
				'Date' => $date,
				'Subjectname' => $this->input->post('subject'),
				'Class' => $this->input->post('class'),
				'Assignment' =>$this->input->post('assignment'),
				'file' => $this->input->post('file'),
				'file_url' => $this->input->post('url')
			);

			$response = $this->HomeworkModel->submit($homework);
			if ($response) {
				$this->createHomeworkNotification($homework);
				$this->session->set_flashdata('success', "Homework assigned Successfully");
				redirect(site_url('homework/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to assign");
				redirect(site_url('homework/view'));
			}
		}
	}

	public function delete($id)
	{
		$data['file'] = $this->HomeworkModel->getFile($id);
		if (!empty($data['file'])) {
			$this->load->view('homework/deletejs', $data);
		}
		$response = $this->HomeworkModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('homework/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('homework/view'));
		}
	}

	private function createHomeworkNotification(array $data)
	{
		$recipientIds = array();
		$students = $this->StudentModel->getByClass($data['Class']);
		foreach ($students as $student) {
			$recipientIds[] = $student->id;
		}

		$recipients = $this->MessageModel->getRecipients($recipientIds);

		$homeworkNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Homework Time',
			'body' => 'Homework of '.$data['Subjectname'].
				' has arrived for the Date: '.$data['Date'],
			'type' => 'homework'
		);

		$notification = new Notification();
		$notification->send($homeworkNotification);
	}
}
