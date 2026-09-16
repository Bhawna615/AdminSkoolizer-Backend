<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEmployee extends CI_Controller {

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

        $this->load->model('Adminapi/AdminEmployeeModel');

        $this->output->enable_profiler(FALSE);
    }


     // 🔹 Get All Employees // 🔹 GET ALL
    public function index()
    {
        $data = $this->AdminEmployeeModel->getAll();
        echo json_encode($data);
    }

    // 🔹 INSERT
    public function insert()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $data = [
            'empname' => $input['name'],
            'Post' => $input['post']
        ];

        $response = $this->AdminEmployeeModel->insert($data);

        echo json_encode(["status" => $response]);
    }

    // 🔹 DELETE
    public function delete($id)
    {
        $response = $this->AdminEmployeeModel->delete($id);

        echo json_encode(["status" => $response]);
    }

    // ✅ Get all employees
    public function getEmployees()
    {
        $data = $this->AdminEmployeeModel->load();
        echo json_encode($data);
    }

    // ✅ Submit Attendance
    public function submitAttendance()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $date = date('Y-m-d');
        $mark = $this->AdminEmployeeModel->verifyIfAttendance($date);

        if ($mark == false) {

            $leavecount = 0;
            $presentcount = 0;

            foreach ($input as $row) {

                if ($row['mark'] == 'Leave') {
                    $data = [
                        'Date' => $date,
                        'empid' => $row['id']
                    ];
                    $this->AdminEmployeeModel->markAbsentees($data);
                    $leavecount++;
                } else {
                    $presentcount++;
                }
            }

            $attendance = [
                'Date' => $date,
                'onLeave' => $leavecount,
                'Present' => $presentcount,
                'Total' => count($input)
            ];

            $response = $this->AdminEmployeeModel->markAttendance($attendance);

            echo json_encode([
                "status" => $response ? "success" : "error"
            ]);
        } else {
            echo json_encode([
                "status" => "already"
            ]);
        }
    }

     // ✅ Get all attendance (current year)
    public function getAttendance()
    {
        $data = $this->AdminEmployeeModel->getAttendance();
        echo json_encode($data);
    }

     // ✅ Filter by year & month
    public function filter($year, $month)
    {
        $data = $this->AdminEmployeeModel->getFilteredData($year, $month);
        echo json_encode($data);
    }
     // ✅ Get all employees

    // ✅ Get absentees by date
    public function getAbsentees($date)
    {
        $data = $this->AdminEmployeeModel->loadAbsentees($date);
        echo json_encode($data);
    }
   // 👉 Monthly Attendance Data API
public function getMonthlyAttendance($month)
{
    $employees = $this->AdminEmployeeModel->load();
    $attendance = $this->AdminEmployeeModel->getAttendanceByMonth($month);
    $absents = $this->AdminEmployeeModel->getAbsentsByMonth($month);

    echo json_encode([
        "employees" => $employees,
        "attendance" => $attendance,
        "absents" => $absents
    ]);
}

}