<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentSportsModel extends CI_Model 
{

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all()
    {
        return $this->db->get('sports')->result();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('sports');
    }
    public function insert($data)
    {
        return $this->db->insert('sports', $data);
    }
}
