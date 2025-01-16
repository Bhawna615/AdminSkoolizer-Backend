<?php


class BusModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()  //get buses
	{
		$query=$this->db->query('SELECT * FROM buses');
		$result=$query->result();
		return $result;
	}

	public function insert($data) //insert bus
	{
		return $this->db->insert('buses', $data) ? true : false;
	}

	public function delete($id)  //delete bus
	{
		$this->db->where('id', $id);
		return $this->db->delete('buses') ? true : false;
	}
}
