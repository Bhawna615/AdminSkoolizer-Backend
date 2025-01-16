<?php


class Payment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PaymentModel');
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
			if (isset($_POST['payments'])) {
				if (isset($_POST['class']) && isset($_POST['name']) && isset($_POST['rollNo'])) {
					$response['payments'] = $this->PaymentModel->get($_POST['name'], $_POST['class'], $_POST['rollNo']);
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
