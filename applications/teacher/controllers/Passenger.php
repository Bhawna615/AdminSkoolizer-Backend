<?php


class Passenger extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PassengerModel');
		$this->load->model('StudentModel');
		$this->load->library('session');
		$this->load->helper('url');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function add() //addpassenger
	{
		$station = $_POST['station'];
		$route = $_POST['route'];
		$data['station'] = $_POST['station'];
		$data['route'] = $_POST['route'];
		$data['students'] = $this->StudentModel->getTransportInfo();
		$this->load->view('transport/addpassenger',$data);
	}

	public function insert() //insertpassenger
	{
		$id = $_POST['id'];
		$station = $_POST['station'];
		$route = $_POST['route'];
		$name = $_POST['name'];
		$data = array(
			'Name' => $name,
			'Routeid' => $route,
			'Stationid' => $station
		);
		$pid = $this->PassengerModel->insert($data);
		$this->StudentModel->updateTransportFacility($pid, $id);
		redirect(site_url('route/details/').$route);
	}
}
