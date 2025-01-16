<?php


class AssignmentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($class, $date)
    {
        return $this->db
            ->where('Class', $class)
            ->where('Date', $date)
            ->get('assignment')
            ->result();
    }
}