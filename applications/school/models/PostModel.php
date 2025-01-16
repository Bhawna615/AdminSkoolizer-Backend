<?php


class PostModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db
			->get('posts')
			->result();
	}

	public function getFilteredData($year, $month)
	{
		$sql = 'SELECT * FROM posts WHERE YEAR(created_at) = ? AND MONTH(created_at) =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month));
		return $query->result();
	}

	public function insert(array $post)
	{
		return $this->db
			->insert('posts', $post) ? true : false;
	}

	public function delete($id)
	{
		return $this->db
			->where('id', $id)
			->delete('posts') ? true : false;
	}

	public function getRecipients($recipientGroup)
	{
		$recipients = array();
		if ($recipientGroup == "school") {
			$students =  $this->db
				->select('fcm_token')
				->get('student')
				->result();
		} else {
			$students =  $this->db
				->select('fcm_token')
				->where('Class', $recipientGroup)
				->get('student')
				->result();
		}

		foreach ($students as $student) {
			$recipients[] = $student->fcm_token;
		}

		return $recipients;
	}

	public function getFile($id)
	{
		return $this->db
			->select('file')
			->where('id', $id)
			->get('posts')
			->row();
	}
}
