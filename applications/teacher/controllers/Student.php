<?php

require "vendor/autoload.php";
include "phpqrcode/qrlib.php";

class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('ClassModel');
		$this->load->model('MetricsModel');
		$this->load->model('HomeModel');
		$this->load->model('AttendanceModel');
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
		date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function create() //new admission
	{
		$data['classes'] = $this->ClassModel->getAllClassesDetails();
		$this->load->view('admission/newadmission', $data);
	}

	public function enroll()
	{
		$data['classes'] = $this->ClassModel->getAllClassesDetails();

		$this->form_validation->set_rules($this->config->item('admission'));
		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAllClassesDetails();
			$this->load->view('admission/newadmission', $data);
		} else {
			$config['upload_path'] = './assets/images/students/';
			$config['allowed_types'] = 'gif|jpeg|png|jpg';
			$config['max_size'] = 10000;
			$config['max_width'] = 2000;
			$config['max_height'] = 2500;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$img = null;
			} else {
				$data = array('upload_data' => $this->upload->data());
				$img = $data['upload_data']['file_name'];
			}

			$qrCodeContent = $this->generateQrCodeContent();
			$fileName = $qrCodeContent . '.png';
			$absoluteFilePath = "./assets/images/students/qrcode/" . $fileName;

			if (!file_exists($absoluteFilePath)) {
				QRcode::png($qrCodeContent, $absoluteFilePath);
			}

			$password = random_string('alnum', 8);

			$data = array(
				'Name' => $this->input->post('name'),
				'Class' => $this->input->post('class'),
				'Fname' => $this->input->post('fname'),
				'Mname' => $this->input->post('mname'),
				'Guardianname' => $this->input->post('gname'),
				'Contact' => $this->input->post('contact'),
				'Admno' => $this->input->post('admno'),
				'Smsno' => $this->input->post('smsno'),
				'Rollno' => $this->input->post('rollno'),
				'Aadharno' => $this->input->post('aadharno'),
				'Dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
				'Lastschool' => $this->input->post('lastschool'),
				'email' => $this->input->post('email'),
				'image' => $img,
				'Address' => $this->input->post('address'),
				'qrcode' => $qrCodeContent,
				'admission_date' => date("Y-m-d", strtotime($this->input->post('date_of_admission'))),
				'gender' => $this->input->post('gender'),
				'password' => password_hash($password, PASSWORD_BCRYPT),
			);
			$student = $this->StudentModel->enroll($data);
			if ($student) {
				$this->session->set_flashdata('password', $password);
				$this->session->set_flashdata('success', 'Admission Successful');
				redirect(site_url('student/viewMany'));
			} else {
				$this->session->set_flashdata('error', 'Admission Failed');
				redirect(site_url('student/create'));
			}

		}

	}

	public function generateQrCodeContent()
	{
		$this->load->helper('string');

		$qrCodeContent = random_string('alnum', 16);
		$response = $this->StudentModel->checkIfCodeUnique($qrCodeContent);
		if ($response) {
			return $qrCodeContent;
		} else {
			$this->generateQrCodeContent();
		}
	}

	public function viewMany() //view students
	{

		$this->load->view('students/viewstudents');
	}

	public function display()
	{
		$teacherClass = $this->session->userdata('class');
		$data['students'] = $this->StudentModel->getInfoMany($teacherClass);
		$this->load->view('students/table', $data);
	}

	public function filter($class)
	{
		$data['students'] = $this->StudentModel->getFilteredData($class);
		$this->load->view('students/table', $data);
	}

	public function view($id)  //view student
	{
		$data['student'] = $this->StudentModel->getInfo($id);
		$this->load->view('students/studentprofile', $data);
	}

	public function edit($id)  //edit student info
	{
		$data['classes'] = $this->ClassModel->getAllClassesDetails();
		$data['student'] = $this->StudentModel->getInfo($id);
		$this->load->view('students/editstudentinfo', $data);
	}

	public function update()  // update
	{
		$this->form_validation->set_rules($this->config->item('admission'));

		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAllClassesDetails();
			$data['student'] = $this->StudentModel->getInfo($this->input->post('id'));
			$this->load->view('students/editstudentinfo', $data);
		} else {
			if ($_FILES['image']['error'] != 4 && $_FILES['image']['error'] == 0) {
				$config['upload_path'] = './assets/images/students/';
				$config['allowed_types'] = 'gif|jpeg|png|jpg|JPG';
				$config['max_size'] = 10000;
				$config['max_width'] = 2000;
				$config['max_height'] = 2500;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$img = null;
				} else {
					$data = array('upload_data' => $this->upload->data());
					$img = $data['upload_data']['file_name'];
				}
				$id = $_POST['id'];

				$data = array(
					'Name' => $this->input->post('name'),
					'Class' => $this->input->post('class'),
					'Fname' => $this->input->post('fname'),
					'Mname' => $this->input->post('mname'),
					'Guardianname' => $this->input->post('gname'),
					'Contact' => $this->input->post('contact'),
					'Admno' => $this->input->post('admno'),
					'Smsno' => $this->input->post('smsno'),
					'Rollno' => $this->input->post('rollno'),
					'Aadharno' => $this->input->post('aadharno'),
					'Dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
					'Lastschool' => $this->input->post('lastschool'),
					'image' => $img,
					'Address' => $this->input->post('address'),
					'admission_date' => date("Y-m-d", strtotime($this->input->post('date_of_admission'))),
					'gender' => $this->input->post('gender')

				);
				$response = $this->StudentModel->update($data, $id);

			} else {
				$id = $_POST['id'];
				$data = array(
					'Name' => $this->input->post('name'),
					'Class' => $this->input->post('class'),
					'Fname' => $this->input->post('fname'),
					'Mname' => $this->input->post('mname'),
					'Guardianname' => $this->input->post('gname'),
					'Contact' => $this->input->post('contact'),
					'Admno' => $this->input->post('admno'),
					'Smsno' => $this->input->post('smsno'),
					'Rollno' => $this->input->post('rollno'),
					'Aadharno' => $this->input->post('aadharno'),
					'Dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
					'Lastschool' => $this->input->post('lastschool'),
					'Address' => $this->input->post('address'),
					'admission_date' => date("Y-m-d", strtotime($this->input->post('date_of_admission'))),
					'gender' => $this->input->post('gender')

				);
				$response = $this->StudentModel->update($data, $id);
			}

			if ($response) {
				$this->session->set_flashdata('success', "Information Updated Successfully");
				redirect(site_url('student/view/') . $id);
			} else {
				$this->session->set_flashdata('error', "Failed to update");
				redirect(site_url('student/view/') . $id);
			}
		}
	}

	public function delete($id) //delete student
	{
		$this->shiftRollNumbersUpward($id);
		$response = $this->StudentModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully and Roll Numbers Shifted");
			redirect(site_url('student/viewMany'));
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect(site_url('student/viewMany'));
		}
	}

	public function viewByClass($class) //viewstudentsbyclass
	{
		$data['students'] = $this->StudentModel->viewbyclass($class);
		$this->load->view('students/viewstudentsbyclass', $data);

	}


	public function generateTc()
	{
		$id = $this->input->post('id');
		$tcDetails = array(
			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'last_class' => $this->input->post('last_class'),
			'roll_no' => $this->input->post('roll_no'),
			'nationality' => $this->input->post('nationality'),
			'category' => $this->input->post('category'),
			'last_school' => $this->input->post('last_school'),
			'date_of_admission' => $this->input->post('admission_date'),
			'class_of_admission' => $this->input->post('admission_class'),
			'admission_number' => $this->input->post('admission_number'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'failed_mark' => $this->input->post('failed_mark'),
			'fee_concession' => $this->input->post('fee_concession'),
			'working_days' => $this->input->post('total_days'),
			'present_days' => $this->input->post('present_days'),
			'subjects_studied' => $this->input->post('subjects'),
			'qualified_mark' => $this->input->post('qualified_mark'),
			'dues_date' => $this->input->post('dues_date'),
			'application_date' => $this->input->post('application_date'),
			'issue_date' => $this->input->post('issue_date'),
			'reason' => $this->input->post('reason'),
			'ncc' => $this->input->post('ncc'),
			'games_played' => $this->input->post('games_played'),
			'general_conduct' => $this->input->post('general_conduct'),
			'remarks' => $this->input->post('remarks'),
			'student_id' => $this->input->post('id'),
			'session' => $this->input->post('session')
		);
		$data['details'] = $tcDetails;
		$data['info'] = $this->StudentModel->getInfo($id);
		if ($this->StudentModel->insertTransferredStudent($tcDetails)) {
			$this->delete($id);
		} else {
			$this->session->set_flashdata('error', "Failed to generate SLC");
			redirect(site_url('student/viewTransferredStudents'));
		}
	}

	public function tcDetails($id)
	{
		$data['id'] = $id;
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['attendance'] = $this->AttendanceModel->getStudentAttendance($id);
		$this->load->view('students/tcdetails', $data);
	}


	public function examReport()
	{
		$this->load->model('ExamModel');
		$id = $_POST['id'];
		$roll = $_POST['roll'];
		$class = $_POST['class'];
		$params = array($class, $roll);
		$data['student'] = $this->StudentModel->getInfo($id);
		$data['report'] = $this->ExamModel->getExamReport($params);
		$data['metrics'] = $this->MetricsModel->getByStudentId($id);
		$this->load->view('students/examreport', $data);
	}

	public function getUsernamePassword()
	{
		$data['classes'] = $this->StudentModel->getallclassesdetails();
		$data['students'] = $this->StudentModel->getstudentsinfo();
		$this->load->view('sample', $data);
	}

	public function transportDetails($id) //transport details
	{
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['details'] = $this->StudentModel->getTransportDetails($id);
		$this->load->view('students/transportdetails', $data);
	}

	public function promote()
	{
		$data['classes'] = $this->ClassModel->getAllClassesDetails();
		$this->load->view('students/promote', $data);
	}

	public function updateClass()
	{
		$this->form_validation->set_rules($this->config->item('promote'));
		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAllClassesDetails();
			$this->load->view('students/promote', $data);
		} else {
			$ids = $this->input->post('ids');
			$toClass = $this->input->post('toClass');

			if ($this->StudentModel->updateClass($toClass, $ids)) {
				$this->session->set_flashdata('success', "Promotion Successful");
				redirect(site_url('student/promote'));
			} else {
				$this->session->set_flashdata('error', "Failed to Promote");
				redirect(site_url('student/promote'));
			}
		}
	}

	public function getByClassJSON($class)
	{
		$students = $this->StudentModel->getByClass($class);
		echo json_encode($students);
	}

	public function listSelect()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('students/list/select', $data);
	}

	public function listCreate()
	{
		if (($this->input->post('admno_start')) != null && ($this->input->post('admno_end')) != null) {
			$admno_start = $this->input->post('admno_start');
			$admno_end = $this->input->post('admno_end');
			$classes = $_POST['classes'];
			$data['field_roll_no'] = $this->input->post('field_roll_no');
			$data['field_fname'] = $this->input->post('field_fname');
			$data['field_mname'] = $this->input->post('field_mname');
			$data['field_contact'] = $this->input->post('field_contact');
			$data['field_admno'] = $this->input->post('field_admno');
			$data['field_aadhar'] = $this->input->post('field_aadhar');
			$data['field_dob'] = $this->input->post('field_dob');
			$data['field_qrcode'] = $this->input->post('field_qrcode');
			$data['field_admission_date'] = $this->input->post('field_admission_date');
			$data['field_gender'] = $this->input->post('field_gender');
			$data['field_image'] = $this->input->post('field_image');


			for ($i = 0; $i < count($classes); $i++) {
				$data['classes'] = $this->ClassModel->getAll();
				$data['students'][$classes[$i]] = $this->StudentModel->getByClassWithAscendingRollNoWithRange($classes[$i], $admno_start, $admno_end);

			}


			$this->load->view('students/list/view', $data);
		} else {
			$classes = $_POST['classes'];
			$data['field_roll_no'] = $this->input->post('field_roll_no');
			$data['field_fname'] = $this->input->post('field_fname');
			$data['field_mname'] = $this->input->post('field_mname');
			$data['field_contact'] = $this->input->post('field_contact');
			$data['field_admno'] = $this->input->post('field_admno');
			$data['field_aadhar'] = $this->input->post('field_aadhar');
			$data['field_dob'] = $this->input->post('field_dob');
			$data['field_qrcode'] = $this->input->post('field_qrcode');
			$data['field_admission_date'] = $this->input->post('field_admission_date');
			$data['field_gender'] = $this->input->post('field_gender');
			$data['field_image'] = $this->input->post('field_image');



			for ($i = 0; $i < count($classes); $i++) {
				$data['classes'] = $this->ClassModel->getAll();
				$data['students'][$classes[$i]] = $this->StudentModel->getByClassWithAscendingRollNo($classes[$i]);

			}

			// print_r($data['students']);

			$this->load->view('students/list/view', $data);
			//   print_r($data['students']);
			// if ($class == "school") {

			//     $data['classes'] = $this->ClassModel->getAll();
			//     $data['students'] = $this->StudentModel->getAllByRollNo();

			//     $this->load->view('students/list/view', $data);
			// } else {
			//     $data['students'] = $this->StudentModel->getByClassWithAscendingRollNo($class);

			//     $this->load->view('students/list/view', $data);
			// }
		}

	}

	public function shiftRollNumbersUpward($id)
	{
		$student = $this->StudentModel->getOne($id);
		$response = $this->StudentModel->shiftRollNumbers($student);
	}

	public function viewTransferredStudents()
	{
		$this->load->view('students/transfers/view');
	}

	public function displayTransferredStudents()
	{
		$data['students'] = $this->StudentModel->getTransferredStudents();
		$this->load->view('students/transfers/table', $data);
	}

	public function viewTc()
	{
		$id = $this->input->post('id');
		$data['student'] = $this->StudentModel->getTransferredStudentData($id);
		$this->load->view('students/tc', $data);
	}

	public function editTc()
	{
		$id = $this->input->post('id');
		$data['student'] = $this->StudentModel->getTransferredStudentData($id);
		$this->load->view('students/transfers/edit', $data);
	}

	public function updateTc()
	{
		$id = $this->input->post('id');
		$tcDetails = array(
			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'last_class' => $this->input->post('last_class'),
			'roll_no' => $this->input->post('roll_no'),
			'nationality' => $this->input->post('nationality'),
			'category' => $this->input->post('category'),
			'last_school' => $this->input->post('last_school'),
			'date_of_admission' => $this->input->post('admission_date'),
			'class_of_admission' => $this->input->post('admission_class'),
			'admission_number' => $this->input->post('admission_number'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'failed_mark' => $this->input->post('failed_mark'),
			'fee_concession' => $this->input->post('fee_concession'),
			'working_days' => $this->input->post('total_days'),
			'present_days' => $this->input->post('present_days'),
			'subjects_studied' => $this->input->post('subjects'),
			'qualified_mark' => $this->input->post('qualified_mark'),
			'dues_date' => $this->input->post('dues_date'),
			'application_date' => $this->input->post('application_date'),
			'issue_date' => $this->input->post('issue_date'),
			'reason' => $this->input->post('reason'),
			'ncc' => $this->input->post('ncc'),
			'games_played' => $this->input->post('games_played'),
			'general_conduct' => $this->input->post('general_conduct'),
			'remarks' => $this->input->post('remarks'),
			'student_id' => $this->input->post('id'),
			'session' => $this->input->post('session')
		);
		$data['details'] = $tcDetails;
		$data['info'] = $this->StudentModel->getInfo($id);
		if ($this->StudentModel->updateTransferredStudent($tcDetails, $id)) {
			$this->session->set_flashdata('success', "Updated SLC successfully");
			redirect(site_url('student/viewTransferredStudents'));
		} else {
			$this->session->set_flashdata('error', "Failed to generate SLC");
			redirect(site_url('student/viewTransferredStudents'));
		}
	}

	public function viewCharacterCertificates()
	{

		$this->load->view('students/character/view');
	}

	public function displayCharacterCertificates()
	{
		$data['characterCertificates'] = $this->StudentModel->getAllCharacterCertificates();
		$this->load->view('students/character/table', $data);
	}

	public function openCharacterCertificate()
	{
		$id = $this->input->post('id');
		$data['characterCertificate'] = $this->StudentModel->getCharacterCertificate($id);
		$this->load->view('students/character/certificate', $data);
	}

	public function characterCertificateDetails($id)
	{
		$data['id'] = $id;
		$data['student'] = $this->StudentModel->getInfo($id);
		$this->load->view('students/character/details', $data);
	}

	public function generateCharacterCertificate()
	{
		$id = $this->input->post('id');
		$data['student'] = $this->StudentModel->get($id);
		$characterCertificate = array(
			'student_id' => $data['student']->id,
			'name' => $data['student']->Name,
			'class' => $data['student']->Class,
			'roll_no' => $data['student']->Rollno,
			'father_name' => $data['student']->Fname,
			'mother_name' => $data['student']->Mname,
			'admission_no' => $data['student']->Admno,
			'admission_date' => $this->input->post('admission_date'),
			'graduation_date' => $this->input->post('graduation_date'),
		);
		if ($this->StudentModel->insertCharacterCertificate($characterCertificate)) {
			$this->session->set_flashdata('success', 'Certificate generated successfully');
			redirect(site_url('student/viewCharacterCertificates'));
		} else {
			$this->session->set_flashdata('error', 'Failed to generate');
			redirect(site_url('student/viewCharacterCertificates'));
		}
	}

	public function viewLeaveRequests()
	{
		
		$teacherId = $this->session->userdata('id');

		 // **Step 1: Update notification check time**
		 $this->HomeModel->updateNotificationCheckTime($teacherId);
		
		// $data['leaveRequestCount'] = $this->HomeModel->getLeaveRequestCount();
		$data['leaveRequestMessages'] = $this->HomeModel->leaveRequestMessages($teacherId);
		$data['leaveRequests'] = $this->StudentModel->getLeaveRequests();
		$this->load->view('students/leave_requests/view',$data);
	}

	// notifications

	// public function notification()
    // {
    //     $id = $this->session->userdata('id');
    //     $count = $this->StudentModel->getMessageCount($id);
    //     print_r($count);
    // }
    
    // public function notifications()
    // {
    //     $data = array(
    //         'title' => 'Notifications',
    //         'page' => 'Notifications'
    //     );
    //     $id = $this->session->userdata('id');
    //     $this->StudentModel->updateNotificationCheckTime($id);
    //     $this->load->view('students/notifications/view', $data);
    // }

	// notifications
	public function displayLeaveRequests()
	{
		$data['leaveRequests'] = $this->StudentModel->getLeaveRequests();
		$this->load->view('students/leave_requests/table', $data);
	}

	public function approveLeaveRequest($requestId)
	{
		if ($this->StudentModel->approveLeaveRequest($requestId)) {
			$this->session->set_flashdata('success', "Approved");
			redirect(site_url('student/viewLeaveRequests'));
		} else {
			$this->session->set_flashdata('error', "Failed to Approve");
			redirect(site_url('student/viewLeaveRequests'));
		}
	}
}
