<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarkAttendence extends CI_Controller {

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
        $this->load->model('Adminapi/AttendanceModel');
        $this->load->model('Adminapi/AdminStudentModel');
    }

    // ======================
    // GET CLASSES
    // ======================
    public function getClasses()
    {
        echo json_encode(
            $this->AttendanceModel->getClasses()
        );
    }

    // ======================
    // GET ROLLCALL
    // ======================
    public function getRollCall()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $class = $input['class'];
        $date  = date('Y-m-d', strtotime($input['date']));

        if($this->AttendanceModel->verifyAttendance($class,$date)>0){
            echo json_encode(["error"=>"Attendance already marked"]);
            return;
        }

        $students = $this->AttendanceModel
                         ->getStudentsByClass($class);

        echo json_encode([
            "students"=>$students,
            "className"=>$class,
            "date"=>$input['date']
        ]);
    }

    // ======================
    // SUBMIT ATTENDANCE
    // ======================
    public function submitAttendance()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $students = $input['students'];
        $marks    = $input['marks'];
        $class    = $input['class'];
        $date     = date('Y-m-d', strtotime($input['date']));

        $absent=0;
        $leave=0;
        $present=0;

        foreach($students as $i=>$s){

            if($marks[$i]=='Absent'){
                $absent++;

                $this->AttendanceModel->insertAbsentee([
                    'Date'=>$date,
                    'Rollno'=>$s['Rollno'],
                    'Class'=>$class,
                    'onLeave'=>0,
                    'student_id'=>$s['id']
                ]);
            }
            elseif($marks[$i]=='Leave'){
                $leave++;

                $this->AttendanceModel->insertAbsentee([
                    'Date'=>$date,
                    'Rollno'=>$s['Rollno'],
                    'Class'=>$class,
                    'onLeave'=>1,
                    'student_id'=>$s['id']
                ]);
            }
            else{
                $present++;
            }
        }

        $this->AttendanceModel->saveAttendance([
            'Date'=>$date,
            'Class'=>$class,
            'Absent'=>$absent,
            'onLeave'=>$leave,
            'Present'=>$present,
            'Strength'=>count($students)
        ]);

        echo json_encode(["status"=>"success"]);
    }

    // ======================
    // VIEW ATTENDANCE
    // ======================
    public function getAttendance()
    {
        $year = date('Y');

        echo json_encode(
            $this->AttendanceModel->getAttendance($year)
        );
    }
    public function filter($year, $month, $class)
{
    $data = $this->AttendanceModel
                 ->getFilteredData($year, $month, $class);

    echo json_encode($data);
}

public function details()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $class = $input['class'];
    $date  = $input['date'];

    $students = $this->AdminStudentModel->getByClass($class);
    $details  = $this->AttendanceModel->getDetails($class,$date);

    echo json_encode([
        "students" => $students,
        "details"  => $details
    ]);
}

public function edit()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $date  = $input['date'];
    $class = $input['class'];

   
    // DELETE OLD ATTENDANCE
    $this->AttendanceModel->delete($class, $date);

    // FETCH DATA AGAIN
    $students  = $this->AdminStudentModel->getByClass($class);
    $absentees = $this->AttendanceModel->getAbsentees($class, $date);

    echo json_encode([
        "students"  => $students,
        "absentees" => $absentees,
        "date"      => $date,
        "class"     => $class
    ]);
}
}