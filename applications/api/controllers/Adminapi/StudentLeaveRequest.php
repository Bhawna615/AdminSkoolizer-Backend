<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLeaveRequest extends CI_Controller {

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
        $this->load->model('Adminapi/StudentLeaveRequestModel');
    }

    // LOAD ALL LEAVE REQUESTS
    public function loadLeaveRequests()
    {
        $leaveRequests = $this->StudentLeaveRequestModel->getLeaveRequests();

        echo json_encode([
            'status' => true,
            'data' => $leaveRequests
        ]);
    }

    // APPROVE LEAVE REQUEST
    public function approveLeaveRequest($requestId)
    {
        $approved = $this->StudentLeaveRequestModel
            ->approveLeaveRequest($requestId);

        if ($approved) {

            echo json_encode([
                'status' => true,
                'message' => 'Approved Successfully'
            ]);

        } else {

            echo json_encode([
                'status' => false,
                'message' => 'Failed to approve'
            ]);

        }
    }
}