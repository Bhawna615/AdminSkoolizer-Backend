<?php
class Home extends CI_Controller{
	function __construct(){
		 parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Lib');
        $this->load->model('Travel');
        $this->load->library('session');
        $this->load->config('settings');
	}
	function index()
	{
		$this->load->view('home');
	}
	function librarian(){
		$this->load->view('librarian');
	}
	function transport(){
		$this->load->view('transport');
	}
	function office(){
		$this->load->view('office');
	}
	function lsignin(){
		/*$email=$this->input->post('Email');
		$password=$this->input->post('Password');
		$data['check']=$this->Lib->verifyuser($email,$password);
		if ($data['check'] != FALSE) 
		{
			foreach ($data['check'] as $row) {
				$id=$row->id;
				$_SESSION['ID']=$id;
			}
		    redirect(site_url('Librarian'));
		}
		else
		{
			redirect(site_url('home'));
		}*/
		redirect(site_url('home'));
	}

	function tsignin(){
			$email=$this->input->post('Email');
		$password=$this->input->post('Password');
		$data['check']=$this->Travel->verifyuser($email,$password);
		if ($data['check'] != FALSE) 
		{
			foreach ($data['check'] as $row) {
				$id=$row->id;
				$_SESSION['ID']=$id;
			}
		    redirect(site_url('Transport'));
		}
		else
		{
			redirect(site_url('home'));
		}
	}
}
?>