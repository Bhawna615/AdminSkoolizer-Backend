<?php


class FeeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get(array $student)
    {
        return $this->db
            ->where('student_id', $student['id'])
            ->order_by('created_at', 'desc')
            ->get('fee')
            ->result();
    }
    
    public function getTransaction($orderId)
    {
        return $this->db
        ->where('razorpay_order_id', $orderId)
        ->get('fee')
        ->row();
    }
    
    public function loadReceiptDetails($id)
	{
		$sql='SELECT * FROM fee WHERE feeid=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}
}