<?php


class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->config('settings');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('PostModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function mySchool()
    {
        $data = array(
            'title' => 'My School',
            'page' => 'My School'
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
        $this->StudentModel->updateSchoolPostNotificationCheckTime($studentId);
        
        
        $data['posts'] = $this->PostModel->get('school');
        $this->load->view('student/posts/schoolview', $data);
    }

    public function myClass()
    {
        $data = array(
            'title' => 'My Class',
            'page' => 'My Class'
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
        $this->StudentModel->updateClassPostNotificationCheckTime($studentId);
        
        $data['posts'] = $this->PostModel->get($this->session->userdata('class'));
        $this->load->view('student/posts/classview', $data);
    }
}