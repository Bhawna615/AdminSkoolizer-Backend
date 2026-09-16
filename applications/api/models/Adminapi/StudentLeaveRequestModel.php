<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLeaveRequestModel extends CI_Model {

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getLeaveRequests()
{
    return $this->db
        ->order_by('id', 'DESC')
        ->get('leave_requests')
        ->result_array();
}

public function approveLeaveRequest($requestId)
{
    return $this->db
        ->set('status', true)
        ->where('id', $requestId)
        ->update('leave_requests');
}
}