<?php


class MovementModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function mostRecent($studentId)
    {
        return $this->db->where('student_id', $studentId)
            ->order_by('timestamp', 'desc')
            ->get('movements')->row();
    }
}