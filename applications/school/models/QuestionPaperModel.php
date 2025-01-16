<?php


class QuestionPaperModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db
			->get('question_papers')
			->result();
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM question_papers WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function insert(array $questionPaper)
	{
		return $this->db
			->insert('question_papers', $questionPaper) ? true : false;
	}

	public function getQuestions($questionPaperId)
	{
		$questions = array();

		$questionsString = $this->db->select('questions_id')
			->where('id', $questionPaperId)
			->get('question_papers')
			->row();

		$questionsArray = explode(",", $questionsString->questions_id);

		foreach ($questionsArray as $key => $value) {
			$questions[] = $this->db->where('id', $value)
				->get('questions')
				->row();
		}

		return $questions;
	}

	public function getOne($id)
	{
		return $this->db
			->where('id', $id)
			->get('question_papers')
			->row();
	}

	public function delete($id)
	{
		return $this->db
			->where('id', $id)
			->delete('question_papers') ? true : false;
	}

}
