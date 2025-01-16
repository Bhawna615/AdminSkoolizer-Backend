<?php


class QuestionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db
			->get('questions')
			->result();
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM questions WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function insert(array $question)
	{
		return $this->db
			->insert('questions', $question) ? true : false;
	}

	public function getFilteredQuestions($class, $subject)
	{
		return $this->db
			->where('class', $class)
			->where('subject', $subject)
			->get('questions')
			->result();
	}
}
