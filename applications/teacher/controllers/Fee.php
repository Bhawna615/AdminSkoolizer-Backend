<?php

require "Notification.php";

class Fee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FeeModel');
		$this->load->model('ClassModel');
		$this->load->model('MessageModel');
		$this->load->model('StudentModel');
		$this->load->model('StationModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function viewStructure()
	{
		$data['fee']=$this->FeeModel->load();
		$this->load->view('fee/structure',$data);
	}

	public function addStructure()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/feestructuredetails', $data);
	}

	public function insertStructure()
	{
		$this->form_validation->set_rules($this->config->item('fee'));

		if ($this->form_validation->run() === FALSE) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('fee/feestructuredetails', $data);
		} else {
			$data = array(
				'feeclass' => $_POST['class'],
				'admission_fee' => $_POST['admission_fee'],
				'tuition_fee' => $_POST['tuition_fee'],
				'annual_fee' => $_POST['annual_fee'],
				'sibling_discount' => $_POST['sibling_discount']
			);
			$response = $this->FeeModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/viewStructure'));
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect(site_url('fee/viewStructure'));
			}
		}
	}


	public function newPayment()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/newpayment', $data);
	}

	public function insertPayment()
	{
		$this->form_validation->set_rules($this->config->item('payment'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('fee/newpayment', $data);
		} else {
			$payment = array(
				'ids' => $this->input->post('id'),
				'tuition-fee' => $this->input->post('tuition-fee'),
				'admission-fee' => $this->input->post('admission-fee'),
				'annual-fee' => $this->input->post('annual-fee'),
				'sibling-discount' => $this->input->post('sibling-discount'),
				'period' => $this->input->post('period'),
				'lastDate' => $this->input->post('lastdate'),
			);
			
			if($this->FeeModel->insertPayment($payment)) {
				$this->createFeeNotification($payment);
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/viewPayments'));
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect(site_url('fee/viewPayments'));
			}
		}
	}


	public function viewPayments()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('fee/viewpayments', $data);
	}

	public function receipt()
	{
		$feeId = $this->input->post('id');
		$data['reciept'] = $this->FeeModel->loadReceiptDetails($feeId);
		$this->load->view('fee/reciept', $data);
	}

	public function getDetails($id)
	{
		$this->load->model('StudentModel');
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['details'] = $this->FeeModel->loadFeeDetails($id);
		$this->load->view('students/feedetails', $data);
	}

	public function delete($id)
	{
		$response = $this->FeeModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('fee/viewStructure'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('fee/viewStructure'));
		}
	}

	public function accept()
	{
		$data['payments'] = $this->FeeModel->get($this->input->post('id'));
		$this->load->view('fee/accept', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules($this->config->item('fee_accept'));
		if ($this->form_validation->run() === FALSE) {
			$data['payments'] = $this->FeeModel->get($this->input->post('payment_id'));
			$this->load->view('fee/accept', $data);
		} else {
			$updatedPayment = array(
				'amount_paid' => $this->input->post('amount_paid'),
				'payment_mode' => $this->input->post('payment_mode'),
				'paidondate' => $this->input->post('payment_date'),
				'status' => true,
			);

			$response = $this->FeeModel->update($updatedPayment, $this->input->post('payment_id'));

			if ($response) {
				$this->session->set_flashdata('success', "Accepted Successfully");
				redirect(site_url('fee/viewPayments'));
			} else {
				$this->session->set_flashdata('error', "Failed to Accept");
				redirect(site_url('fee/viewPayments'));
			}
		}
	}

	private function createFeeNotification(array $payment)
	{
		$recipientIds = $payment['ids'];
		$recipients = $this->MessageModel->getRecipients($recipientIds);

		$feeNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Fee Due',
			'body' => 'Fee of your ward for the period of '.
				$payment['period'].' is due. Last date for fee payment is '.$payment['lastDate'].
				' Please pay the fee before due date to avoid late fee charges.',
			'type' => 'fee'
		);

		$notification = new Notification();
		$notification->send($feeNotification);
	}

	public function filter($year, $month, $class)
	{
		$data['payments'] = $this->FeeModel->getFilteredData($year, $month, $class);
		$this->load->view('fee/table', $data);
	}

	public function display()
	{
		$data['payments'] = $this->FeeModel->loadpayments();
		$this->load->view('fee/table', $data);
	}

	public function filterStudent($class)
	{
		$data['students'] = $this->FeeModel->getFilteredStudentData($class);

		$this->load->view('fee/new_payment_table', $data);
	}

	public function displayStudent()
	{
		$data['students'] = $this->FeeModel->getStudentFeeDetail();
		$data['discounts'] = $this->FeeModel->getDiscounts();
		$data['studentDiscount'] = $this->FeeModel->getStudentDiscount();
		$data['stations'] = $this->StationModel->getAll();
		$data['studentStation'] = $this->StationModel->getStudentStation();
		$this->load->view('fee/new_payment_table', $data);
	}

	public function pending()
    {
        $data['students'] = $this->FeeModel->getPending();
        $this->load->view('fee/pending/view', $data);
    }
    
    public function discount()
    {
        $data['discounts'] = $this->FeeModel->getDiscount();
		$this->load->view('fee/discount/view', $data);
    }
    
    public function createDiscount()
    {
        $this->load->view('fee/discount/create');
    }
    
    public function addDiscount()
    {
        $discount = array(
            'fee_type' => $this->input->post('fee_type'),
            'amount' => $this->input->post('amount')
            );
            
        	if ($this->FeeModel->insertDiscount($discount)) {
				$this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/discount/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
					redirect(site_url('fee/discount/view'));
			}
    }
    
    public function addStudentToDiscount()
    {
        $data['discountId'] = $this->input->post('discount_id');
        $data['students'] = $this->StudentModel->getInfoMany();
        $this->load->view('fee/discount/add', $data);
    }
    
    public function createStudentDiscount()
    {
        $discountId = $this->input->post('discountId');
        $ids = $this->input->post('id');
        $this->StudentModel->insertStudentDiscount($ids, $discountId);
    }
    
    public function createStudentPayment($studentId)
    {
        $data['students'] = $this->StudentModel->getInfo($studentId);
        $this->load->view('fee/student/create', $data);
    }
    
    public function insertStudentFee()
    {
        $fee = array(
            'student_id' => $this->input->post('student_id'),
            'studentname' => $this->input->post('student_name'),
            'class' => $this->input->post('student_class'), 
            'admission_number' => $this->input->post('admission_number'),
            'rollno' => $this->input->post('rollno'),
            'tuition_fee' => $this->input->post('tuition_fee'),
            'annual_fee' => $this->input->post('annual_fee'),
            'admission_fee' => $this->input->post('admission_fee'),
            'transport_fee' => $this->input->post('transport_fee'),
            'amount' => $this->input->post('tuition_fee') + $this->input->post('annual_fee') + $this->input->post('admission_fee') + $this->input->post('transport_fee'),
            'lastdate' => $this->input->post('last_date'),
            'period' => $this->input->post('period'),
            'status' => $this->input->post('status'),
            'payment_mode' => $this->input->post('payment_mode'),
            'amount_paid' => $this->input->post('amount_paid'),
            'paidondate' => $this->input->post('payment_date'),
            'session' => $this->input->post('session')
            );
            
            if($this->FeeModel->insertStudentFee($fee)) {
                $this->session->set_flashdata('success', "Added Successfully");
				redirect(site_url('fee/viewPayments'));
            } else {
                $this->session->set_flashdata('error', "Failed to Add");
				redirect(site_url('fee/viewPayments'));
            }
    }
    
    public function editStudentFee()
    {
        $feeId = $this->input->post('id');
        $data['payment'] = $this->FeeModel->getPayment($feeId);
        $this->load->view('fee/student/edit', $data);
    }
    
    public function updateStudentFee()
    {
        $feeId = $this->input->post('id');
         $updatedFee = array(
            'student_id' => $this->input->post('student_id'),
            'studentname' => $this->input->post('student_name'),
            'class' => $this->input->post('student_class'), 
            'rollno' => $this->input->post('rollno'),
            'tuition_fee' => $this->input->post('tuition_fee'),
            'annual_fee' => $this->input->post('annual_fee'),
            'admission_fee' => $this->input->post('admission_fee'),
            'transport_fee' => $this->input->post('transport_fee'),
            'amount' => $this->input->post('tuition_fee') + $this->input->post('annual_fee') + $this->input->post('admission_fee') + $this->input->post('transport_fee'),
            'lastdate' => $this->input->post('last_date'),
            'period' => $this->input->post('period'),
            'status' => $this->input->post('status'),
            'payment_mode' => $this->input->post('payment_mode'),
            'amount_paid' => $this->input->post('amount_paid'),
            'paidondate' => $this->input->post('payment_date'),
            'session' => $this->input->post('session')
            );
            
            if($this->FeeModel->updatePayment($feeId, $updatedFee)) {
                $this->session->set_flashdata('success', "Updated Successfully");
				redirect(site_url('fee/viewPayments'));
            } else {
                 $this->session->set_flashdata('error', "Failed to Update");
				redirect(site_url('fee/viewPayments'));
            }
    }
    
    public function pendingPayments()
    {
        $data['pendingPayments'] = $this->FeeModel->getPendingPayments();
        $this->load->view('fee/pending', $data);
    }
}
