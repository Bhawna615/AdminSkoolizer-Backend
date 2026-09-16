<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentBirthday extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }

        $this->load->helper(['url', 'string']);
        $this->load->library('form_validation');
        $this->load->model('Adminapi/StudentBirthdayModel');
    }

    // LOAD TODAY BIRTHDAYS
    public function loadBirthdays()
    {
        $students = $this->StudentBirthdayModel->loadBirthdays();

        echo json_encode([
            'status' => true,
            'data' => $students
        ]);
    }

    // SEND BIRTHDAY MESSAGE
    public function sendBirthdaySms()
    {
        $recipientIds = $this->input->post('id');

        $message = "Dear Student, The school wishes you a very happy birthday. Regards KK Blossoms.";

        $url = NULL;
        $file = NULL;

        if ($this->StudentBirthdayModel->insert($recipientIds, $message, $file, $url)) {

            echo json_encode([
                'status' => true,
                'message' => 'Message sent successfully'
            ]);

        } else {

            echo json_encode([
                'status' => false,
                'message' => 'Failed to send'
            ]);
        }
    }
}