<?php

require "Notification.php";

class Exam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ExamModel');
		$this->load->model('ClassModel');
		$this->load->model('MessageModel');
		$this->load->model('StudentModel');
		$this->load->model('TimetableModel');
        $this->load->model('MetricsModel');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
		$this->load->library('session');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function newExam()
	{
		$data['classes']=$this->ClassModel->getAll();
		$this->load->view('exams/newexam', $data);
	}

	public function examDetails()
	{
		$class = $_POST['class'];
		$data['class'] = $class;
		$data['subjects'] = $this->TimetableModel->getsubjects($class);
		$this->load->view('exams/examdetails', $data);
	}

	public function submit()
	{
		$this->form_validation->set_rules($this->config->item('exam'));

		if ($this->form_validation->run() === FALSE) {
			$data['class'] = $this->input->post('class');
			$data['subjects'] = $this->TimetableModel->getsubjects($this->input->post('class'));
			$this->load->view('exams/examdetails',$data);
		} else {
			$data = array(
				'Examname' => $_POST['topic'],
				'Subject' => $_POST['subject'],
				'Examtype' => $_POST['type'],
				'Class' => $_POST['class'],
				'Maxmarks' => $_POST['marks'],
				'Date' => $_POST['date']
			);
			$response = $this->ExamModel->submit($data);
			if ($response) {
				$this->createExamNotification($data);
				$this->session->set_flashdata('success', "Successfully Submitted");
				redirect(site_url('exam/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Submit");
				redirect(site_url('exam/view'));
			}
		}
	}
	
	public function selectClass()
	{
	    $data['classes'] = $this->ClassModel->getAll();
	    $data['examTypes'] = $this->ExamModel->getAllExamTypes();
	    $this->load->view('exams/select', $data);
	}

	public function view()
	{
	    $class = $this->input->post('class');
	    $examType = $this->input->post('exam');
	    $data['class'] = $class;
	    $data['examType'] = $examType;
	    $data['exams'] = $this->ExamModel->getexams($class, $examType);
		$this->load->view('exams/viewexams', $data);
	}

	public function display($class, $examType)
	{
		$data['exams'] = $this->ExamModel->getexams($class, $examType);
		$this->load->view('exams/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['exams'] = $this->ExamModel->getFilteredData($year, $month, $class);
		$this->load->view('exams/table', $data);
	}

	public function uploadResult()
	{
		$class = $_POST['class'];
		$data['class'] = $class;
		$data['examType'] = $this->input->post('examType');
		$data['code'] = $_POST['code'];
		$data['students'] = $this->ExamModel->marksform($class);
		$data['exam'] = $this->ExamModel->getOne($_POST['code']);
		$this->load->view('exams/uploadresult', $data);
	}


	public function uploadMarks()
	{
		$this->form_validation->set_rules($this->config->item('uploadMarks'));
		if ($this->form_validation->run() === FALSE) {
			$class = $_POST['class'];
			$data['class'] = $class;
			$data['code'] = $_POST['code'];
			$data['examType'] = $this->input->post('examType');
			$data['students'] = $this->ExamModel->marksform($class);
			$data['exam'] = $this->ExamModel->getOne($_POST['code']);
			$this->load->view('exams/uploadresult', $data);
		} else {
			$marks = array(
				'roll_no' => $this->input->post('rollno'),
				'name' => $this->input->post('name'),
				'exam_code' => $this->input->post('code'),
				'marks' => $this->input->post('marks'),
				'id' => $this->input->post('id')
			);

			if($this->ExamModel->uploadMarks($marks)) {
				$this->session->set_flashdata('success', "Successfully Uploaded");
				redirect(site_url('exam/selectClass'));
			} else {
				$this->session->set_flashdata('error', "Failed to Upload");
				redirect(site_url('exam/selectClass'));
			}
		}
	}


	public function viewResult()
	{
		$id = $_POST['id'];
		$data['result'] = $this->ExamModel->loadresult($id);
		$data['details'] = $this->ExamModel->getOne($id);
		$this->load->view('exams/viewresult', $data);
	}

	public function getDetails($id)
	{
		$this->load->model('StudentModel');
		$data['info']=$this->StudentModel->getInfo($id);
		$data['exams']=$this->ExamModel->load($id);
		$this->load->view('students/exams',$data);
	}

	public function delete($id)
	{
		$response = $this->ExamModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('exam/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('exam/view'));
		}
	}

	private function createExamNotification(array $data)
	{
		$recipientIds = array();
		$students = $this->StudentModel->getByClass($data['Class']);
		foreach ($students as $student) {
			$recipientIds[] = $student->id;
		}

		$recipients = $this->MessageModel->getRecipients($recipientIds);

		$examNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Exam Upcoming',
			'body' => 'Exam of '
				.$data['Examname'].
				' of '.$data['Subject'].
				' will be conducted on '.$data['Date'].
				'. Everyone is required to be present on the Exam Date',
			'type' => 'exam'
		);

		$notification = new Notification();
		$notification->send($examNotification);
	}

	public function select()
    {
        $student = array(
            'id' => $this->input->post('id'),
            'class' => $this->input->post('class')
        );

        $data['student'] = $student;
        $data['exams'] = $this->ExamModel->getByStudent($student);
        $this->load->view('exams/report_card/select', $data);
    }
    
        public function conversion()
    {
        $data['exams'] = $this->input->post('exams');
        $data['studentId'] = $this->input->post('studentId');
        $this->load->view('exams/report_card/conversion', $data);
    }

        public function reportCard()
    {
        $data['subjectsOrder'] = array('English', 'Hindi', 'Maths', 'Science', 'Social Science', 'Sanskrit', 'EVS', 'A.I', 'Physics', 'Chemistry', 'Biology', 'Accounts', 'Economics',
	    'Political Science', 'History', 'Geography', 'Computer', 'G.K', 'Drawing', 'I.P', 'P.Ed', 'Business Studies','Legal Studies');
        $weight = $this->input->post('weight');
        $exams = $this->input->post('exams');
        $data['combinedArray'] = array_combine($exams, $weight);
        $studentId = $this->input->post('studentId');
        $student = $this->StudentModel->getOne($studentId);
        $data['student'] = $student;
        // $data['marks'] = $this->ExamModel->getMarksByStudent($student, $exams);
        $data['marks'] = $this->ExamModel->getTentativeMarksByStudent($student, $exams);
        $data['exams'] = $this->ExamModel->getTitle($exams);
        $data['subjects'] = $this->ExamModel->getSubjectsByStudent($student, $exams);
        $data['metrics'] = $this->MetricsModel->getByStudentId($studentId);
        $this->load->view('exams/report_card/generate', $data);
    }
    
    public function saveResult()
    {
        $id = $_POST['id'];
		$data['result'] = $this->ExamModel->loadSavedresult($id);
	    foreach($data['result'] as $row) {
	        $marksRow = array(
	            'Rollno' => $row->Rollno,
	            'Name' => $row->Name,
	            'student_id' => $row->student_id,
	            'Examcode' => $row->Examcode,
	            'Marksobtained' => $row->Marksobtained,
	            'uploaded_by' => $this->session->userdata('username')
	            );
	            
	            $this->ExamModel->save($marksRow);
	    }
	    
	    $response = $this->ExamModel->updateSavedStatus($id);
	    	if ($response) {
				$this->session->set_flashdata('success', "Successfully Saved");
				redirect(site_url('exam/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Submit");
				redirect(site_url('exam/view'));
			}
    }
    
    public function editResult()
    {
        $id = $_POST['id'];
        $data['id'] = $id;
		$data['result'] = $this->ExamModel->loadresult($id);
		$data['details'] = $this->ExamModel->getOne($id);
		$this->load->view('exams/editresult', $data);
    }
    
    public function saveMarks()
    {
        $this->form_validation->set_rules($this->config->item('uploadMarks'));
		if ($this->form_validation->run() === FALSE) {
	        $id = $_POST['code'];
		    $data['result'] = $this->ExamModel->loadresult($id);
		    $this->load->view('exams/editresult', $data);
		} else {
			$marks = array(
				'roll_no' => $this->input->post('rollno'),
				'name' => $this->input->post('name'),
				'exam_code' => $this->input->post('code'),
				'marks' => $this->input->post('marks')
			);
			
			$examCode = $this->input->post('code');

			if($this->ExamModel->updateMarks($marks, $examCode)) {
				$this->session->set_flashdata('success', "Successfully Uploaded");
				redirect(site_url('exam/selectClass'));
			} else {
				$this->session->set_flashdata('error', "Failed to Upload");
				redirect(site_url('exam/selectClass'));
			}
		}
    }
    
    public function viewByTeacher()
    {
        $data['classes'] = $this->ClassModel->getAll();
        $this->load->view('exams/teacher/view', $data);
    }
    
    	public function displayByTeacher()
	{
	    $teacherId = $this->session->userdata('userId')->user_id;
		$data['exams'] = $this->ExamModel->loadExamsByTeacherId($teacherId);
		$this->load->view('exams/teacher/table', $data);
	}
	
		public function filterByTeacher($year, $month, $class)
	{
	    $teacherId = $this->session->userdata('userId')->user_id;
		$data['exams'] = $this->ExamModel->getFilteredDataByTeacher($year, $month, $class, $teacherId);
		$this->load->view('exams/teacher/table', $data);
	}
	
	public function classWiseReport()
	{
	    $data['examTypes'] = $this->ExamModel->getAllExamTypes();
	    $data['classes'] = $this->ClassModel->getAll();
	    $this->load->view('exams/class_wise_report/select', $data);
	}
	
	public function generateClassWiseReport()
	{
	    $data['subjectsOrder'] = array('English', 'Hindi', 'Maths', 'Science', 'Social Science', 'Sanskrit', 'EVS', 'A.I', 'Physics', 'Chemistry', 'Biology', 'Accounts', 'Economics',
	    'Political Science', 'History', 'Geography', 'Legal Studies', 'Computer', 'G.K', 'Drawing', 'I.P', 'P.Ed', 'I.P/P.Ed');
	    $class = $this->input->post('class');
	    $exam = $this->input->post('exam');
	    $data['students'] = $this->StudentModel->getByClassWithAscendingRollNo($class);
	    $data['exams'] = $this->ExamModel->getFilteredExams($class, $exam);
	    $data['results'] = $this->ExamModel->getResults();
	    $data['class'] = $class;
	    $data['exam'] = $exam;
	    
	    $subjectTotalMarks = array();
	    foreach($data['exams'] as $exam) {
	        $totalOfSubject = 0;
              foreach($data['results'] as $result)  {
                  if($exam->id == $result->Examcode ) {
                      if(is_numeric($result->Marksobtained)) {
                          $totalOfSubject = $totalOfSubject + $result->Marksobtained;
                          $subjectTotalMarks[$exam->Subject] = $totalOfSubject;
                      }
                  } else {
                      continue;
                  }
              }
	    }
	    $data['subjectTotalMarks'] = $subjectTotalMarks;
	    $this->load->view('exams/class_wise_report/generate', $data);
	}
	
	public function classWiseMetrics()
	{
	    $data['classes'] = $this->ClassModel->getAll();
	    $this->load->view('exams/class_wise_metrics/select', $data);
	}
	
	public function generateClassWiseMetrics()
	{
	    $class = $this->input->post('class');
	    $data['metrics'] = $this->MetricsModel->getByClass($class);
	    $data['students'] = $this->StudentModel->getByClass($class);
	    foreach($data['students'] as $student) {
	        $studentMetric[] = $this->MetricsModel->getStudentMetric($student->id);
	    }
	    $data['studentMetrics'] = $studentMetric;
	    $this->load->view('exams/class_wise_metrics/generate', $data);
	}
	
	public function customReportCard()
	{
	    $this->load->view('exams/report_card/custom');
	}
	
}
