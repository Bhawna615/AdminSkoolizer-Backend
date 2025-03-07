<?php


class AttendanceModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function markAbsentees($data)
	{
		$this->db->insert('absentees',$data);
	}

	public function mark($data)  //mark attendance
	{
		if ($this->db->insert('attendence', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get($class)  //get attendance
	{
		$year = date('Y');
		$query = $this->db->query('SELECT * FROM attendence WHERE Class="'.$class.'" and YEAR(Date) = '.$year);
		$result = $query->result();
		return $result;
	}

	public function getAttendanceDetails($class)  //get attendance
	{
		$year = date('Y');
		$query = $this->db->query('SELECT * FROM attendence WHERE Class="'.$class.'" and YEAR(Date) = '.$year);
		$result = $query->result();
		return $result;
	}

	public function getByDate($date)  //get Attendance By Date
	{
		$sql='SELECT * FROM attendence WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->result();
		return $result;
	}

	public function getDetails($class ,$date)  //get attendance details
	{
		$sql='SELECT * FROM absentees WHERE Class=? AND Date=?';
		$query=$this->db->query($sql,array($class, $date));
		$result=$query->result();
		return $result;
	}

	public function byMonth($class, $month, $currentYear)
	{
		$sql='SELECT * FROM attendence WHERE Month(Date)=? AND Year(Date)=? AND Class=?';
		$query=$this->db->query($sql,array($month, $currentYear, $class));
		$result=$query->result();
		return $result;
	}

	public function getAbsents($class, $month, $currentYear)
	{
		$sql='SELECT * FROM absentees WHERE Class=? AND Month(Date)=? AND Year(Date)=?';
		$query=$this->db->query($sql,array($class, $month, $currentYear));
		$result=$query->result();
		return $result;
	}

	public function verify($class)  //verify if attendance
	{
		$date = date('Y-m-d');
		$sql = 'SELECT * FROM attendence WHERE Date=? AND Class=?';
		$query = $this->db->query($sql, array($date, $class));
		$result = $query->num_rows();
		if ( $result > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	public function loadAllAbsentsToday()
	{
		$date=date('Y-m-d');
		$sql='SELECT * FROM absentees,student WHERE absentees.Class=student.Class AND absentees.Rollno=student.Rollno AND  Date=? ORDER BY student.Class';
		$query=$this->db->query($sql,$date);
		$result=$query->result();
		return $result;
	}

	public function getTotal($class) //get total attendance
	{
		$sql='SELECT id FROM attendence WHERE Class=?';
		$query=$this->db->query($sql,$class);
		$result=$query->num_rows();
		return $result;
	}

	public function getTotalAbsents($class)
	{
		$sql='SELECT * FROM student,absentees WHERE student.Class=absentees.Class AND student.Rollno=absentees.Rollno AND absentees.Class=?';
		$query=$this->db->query($sql,$class);
		$result=$query->result();
		return $result;
	}

	public function getTotalAbsentsById($class,$id)
	{
		$sql='SELECT * FROM student,absentees WHERE student.Class=absentees.Class AND student.Rollno=absentees.Rollno AND absentees.Class=? AND student.id=?';
		$query=$this->db->query($sql,array($class,$id));
		$result=$query->num_rows();
		return $result;
	}

	public function getStudentAttendance($id)
	{
		$sql='SELECT * FROM student WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		foreach ($result as $row) {
			$class=$row->Class;
			$roll=$row->Rollno;
		}

		$sqla='SELECT id FROM attendence WHERE Class=?';
		$querya=$this->db->query($sqla,$class);
		$resulta=$querya->num_rows();

		$sqlb='SELECT Date FROM absentees WHERE Class=? AND Rollno=?';
		$queryb=$this->db->query($sqlb,array($class,$roll));
		$resultb=$queryb->num_rows();
		$resultb=$resulta-$resultb;
		$resultc=$queryb->result();

		$info=array($resulta,$resultb,$resultc);
		return $info;
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM attendence WHERE YEAR(Date) = ? AND MONTH(Date) =? AND Class =? ORDER BY Date DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

}
