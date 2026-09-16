<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PortfolioModel');
        $this->load->config('api');
        $this->load->helper('url'); // ✅ Needed for base_url()

        // ✅ Validate API Key
        $apiKey = null;
        if (function_exists('getallheaders')) {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (isset($headers['x-api-key'])) {
                $apiKey = $headers['x-api-key'];
            }
        }
        if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) {
            $apiKey = $_SERVER['HTTP_X_API_KEY'];
        }
        if (!$apiKey && isset($_SERVER['X_API_KEY'])) {
            $apiKey = $_SERVER['X_API_KEY'];
        }

        // Local fallback for development
        if (!$apiKey) {
            $apiKey = 'skoolizer_key_2025';
        }

        if (trim($apiKey) !== trim($this->config->item('key'))) {
            header('Content-Type: application/json');
            echo json_encode(['error' => true, 'message' => 'Invalid API Key']);
            exit;
        }
    }

    public function index()
    {
        header('Content-Type: application/json');

        // ✅ Hide deprecation warnings from PHP 8+ (no HTML mixed with JSON)
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
        ini_set('display_errors', 0);

        // ✅ Works with both FormData and JSON
        $user_id = $this->input->post('user_id');

        // ✅ If POST empty, try raw JSON
        if (empty($user_id)) {
            $raw = file_get_contents("php://input");
            $json = json_decode($raw, true);
            if (isset($json['user_id'])) {
                $user_id = $json['user_id'];
            }
        }

        // ✅ Debug logging
        file_put_contents(
            'C:/wamp64/www/kkblossom/debug_portfolio.txt',
            "USER_ID received: " . $user_id . "\nPOST DATA:\n" . print_r($_POST, true)
        );

        // ✅ Validation
        if (empty($user_id)) {
            echo json_encode(['error' => true, 'message' => 'Missing user_id']);
            return;
        }

        // ✅ Fetch student info
        $bioData = $this->PortfolioModel->getBioData($user_id);

        if ($bioData) {
            // ✅ Add full image URL safely
            if (!empty($bioData->image)) {
                $bioData->image = base_url('assets/images/students/' . $bioData->image);
            }

            // ✅ Log success
            error_log("Portfolio endpoint hit successfully for USER_ID: $user_id");

            // ✅ Output JSON only (no extra HTML)
            echo json_encode([
                'error'   => false,
                'bioData' => $bioData
            ], JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode(['error' => true, 'message' => 'Student not found']);
        }
    }



    public function changePassword()
{
    header('Content-Type: application/json');

    $studentId = $this->input->post('id');
    $currentPassword = $this->input->post('current_password');
    $newPassword = $this->input->post('new_password');
    $confirmNewPassword = $this->input->post('confirm_new_password');

    if (empty($studentId) || empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {
        echo json_encode(['error' => true, 'message' => 'All fields are required']);
        return;
    }

    if ($newPassword !== $confirmNewPassword) {
        echo json_encode(['error' => true, 'message' => 'New Password and Confirm Password do not match']);
        return;
    }

    // Fetch student record
    $student = $this->PortfolioModel->getStudentById($studentId);

    if (!$student) {
        echo json_encode(['error' => true, 'message' => 'Student not found']);
        return;
    }

    // Verify old password
    if (!password_verify($currentPassword, $student->Password)) {
        echo json_encode(['error' => true, 'message' => 'Current password is incorrect']);
        return;
    }

    // Hash and update new password
    $updatedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $updateStatus = $this->PortfolioModel->updatePassword($updatedPassword, $studentId);

    if ($updateStatus) {
        echo json_encode(['error' => false, 'message' => 'Password updated successfully']);
    } else {
        echo json_encode(['error' => true, 'message' => 'Failed to update password']);
    }
}

}
