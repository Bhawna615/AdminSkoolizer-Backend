<?php


class Exam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('TimetableModel');
        $this->load->model('ExamModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Exams',
            'page' => 'Exams'
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
        $this->StudentModel->updateExamNotificationCheckTime($studentId);
        
        
        $data['exams'] = $this->ExamModel->get($this->session->userdata('class'));
        $this->load->view('student/exams/view', $data);
    }

    public function results()
    {
        $data = array(
            'title' => 'Results',
            'page' => 'Results'
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
  

        $class = $this->session->userdata('class');
        $rollNo = $this->session->userdata('rollNo');
        $data['exams'] = $this->ExamModel->getDistinct($this->session->userdata('class'));
        $this->load->view('student/exams/results/select', $data);
    }

    public function displayResult($subject)
    {
        $class = $this->session->userdata('class');
        $rollNo = $this->session->userdata('rollNo');
        $name = $this->session->userdata('name');
        $data['exams'] = $this->ExamModel->getAllExamsBySubjectAndClass($subject, $class);
        $data['marks'] = $this->ExamModel->getMarks($data['exams'], $rollNo, $name);
        $this->load->view('student/exams/results/view', $data);
    }
}