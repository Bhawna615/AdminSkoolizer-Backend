<?php


class Classs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ClassModel');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function classes()
	{
		$data['classes'] = $this->ClassModel->getallclassesdetails();
		$data['classStrength'] = $this->ClassModel->getStrength($data['classes']);
		$this->load->view('timetable/classes', $data);
	}


	public function add()
	{
		$this->load->view('timetable/addclass');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('class'));

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('timetable/addclass');
		} else {
			$data = array(
				'Classname'=> $_POST['name'],
			);
			$response = $this->ClassModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Class added successfully");
				redirect('classs/classes');
			} else {
				$this->session->set_flashdata('error', "Failed to add Class");
				redirect('classs/classes');
			}
		}
	}

	public function delete($id)
	{
		$response = $this->ClassModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Class deleted successfully");
			redirect('classs/classes');
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect('classs/classes');
		}
	}

}
