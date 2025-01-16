<?php


class EventModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('events')->result();
	}

	public function insert($newEvent)
	{
		return $this->db->insert('events', $newEvent) ? true : false;
	}

	public function load($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('events')->row();
	}

	public function update($event, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('events', $event) ? true : false;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('events') ? true : false;
	}
}
