<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTransportModel extends CI_Model
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
    // Old load() function (optional, can be used separately)
    public function load($id = null)
    {
        if ($id) {
            $this->db->where('id', $id);
        }
        return $this->db->get('stations')->result();
    }
    

    // ✅ GET ALL STATIONS (used by controller)
    public function getAll()
    {
        return $this->db->get('stations')->result();
    }

    // ✅ INSERT a new station (used by controller)
    public function insert($data)
    {
        return $this->db->insert('stations', $data);
    }

    // ✅ DELETE station by ID (used by controller)
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('stations');
    }

    // ✅ ADD PASSENGERS to station
   public function insertPassenger($studentIds, $stationId)
{
    if (empty($studentIds) || !is_array($studentIds)) {
        return false;
    }

    foreach ($studentIds as $sid) {
        $this->db->insert('passengers', [
            // Changed 'station_id' to 'Stationid' to match your table
            'Stationid'  => $stationId, 
            'student_id' => $sid,
            // If 'Name' is required and not null, you might need to handle it here, 
            // but usually, this table should just be a link between IDs.
        ]);
    }
	
    return true;
}

	public function get() //get transport staff
	{
		$query=$this->db->query('SELECT * FROM transportstaff');
		$result=$query->result();
		return $result;
	}

	public function insertStaff($data, $empdata)  
	{
		$this->db->insert('employees', $empdata);
		$id = $this->db->insert_id();
		$data['empid'] = $id;
		return $this->db->insert('transportstaff', $data) ? true : false;
	}

	public function deleteStaff($id) //delete transport staff
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