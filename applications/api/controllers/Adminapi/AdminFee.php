<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        $this->load->model('Adminapi/AdminFeeModel');
        

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
    public function getFeeDetails()
{
    header('Content-Type: application/json');

    $id = $this->input->post('id');

    // ✅ Validate Student ID
    if (empty($id) || !is_numeric($id)) {
        echo json_encode([
            "status"  => false,
            "message" => "Student ID missing or invalid"
        ]);
        return;
    }

    $this->load->model('Adminapi/AdminStudentModel');
    $this->load->model('Adminapi/AdminFeeModel'); // create this if not exist

    $info    = $this->AdminStudentModel->getInfo($id);
    $details = $this->AdminFeeModel->loadFeeDetails($id);

    // ✅ If student not found
    if (empty($info)) {
        echo json_encode([
            "status"  => false,
            "message" => "No student found"
        ]);
        return;
    }

    $studentData = is_array($info) ? $info[0] : $info;

    // ✅ Clean & Format Fee Data
    $cleanDetails = [];

    if (!empty($details)) {
        foreach ($details as $fee) {

            $period = !empty($fee->period) ? $fee->period : "N/A";
            $status = isset($fee->status) && $fee->status ? "Paid" : "Pending";

            // Raw dates sent, React will format
            $lastDate   = (!empty($fee->lastdate) && $fee->lastdate != "0000-00-00") ? $fee->lastdate : null;
            $paidOnDate = (!empty($fee->paidondate) && $fee->paidondate != "0000-00-00") ? $fee->paidondate : null;

            $cleanDetails[] = [
                "period"     => $period,
                "status"     => $status,
                "lastdate"   => $lastDate,
                "paidondate" => $paidOnDate
            ];
        }
    }

    echo json_encode([
        "status"  => true,
        "info"    => $studentData,
        "details" => $cleanDetails
    ]);
}
public function insertStudentFee()
{
    header('Content-Type: application/json');

    // Get raw JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input) {
        echo json_encode([
            "status" => false,
            "message" => "No data received"
        ]);
        return;
    }

    // Calculate total amount safely
    $tuition_fee   = isset($input['tuition_fee']) ? (float)$input['tuition_fee'] : 0;
    $annual_fee    = isset($input['annual_fee']) ? (float)$input['annual_fee'] : 0;
    $admission_fee = isset($input['admission_fee']) ? (float)$input['admission_fee'] : 0;
    $transport_fee = isset($input['transport_fee']) ? (float)$input['transport_fee'] : 0;
    $late_fee      = isset($input['late_fee']) ? (float)$input['late_fee'] : 0;

    $totalAmount = $tuition_fee + $annual_fee + $admission_fee + $transport_fee + $late_fee;

    // Prepare insert data
    $data = [
        'student_id'       => $input['student_id'] ?? null,
        'studentname'      => $input['student_name'] ?? null,
        'class'            => $input['student_class'] ?? null,
        'admission_number' => $input['admission_number'] ?? null,
        'rollno'           => $input['rollno'] ?? null,
        'tuition_fee'      => $tuition_fee,
        'annual_fee'       => $annual_fee,
        'admission_fee'    => $admission_fee,
        'transport_fee'    => $transport_fee,
        'late_fee_paid'    => $late_fee, // ✅ FIXED (matches DB column)
        'amount'           => $totalAmount,
        'lastdate'         => !empty($input['last_date']) ? $input['last_date'] : NULL,
        'period'           => $input['period'] ?? null,
        'status'           => $input['status'] ?? 0,
        'payment_mode'     => $input['payment_mode'] ?? null,
        'amount_paid'      => $input['amount_paid'] ?? 0,
        'paidondate'       => !empty($input['payment_date']) ? $input['payment_date'] : NULL,
        'session'          => $input['session'] ?? null,
        'remarks'          => $input['remarks'] ?? null,
        'created_at'       => date('Y-m-d H:i:s') // optional but safe
    ];

    // Insert into fee table
    $insert = $this->db->insert('fee', $data);

    if ($insert) {
        echo json_encode([
            "status" => true,
            "message" => "Fee added successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "error"  => $this->db->error()
        ]);
    }
}
public function getStudent($id = null)
{
    // Handle OPTIONS (CORS preflight)
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        return;
    }

    if (empty($id) || !is_numeric($id)) {
        echo json_encode([
            "status" => false,
            "message" => "Invalid Student ID"
        ]);
        return;
    }

    // Load Student Model
    $this->load->model('Adminapi/AdminStudentModel');

    $student = $this->AdminStudentModel->getInfo($id);

    if (!$student) {
        echo json_encode([
            "status" => false,
            "message" => "Student not found"
        ]);
        return;
    }

    // If result is array, get first row
    if (is_array($student)) {
        $student = $student[0];
    }

    echo json_encode([
        "status" => true,
        "id"      => $student->id,
        "Name"    => $student->Name,
        "Class"   => $student->Class,
        "Rollno"  => $student->Rollno,
        "Admno"   => $student->Admno
    ]);
}
public function filterBySessionAndClass()
{
    header('Content-Type: application/json');

    // Read JSON body from React request
    $input = json_decode(file_get_contents("php://input"), true);

    $session = isset($input['session']) ? $input['session'] : null;
    $class   = isset($input['class']) ? $input['class'] : null;
    $month   = isset($input['month']) ? $input['month'] : null;

    // Start query
    $this->db->from('fee');

    // Apply filters only if values exist
    if (!empty($session)) {
        $this->db->where('session', $session);
    }

    if (!empty($class)) {
        $this->db->where('class', $class);
    }

    if (!empty($month)) {
        $this->db->where('period', $month);   // period column stores month
    }

    // Order latest first
    $this->db->order_by('feeid', 'DESC');

    $query = $this->db->get();
    $result = $query->result();

    // Response
    if (!empty($result)) {
        echo json_encode([
            "status" => true,
            "data"   => $result
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "data"   => [],
            "message" => "No records found"
        ]);
    }
}
public function getClasses()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header('Content-Type: application/json');

        // ✅ Handle CORS preflight
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }

        try {

            // ✅ Use backticks because `class` is reserved word
            $query = $this->db->query("SELECT Classname FROM `classes` ORDER BY Classname ASC");

            if ($query && $query->num_rows() > 0) {

                echo json_encode([
                    "status" => true,
                    "data"   => $query->result_array()
                ]);

            } else {

                echo json_encode([
                    "status" => false,
                    "data"   => [],
                    "message"=> "No classes found"
                ]);
            }

        } catch (Exception $e) {

            echo json_encode([
                "status" => false,
                "message"=> $e->getMessage()
            ]);
        }
    }
    public function updateStudentFee()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

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

        'amount' =>
            $this->input->post('tuition_fee') +
            $this->input->post('annual_fee') +
            $this->input->post('admission_fee') +
            $this->input->post('transport_fee') +
            $this->input->post('late_fee'),

        'lastdate' => !empty($this->input->post('last_date'))
            ? date("Y-m-d", strtotime($this->input->post('last_date')))
            : NULL,

        'period' => $this->input->post('period'),
        'status' => $this->input->post('status'),
        'payment_mode' => $this->input->post('payment_mode'),
        'amount_paid' => $this->input->post('amount_paid'),

        'paidondate' => !empty($this->input->post('payment_date'))
            ? date("Y-m-d", strtotime($this->input->post('payment_date')))
            : NULL,

        'session' => $this->input->post('session'),
        'remarks' => $this->input->post('remarks')
    );

    if ($this->AdminFeeModel->updatePayment($feeId, $updatedFee)) {

        echo json_encode([
            "status" => true,
            "message" => "Updated Successfully"
        ]);

    } else {

        echo json_encode([
            "status" => false,
            "message" => "Failed to Update"
        ]);

    }
}
public function getPaymentById($id = null)
{
    header('Content-Type: application/json');

    if (empty($id) || !is_numeric($id)) {
        echo json_encode([
            "status" => false,
            "message" => "Invalid Fee ID"
        ]);
        return;
    }

    $this->db->where('feeid', $id);
    $query = $this->db->get('fee');

    if ($query->num_rows() > 0) {

        $fee = $query->row();

        echo json_encode([
            "status" => true,
            "data" => $fee
        ]);

    } else {

        echo json_encode([
            "status" => false,
            "message" => "Fee record not found"
        ]);
    }
}
}