<?php


class QuizModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($class)
	{
		$currentDate = date("Y-m-d");
		$sql = "SELECT * FROM quizzes WHERE DATE(expiry_date) > ? AND class = ?";
		$query = $this->db->query($sql, array($currentDate, $class));
		return $query->result();
	}

}
