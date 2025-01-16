<?php


class PostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($recipientGroup)
    {
        return $this->db
            ->where('recipient_group', $recipientGroup)
            ->order_by('created_at', 'desc')
            ->get('posts')
            ->result();
    }
}