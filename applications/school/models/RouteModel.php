<?php


class RouteModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function loadActiveRoutes()
	{
		$sql='SELECT * FROM currentroute,routes,subroutes WHERE currentroute.routeid=routes.id AND currentroute.routeid=subroutes.routeid AND subroutes.id=currentroute.subrouteid AND currentroute.status=FALSE';
		$query=$this->db->query($sql);
		$result=$query->result();
		return $result;
	}

	public function load() //load all routes
	{
		$sql='SELECT * FROM routes';
		$query=$this->db->query($sql);
		$result=$query->result();
		return $result;
	}

	public function insert($data) //insert
	{
		return $this->db->insert('routes',$data) ? true : false;
	}


	public function delete($id) //delete
	{
		$this->db->where('id', $id);
		$this->db->delete('routes');

		$this->db->where('routeid', $id);
		$this->db->delete('subroutes');

		$data = array(
			'PassengerId' => null
		);
		$query = $this->db->get_where('passengers', array('RouteId' => $id));
		foreach ($query->result() as $row) {
			$this->db->where('Passengerid', $row->id);
			$this->db->replace('student', $data);
		}

		$this->db->where('Routeid', $id);
		$this->db->delete('passengers');

		$this->db->where('RouteId', $id);
		return $this->db->delete('stations') ? true : false;
	}
}
