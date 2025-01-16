<?php

class WebHook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('url');
        $this->load->model('PaymentModel');
    }
    
    public function index()
    {
        $response = json_encode($this->input->post());
        $this->PaymentModel->updateTransactionThroughWebhook($response);
        print_r(http_response_code(200));
    }
}