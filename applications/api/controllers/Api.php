<?php

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
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
		if (isset($_POST['admission_no'])) {
		    if(isset($_POST['password'])) {
        		  if ($this->ApiModel->userLogin($_POST['admission_no'], $_POST['password'])) {
        			$user = $this->ApiModel->getUserData($_POST['admission_no']);
        			$response['error'] = "false";
        			$response['id'] = $user->id;
        			$response['Name'] = $user->Name;
        			$response['Fname'] = $user->Fname;
        			$response['Email'] = $user->Email;
        			$response['Class'] = $user->Class;
        			$response['image'] = $user->image;
        			$response['Rollno'] = $user->Rollno;
        			$response['qrcode'] = $user->qrcode;
        		} else {
        		    $response['error'] = true;
			        $response['message'] = "Invalid Credentials";
        		}  
		    }
		else {
			$response['error'] = true;
			$response['message'] = "Invalid Credentials";
		}
		} else {
			$response['error'] = true;
			$response['message'] = "Required fields are missing";
		}

	} else {
		$response['error'] = true;
		$response['message'] = "Invalid Request";
	}

	echo json_encode($response);

	}

// 	public function index()
// 	{
// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 		if (isset($_POST['qrcode'])) {
// 		if ($this->ApiModel->userLogin($_POST['qrcode'])) {
// 			$user = $this->ApiModel->getUserData($_POST['qrcode']);
// 			$response['error'] = "false";
// 			$response['id'] = $user->id;
// 			$response['Name'] = $user->Name;
// 			$response['Fname'] = $user->Fname;
// 			$response['Email'] = $user->Email;
// 			$response['Class'] = $user->Class;
// 			$response['image'] = $user->image;
// 			$response['Rollno'] = $user->Rollno;
// 				$response['qrcode'] = $user->qrcode;
// 		} else {
// 			$response['error'] = true;
// 			$response['message'] = "Invalid QR Code";
// 		}
// 		} else {
// 			$response['error'] = true;
// 			$response['message'] = "Required fields are missing";
// 		}

// 	} else {
// 		$response['error'] = true;
// 		$response['message'] = "Invalid Request";
// 	}

// 	echo json_encode($response);

// 	}

	public function fetchSchedule()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['schedule'])) {
				if (isset($_POST['userId'])) {
					//timetable request
					$schedule = $this->ApiModel->fetchSchedule($_POST['schedule']);
					$movement = $this->ApiModel->getLastMovement($_POST['userId']);
					$response['schedule'] = $schedule;
					$response['movement'] = $movement;
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

	public function fetchAssignment()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['assignment'])) {
				$assignment = $this->ApiModel->fetchAssignment($_POST['assignment'], $_POST['date']);
				$response['assignment'] = $assignment;
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

	public function fetchExams()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class'])) {
				$exams = $this->ApiModel->fetchExams($_POST['class']);
				$response['exams'] = $exams;
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

	public function fetchPosts()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class'])) {
				$posts = $this->ApiModel->fetchPosts($_POST['class']);
				$response['posts'] = $posts;
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

	public function fetchSubjects()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class'])) {
				$subjects = $this->ApiModel->fetchSubjects($_POST['class']);
				$response['subjects'] = $subjects;
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

	public function fetchResult()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class']) && isset($_POST['subject']) && isset($_POST['rollNo'])) {
				$result = $this->ApiModel->fetchResult
					(
					$_POST['class'],
					 $_POST['subject'],
					  $_POST['rollNo']
					);
					$response['error'] = false;
					$response['result'] = $result;
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
