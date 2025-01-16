<?php


class PassengerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load($id) //load passengers
	{
		$sql='SELECT * FROM passengers WHERE Routeid=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	function insert($data)  //insert passenger
	{
		$this->db->insert('passengers',$data);
		$id=$this->db->insert_id();
		return $id;
	}
}


