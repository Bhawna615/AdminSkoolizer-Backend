<?php


class SubRouteModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load($id) //load subroutes
	{
		$sql='SELECT * FROM subroutes WHERE routeid=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	public function insert($data) //insert subroutes
	{
		return $this->db->insert('subroutes', $data) ? true : false;
	}

	public function delete($id) //delete subroutes
	{
		$this->db->where('id', $id);
		return $this->db->delete('subroutes') ? true : false;
	}
}
