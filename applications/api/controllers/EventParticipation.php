<?php


class EventParticipation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventParticipationModel');
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

	public function submit()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['participants'])) {
				if (
					isset($_POST['id']) &&
					isset($_POST['name']) &&
					isset($_POST['class']) &&
					isset($_POST['rollNo']) &&
					isset($_POST['eventId'])
				) {
					$eventParticipant = array(
						'participant_student_id' => $_POST['id'],
						'participant_name' => $_POST['name'],
						'participant_class' => $_POST['class'],
						'participant_roll_no' => $_POST['rollNo'],
						'event_id' => $_POST['eventId']
					);

					$response['error'] = false;
					$response['message'] = $this->EventParticipationModel->insert($eventParticipant);
				} else {
					$response['error'] = true;
					$response['message'] = "Invalid Request";
				}
			}
		}
		echo json_encode($response);
	}

}
