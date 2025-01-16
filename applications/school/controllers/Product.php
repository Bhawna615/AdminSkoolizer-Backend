<?php


class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        date_default_timezone_set("Asia/Kolkata");
	}

	public function index()
	{
		$data['title'] = "Welcome to Skoolizer";
		$this->load->view('product/welcome', $data);
	}

	public function about()
	{
		$data['title'] = "About Skoolizer";
		$this->load->view('product/about', $data);
	}
	
	public function privacy()
	{
	    $data['title'] = "Privacy Policy";
	    $this->load->view('product/privacy', $data);
	}

}
