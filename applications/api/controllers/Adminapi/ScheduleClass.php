<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleClass extends CI_Controller {

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
        $this->load->model('Adminapi/ScheduleClassModel');
    }

    // ✅ GET ALL CLASSES
    public function index()
    {
        $classes = $this->ScheduleClassModel->getAllClassesDetails();
        $strength = $this->ScheduleClassModel->getStrength($classes);

        echo json_encode([
            "status" => true,
            "classes" => $classes,
            "strength" => $strength
        ]);
    }

    // ✅ INSERT CLASS
    public function insert()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $insert = [
            "Classname" => $data['name']
        ];

        $res = $this->ScheduleClassModel->insert($insert);

        echo json_encode([
            "status" => $res
        ]);
    }

    // ✅ DELETE CLASS
    public function delete($id)
    {
        $res = $this->ScheduleClassModel->delete($id);

        echo json_encode([
            "status" => $res
        ]);
    }
}