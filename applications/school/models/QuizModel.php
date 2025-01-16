<?php


class QuizModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db
			->get('quizzes')
			->result();
	}

	public function insert($quiz)
	{
		return $this->db
			->insert('quizzes', $quiz) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db
			->delete('quizzes') ? true : false;

	}
}
