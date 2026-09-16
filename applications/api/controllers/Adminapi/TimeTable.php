<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeTable extends CI_Controller {

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

        $this->load->database();
        $this->load->model('Adminapi/AdminTimetableModel');
        $this->load->model('Adminapi/AdminTeacherModel');
    }

    // ✅ GET ALL CLASSES
   public function getClasses()
    {
        $query = $this->db->get('classes');

        if (!$query) {
            echo json_encode([
                "status" => false,
                "message" => "Unable to fetch classes",
                "data" => []
            ]);
            return;
        }

        echo json_encode([
            "status" => true,
            "data" => $query->result()
        ]);
    }

    // ✅ GET TIMETABLE
    public function getTimeTable()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $class = $data['class'];
        $day   = $data['day'];

        $sql = "
            SELECT *
            FROM timetable
            JOIN teachers 
            ON timetable.TeacherId = teachers.id
            WHERE timetable.Class = ?
            AND timetable.Day = ?
            ORDER BY timetable.Stime
        ";

        $query = $this->db->query($sql, [$class, $day]);

        echo json_encode([
            "status" => true,
            "data" => $query->result()
        ]);
    }

    // ✅ DELETE PERIOD
    public function delete($id)
    {
        $this->db->where('timetableid', $id);
        $this->db->delete('timetable');

        echo json_encode([
            "status" => true,
            "message" => "Deleted successfully"
        ]);
    }


     // GET TEACHERS
     public function getTeachers()
    {
        /*
         * Directly fetch teachers from teachers table.
         * This avoids the AdminTeacherModel->getAll()
         * error that is currently causing HTTP 500.
         */

        $query = $this->db
            ->select('*')
            ->from('teachers')
            ->get();

        if (!$query) {

            echo json_encode([
                "status" => false,
                "message" => "Unable to fetch teachers",
                "data" => []
            ]);

            return;
        }

        $teachers = $query->result();

        echo json_encode([
            "status" => true,
            "data" => $teachers
        ]);
    }


    // INSERT PERIOD
    public function insert()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $data = array(
            'Subjectname' => $input['subjectname'],
            'TeacherId'   => $input['teacher'],
            'Stime'       => date('H:i:s', strtotime($input['stime'])),
            'Etime'       => date('H:i:s', strtotime($input['etime'])),
            'Day'         => $input['day'],
            'Class'       => $input['class'],
        );

        $response = $this->AdminTimetableModel->insert($data);

        if ($response) {
            echo json_encode([
                "status" => true,
                "message" => "Added Successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed"
            ]);
        }
    }
}