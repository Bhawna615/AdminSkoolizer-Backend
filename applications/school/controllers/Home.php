<?php

class Home extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('HomeModel');
        $this->load->library('session');
		date_default_timezone_set("Asia/Kolkata");
   		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
    }

	public function index()
	{
		$data['studentcount'] = $this->HomeModel->getStudentCount();
		$data['passedoutstudentcount'] = $this->HomeModel->getPassedOutStudentCount();
		$data['teachercount'] = $this->HomeModel->getTeacherCount();
		$data['classescount'] = $this->HomeModel->getClassesCount();
		$data['employeecount'] = $this->HomeModel->geTemployeeCount();
		$data['activeroutes'] = $this->HomeModel->getActiveRouteCount();
		$data['absentstudents'] = $this->HomeModel->getAbsentCount();
		$data['empabsents'] = $this->HomeModel->getEmpAbsentCount();
		$data['examcount'] = $this->HomeModel->getExamCount();
		$data['birthdaycount'] = $this->HomeModel->getBirthdayCount();
		$data['feeCount'] = $this->HomeModel->getPendingFeeCount();
		$data['leaveRequestCount'] = $this->HomeModel->getLeaveRequestCount();
		$this->load->view('home/home', $data);
	}

	public function terms()
	{
		$this->load->view('more/terms');
	}

	public function privacy()
	{
		$this->load->view('more/privacy');
	}

	public function docs()
	{
		$this->load->view('more/docs');
	}



}
?>
