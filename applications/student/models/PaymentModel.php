<?php


class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
    }

    public function update($response)
    {
        $this->db->set('status', 1);
        $this->db->where('razorpay_order_id', $response['razorpay_order_id']);
        return $this->db->update('fee');
    }

    public function create($razorPayOrderId, $feeId)
    {
        $this->db->set('razorpay_order_id', $razorPayOrderId);
        $this->db->where('feeid', $feeId);
        return $this->db->update('fee');
    }
    
    public function createTransaction($feeId, $studentId)
    {
        $transactionId = $this->generateUniqueTransactionId();
        $this->db->set('razorpay_order_id', $transactionId);
        $this->db->where('feeid', $feeId);
        $this->db->update('fee');
        
        $transaction = array(
            'transaction' => $transactionId,
            'student_id' => $studentId
            );
        $this->db->insert('transactions', $transaction);
        return $transactionId;
    }
    
    public function generateUniqueTransactionId()
    {
        $proposedId = "TXN".random_string('alnum', 12);
        $this->db->where('razorpay_order_id', $proposedId);
        if($this->db->get('fee')->num_rows() < 1) {
            return $proposedId;
        } else {
            $this->generateUniqueTransactionId();
        }
    }
    
    public function get($paymentId)
    {
        $this->db->where('feeid', $paymentId);
        return $this->db->get('fee')->row();
    }
    
    public function updateTransaction($response)
    {
        $transactionResponse = json_encode($response->data);
        $data = $response->data;
        $data->status == "success" ? $status = 1 : $status = 0;
        if($status) {
            $this->db->set('status', $status);
            $this->db->set('payment_mode','online');
            $this->db->set('paidondate', date("Y-m-d"));
            $this->db->set('amount_paid', $data->amount);
            $this->db->set('late_fee_paid', $data->udf2);
            $this->db->set('easepay_id', $data->easepayid);
            $this->db->where('razorpay_order_id', $data->txnid);
            $this->db->update('fee');
        }
            
            $this->db->set('easepay_id', $data->easepayid);
            $this->db->set('name', $data->firstname);
            $this->db->set('phone', $data->phone);
            $this->db->set('amount', $data->amount);
            $this->db->set('student_id', $data->udf1);
            $this->db->set('status', $status);
            $this->db->set('transaction_response', $transactionResponse);
            $this->db->where('transaction', $data->txnid);
            $this->db->update('transactions');
        
      
        return $status;
    }
    
    public function updateTransactionThroughWebhook($responseString)
    {
        $response = json_decode($responseString);
        
        if($response->status == "success") {
            $status = true;
            $this->db->set('status', $status);
            $this->db->set('payment_mode','online');
            $this->db->set('paidondate', date("Y-m-d"));
            $this->db->set('late_fee_paid', $response->udf2);
            $this->db->set('amount_paid', $response->amount);
            $this->db->set('easepay_id', $response->easepayid);
            $this->db->where('razorpay_order_id', $response->txnid);
            $this->db->update('fee');
        } else {
            $status = false;
        }
        
            $this->db->set('easepay_id', $response->easepayid);
            $this->db->set('name', $response->firstname);
            $this->db->set('phone', $response->phone);
            $this->db->set('amount', $response->amount);
            $this->db->set('student_id', $response->udf1);
            $this->db->set('status', $status);
            $this->db->set('webhook_response', $responseString);
            $this->db->where('transaction', $response->txnid);
            $this->db->update('transactions');
        
    }

  
}