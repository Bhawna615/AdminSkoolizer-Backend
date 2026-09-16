<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentAbsent extends CI_Controller {

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
        $this->load->model('Adminapi/StudentAbsentModel');
    }

    // LOAD ALL ABSENT STUDENTS
    public function loadAbsents()
    {
        $students = $this->StudentAbsentModel->loadAllAbsentsToday();

        echo json_encode([
            'status' => true,
            'data' => $students
        ]);
    }

    // SEND ABSENT MESSAGE
    public function sendAbsentSms()
    {
        $recipientIds = $this->input->post('id');

        $message = "Dear Parent, You are notified that your ward is absent from school today. Regards, KK Blossoms";

        $url = NULL;
        $file = NULL;

        if ($this->StudentAbsentModel->insert($recipientIds, $message, $file, $url)) {

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