<?php


class TransportStaffModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get() //get transport staff
	{
		$query=$this->db->query('SELECT * FROM transportstaff');
		$result=$query->result();
		return $result;
	}

	public function insert($data, $empdata)  //insert transport staff
	{
		$this->db->insert('employees', $empdata);
		$id = $this->db->insert_id();
		$data['empid'] = $id;
		return $this->db->insert('transportstaff', $data) ? true : false;
	}

	public function delete($id) //delete transport staff
	{
		$query = $this->db->get_where('transportstaff', array('id' => $id));
		foreach ($query->result() as $row) {
			$this->db->where('id', $row->empid);
			$this->db->delete('employees');
		}

		$this->db->where('id', $id);
		return $this->db->delete('transportstaff') ? true : false;
	}
}
