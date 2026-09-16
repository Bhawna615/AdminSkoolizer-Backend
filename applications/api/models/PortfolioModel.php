<?php
class PortfolioModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getBioData($id)
    {
        $this->db->select('id, Name, Class, Rollno, Fname, Mname, Email, Address, Contact, Smsno, Dob, Admno, House, image');
        $this->db->where('id', $id);
        return $this->db->get('student')->row();
    }

    public function getStudentById($id)
{
    return $this->db->where('id', $id)->get('student')->row();
}

public function updatePassword($updatedPassword, $studentId)
{
    $this->db->set('Password', $updatedPassword);
    $this->db->where('id', $studentId);
    return $this->db->update('student');
}
 // ✅ Create a transaction (called before payment starts)
    public function createTransaction($feeId, $studentId)
    {
        $transactionId = uniqid("TXN_");

        $data = [
            "fee_id" => $feeId,
            "student_id" => $studentId,
            "transaction_id" => $transactionId,
            "status" => "initiated",
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $this->db->insert("transactions", $data);
        return $transactionId;
    }

    // ✅ Get fee details
    public function get($feeId)
    {
        return $this->db->where("feeid", $feeId)->get("fee")->row();
    }

    // ✅ Update transaction after payment success/fail
    public function updateTransaction($response)
    {
        $res = json_decode($response);

        $transaction_id = $res->txnid ?? null;
        $status = $res->status ?? "failed";
        $fee_id = $res->udf1 ?? null;
        $amount = $res->amount ?? 0;

        if (!$transaction_id) return false;

        $data = [
            "status" => $status,
            "amount_paid" => $amount,
            "updated_at" => date("Y-m-d H:i:s"),
        ];

        $this->db->where("transaction_id", $transaction_id);
        $this->db->update("transactions", $data);

        if ($status == "success") {
            // Update fee record also
            $this->db->where("feeid", $fee_id)->update("fee", [
                "status" => 1,
                "amount_paid" => $amount,
                "paidondate" => date("Y-m-d"),
            ]);
        }

        return true;
    }
}
