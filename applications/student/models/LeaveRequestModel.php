<?php


class LeaveRequestModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id)
    {
        return $this->db
            ->where('student_id', $id)
            ->order_by('created_at', 'desc')
            ->get('leave_requests')
            ->result();
    }

    public function create($leaveRequest)
    {
        return $this->db
            ->insert('leave_requests', $leaveRequest);
    }
}