<?php


class QuizQuestionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($quizId)
	{
		return $this->db
			->get_where('quiz_questions', array('quiz_id' => $quizId))
			->result();
	}

	public function insert($question)
	{
		return $this->db
			->insert('quiz_questions', $question) ? true : false;
	}

	public function load($id)
	{
		$this->db
			->where('id', $id);
		return $this->db
			->get('quiz_questions')
			->row();
	}

	public function update($question, $id)
	{
		$this->db
			->where('id', $id);
		return $this->db
			->update('quiz_questions', $question) ? true : false;
	}

	public function delete($id)
	{
		$this->db
			->where('id', $id);
		return $this->db
			->delete('quiz_questions') ? true : false;
	}

}
