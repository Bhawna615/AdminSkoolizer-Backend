<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->config('api');

        // Suppress warnings/notices that break JSON output
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);

        // Read API Key from headers
        $apiKey = null;
        if (function_exists('getallheaders')) {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (isset($headers['x-api-key'])) $apiKey = $headers['x-api-key'];
        }
        if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) $apiKey = $_SERVER['HTTP_X_API_KEY'];
        if (!$apiKey && isset($_SERVER['X_API_KEY'])) $apiKey = $_SERVER['X_API_KEY'];

        if (!$apiKey || trim($apiKey) !== trim($this->config->item('key'))) {
            header('Content-Type: application/json');
            echo json_encode(['error' => true, 'message' => 'Invalid API Key']);
            exit();
        }
    }

    public function index()
    {
        header('Content-Type: application/json');

        $response = ['error' => true, 'message' => 'Invalid Request'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['events'])) {
                $events = $this->EventModel->get();

                // Check if events exist
                if ($events && count($events) > 0) {
                    $response = [
                        'error' => false,
                        'events' => $events
                    ];
                } else {
                    $response = [
                        'error' => false,
                        'events' => [], // return empty array if no events
                        'message' => 'No events found for this year'
                    ];
                }
            }
        }

        echo json_encode($response);
    }
}
