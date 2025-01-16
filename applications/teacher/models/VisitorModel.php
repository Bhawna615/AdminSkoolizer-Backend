<?php


class VisitorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        return $this->db->get('visitors')->result();
    }

    public function insert($visitor)
    {
        return $this->db->insert('visitors', $visitor) ? true: false;
    }

    public function exit($id)
    {
        $this->db->set('exit_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $id);
        return $this->db->update('visitors') ? true : false;
    }
}