<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->config('api');
        $this->load->helper('url'); // ✅ Needed for base_url()

        // ✅ Validate API Key
        $apiKey = null;
        if (function_exists('getallheaders')) {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (isset($headers['x-api-key'])) {
                $apiKey = $headers['x-api-key'];
            }
        }
        if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) {
            $apiKey = $_SERVER['HTTP_X_API_KEY'];
        }
        if (!$apiKey && isset($_SERVER['X_API_KEY'])) {
            $apiKey = $_SERVER['X_API_KEY'];
        }

        // Local fallback for development
        if (!$apiKey) {
            $apiKey = 'skoolizer_key_2025';
        }

        if (trim($apiKey) !== trim($this->config->item('key'))) {
            header('Content-Type: application/json');
            echo json_encode(['error' => true, 'message' => 'Invalid API Key']);
            exit;
        }
    }

	 public function fcmToken()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'error' => true,
                'message' => 'Invalid Request Method'
            ]);
            return;
        }

        $student_id = $this->input->post('student_id');
        $fcm_token  = $this->input->post('fcm_token');
        if (empty($student_id) || empty($fcm_token)) {
            echo json_encode([
                'error' => true,
                'message' => 'Student ID or FCM Token missing'
            ]);
            return;
        }

        $updated = $this->StudentModel->updateFcmToken($student_id, $fcm_token);

        echo json_encode([
            'error'   => !$updated,   // ✅ SUCCESS = error false
            'message' => $updated
                ? 'FCM token updated successfully'
                : 'Failed to update FCM token'
        ]);
    }
}
