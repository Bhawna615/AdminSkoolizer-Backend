<?php


class PaymentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($name, $class, $rollNo)
	{
		$sql = "SELECT * FROM fee WHERE studentname = ? AND class =? AND rollno = ? ORDER BY created_at desc";
		$query = $this->db->query($sql, array($name, $class, $rollNo));
		return $query->result();
	}

}
