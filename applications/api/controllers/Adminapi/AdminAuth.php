<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Adminapi/AdminModel');

        // JSON output
        $this->output->set_content_type('application/json');

        // ✅ CORS headers for React with credentials
        $allowedOrigin = "http://localhost:3000"; // your React dev server
        header("Access-Control-Allow-Origin: $allowedOrigin");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Access-Control-Allow-Credentials: true"); // important for cookies/session

        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Preflight OPTIONS request
    public function options() {
        http_response_code(200);
        return;
    }

    // Admin login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            return;
        }

        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true) ?: $_POST;

        $username = isset($input['username']) ? trim($input['username']) : null;
        $password = isset($input['password']) ? trim($input['password']) : null;

        if (!$username || !$password) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Username and password required'
            ]);
            return;
        }

        $admin = $this->AdminModel->getAdminByUsername($username);

        if ($this->AdminModel->verifyPassword($username, $password)) {
           
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'id' => $admin->user_id ?? $admin->id,
                    'username' => $admin->username,
                    'email' => $admin->email ?? ''
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ]);
        }
    }

    // Admin logout
    public function signOut()
    {
        session_unset();
        session_destroy();

        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]);
    }
}
