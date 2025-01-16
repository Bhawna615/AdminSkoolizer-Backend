<?php


class ApiModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

// 	public function userLogin($qrcode)
// 	{
// 		$sql = "SELECT * FROM student WHERE qrcode = ?";
// 		$query = $this->db->query($sql, $qrcode);
// 		if ($query->num_rows() > 0) {
// 			return true;
// 		} else {
// 			return false;
// 		}
// 	}
	
		public function userLogin($admission_no, $password)
	{
		$sql = "SELECT * FROM student WHERE Admno = ?";
		$query = $this->db->query($sql, $admission_no);
		if ($query->num_rows() > 0) {
		    $this->db->where('Admno', $admission_no);
		    $student = $this->db->get('student')->row();
		    if(password_verify($password, $student->Password)) {
		        return true;
		    } else {
		        return false;
		    }
		} else {
			return false;
		}
	}

// 	public function getUserData($qrcode)
// 	{
// 		$sql = "SELECT * FROM student WHERE qrcode = ?";
// 		$query = $this->db->query($sql, $qrcode);
// 		return $query->row();
// 	}
	
		public function getUserData($admission_no)
	{
		$sql = "SELECT * FROM student WHERE Admno = ?";
		$query = $this->db->query($sql, $admission_no);
		return $query->row();
	}

	public function fetchSchedule($claass)
	{
		$day=date('l');
		$sql='SELECT Subjectname,Stime,Etime,Teachername FROM timetable,teachers WHERE timetable.TeacherId= teachers.id AND timetable.Class=? AND timetable.Day=? ORDER BY Stime ASC';
		$query=$this->db->query($sql, array($claass, $day));
		$result=$query->result();
		return $result;
	}

	public function fetchAssignment($class, $date)
	{
		$sql='SELECT * FROM assignment WHERE Class=? AND Date=?';
		$query=$this->db->query($sql, array($class,$date));
		$result=$query->result();
		return $result;
	}

	public function fetchExams($class)
	{
		$sql='SELECT * FROM conduct WHERE Class=? ORDER BY Date desc';
		$query=$this->db->query($sql, $class);
		$result=$query->result();
		return $result;
	}

	public function fetchPosts($class)
	{
		$sql='SELECT * FROM posts WHERE post_for_class=? ORDER BY post_date desc';
		$query=$this->db->query($sql, $class);
		$result=$query->result();
		return $result;
	}

	public function fetchSubjects($class)
	{
		$this->db->select('Subject');
		$this->db->distinct();
		$query = $this->db->get_where('conduct', array('Class' => $class));
		return $query->result();
	}

	public function fetchResult($class, $subject, $rollNo)
	{
		$sql='SELECT * FROM exam,conduct WHERE
		exam.Examcode=conduct.id AND conduct.Subject=? 
		AND conduct.Class=? AND exam.Rollno=? ORDER BY conduct.Date desc';

		$query = $this->db->query($sql, array($subject, $class, $rollNo));
		return $query->result();
	}

	public function getLastMovement($id)
	{
		$sql = 'SELECT * FROM movements WHERE student_id = ? ORDER BY timestamp DESC';
		$query = $this->db->query($sql, $id);
		return $query->row();
	}
}
