
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTimetableModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


public function insert($data) //insert new period
	{
		if ($this->db->insert('timetable',$data)) {
			return true;
		} else {
			return false;
		}
	}

}