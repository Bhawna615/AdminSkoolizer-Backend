<?php

class TeacherModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function teacherLogin($qrcode)
	{
		$query = $this->db->get_where('teachers', array('qrcode' => $qrcode));
		return $query->num_rows() > 0;
	}

	public function getTeacherData($qrcode)
	{
		$query = $this->db->get_where('teachers', array('qrcode' => $qrcode));
		return $query->row();
	}

	public function getSchedule($id)
	{
		$day = date('l');
		$sql = "SELECT * FROM timetable, teachers 
	    		WHERE timetable.TeacherId = teachers.id 
	    		AND teachers.id=? AND Day = ?";
		$query = $this->db->query($sql, array($id, $day));
		return $query->result();
	}

	public function getMarkList($class)
	{
		$query = $this->db->get_where('student', array('Class' => $class));
		return $query->result();
	}

	public function submitMarkList($markList, $class)
	{
		$final = (array)json_decode($markList);
		$count = count($final);
		$date = date('Y-m-d');
		$section = "";
		$absent = 0;
		$leavecount = 0;
		$presentcount = 0;
		foreach ($final as $key => $value) {
			if ($value == 'Absent') {
				$leave = false;
				$data = array(
					'Date' => $date,
					'Rollno' => $key,
					'Class' => $class,
					'Section' => $section,
					'onLeave' => $leave
				);
				$this->db->insert('absentees', $data);
				$absent = $absent + 1;
			} else {
				if ($value == 'Leave') {
					$leave = true;
					$data = array(
						'Date' => $date,
						'Rollno' => $key,
						'Class' => $class,
						'Section' => $section,
						'onLeave' => $leave
					);
					$this->db->insert('absentees', $data);
					$leavecount = $leavecount + 1;
				} else {
					if ($value == 'Present') {
						$presentcount = $presentcount + 1;
					}
				}
			}
		}
		$attendance = array(
			'Date' => $date,
			'Class' => $class,
			'Section' => $section,
			'Absent' => $absent,
			'onLeave' => $leavecount,
			'Present' => $presentcount,
			'Strength' => $count
		);

		return $this->db->insert('attendence', $attendance) ? true : false;
	}

	public function getClasses($id)
	{
		$sql = $this->db->query('SELECT distinct(Class) FROM timetable WHERE TeacherId=? ORDER BY Class ASC');
		$query = $this->db->query($sql, array($id));
		return $query->result();
	}

	public function getSubjects($class, $id)
	{
		$sql = 'SELECT DISTINCT(Subjectname) FROM timetable WHERE Class=? AND TeacherId=?';
		$query = $this->db->query($sql, array($class, $id));
		return $query->result();
	}

	public function storeExamData($class, $subject, $date, $maxMarks, $syllabus)
	{
		$data = array(
			'Examname' => $syllabus,
			'Class' => $class,
			'Subject' => $subject,
			'Date' => $date,
			'Maxmarks' => $maxMarks
		);
		return $this->db->insert('conduct', $data) ? true : false;
	}

	public function getExams($subject, $class)
	{
		$query = $this->db->get_where('conduct', array('Subject' => $subject, 'Class' => $class));
		return $query->result();
	}


}


