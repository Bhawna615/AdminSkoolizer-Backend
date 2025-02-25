<?php


class LeaveRequest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->config('settings');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('MessageModel');
        $this->load->model('LeaveRequestModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Leave Request',
            'page' => 'Leave Request'
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

        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $data['leaveRequests'] = $this->LeaveRequestModel->get($this->session->userdata('id'));
        $this->load->view('student/leave_request/view', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Leave Request',
            'page' => 'Leave Request'
        );
        $studentId = $this->session->userdata('id');
        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $this->load->view('student/leave_request/add', $data);
    }

    public function create()
    {
        $student = $this->StudentModel->get($this->session->userdata('id'));
        $leaveRequest = array(
            'student_id' => $student->id,
            'student_name' => $student->Name,
            'student_class' => $student->Class,
            'student_roll_no' => $student->Rollno,
            'date' => $this->input->post('request_date'),
            'reason' => $this->input->post('request_reason'),
            'status' => 0
        );

        $response = $this->LeaveRequestModel->create($leaveRequest);
        if ($response) {
            $this->session->set_flashdata('success', "Successfully Created");
            redirect(site_url('LeaveRequest'));
        } else {
            $this->session->set_flashdata('error', "Failed to Create");
            redirect(site_url('LeaveRequest'));
        }
    }

}