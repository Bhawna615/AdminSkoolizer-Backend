<?php


class EventModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		$currentYear = date("Y");
		$sql = "SELECT * FROM events WHERE YEAR(date) = ?";
		$query = $this->db->query($sql, $currentYear);
		return $query->result();
	}
}
