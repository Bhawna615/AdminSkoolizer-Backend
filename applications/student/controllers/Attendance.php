<?php


class Attendance extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->config('settings');
		$this->load->model('AttendanceModel');
        $this->load->model('StudentModel');
		$this->load->helper('url');
        
			
        $this->load->model('AuthModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
	}

  
		

    public function studentAttendance()
    {
        $studentId = $this->session->userdata('id');
        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $data['attendance'] = $this->AttendanceModel->getStudentAttendance($studentId);
        $this->load->view('student/attendance', $data);
    }
	

}
