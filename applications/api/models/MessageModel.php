<?php


class MessageModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($id)
	{
		$sql = 'SELECT * FROM messages WHERE student_id = ? ORDER BY sent_at DESC';
		$query = $this->db->query($sql, $id);
		return $query->result();
	}
}
