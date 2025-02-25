<?php

class StudentInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->config('settings');
		$this->load->helper('url');
        // Load necessary models, libraries, etc.
        $this->load->model('StudentInfomodel');
        $this->load->model('AuthModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }

    }

    public function getStudentData()
    {
       
        $student_id = $this->session->userdata('id'); // Get Logged-in Student ID
        if ($student_id) {
            $student = $this->StudentInfomodel->getStudentById($student_id);
            echo json_encode($student); // Return Data in JSON Format
         
        } else {
            echo json_encode(['error' => 'User not logged in']);
        }
    }

   

   
}
?>