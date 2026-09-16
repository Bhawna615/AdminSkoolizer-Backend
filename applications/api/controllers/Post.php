<?php


class Post extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel');
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


	public function school()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['posts'])) {
				$response['posts'] = $this->PostModel->get();
				$response['error'] = false;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			}
		} else {
			$response['error'] = true;
			$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}

	public function ofClass()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['posts']) && isset($_POST['class'])) {
				$response['posts'] = $this->PostModel->getByClass($_POST['class']);
				$response['error'] = false;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			}
		} else {
			$response['error'] = true;
			$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}

}
