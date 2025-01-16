<?php


class TimetableModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($class,$day) //get timetable
	{
		$sql='SELECT * FROM timetable,teachers WHERE timetable.TeacherId=teachers.id AND timetable.Class=?  AND timetable.Day=? ORDER BY timetable.Stime';
		$query=$this->db->query($sql,array($class,$day));
		$result=$query->result();
		return $result;
	}

	public function insert($data) //insert new period
	{
		if ($this->db->insert('timetable',$data)) {
			return true;
		} else {
			return false;
		}
	}

	public function getSubjects($class)
	{
		$sql='SELECT distinct(Subjectname) FROM timetable WHERE Class=?';
		$query=$this->db->query($sql,array($class));
		$result=$query->result();
		return $result;
	}

	public function delete($id) //delete timetable
	{
		$this->db->where('timetableid', $id);
		if ($this->db->delete('timetable')) {
			return true;
		} else {
			return false;
		}
	}

	public function getSubjectsByClass($class)
	{
		$sql = 'SELECT distinct(Subjectname) FROM timetable WHERE Class = ?';
		$query = $this->db->query($sql, $class);
		return $query->result();
	}
}
