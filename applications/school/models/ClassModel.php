<?php


class ClassModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() //get all classes
	{
		$query=$this->db->query('SELECT distinct(Classname) FROM classes');
		$result=$query->result();
		return $result;
	}

	public function insert($data)  //insert
	{
		return $this->db->insert('classes',$data) ? true : false;
	}

	public function getAllClassesDetails()
	{
		$query = $this->db->query('SELECT * FROM classes');
		$result = $query->result();
		return $result;
	}

	public function delete($id) //delete class
	{
		$this->db->where('id', $id);
		return $this->db->delete('classes') ? true : false;
	}

	public function getStrength($classes)
	{
		$strengthArray = array();
		foreach ($classes as $class) {
			$query = $this->db->query("SELECT id FROM student WHERE Class = '$class->Classname'");
			$strengthArray[$class->Classname] = $query->num_rows();
		}
		return $strengthArray;
	}
}
