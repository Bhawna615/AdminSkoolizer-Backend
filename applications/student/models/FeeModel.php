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

    public function getAccounts($studentId)
    {
        // Pehle login user ka account fetch karo
        $sql = "SELECT * FROM student WHERE id = ?";
        $query = $this->db->query($sql, array($studentId));
        $accounts = $query->result(); // Yeh login user ka account hoga
    
        // Ab linked accounts fetch karo
        $sql2 = "SELECT student.* FROM student
                JOIN student_accounts ON student_accounts.other_student_id = student.id
                WHERE student_accounts.student_id = ?";
        $query2 = $this->db->query($sql2, array($studentId));
        $linkedAccounts = $query2->result();
    
        // Login user ka account aur linked accounts ko merge kar do
        return array_merge($accounts, $linkedAccounts);
    }
}