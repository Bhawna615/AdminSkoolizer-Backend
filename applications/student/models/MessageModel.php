<?php


class MessageModel extends CI_Model
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
            ->order_by('sent_at', 'desc')
            ->get('messages')
            ->result();
    }
}