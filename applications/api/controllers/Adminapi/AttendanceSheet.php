<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceSheet extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }

        $this->load->helper(['url', 'string']);
        $this->load->library('form_validation');
        $this->load->model('Adminapi/AdminClassModel');
        $this->load->model('Adminapi/AdminStudentModel');
        $this->load->model('Adminapi/AttendanceModel');
    }

    // ✅ Get Classes
    public function getClasses()
    {
        $classes = $this->AdminClassModel->getAll();
        echo json_encode($classes);
    }

    // ✅ Get Attendance By Month
    public function getByMonth()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $class = $input['class'];
        $month = $input['month'];
        $year  = date("Y");

        $students   = $this->AdminStudentModel->getByClass($class);
        $attendance = $this->AttendanceModel->byMonth($class,$month,$year);
        $absents    = $this->AttendanceModel->getAbsents($class,$month,$year);

        echo json_encode([
            "students" => $students,
            "attendance" => $attendance,
            "absents" => $absents,
            "year" => $year
        ]);
    }
}