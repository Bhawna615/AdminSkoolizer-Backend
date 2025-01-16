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
			->where('recipient_group', 'school')
			->order_by('created_at', 'desc')
			->limit(10)
			->get('posts')
			->result();
	}

	public function getByClass($class)
	{
		return $this->db
			->where('recipient_group', $class)
			->order_by('created_at', 'desc')
			->limit(10)
			->get('posts')
			->result();
	}

}
