<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMessage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Adminapi/AdminMessageModel');

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
    public function options()
    {
        http_response_code(200);
        return;
    }
    public function getMessages()
    {
        header('Content-Type: application/json');

        $id = $this->input->post('id');

        // ✅ Validate Student ID
        if (empty($id) || !is_numeric($id)) {
            echo json_encode([
                "status" => false,
                "message" => "Student ID missing or invalid"
            ]);
            return;
        }

        $this->load->model('Adminapi/AdminStudentModel');
        $this->load->model('MessageModel');

        $info = $this->AdminStudentModel->getInfo($id);
        $messages = $this->AdminMessageModel->loadById($id);

        // ✅ If student not found
        if (empty($info)) {
            echo json_encode([
                "status" => false,
                "message" => "No student found"
            ]);
            return;
        }

        // If info is array → take first row
        $studentData = is_array($info) ? $info[0] : $info;

        // ✅ Clean & Format Messages
        $cleanMessages = [];

        if (!empty($messages)) {
            foreach ($messages as $msg) {
                // Safe message
                $messageText = !empty($msg->message) ? $msg->message : "N/A";

                // Safe timestamp
                $formattedTime = "N/A";
                if (!empty($msg->sent_at) && $msg->sent_at != "0000-00-00 00:00:00") {
                    $timestamp = strtotime($msg->sent_at);
                    if ($timestamp) {
                        $formattedTime = date("d F, Y H:i A", $timestamp);
                    }
                }

                $cleanMessages[] = [
                    "message" => $messageText,
                    "sent_at" => $formattedTime
                ];
            }
        }

        // ✅ Final JSON Response
        echo json_encode([
            "status" => true,
            "info" => $studentData,
            "messages" => $cleanMessages
        ]);
    }


    // ✅ GET ALL MESSAGES
    public function index()
    {
        $data = $this->AdminMessageModel->load();
        echo json_encode(["data" => $data]);
    }

    // ✅ FILTER
    public function filter()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $year = $input['year'] ?? null;
        $month = $input['month'] ?? null;
        $class = $input['class'] ?? null;

        $data = $this->AdminMessageModel->getFilteredData($year, $month, $class);
        echo json_encode(["data" => $data]);
    }

    // ✅ LOAD CLASSES
    public function classes()
    {
        $data = $this->AdminMessageModel->getAll();
        echo json_encode(["data" => $data]);
    }

    // ✅ LOAD RECIPIENTS
    public function recipients()
    {
        $data = $this->AdminMessageModel->loadRecipients();
        echo json_encode(["data" => $data]);
    }

    // ✅ SEND MESSAGE
   public function send()
{
    $message = $_POST['message'];
    $ids = $_POST['ids'];

    $fileName = "";
    $fileUrl = "";

    // ✅ Upload folder
    $upload_path = './uploads/messages/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    // ✅ Config
    $config['upload_path']   = $upload_path;
    $config['allowed_types'] = '*';
    $config['max_size']      = 10240;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    // ✅ Upload file
    if (!empty($_FILES['file']['name'])) {
        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();

            $fileName = $fileData['file_name'];
            $fileUrl = base_url('uploads/messages/' . $fileName);
        } else {
            echo json_encode([
                "status" => false,
                "msg" => $this->upload->display_errors()
            ]);
            return;
        }
    }

    // ✅ SAVE IN DB
    $this->AdminMessageModel->insert($ids, $message, $fileName, $fileUrl);

    echo json_encode([
        "status" => true,
        "msg" => "Message sent successfully"
    ]);
}
    public function getBalance()
    {
        $response = $this->textlocal->getBalance();

        $sms = 0;
        foreach ($response as $key => $value) {
            if ($key == 'sms') {
                $sms = $value;
            }
        }

        echo json_encode(["sms" => $sms]);
    }

    public function getAbsentees()
    {
        $data = $this->AdminMessageModel->loadAllAbsentsToday();
        echo json_encode($data);
    }

    public function sendAbsentSms()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $ids = $input['ids'];
        $message = $input['message'];

        if ($this->AdminMessageModel->insert($ids, $message, NULL, NULL)) {
            echo json_encode([
                "status" => "success",
                "message" => "Message Sent"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed"
            ]);
        }
    }
    public function getInboxMessages()
    {
        echo json_encode([
            "messages" => [
                [
                    "number" => "9876543210",
                    "content" => "Test message",
                    "datetime" => date("Y-m-d H:i:s"),
                    "status" => "Delivered"
                ]
            ]
        ]);
    }

   public function sendPush()
{
    header('Content-Type: application/json');

    $message = $this->input->post('message');
    $ids = $this->input->post('ids');
    $fileName = "";
    $fileUrl = "";

      // ✅ Upload folder
    $upload_path = './uploads/messages/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    // ✅ Config
    $config['upload_path']   = $upload_path;
    $config['allowed_types'] = '*';
    $config['max_size']      = 10240;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    // ✅ Upload file
    if (!empty($_FILES['file']['name'])) {
        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();

            $fileName = $fileData['file_name'];
            $fileUrl = base_url('uploads/messages/' . $fileName);
        } else {
            echo json_encode([
                "status" => false,
                "msg" => $this->upload->display_errors()
            ]);
            return;
        }
    }

    if (empty($message) || empty($ids)) {
        echo json_encode(['status' => false, 'message' => 'Missing data']);
        return;
    }
       $this->AdminMessageModel->insert($ids, $message, $fileName, $fileUrl);

    $tokens = $this->AdminMessageModel->getRecipients($ids);

    if (empty($tokens)) {
        echo json_encode(['status' => false, 'message' => 'No tokens found']);
        return;
    }

    // 🔥 Load service account file
    $serviceAccount = json_decode(file_get_contents(APPPATH . 'firebase-service-account.json'), true);

    // 🔥 Get OAuth token
    $accessToken = $this->getAccessToken($serviceAccount);

    $projectId = $serviceAccount['project_id'];

    $url = "https://fcm.googleapis.com/v1/projects/$projectId/messages:send";

    $responses = [];

    foreach ($tokens as $token) {

        $payload = [
            "message" => [
                "token" => $token,
                "notification" => [
                    "title" => "New Message",
                    "body" => $message
                ],
                "data" => [
                    "type" => "message"
                ]
            ]
        ];

        $headers = [
            "Authorization: Bearer $accessToken",
            "Content-Type: application/json"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        $result = curl_exec($ch);
        curl_close($ch);

        $responses[] = json_decode($result, true);
    }

    echo json_encode([
        'status' => true,
        'message' => 'Push sent via HTTP v1',
        'response' => $responses
    ]);
}

private function getAccessToken($serviceAccount)
{
    $now = time();

    $jwtHeader = base64_encode(json_encode(["alg" => "RS256", "typ" => "JWT"]));

    $jwtClaim = base64_encode(json_encode([
        "iss" => $serviceAccount['client_email'],
        "scope" => "https://www.googleapis.com/auth/firebase.messaging",
        "aud" => $serviceAccount['token_uri'],
        "iat" => $now,
        "exp" => $now + 3600
    ]));

    $signatureInput = $jwtHeader . "." . $jwtClaim;

    openssl_sign(
        $signatureInput,
        $signature,
        $serviceAccount['private_key'],
        "sha256WithRSAEncryption"
    );

    $jwt = $signatureInput . "." . base64_encode($signature);

    $postData = [
        "grant_type" => "urn:ietf:params:oauth:grant-type:jwt-bearer",
        "assertion" => $jwt
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $serviceAccount['token_uri']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    return $data['access_token'];
}


public function getNotifications()
{
    ob_clean();
    header('Content-Type: application/json');
    error_reporting(0);
    ini_set('display_errors', 0);

    try {
        $student_id = $this->input->post('student_id');

        if (!$student_id && isset($_POST['student_id'])) {
            $student_id = $_POST['student_id'];
        }

        if (empty($student_id)) {
            echo json_encode(['error' => true, 'message' => 'Missing student_id']);
            return;
        }


        $student = $this->AdminMessageModel->get($student_id);
        if (!$student) {
            echo json_encode(['error' => true, 'message' => 'Student not found']);
            return;
        }

        // ✅ Get notification counts using your existing model logic
        $notifications = [
            'messages'   => $this->AdminMessageModel->loadRecentMessages($student_id),
            'assignments'=> $this->AdminMessageModel->loadRecentAssignments($student_id, $student->Class),
            'exams'      => $this->AdminMessageModel->loadRecentExams($student_id, $student->Class),
            'schoolPosts'=> $this->AdminMessageModel->loadRecentSchoolPosts($student_id),
            'classPosts' => $this->AdminMessageModel->loadRecentClassPosts($student_id, $student->Class),
            'events'     => $this->AdminMessageModel->loadRecentEvents($student_id),
            'payments'   => $this->AdminMessageModel->loadRecentPayments($student_id),
        ];

        echo json_encode(['error' => false, 'notifications' => $notifications]);
    } catch (Throwable $e) {
        echo json_encode(['error' => true, 'message' => $e->getMessage()]);
    }
}

public function markNotificationAsRead()
{
    ob_clean();
    header('Content-Type: application/json');
    error_reporting(0);
    ini_set('display_errors', 0);

    $student_id = $this->input->post('student_id');
    $type = $this->input->post('type');

    // ✅ Debug log path (you can open this anytime)
    $debugPath = 'C:/wamp64/www/kkblossom/debug_mark_read.txt';

    // ✅ Start logging request
    file_put_contents($debugPath, "==== Mark Notification API Called ====\n", FILE_APPEND);
    file_put_contents($debugPath, "Time: " . date("Y-m-d H:i:s") . "\n", FILE_APPEND);
    file_put_contents($debugPath, "Student ID: " . ($student_id ?? 'NULL') . "\n", FILE_APPEND);
    file_put_contents($debugPath, "Type: " . ($type ?? 'NULL') . "\n", FILE_APPEND);

    if (empty($student_id) || empty($type)) {
        file_put_contents($debugPath, "❌ ERROR: Missing Data\n\n", FILE_APPEND);
        echo json_encode(['error' => true, 'message' => 'Missing data']);
        return;
    }

    $updated = $this->AdminMessageModel->markNotificationAsRead($student_id, $type);

    if ($updated) {
        file_put_contents($debugPath, "✅ SUCCESS: Marked as read in DB.\n\n", FILE_APPEND);
        echo json_encode(['error' => false, 'message' => 'Notification marked as read']);
    } else {
        file_put_contents($debugPath, "❌ FAILED: Invalid notification type.\n\n", FILE_APPEND);
        echo json_encode(['error' => true, 'message' => 'Invalid notification type']);
    }
}
}