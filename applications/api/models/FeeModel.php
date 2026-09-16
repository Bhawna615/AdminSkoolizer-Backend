<?php
class FeeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // ✅ Get all fee payments of a student
    public function get(array $student)
    {
        return $this->db
            ->where('student_id', $student['id'])
            ->order_by('created_at', 'desc')
            ->get('fee')
            ->result();
    }

    // ✅ Get a specific transaction by order id
    public function getTransaction($orderId)
    {
        return $this->db
            ->where('razorpay_order_id', $orderId)
            ->get('fee')
            ->row();
    }

    // ✅ Get receipt details
    public function loadReceiptDetails($id)
    {
        $sql = "SELECT * FROM fee WHERE feeid=?";
        $query = $this->db->query($sql, array($id));
        return $query->result();
    }

    // ✅ Fetch main + linked accounts for student
    public function getAccounts($studentId)
    {
        // main student
        $sql = "SELECT * FROM student WHERE id = ?";
        $query = $this->db->query($sql, array($studentId));
        $accounts = $query->result();

        // linked accounts
        $sql2 = "SELECT student.* FROM student
                JOIN student_accounts ON student_accounts.other_student_id = student.id
                WHERE student_accounts.student_id = ?";
        $query2 = $this->db->query($sql2, array($studentId));
        $linkedAccounts = $query2->result();

        return array_merge($accounts, $linkedAccounts);
    }
}
