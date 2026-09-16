<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPosts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Adminapi/AdminPostModel');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }
    }

    // ✅ GET ALL POSTS
    public function index()
    {
        $data = $this->db->order_by("created_at", "DESC")->get("posts")->result();
        echo json_encode($data);
    }

    // ✅ CREATE POST
   public function create()
{
    $text = $_POST['text'];
    $group = $_POST['recipient_group'];

    $fileName = NULL;
    $fileUrl = NULL;

    $upload_path = './uploads/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    if (!empty($_FILES['file']['name'])) {

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = '*';
        $config['max_size']      = 10240;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();

            $fileName = $fileData['file_name'];
            $fileUrl = base_url('uploads/' . $fileName);
        } else {
            echo json_encode([
                "status" => false,
                "error" => $this->upload->display_errors()
            ]);
            return;
        }
    }

    $insert = $this->AdminPostModel->createPost(
        $text,
        $group,
        $fileName,
        $fileUrl
    );

    echo json_encode([
        "status" => $insert ? true : false
    ]);
}

    // ✅ DELETE POST
    public function delete($id)
    {
        $this->db->where("id", $id)->delete("posts");
        echo json_encode(["status" => true]);
    }
    public function filter($year, $month)
    {
        $data = $this->AdminPostModel->getFilteredData($year, $month);

        // ✅ return JSON instead of loading view
        echo json_encode($data);
    }
}