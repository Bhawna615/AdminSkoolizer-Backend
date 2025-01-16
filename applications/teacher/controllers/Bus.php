<?php


class Bus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BusModel');
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

	public function buses()
	{
		$data['buses']=$this->BusModel->get();
		$this->load->view('transport/buses',$data);
	}

	public function add()
	{
		$this->load->view('transport/addbus');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('bus'));

		if ( $this->form_validation->run() === FALSE ) {
			$this->load->view('transport/addbus');
		} else {
			$data = array(
				'busname' => $_POST['name'],
				'model' => $_POST['model'],
				'regno' => $_POST['regno'],
				'seats' => $_POST['seats'],
				'fueltankcapacity' => $_POST['capacity']
			);

			$response = $this->BusModel->insert($data);

			if ($response) {
				$this->session->set_flashdata('success', "Added Succcessfully");
				redirect(site_url('bus/buses'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('bus/buses'));
			}
		}

	}

	public function delete($id)
	{
		$response = $this->BusModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Succcessfully");
			redirect(site_url('bus/buses'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('bus/buses'));
		}
	}
}
