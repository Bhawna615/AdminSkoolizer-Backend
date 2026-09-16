<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentAttendance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }

        header('Content-Type: application/json');

        $this->load->model('Adminapi/AdminStudentModel');
        $this->load->model('Adminapi/AdminAttendanceModel');

        $this->output->enable_profiler(FALSE);
    }

    // ✅ GET: studentAttendance/{id}
    public function studentAttendance($id = null)
    {
        if (empty($id)) {
            echo json_encode([
                "status" => false,
                "message" => "Student ID required"
            ]);
            return;
        }

        if (!is_numeric($id)) {
            echo json_encode([
                "status" => false,
                "message" => "Invalid Student ID"
            ]);
            return;
        }

        // ✅ Try fetching student with multiple possible column names
        $info = $this->AdminAttendanceModel->getInfoFlexible($id);

        // ✅ Get attendance (even if student missing, optional)
        $attendance = $this->AdminAttendanceModel->getStudentAttendance($id);

        if ($info) {
            echo json_encode([
                "status" => true,
                "info" => $info,
                "attendance" => $attendance
            ]);
        } else {

            // 🔥 Check if student exists in transferred table
            $transferred = $this->AdminStudentModel->getTransferredStudents($id);

            if ($transferred) {
                echo json_encode([
                    "status" => false,
                    "message" => "Student found in transferred records",
                    "data" => $transferred
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "Student not found",
                    "debug_id" => $id
                ]);
            }
        }
    }

    public function tcDetails($id)
    {
        $data['id'] = $id;
        $data['info'] = $this->AdminStudentModel->getInfoFlexible($id);
        $data['attendance'] = $this->AdminAttendanceModel->getStudentAttendance($id);

        $this->load->view('students/tcdetails', $data);
    }

    public function generateTc()
{
    header('Content-Type: application/json');

    try {

        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input) {
            echo json_encode([
                "status" => false,
                "message" => "Invalid JSON data received"
            ]);
            return;
        }

        if (empty($input['id'])) {
            echo json_encode([
                "status" => false,
                "message" => "Student ID missing"
            ]);
            return;
        }

        $id = $input['id'];

        $tcDetails = array(
            'name' => isset($input['name']) ? $input['name'] : '',
            'father_name' => isset($input['father_name']) ? $input['father_name'] : '',
            'mother_name' => isset($input['mother_name']) ? $input['mother_name'] : '',
            'nationality' => isset($input['nationality']) ? $input['nationality'] : '',
            'category' => isset($input['category']) ? $input['category'] : '',
            'date_of_admission' => isset($input['admission_date']) ? $input['admission_date'] : '',
            'last_class' => isset($input['admission_class']) ? $input['admission_class'] : '',
            'working_days' => isset($input['total_days']) ? $input['total_days'] : '',
            'subjects_studied' => isset($input['subjects']) ? $input['subjects'] : '',
            'admission_number' => isset($input['admission_number']) ? $input['admission_number'] : '',
            'date_of_birth' => isset($input['date_of_birth']) ? $input['date_of_birth'] : '',
            'roll_no' => isset($input['roll_no']) ? $input['roll_no'] : '',
            'last_school' => isset($input['last_school']) ? $input['last_school'] : '',
            'failed_mark' => isset($input['failed_mark']) ? $input['failed_mark'] : '',
            'qualified_mark' => isset($input['qualified_mark']) ? $input['qualified_mark'] : '',
            'dues_date' => isset($input['dues_date']) ? $input['dues_date'] : '',
            'fee_concession' => isset($input['fee_concession']) ? $input['fee_concession'] : '',
            'present_days' => isset($input['present_days']) ? $input['present_days'] : '',
            'ncc' => isset($input['ncc']) ? $input['ncc'] : '',
            'games_played' => isset($input['games_played']) ? $input['games_played'] : '',
            'general_conduct' => isset($input['general_conduct']) ? $input['general_conduct'] : '',
            'application_date' => isset($input['application_date']) ? $input['application_date'] : '',
            'issue_date' => isset($input['issue_date']) ? $input['issue_date'] : '',
            'reason' => isset($input['reason']) ? $input['reason'] : '',
            'remarks' => isset($input['remarks']) ? $input['remarks'] : '',
            'student_id' => $id,
            'session' => isset($input['session']) ? $input['session'] : ''
        );

        $result = $this->AdminStudentModel->insertTransferredStudent($tcDetails);

        if ($result) {

            $this->AdminStudentModel->markAsTransferred($id);

            echo json_encode([
                "status" => true,
                "message" => "TC Generated Successfully"
            ]);

        } else {

            echo json_encode([
                "status" => false,
                "message" => "Failed to generate TC",
                "db_error" => $this->db->error()
            ]);
        }

    } catch (Exception $e) {

        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
}