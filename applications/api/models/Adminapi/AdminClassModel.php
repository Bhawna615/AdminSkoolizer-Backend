<?php


class AdminClassModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllClassesDetails()
	{
		$query = $this->db->query('SELECT * FROM classes');
		$result = $query->result();
		return $result;
	}
public function getAll()
{
	$query = $this->db->query("SELECT DISTINCT(Classname) FROM classes");
	return $query->result();
}



}
