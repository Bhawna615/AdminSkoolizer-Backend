<?php


class HomeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getStudentCount() //get students count
	{
		$query=$this->db->query("SELECT id FROM student  WHERE Class != 'passed_out'");
		$result=$query->num_rows();
		return $result;
	}

	public function getPassedOutStudentCount() //get students count
	{
		$query=$this->db->query("SELECT id FROM student  WHERE Class = 'passed_out'");
		$result=$query->num_rows();
		return $result;
	}
	

	public function getTeacherCount() //get teacher count
	{
		$query=$this->db->query('SELECT id FROM teachers');
		$result=$query->num_rows();
		return $result;
	}

	public function getClassesCount() // get classes count
	{
		$query=$this->db->query('SELECT id FROM classes');
		$result=$query->num_rows();
		return $result;
	}

	public function getEmployeeCount()
	{
		$query=$this->db->query('SELECT id FROM employees');
		$result=$query->num_rows();
		return $result;
	}

	public function getActiveRouteCount()
	{
		$query=$this->db->query('SELECT id FROM currentroute WHERE status=FALSE');
		$result=$query->num_rows();
		return $result;
	}

	public function getAbsentCount()
	{
		$date=date('Y-m-d');
		$sql='SELECT absenteeid FROM absentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->num_rows();
		return $result;
	}

	public function getEmpAbsentCount()
	{
		$date=date('Y-m-d');
		$sql='SELECT id FROM empabsentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->num_rows();
		return $result;
	}

	public function getExamCount()
	{
		$date=date('Y-m-d');
		$sql='SELECT id FROM conduct WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->num_rows();
		return $result;
	}

	public function getBirthdayCount()
	{
		$day=date('d');
		$month=date('m');
		$sql='SELECT id FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=?';
		$query=$this->db->query($sql,array($day,$month));
		$result=$query->num_rows();
		return $result;
	}

	public function loadBirthdays()
	{
		$day=date('d');
		$month=date('m');
		$sql='SELECT * FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=?';
		$query=$this->db->query($sql,array($day,$month));
		$result=$query->result();
		return $result;
	}

	public function test()
	{
		$data['students']=$this->Home_model->marksform();
		$this->load->view('test',$data);
	}
	
	public function getPendingFeeCount()
	{
	     return $this->db->where('status', 0)->get('fee')->num_rows();
	}
	
	public function getLeaveRequestCount()
	{
	    return $this->db->where('status', false)
	    ->get('leave_requests')->num_rows();
	}
}
