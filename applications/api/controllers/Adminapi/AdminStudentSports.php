<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentSports extends CI_Controller {

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
        $this->load->model('Adminapi/AdminStudentSportsModel');
    }

    // 🔹 GET ALL EVENTS
    public function index()
    {
        echo json_encode(
            $this->AdminStudentSportsModel->all()
        );
    }

    // 🔹 DELETE EVENT
    public function delete($id)
    {
        $this->AdminStudentSportsModel->delete($id);
        echo json_encode(['status' => true]);
    }

    public function insert()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        if (empty($input['name']) || empty($input['date'])) {
            echo json_encode([
                'status' => false,
                'message' => 'Name and Date are required'
            ]);
            return;
        }

        $newEvent = [
            'name'       => $input['name'],
            'date'       => $input['date'],
            'created_at'=> date('Y-m-d H:i:s')
        ];

        if ($this->AdminStudentSportsModel->insert($newEvent)) {
            echo json_encode([
                'status' => true,
                'message' => 'Event Added Successfully'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Failed to add'
            ]);
        }
    }
    public function one($id)
{
    $this->db->where('id', $id);
    $event = $this->db->get('sports')->row();

    if($event) {
        echo json_encode($event);
    } else {
        echo json_encode(null);
    }
}
public function update()
{
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'];
    $data = [
        'name' => $input['name'],
        'date' => $input['date']
    ];

    $this->db->where('id', $id);
    $status = $this->db->update('sports', $data);

    if($status) {
        echo json_encode([
            'status' => true,
            'message' => 'Event Updated Successfully'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Failed to Update'
        ]);
    }
}



}
