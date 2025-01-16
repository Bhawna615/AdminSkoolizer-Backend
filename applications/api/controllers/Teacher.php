<?php

class Teacher extends CI_Controller
{
	private $response = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('TeacherModel');
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
			if (isset($_POST['qrcode'])) {
				if ($this->TeacherModel->teacherLogin($_POST['qrcode'])) {
					$teacher = $this->TeacherModel->getTeacherData($_POST['qrcode']);
					$response['error'] = "false";
					$response['id'] = $teacher->id;
					$response['name'] = $teacher->Teachername;
					$response['post'] = $teacher->Post;
					$response['email'] = $teacher->Email;
					$response['class'] = $teacher->Classteacher;
					$response['image'] = $teacher->image;
				} else {
					$response['error'] = true;
					$response['message'] = "Invalid QR Code";
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

	public function schedule()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['schedule'])) {
				$schedule = $this->TeacherModel->getSchedule($_POST['schedule']);
				$response['error'] = false;
				$response['schedule'] = $schedule;
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

	public function markList()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['marklist'])) {
				$markList = $this->TeacherModel->getMarkList($_POST['marklist']);
				$response['marklist'] = $markList;
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

	public function submitMarkList()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['marklist']) && isset($_POST['class'])) {
				$markList = $this->TeacherModel->submitMarkList($_POST['marklist'], $_POST['class']);
				$response['marklist'] = $markList;
				$response['error'] = false;
				$response['message'] = "Submitted Successfully";
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

	public function classes()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['teacherId'])) {
				$classes = $this->TeacherModel->getClasses($_POST['teacherId']);
				$response['classes'] = $classes;
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

	public function subjects()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class']) && isset($_POST['teacherId'])) {
				$subjects = $this->TeacherModel->getSubjects($_POST['class'], $_POST['teacherId']);
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

	public function storeExamData()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (
				isset($_POST['class']) &&
				isset($_POST['subject']) &&
				isset($_POST['date']) &&
				isset($_POST['maxMarks']) &&
				isset($_POST['syllabus'])) {

				$exam = $this->TeacherModel
					->storeExamData($_POST['class'], $_POST['subject'], $_POST['date'], $_POST['maxMarks'],
						$_POST['syllabus']);
				if ($exam) {
					$response['error'] = false;
					$response['message'] = "Added Successfully";
				} else {
					$response['error'] = true;
					$response['message'] = "Failed to Add";
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

	public function exams()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['subject']) && isset($_POST['class'])) {
				$exams = $this->TeacherModel->getExams($_POST['subject'], $_POST['class']);
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
	}
}

?>
