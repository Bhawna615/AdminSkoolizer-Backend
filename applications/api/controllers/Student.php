<?php


class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
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

	public function fcmToken()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['id']) && isset($_POST['token'])) {
				$response['error'] = $this->StudentModel->updateFcmToken($_POST['id'], $_POST['token']);
				$response['message'] = 'Subscribed for notifications';
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
