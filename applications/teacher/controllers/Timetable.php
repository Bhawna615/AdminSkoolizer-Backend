<?php


class Timetable extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TimetableModel');
		$this->load->model('ClassModel');
		$this->load->model('TeacherModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
			if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function view()  //view timetable
	{
		$this->load->view('timetable/timetable');
	}

	public function get()  //get timetable
	{
		$class = $this->session->userdata('class');
		$day=$_POST['day'];
		$data['timetable']=$this->TimetableModel->get($class,$day);
		$this->load->view('timetable/showtimetable',$data);
	}


	public function add()  //new period
	{
		$data['classes'] = $this->ClassModel->getAll();
		$data['teachers'] = $this->TeacherModel->getAll();
		$this->load->view('timetable/newperiod', $data);
	}

	public function insert()  //insert new period
	{
		$this->form_validation->set_rules($this->config->item('timetable'));

		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAll();
			$data['teachers'] = $this->TeacherModel->getAll();
			$this->load->view('timetable/newperiod', $data);
		} else {
			$stime = date('H:i:s', strtotime($_POST['stime']));
			$etime = date('H:i:s', strtotime($_POST['etime']));
			$data=array(
				'Subjectname' => $_POST['subjectname'],
				'TeacherId' => $_POST['teacher'],
				'Stime' => $stime,
				'Etime' => $etime,
				'Day' => $_POST['day'],
				'Class' => $_POST['class'],
			);
			$response = $this->TimetableModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('timetable/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('timetable/view'));
			}
		}
	}

	public function delete($id) //delete timetable
	{
		$response = $this->TimetableModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('timetable/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('timetable/view'));
		}
	}

	public function getSubjectsByClass($class)
	{
		$subjects = $this->TimetableModel->getSubjectsByClass($class);
		$options = "<option value=''>Select Subject</option>";
		foreach ($subjects as $subject) {
			$options = $options . "<option value='$subject->Subjectname'>$subject->Subjectname</option>";
		}
		echo $options;
	}

}
