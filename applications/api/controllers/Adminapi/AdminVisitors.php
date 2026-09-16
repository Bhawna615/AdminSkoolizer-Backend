<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminVisitors extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $this->load->model('Adminapi/AdminVisitorsModel');
        $this->load->helper('url');
    }

    // ---------------------------
    // GET ALL VISITORS
    // ---------------------------
    public function index()
    {
        $visitors = $this->AdminVisitorsModel->getAllVisitors();

        echo json_encode([
            "status" => true,
            "data" => $visitors
        ]);
    }

    // ---------------------------
    // ADD VISITOR
    // ---------------------------
   public function addVisitor()
{
    $data = json_decode(file_get_contents("php://input"), true);

    // 🔥 DEBUG
    if (empty($data)) {
        echo json_encode([
            "status" => false,
            "message" => "No data received",
            "raw" => file_get_contents("php://input")
        ]);
        return;
    }

    $insert = $this->AdminVisitorsModel->addVisitor($data);

    if ($insert) {
        echo json_encode([
            "status" => true,
            "message" => "Visitor added successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "DB insert failed"
        ]);
    }
}

    // ---------------------------
    // UPDATE VISITOR
    // ---------------------------
    public function updateVisitor($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!empty($data)) {

            $update = $this->AdminVisitorsModel->updateVisitor($id, $data);

            if ($update) {
                echo json_encode([
                    "status" => true,
                    "message" => "Visitor updated successfully"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "Failed to update visitor"
                ]);
            }
        } else {
            echo json_encode([
                "status" => false,
                "message" => "No data received"
            ]);
        }
    }

    // ---------------------------
    // DELETE VISITOR
    // ---------------------------
    public function deleteVisitor($id)
    {
        $delete = $this->AdminVisitorsModel->deleteVisitor($id);

        if ($delete) {
            echo json_encode([
                "status" => true,
                "message" => "Visitor deleted successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed to delete visitor"
            ]);
        }
    }
}