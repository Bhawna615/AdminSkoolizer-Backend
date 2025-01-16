<?php

/**
 *
 */
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AuthModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
		date_default_timezone_set("Asia/Kolkata");
	}

	public function index()
	{
		$this->load->view('auth/signin');
	}

	public function signIn()
	{
		$this->form_validation->set_rules($this->config->item('auth'));
		if ($this->form_validation->run() === false) {
			$this->load->view('auth/signin');
		} else {
			$userName = $this->input->post('username');
			$password = $this->input->post('password');
			if ($this->AuthModel->verify($userName, $password)) {
			    $userType = $this->AuthModel->getUserType($userName);
			    $userId = $this->AuthModel->getUserId($userName);
				$isLoggedIn = array('loggedIn' => true, 'usertype' => $userType, 'username' => $userName, 'userId' => $userId);
				$this->session->set_userdata($isLoggedIn);
				redirect(site_url('home'));
			} else {
				$this->session->set_flashdata('error', "Either Username is invalid or password.");
				redirect(site_url('auth'));
			}
		}
	}

	public function signOut()
	{
		session_destroy();
		redirect(site_url('auth'));
	}

	public function terms()
	{
		$this->load->view('more/terms');
	}
}


?>
