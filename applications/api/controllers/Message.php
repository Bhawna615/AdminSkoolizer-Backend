<?php

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MessageModel');
        $this->load->config('api');

        // ---- Secure header validation ----
        $apiKey = null;

        // Fetch headers safely (WAMP/XAMPP compatible)
        if (function_exists('getallheaders')) {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (isset($headers['x-api-key'])) {
                $apiKey = $headers['x-api-key'];
            }
        }

        // Fallback for environments where getallheaders() is unavailable
        if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) {
            $apiKey = $_SERVER['HTTP_X_API_KEY'];
        }

        // Default test key (for local development only)
        if (!$apiKey) {
            $apiKey = 'skoolizer_key_2025';
        }

        // Compare API key with config
        if (trim($apiKey) !== trim($this->config->item('key'))) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode([
                    'error' => true,
                    'message' => 'Invalid API Key',
                ]));
            exit;
        }
    }

    public function index()
    {
        // Only allow POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->_invalidRequest();
        }

        // Validate required fields
        $studentId = $this->input->post('id');
        $hasMessagesFlag = $this->input->post('messages');

        if (empty($studentId) || !$hasMessagesFlag) {
            return $this->_invalidRequest();
        }

        // Fetch messages from model
        $messages = $this->MessageModel->get($studentId);

        // Proper JSON output
        $response = [
            'error' => false,
            'messages' => $messages,
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    private function _invalidRequest()
    {
        $response = [
            'error' => true,
            'message' => 'Invalid Request',
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
