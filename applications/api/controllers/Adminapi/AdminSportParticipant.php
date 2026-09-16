<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSportParticipant extends CI_Controller {

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
        $this->load->model('Adminapi/AdminSportParticipantModel');
    }

     public function view($sportEventId)
    {
        $participants = $this->AdminSportParticipantModel->all($sportEventId);
        echo json_encode($participants);
    }

     // 🔹 Delete a participant
    public function delete($id, $sportId)
    {
        $deleted = $this->AdminSportParticipantModel->delete($id);
        if($deleted){
            echo json_encode(['status' => true, 'message' => 'Participant deleted']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to delete']);
        }
    }

     // 🔹 Get all classes
    public function getClasses()
    {
        $classes = $this->AdminSportParticipantModel->getAll();
        echo json_encode($classes);
    }
    // 🔹 Get all students for a sport event
    public function views($sportEventId)
    {
        $students = $this->AdminSportParticipantModel->getInfoMany();
        echo json_encode(['sportEventId'=>$sportEventId, 'students'=>$students]);
    }

    // 🔹 Get filtered students by class
    public function filterStudent($class, $sportEventId)
    {
        $students = $this->AdminSportParticipantModel->getFilteredStudentData($class);
        echo json_encode(['sportEventId'=>$sportEventId, 'students'=>$students]);
    }

     // 🔹 Add participants
   public function insert()
{
    $raw = file_get_contents("php://input");
    $data = json_decode($raw, true);

    if (!$data) {
        echo json_encode([
            'status' => false,
            'message' => 'Invalid JSON'
        ]);
        return;
    }

    $ids = isset($data['ids']) ? $data['ids'] : [];
    $sportId = isset($data['sport_id']) ? $data['sport_id'] : null;

    if (empty($ids) || empty($sportId)) {
        echo json_encode([
            'status' => false,
            'message' => 'No students selected or sport ID missing'
        ]);
        return;
    }

    foreach ($ids as $id) {
        $student = $this->AdminSportParticipantModel->getStudent($id);

        if ($student) {
            $this->db->insert('sport_participants', [
                'name'       => $student->Name,
                'class'      => $student->Class,
                'rollno'     => $student->Rollno,
                'student_id' => $student->id,
                'sport_id'   => $sportId,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

    echo json_encode([
        'status' => true,
        'message' => 'Participants added successfully'
    ]);
}



}