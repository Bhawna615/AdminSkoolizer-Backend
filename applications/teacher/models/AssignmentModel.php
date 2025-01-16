<?php

class AssignmentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db
			->get('assignments')
			->result();
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM assignments WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function insert(array $assignment)
	{
		return $this->db
			->insert('assignments', $assignment) ? true : false;
	}

	public function getOne($id)
	{
		return $this->db
			->where('id', $id)
			->get('assignments')
			->row();
	}

	public function delete($id)
	{
		return $this->db
			->where('id', $id)
			->delete('assignments') ? true : false;
	}

	public function getQuestions($assignmentId)
	{
		$questions = array();

		$questionsString = $this->db->select('questions_id')
			->where('id', $assignmentId)
			->get('assignments')
			->row();

		$questionsArray = explode(",", $questionsString->questions_id);

		foreach ($questionsArray as $key => $value) {
			$questions[] = $this->db->where('id', $value)
				->get('questions')
				->row();
		}

		return $questions;
	}
}
