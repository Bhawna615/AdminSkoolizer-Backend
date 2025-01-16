<?php


class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->config->load('settings');
        $this->load->model('PaymentModel');
        $this->load->model('StudentModel');
        $this->load->model('FeeModel');
        
        if (!(isset($_SESSION['loggedIn']))) {
            $transaction = $this->FeeModel->getTransaction($this->input->post('razorpay_order_id'));
            $student = $this->StudentModel->get($transaction->student_id);
             $isLoggedIn = array(
                'loggedIn' => true,
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollNo' => $student->Rollno,
                'image' => $student->image
                );
            $this->session->set_userdata($isLoggedIn);
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Messages',
            'page' => 'Messages'
        );

        $data['messages'] = $this->MessageModel->get($this->session->userdata('id'));
        $this->load->view('student/messages/view', $data);
    }

    public function verify()
    {
        $response = array(
            'razorpay_payment_id' => $this->input->post('razorpay_payment_id'),
            'razorpay_order_id'  => $this->input->post('razorpay_order_id'),
            'razorpay_signature' => $this->input->post('razorpay_signature'));
        $paymentId = $this->input->post('razorpay_payment_id');
        $orderId = $this->input->post('razorpay_order_id');
        $generatedSignature = hash_hmac('sha256', $orderId."|".$paymentId, $this->config->item('RAZORPAY_SECRET'));
        if ($generatedSignature === $this->input->post('razorpay_signature')) {
            $this->PaymentModel->update($response);
            $this->session->set_flashdata('success', "Payment Successful");
            redirect(site_url('fee'));
        } else {
            $this->session->set_flashdata('error', "Payment Failed");
            redirect(site_url('fee'));
        }
    }

}