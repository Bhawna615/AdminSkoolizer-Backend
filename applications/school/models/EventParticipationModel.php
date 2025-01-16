<?php


class EventParticipationModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($id)
	{
		$this->db->where('event_id', $id);
		return $this->db->get('event_participants')->result();
	}
}
