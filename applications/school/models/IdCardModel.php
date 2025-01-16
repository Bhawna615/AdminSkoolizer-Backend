<?php


class IdCardModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        return $this->db
            ->where('Class', '1')
            ->get('student')
            ->result();
    }
}