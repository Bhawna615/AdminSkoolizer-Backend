<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleEvents extends CI_Controller {

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
        $this->load->model('Adminapi/ScheduleEventModel');
    }

 // ✅ GET ALL EVENTS
    public function index()
    {
        $events = $this->ScheduleEventModel->getEvents();
        echo json_encode($events);
    }

    // ✅ INSERT EVENT
    public function insert()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $newEvent = [
            'name' => $data['name'],
            'description' => $data['description'],
            'date' => $data['date'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->ScheduleEventModel->insert($newEvent)) {
            echo json_encode(['status'=>true,'message'=>'Event Added']);
        } else {
            echo json_encode(['status'=>false]);
        }
    }

    // ✅ DELETE
    public function delete($id)
    {
        $this->ScheduleEventModel->delete($id);
        echo json_encode(['status'=>true]);
    }

    // ✅ SINGLE EVENT
    public function show($id)
    {
        echo json_encode($this->ScheduleEventModel->find($id));
    }

    // ✅ UPDATE
    public function update($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $update = [
            'name'=>$data['name'],
            'description'=>$data['description'],
            'date'=>$data['date']
        ];

        $this->ScheduleEventModel->update($id,$update);

        echo json_encode(['status'=>true]);
    }




}