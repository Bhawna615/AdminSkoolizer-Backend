<?php


class Attendance extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AttendanceModel');
		$this->load->model('ClassModel');
		$this->load->model('StudentModel');
		$this->load->model('MovementModel');
		$this->load->helper('url');
		$this->load->library('session');
        date_default_timezone_set("Asia/Kolkata");
			if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function mark()
	{
		$data['classes']=$this->ClassModel->getAllClassesDetails();
		$this->load->view('attendance/markattendance',$data);
	}

	public function getRollCall()
	{
	    $class = $this->session->userdata('class');
		$mark = $this->AttendanceModel->verify($class);
		$data['movements'] = $this->MovementModel->filterTwo($class);
		$data['leaveRequests'] = $this->StudentModel->getLeaveRequestsOfClass($class, date("d-m-Y"));
		if ($mark == false) {
			$data['students'] = $this->StudentModel->getByClass($class);
			$this->load->view('attendance/rollcall', $data);
		}
		else {
			$this->load->view('alerts/attendancetaken');
		}
	}

	public function submit()
	{
		$data = array();
		$class = $_POST['class'];
		$count = count($_POST['roll']);
		$date = date('Y-m-d');
		for ($i=0; $i <$count ; $i++) {
			$data[$_POST['roll'][$i]] = $_POST['mark'][$i];
		}
		$final = array_combine($_POST['roll'], $_POST['mark']);
		$idMapToRollno = array_combine($_POST['ids'], $_POST['roll']);
		$absent = 0;
		$leavecount = 0;
		$presentcount = 0;
		foreach ($final as $key => $value) {
		    $studentId = array_search($key, $idMapToRollno);
			if ($value == 'Absent') {
				$leave = FALSE;
				$data = array(
					'Date' =>$date,
					'Rollno' => $key,
					'Class' => $class,
					'onLeave' => $leave,
					'student_id' => $studentId
				);
				$this->AttendanceModel->markabsentees($data);
				$absent = $absent + 1;
			} else if($value == 'Leave') {
				$leave = TRUE;
				$data = array(
					'Date' =>$date,
					'Rollno' => $key,
					'Class' => $class,
					'onLeave' => $leave,
					'student_id' => $studentId
				);
				$this->AttendanceModel->markabsentees($data);
				$leavecount = $leavecount + 1;
			} else if ($value == 'Present') {
				$presentcount = $presentcount + 1;
			}
		}
		$attendance = array(
			'Date' => $date,
			'Class' => $class,
			'Absent' => $absent,
			'onLeave' => $leavecount,
			'Present' => $presentcount,
			'Strength' => $count
		);
		$response = $this->AttendanceModel->mark($attendance);
		if ($response) {
			$this->session->set_flashdata('success', "Marked Successfully");
			redirect(site_url('attendance/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to Mark");
			redirect(site_url('attendance/view'));
		}
	}

	public function view()
	{
		$this->load->view('attendance/viewattendance');
	}

	public function display()
	{
	    $class = $this->session->userdata('class');
		$data['attendance'] = $this->AttendanceModel->get($class);
		$this->load->view('attendance/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['attendance'] = $this->AttendanceModel->getFilteredData($year, $month, $class);
		$this->load->view('attendance/table', $data);
	}

	public function viewByDate($date)
	{
		$data['attendance'] = $this->AttendanceModel->getByDate($date);
		$this->load->view('attendance/showbydate', $data);
	}

	public function details()
	{
		$class = $_POST['class'];
		$date = $_POST['date'];
		$data['students'] = $this->StudentModel->getByClass($class);
		$data['details'] = $this->AttendanceModel->getDetails($class, $date);
		$data['attendance_details'] = $this->AttendanceModel->getAttendanceDetails($class);
		$data['attendance_data'] = $this->AttendanceModel->getAttendanceData($class, $date);
		$this->load->view('attendance/details', $data);
	}

	public function viewByMonth()
	{
		$this->load->view('attendance/bymonth');
	}

	public function getByMonth()
	{
		$class = $this->session->userdata('class');
		$month = $_POST['month'];
		$currentYear = date("Y");
		$data['month'] = $_POST['month'];
		$data['class'] = $class;
		$data['students'] = $this->StudentModel->getByClass($class);
		$data['attendance'] = $this->AttendanceModel->byMonth($class, $month, $currentYear);
		$data['absents'] = $this->AttendanceModel->getAbsents($class, $month, $currentYear);
		$this->load->view('attendance/showbymonth', $data);
	}

	public function studentAttendance($id)
	{
		$this->load->model('StudentModel');
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['attendance'] = $this->AttendanceModel->getStudentAttendance($id);
		$this->load->view('students/attendance', $data);
	}

	public function edit()
	{
		$date = $this->input->post('date');
		$class = $this->input->post('class');
		$this->AttendanceModel->delete($class, $date);
		$data['date'] = $date;
		$data['class'] = $class;
		$class = $this->input->post('class');
		$data['absentees'] = $this->AttendanceModel->getAbsentees($class, $date);
		$data['students'] = $this->StudentModel->getByClass($class);
		$this->load->view('attendance/edit', $data);
	}
}
