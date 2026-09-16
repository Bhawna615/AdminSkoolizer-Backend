<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCount extends CI_Controller {

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

        $this->load->model('Adminapi/AdminCountModel');

        $this->output->enable_profiler(FALSE);
    }

 // Total Students Count API
    public function totalStudents()
{
    $totalStudents = $this->AdminCountModel->getTotalStudents();
    $passedOutStudents = $this->AdminCountModel->getPassedOutStudents();
    $totalTeachers = $this->AdminCountModel->getTotalTeachers();
    $totalClasses = $this->AdminCountModel->getTotalClasses();
    $totalEmployees = $this->AdminCountModel->getTotalEmployees();
    $totalActiveRoutes = $this->AdminCountModel->getTotalActiveRoutes();
    $totalAbsentStudents = $this->AdminCountModel->getTotalAbsentStudents();
    $totalEmployeeAbsent = $this->AdminCountModel->getTotalEmployeeAbsent();
    $totalExamsToday = $this->AdminCountModel->getTotalExamsToday();
    $totalBirthdaysToday = $this->AdminCountModel->getTotalBirthdaysToday();
    $totalFeePending = $this->AdminCountModel->getTotalFeePending();
    $totalLeaveRequests = $this->AdminCountModel->getTotalLeaveRequests();
    $totalSponseredStudents = $this->AdminCountModel->getTotalSponseredStudents();

    echo json_encode([
        "status" => "success",
        "totalStudents" => $totalStudents,
        "passedOutStudents" => $passedOutStudents,
        "totalTeachers" => $totalTeachers,
        "totalClasses" => $totalClasses,
        "totalEmployees" => $totalEmployees,
        "totalActiveRoutes" => $totalActiveRoutes,
        "totalAbsentStudents" => $totalAbsentStudents,
        "totalEmployeeAbsent" => $totalEmployeeAbsent,
        "totalExamsToday" => $totalExamsToday,
        "totalBirthdaysToday" => $totalBirthdaysToday,
        "totalFeePending" => $totalFeePending,
        "totalLeaveRequests" => $totalLeaveRequests,
        "totalSponseredStudents" => $totalSponseredStudents
    ]);
}
   

}