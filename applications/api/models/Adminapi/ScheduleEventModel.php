<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleEventModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


     public function getEvents()
    {
        return $this->db->get('events')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('events',$data);
    }

    public function delete($id)
    {
        return $this->db->where('id',$id)->delete('events');
    }

    public function find($id)
    {
        return $this->db->where('id',$id)->get('events')->row();
    }

    public function update($id,$data)
    {
        return $this->db->where('id',$id)->update('events',$data);
    }
}
