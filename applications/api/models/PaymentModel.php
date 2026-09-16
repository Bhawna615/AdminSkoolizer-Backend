<?php

class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
    }

    // ✅ Fetch fee record details
    public function gets($feeId)
    {
        return $this->db->where("feeid", $feeId)->get("fee")->row();
    }

    // ✅ Create unique transaction ID and store in DB (Easebuzz style)
    public function createTransaction($feeId, $studentId)
    {
        // Generate unique transaction ID
        $transactionId = $this->generateUniqueTransactionId();

        // 🔹 Update fee table with new transaction ID (like Razorpay/Easebuzz ref)
        $this->db->set('razorpay_order_id', $transactionId);
        $this->db->where('feeid', $feeId);
        $this->db->update('fee');

        // 🔹 Insert entry into transactions table
        $transaction = [
            'transaction' => $transactionId,
            'student_id'  => $studentId,
            'status'      => 0,
            'created_at'  => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('transactions', $transaction);

        return $transactionId;
    }

    // ✅ Generate unique transaction ID
    public function generateUniqueTransactionId()
    {
        $proposedId = "TXN" . random_string('alnum', 12);
        $this->db->where('razorpay_order_id', $proposedId);
        $exists = $this->db->get('fee')->num_rows();

        if ($exists < 1) {
            return $proposedId;
        } else {
            return $this->generateUniqueTransactionId(); // recursive retry
        }
    }

    // ✅ Update transaction after payment success/failure (Easebuzz)
   public function updateTransaction($response)
{
    $res = json_decode($response);

    $transaction_id = $res->txnid ?? null;
    $status         = $res->status ?? "failed";
    $student_id     = $res->udf1 ?? null;  // student_id
    $late_fee       = $res->udf2 ?? 0;
    $amount         = $res->amount ?? 0;
    $easepay_id     = $res->easepayid ?? null;

    // ✅ Fetch fee_id using transaction_id
    $fee = $this->db->where('razorpay_order_id', $transaction_id)->get('fee')->row();
    $fee_id = $fee ? $fee->feeid : null;

    if (!$transaction_id || !$fee_id) return false;

    $isSuccess = strtolower($status) === "success" ? 1 : 0;

    // 🔹 Update transactions table
    $transactionResponse = json_encode($res);
    $this->db->set('easepay_id', $easepay_id);
    $this->db->set('status', $isSuccess);
    $this->db->set('transaction_response', $transactionResponse);
    $this->db->set('amount', $amount);
    $this->db->where('transaction', $transaction_id);
    $this->db->update('transactions');

    // 🔹 If payment successful, update fee record too
    if ($isSuccess) {
        $this->db->where('feeid', $fee_id);
        $this->db->update('fee', [
            'status'        => 1,
            'payment_mode'  => 'online',
            'amount_paid'   => $amount,
            'late_fee_paid' => $late_fee,
            'paidondate'    => date("Y-m-d"),
            'easepay_id'    => $easepay_id,
        ]);
    }

    return $isSuccess;
}


    // ✅ Handle Webhook-based update (Easebuzz notification)
    public function updateTransactionThroughWebhook($responseString)
    {
        $response = json_decode($responseString);

        $isSuccess = (isset($response->status) && strtolower($response->status) == "success") ? 1 : 0;
        $fee_id    = $response->udf1 ?? null;

        // 🔹 Update fee record if success
        if ($isSuccess && $fee_id) {
            $this->db->where('feeid', $fee_id);
            $this->db->update('fee', [
                'status'        => 1,
                'payment_mode'  => 'online',
                'amount_paid'   => $response->amount ?? 0,
                'late_fee_paid' => $response->udf2 ?? 0,
                'paidondate'    => date("Y-m-d"),
                'easepay_id'    => $response->easepayid ?? '',
            ]);
        }

        // 🔹 Always log webhook response in transactions table
        $this->db->set('easepay_id', $response->easepayid ?? '');
        $this->db->set('name', $response->firstname ?? '');
        $this->db->set('phone', $response->phone ?? '');
        $this->db->set('amount', $response->amount ?? 0);
        $this->db->set('student_id', $response->udf1 ?? '');
        $this->db->set('status', $isSuccess);
        $this->db->set('webhook_response', $responseString);
        $this->db->where('transaction', $response->txnid ?? '');
        $this->db->update('transactions');
    }
}
