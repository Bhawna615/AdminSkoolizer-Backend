<?php


class TransportStaff extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransportStaffModel');
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

	public function view() //transport staff
	{
		$data['staff']=$this->TransportStaffModel->get();
		$this->load->view('transport/transportstaff',$data);
	}

	public function add() //add transport staff
	{
		$this->load->view('transport/addtransportstaff');
	}

	public function insert()  //insert transport staff
	{
		$this->form_validation->set_rules($this->config->item('transportstaff'));

		if ( $this->form_validation->run() === FALSE ) {
			$this->load->view('transport/addtransportstaff');
		} else {
			$config['upload_path']          = './assets/images/transport/';
			$config['allowed_types']        = 'gif|jpeg|png|jpg|JPG';
			$config['max_size']             = 10000;
			$config['max_width']            = 2000;
			$config['max_height']           = 2500;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				$img=NULL;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$img = $data['upload_data']['file_name'];
			}
			$data=array(
				'drivername' => $_POST['name'],
				'Contact' => $_POST['contact'],
				'Post' => $_POST['post'],
				'Address' => $_POST['address'],
				'busid' => NULL,
				'routeId' => NULL,
				'image' => $img,
				'Email' => $_POST['email']
			);
			$empdata = array(
				'empname' =>$_POST['name'],
				'Post' => $_POST['post']
			);

			$response = $this->TransportStaffModel->insert($data, $empdata);

			if ($response) {
				$this->session->set_flashdata('success', "Added Succcessfully");
				redirect(site_url('transportstaff/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('transportstaff/view'));
			}
		}
	}

	public function delete($id)  //delete transport staff
	{
		$response = $this->TransportStaffModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Succcessfully");
			redirect(site_url('transportstaff/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('transportstaff/view'));
		}
	}
}
