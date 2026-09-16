<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework extends CI_Controller {

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
        $this->load->model('Adminapi/HomeworkModel');
    }


     // API → get classes
    public function getClasses()
    {
        $classes = $this->HomeworkModel->getClasses();

        echo json_encode([
            "status" => true,
            "data" => $classes
        ]);
    }

   public function getSubjects()
{
    header('Content-Type: application/json');

    // ✅ read JSON body
    $input = json_decode(file_get_contents("php://input"), true);

    $class = $input['class'] ?? '';

    $subjects = $this->HomeworkModel->getSubjects($class);

    echo json_encode([
        "status" => true,
        "data" => $subjects
    ]);
}


public function submitHomework()
{
    header('Content-Type: application/json');

    $upload_path = './assets/homework/';

    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    $config['upload_path']   = $upload_path;
    $config['allowed_types'] = '*';
    $config['max_size']      = 10240;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    $file_name = null;
    $file_url  = null;

    if ($this->upload->do_upload('file')) {
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];
        $file_url  = base_url('assets/homework/' . $file_name);
    }

    $homework = [
        'Date' => date('Y-m-d'),
        'Subjectname' => $this->input->post('subject'),
        'Class' => $this->input->post('class'),
        'Assignment' => $this->input->post('assignment'),
        'file' => $file_name,
        'file_url' => $file_url
    ];

    $insert = $this->HomeworkModel->submitHomework($homework);

    echo json_encode([
        "status" => $insert,
        "message" => $insert
            ? "Homework assigned successfully"
            : "Failed to assign homework"
    ]);
}


public function display()
{
    $data = $this->HomeworkModel->get();

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function filter($year,$month,$class)
{
    $data = $this->HomeworkModel
        ->getFilteredData($year,$month,$class);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
}

public function delete($id)
{
    $this->db->where('id',$id);
    $this->db->delete('assignment');

    echo json_encode([
        "status"=>true,
        "message"=>"Deleted"
    ]);
}
}