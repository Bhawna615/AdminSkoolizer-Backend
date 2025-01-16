<?php


class Assignment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('TimetableModel');
        $this->load->model('AssignmentModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }
    public function index()
    {
        $data = array(
            'title' => 'Assignments',
            'page' => 'Assignments'
        );
        
        $studentId = $this->session->userdata('id');
        $studentClass = $this->session->userdata('class');
        $data['recentAssignments'] = $this->StudentModel->loadRecentAssignments($studentId, $studentClass);
        $data['recentExams'] = $this->StudentModel->loadRecentExams($studentId, $studentClass);
        $data['recentSchoolPosts'] = $this->StudentModel->loadRecentSchoolPosts($studentId);
        $data['recentClassPosts'] = $this->StudentModel->loadRecentClassPosts($studentId, $studentClass);
        $data['recentEvents'] = $this->StudentModel->loadRecentEvents($studentId);
        $data['recentPayments'] = $this->StudentModel->loadRecentPayments($studentId);
        $data['recentMessages'] = $this->StudentModel->loadRecentMessages($studentId);
        $this->StudentModel->updateAssignmentNotificationCheckTime($studentId);
        
        
        $this->load->view('student/assignments/select', $data);
    }

    public function display($date)
    {
        $data['assignments'] = $this->AssignmentModel->get($this->session->userdata('class'), $date);
        $this->load->view('student/assignments/list', $data);
    }
}