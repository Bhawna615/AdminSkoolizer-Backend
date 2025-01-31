<?php

use Easebuzz\Easebuzz;
// use Razorpay\Api\Api;
class Fee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('PaymentModel');
        $this->load->model('FeeModel');
        $this->load->config('settings');
        // if (!isset($_SESSION['loggedIn'])) {
        //     session_destroy();
        //     redirect(site_url('auth'));
        // }
            if (!(isset($_SESSION['loggedIn']))) {
                
            // $SALT = "MWR4LBNHQ"; //prod
            // $SALT = "2KRKYIL85O"; //prod
            $SALT = "DAH88E3UWQ"; //test
            $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
            $result = json_decode($easebuzzObj->easebuzzResponse( $_POST ));
            $data = $result->data;
            $studentId = $data->udf1;
            $student = $this->StudentModel->get($studentId);
            
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
            'title' => 'Fee',
            'page' => 'Fee'
        );

        $student = array(
            'id' => $this->session->userdata('id'),
        );
        
        $studentId = $this->session->userdata('id');
        $studentClass = $this->session->userdata('class');
        $data['recentAssignments'] = $this->StudentModel->loadRecentAssignments($studentId, $studentClass);
        $data['recentExams'] = $this->StudentModel->loadRecentExams($studentId, $studentClass);
        $data['recentSchoolPosts'] = $this->StudentModel->loadRecentSchoolPosts($studentId);
        $data['recentClassPosts'] = $this->StudentModel->loadRecentClassPosts($studentId, $studentClass);
        $data['recentEvents'] = $this->StudentModel->loadRecentEvents($studentId);
        $data['recentPayments'] = $this->StudentModel->loadRecentPayments($studentId);
        $data['recentMessages'] = $this->StudentModel->loadRecentMessages($studentId);
        $this->StudentModel->updateFeeNotificationCheckTime($studentId);

        $data['payments'] = $this->FeeModel->get($student);
        $this->load->view('student/fee/view', $data);
    }
    
     public function pay()
    {
        $MERCHANT_KEY = "2PBP7IABZ2";
        $SALT = "DAH88E3UWQ";
        $ENV = "test";    // setup test enviroment (testpay.easebuzz.in).
        
        // $MERCHANT_KEY = "5DDN04R1M7";
        // $SALT = "2KRKYIL85O";
        // $ENV = "prod";    // setup test enviroment (testpay.easebuzz.in).
        
        // $MERCHANT_KEY = "UXOKAPYCV";
        // $SALT = "MWR4LBNHQ";
        // $ENV = "test";    // setup test enviroment (testpay.easebuzz.in).
        
        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

        $paymentId = $this->input->post('fee_id');
        $studentId = $this->input->post('student_id');
        $transactionId = $this->PaymentModel->createTransaction($paymentId, $studentId);
        
        $paymentData = $this->PaymentModel->get($paymentId);
        $studentData = $this->StudentModel->get($studentId);
        
        $lateFee = $this->input->post('late_fee');
        
        $postData = array ( 
            "txnid" => $transactionId, 
            "amount" => $paymentData->amount + $lateFee.".0", 
            "firstname" => $studentData->Name, 
            "email" => $studentData->Email ? $studentData->Email : "contactus@skoolizer.in", 
            "phone" => $studentData->Contact ? $studentData->Contact : "0000000000", 
            "productinfo" => "Fee", 
            "surl" => site_url('fee/response'), 
            "furl" => site_url('fee/response'), 
            "udf1" => $studentId,
            "udf2" => $lateFee,
        );

        print_r($postData);
        die();
        
        $result = $easebuzzObj->initiatePaymentAPI($postData);  
        
        $this->easebuzzAPIResponse($result);
        
        
            // $api = new Api('rzp_test_mZ9tDHmhfNoqHe', '5zkqEN96EjlGSlUrKHz76dCx');
            // $amount = $this->input->post('amount') * 100;
            // $razorPayOrder = $api->order->create(array('receipt' => '123', 'amount' => $amount, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
    
            // $data['razorPayOrderId'] = $razorPayOrder['id'];
            // $data['amount'] = $amount;
            // $feeId = $this->input->post('fee_id');
            // $this->PaymentModel->create($razorPayOrder['id'], $feeId);
            // $this->load->view('student/fee/gateway', $data);
    }

    public function status($status)
    {
        $data['status'] = $status;
        $this->load->view('student/fee/status', $data);
    }
    
    function easebuzzAPIResponse($data){
        print_r($data);
    }
    
    public function response()
    {
        //   $SALT = "MWR4LBNHQ"; //prod
          $SALT = "2KRKYIL85O"; //prod
        //   $SALT = "DAH88E3UWQ"; //test
          $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
          $result = $easebuzzObj->easebuzzResponse( $_POST );
          if($this->PaymentModel->updateTransaction(json_decode($result))) {
                $this->session->set_flashdata('success', "Payment Successful");
                redirect(site_url('fee'));
        } else {
                $this->session->set_flashdata('error', "Payment Failed");
                redirect(site_url('fee'));
        }
    }
    
    public function receipt()
	{
		$feeId = $this->input->post('feeId');
		$data['reciept'] = $this->FeeModel->loadReceiptDetails($feeId);
		$this->load->view('student/fee/receipt', $data);
	}
}