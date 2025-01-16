<?php


class Quiz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuizModel');
		$this->load->config('api');
		$headers = apache_request_headers();
		if ($headers['X-Api-Key'] != $this->config->item('key')) {
			$response = array(
				'error' => true,
				'message' => "Invalid Request"
			);
			echo json_encode($response);
			exit();
		}
	}

	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['quizzes'])) {
				if (isset($_POST['class'])) {
					$response['quizzes'] = $this->QuizModel->get($_POST['class']);
					$response['error'] = false;
				} else {
					$response['error'] = true;
					$response['message'] = "Invalid Request";
				}
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
