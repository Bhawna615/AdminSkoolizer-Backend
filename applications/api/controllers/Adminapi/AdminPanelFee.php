<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanelFee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        $this->load->model('Adminapi/AdminPanelFeeModel');
        

        // JSON output
        $this->output->set_content_type('application/json');

        // ✅ CORS headers for React with credentials
        $allowedOrigin = "http://localhost:3000"; // your React dev server
        header("Access-Control-Allow-Origin: $allowedOrigin");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Access-Control-Allow-Credentials: true"); // important for cookies/session

        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Preflight OPTIONS request
    public function options() {
        http_response_code(200);
        return;
    }

     // ✅ Get all fee structures
    public function getAllFees() {
        $data = $this->AdminPanelFeeModel->load();
        echo json_encode($data);
    }

    // ✅ Get all classes
    public function getClasses() {
        $data = $this->AdminPanelFeeModel->getAll();
        echo json_encode($data);
    }

    // ✅ Insert fee
    public function addFee() {
        $input = json_decode(file_get_contents("php://input"), true);

        $data = [
            'feeclass' => $input['class'],
            'admission_fee' => $input['admission_fee'],
            'tuition_fee' => $input['tuition_fee'],
            'annual_fee' => $input['annual_fee'],
            'sibling_discount' => $input['sibling_discount']
        ];

        $res = $this->AdminPanelFeeModel->insert($data);

        echo json_encode([
            "status" => $res ? true : false
        ]);
    }

    // ✅ Delete fee
    public function deleteFee($id) {
        $res = $this->AdminPanelFeeModel->delete($id);

        echo json_encode([
            "status" => $res ? true : false
        ]);
    }


    // ✅ Get all discounts
    public function getDiscounts() {
        echo json_encode($this->AdminPanelFeeModel->getDiscount());
    }

    // ✅ Add discount
    public function addDiscount() {
        $input = json_decode(file_get_contents("php://input"), true);

        $data = [
            'fee_type' => $input['fee_type'],
            'amount' => $input['amount']
        ];

        $res = $this->AdminPanelFeeModel->insertDiscount($data);

        echo json_encode(["status" => $res ? true : false]);
    }

    // ✅ Get students
    public function getStudents() {
        echo json_encode($this->AdminPanelFeeModel->getStudents());
    }

    // ✅ Assign discount to students
    public function assignDiscount()
{
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['student_ids']) || empty($input['student_ids'])) {
        echo json_encode([
            "status" => false,
            "message" => "No students selected"
        ]);
        return;
    }

    $ids = $input['student_ids'];
    $discountId = $input['discount_id'];

    $this->AdminPanelFeeModel->assignDiscountToStudents($ids, $discountId);

    echo json_encode([
        "status" => true
    ]);
}

 // ✅ Filter Students
    public function filterStudents($class)
    {
        $data = $this->AdminPanelFeeModel->getFilteredStudentData($class);
        echo json_encode($data);
    }

    // ✅ Insert Payment
    public function insertPayment()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $payment = [
            'ids' => $input['ids'],
            'period' => $input['period'],
            'lastDate' => $input['lastdate'],
            'session' => $input['session'],
        ];

        $this->AdminPanelFeeModel->insertPayment($payment);

        echo json_encode([
            "status" => true,
            "message" => "Payment Added"
        ]);
    }

   public function getPayments()
{
    $year = $this->input->get('year');
    $month = $this->input->get('month');
    $class = $this->input->get('class');
    $session = $this->input->get('session'); // ✅ ADD THIS

    if ($year && $month && $class) {
        $data = $this->AdminPanelFeeModel->getFilteredData($year, $month, $class, $session);
    } else if ($session) {
        // ✅ ONLY SESSION FILTER
        $data = $this->AdminPanelFeeModel->getBySession($session);
    } else {
        $data = $this->AdminPanelFeeModel->loadPayments();
    }

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function getPaymentById($id)
{
    $data = $this->AdminPanelFeeModel->getPaymentById($id);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}
public function acceptPaymentFull()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $id = $input['payment_id'];

    $data = [
        'late_fee_paid' => $input['late_fee_paid'],
        'amount_paid' => $input['amount_paid'],
        'payment_mode' => $input['payment_mode'],
        'paidondate' => $input['payment_date'],
        'status' => 1
    ];

    $res = $this->AdminPanelFeeModel->acceptPayment($data, $id);

    echo json_encode([
        "status" => $res ? true : false,
        "message" => $res ? "Accepted Successfully" : "Error"
    ]);
}
  

public function updateStudentFee()
{
    $feeId = $this->input->post('id', true);

    if (!$feeId) {
        echo json_encode([
            "status" => false,
            "message" => "ID missing"
        ]);
        return;
    }

    $tuition = (float) ($this->input->post('tuition_fee') ?? 0);
    $annual = (float) ($this->input->post('annual_fee') ?? 0);
    $admission = (float) ($this->input->post('admission_fee') ?? 0);
    $transport = (float) ($this->input->post('transport_fee') ?? 0);
    $late = (float) ($this->input->post('late_fee') ?? 0);

    $updatedFee = array(
        'student_id' => $this->input->post('student_id', true),
        'studentname' => $this->input->post('studentname', true),
        'class' => $this->input->post('class', true),
        'rollno' => $this->input->post('rollno', true),

        'tuition_fee' => $tuition,
        'annual_fee' => $annual,
        'admission_fee' => $admission,
        'transport_fee' => $transport,
        'late_fee_paid' => $late,

        'amount' => ($tuition + $annual + $admission + $transport + $late),

        'lastdate' => $this->input->post('lastdate', true),
        'period' => $this->input->post('period', true),
        'status' => $this->input->post('status', true),
        'payment_mode' => $this->input->post('payment_mode', true),
        'amount_paid' => $this->input->post('amount_paid', true),
        'paidondate' => $this->input->post('paidondate', true),
        'session' => $this->input->post('session', true),
        'remarks' => $this->input->post('remarks', true)
    );

    $update = $this->AdminPanelFeeModel->updatePayment($feeId, $updatedFee);

    if ($update) {
        echo json_encode([
            "status" => true,
            "message" => "Updated Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "DB Update Failed"
        ]);
    }
}

public function receipt()
{
    $feeId = $this->input->get('id');

    if (!$feeId) {
        echo json_encode([
            "status" => false,
            "message" => "ID missing"
        ]);
        return;
    }

    $data = $this->AdminPanelFeeModel->loadReceiptDetails($feeId);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function updatePaidFee()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $feeId = $input['id'];

    $update = [
        'studentname' => $input['studentname'],
        'class' => $input['class'],
        'admission_number' => $input['admission_number'],
        'amount_paid' => $input['amount_paid'],
        'amount' => $input['amount']
    ];

    $result = $this->AdminPanelFeeModel->updatePaidPayment($feeId, $update);

    echo json_encode([
        "status" => $result ? true : false
    ]);
}

public function getPaidPayment()
{
    $id = $this->input->get('id');
    $data = $this->AdminPanelFeeModel->getPaidPayment($id);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function getSessions()
{
    $sessions = $this->AdminPanelFeeModel->get_sessions();

    echo json_encode([
        "status" => true,
        "data" => $sessions
    ]);
}

public function getPeriods()
{
    $data = $this->AdminPanelFeeModel->getPeriods();

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function getPendingPayments()
{
    $period = $this->input->get('period');

    if (!$period) {
        echo json_encode([
            "status" => false,
            "message" => "Period required"
        ]);
        return;
    }

    $data = $this->AdminPanelFeeModel->getPendingPayments($period);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function sendFeeReminder()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $recipientIds = $input['ids'] ?? [];

    if (empty($recipientIds)) {
        echo json_encode([
            "status" => false,
            "message" => "No students selected"
        ]);
        return;
    }

    $message = 'Dear Parent, The school fee of your ward is pending. You are requested to pay fee before due date to avoid late fee charges.';

    // ✅ MODEL CALL
    $this->AdminPanelFeeModel->insertMessages($recipientIds, $message);

    echo json_encode([
        "status" => true,
        "message" => "Message sent successfully"
    ]);
}
}