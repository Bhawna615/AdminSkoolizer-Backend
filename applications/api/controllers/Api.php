<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);
// ini_set('display_errors', 0);

class Api extends CI_Controller
{
  public function __construct()
{
    // ✅ Fix timezone to India (IST)
    date_default_timezone_set('Asia/Kolkata');
    parent::__construct();
	error_reporting(0);
    ini_set('display_errors', 0);
    $this->load->model('EventModel');
	 $this->load->model('ApiModel');
	 $this->load->model('StudentModel');
    $this->load->config('api');
	$this->load->helper('url');
   
    // $this->load->library('Easebuzz');


    // Try reading headers safely
    $apiKey = null;

    // ✅ Works in WAMP, XAMPP, IIS
    if (function_exists('getallheaders')) {
        $headers = array_change_key_case(getallheaders(), CASE_LOWER);
        if (isset($headers['x-api-key'])) {
            $apiKey = $headers['x-api-key'];
        }
    }

    // ✅ Fallbacks for local servers
    if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) {
        $apiKey = $_SERVER['HTTP_X_API_KEY'];
    }
    if (!$apiKey && isset($_SERVER['X_API_KEY'])) {
        $apiKey = $_SERVER['X_API_KEY'];
    }

    // ✅ Temporary default (for local testing only)
    if (!$apiKey) {
        $apiKey = 'skoolizer_key_2025';
    }

    file_put_contents(
        'C:/wamp64/www/kkblossom/debug_key.txt',
        "Frontend sent: " . $apiKey . "\nConfig key: " . $this->config->item('key')
    );

    if (trim($apiKey) !== trim($this->config->item('key'))) {
        header('Content-Type: application/json');
        echo json_encode(['error' => true, 'message' => 'Invalid API Key']);
        exit();
    }
}



   public function index()
{
    // 🧹 Clean output + disable PHP warnings
    ob_clean();
    error_reporting(0);
    ini_set('display_errors', 0);
    header('Content-Type: application/json');

    // ✅ Read raw input safely
    $rawInput = file_get_contents("php://input");
    $decoded = json_decode($rawInput, true);

    // ✅ Collect input from both sources (POST & JSON)
    $admission_no = $this->input->post('admission_no');
    $password = $this->input->post('password');

    if (!$admission_no && isset($decoded['admission_no'])) {
        $admission_no = $decoded['admission_no'];
    }
    if (!$password && isset($decoded['password'])) {
        $password = $decoded['password'];
    }

    // ✅ Debug file (optional)
    // file_put_contents('C:/wamp64/www/kkblossom/debug_input.txt', print_r($_POST, true) . "\nRAW: " . $rawInput);

    if (empty($admission_no) || empty($password)) {
        echo json_encode(['error' => true, 'message' => 'Required fields are missing']);
        exit;
    }

    // ✅ Validate login
    if ($this->ApiModel->userLogin($admission_no, $password)) {
        $user = $this->ApiModel->getUserData($admission_no);

        ob_clean(); // clear again in case of warnings
        echo json_encode([
            'error' => "false",
            'id' => $user->id,
            'Name' => $user->Name,
            'Fname' => $user->Fname,
            'Email' => $user->Email,
            'Class' => $user->Class,
            'image' => $user->image,
            'Rollno' => $user->Rollno,
            'qrcode' => $user->qrcode
        ]);
        exit;
    } else {
        echo json_encode(['error' => true, 'message' => 'Invalid Credentials']);
        exit;
    }
}






// 	public function index()
// 	{
// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 		if (isset($_POST['qrcode'])) {
// 		if ($this->ApiModel->userLogin($_POST['qrcode'])) {
// 			$user = $this->ApiModel->getUserData($_POST['qrcode']);
// 			$response['error'] = "false";
// 			$response['id'] = $user->id;
// 			$response['Name'] = $user->Name;
// 			$response['Fname'] = $user->Fname;
// 			$response['Email'] = $user->Email;
// 			$response['Class'] = $user->Class;
// 			$response['image'] = $user->image;
// 			$response['Rollno'] = $user->Rollno;
// 				$response['qrcode'] = $user->qrcode;
// 		} else {
// 			$response['error'] = true;
// 			$response['message'] = "Invalid QR Code";
// 		}
// 		} else {
// 			$response['error'] = true;
// 			$response['message'] = "Required fields are missing";
// 		}

// 	} else {
// 		$response['error'] = true;
// 		$response['message'] = "Invalid Request";
// 	}

// 	echo json_encode($response);

// 	}

	public function fetchSchedule()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['schedule'])) {
				if (isset($_POST['userId'])) {
					//timetable request
					$schedule = $this->ApiModel->fetchSchedule($_POST['schedule']);
					$movement = $this->ApiModel->getLastMovement($_POST['userId']);
					$response['schedule'] = $schedule;
					$response['movement'] = $movement;
					$response['error'] = false;
				} else {
					$response['error'] = true;
					$response['message'] = "Invalid Request";
				}
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			} 
		} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}

	public function fetchAssignment()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['assignment'])) {
				$assignment = $this->ApiModel->fetchAssignment($_POST['assignment'], $_POST['date']);
				$response['assignment'] = $assignment;
				$response['error'] = false;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			} 
		} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}

	// public function fetchExams()
	// {
	// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 		if (isset($_POST['class'])) {
	// 			$exams = $this->ApiModel->fetchExams($_POST['class']);
	// 			$response['exams'] = $exams;
	// 			$response['error'] = false;
	// 		} else {
	// 			$response['error'] = true;
	// 			$response['message'] = "Invalid Request";
	// 		} 
	// 	} else {
	// 			$response['error'] = true;
	// 			$response['message'] = "Invalid Request";
	// 	}

	// 	echo json_encode($response);
	// }

     public function fetchExams()
    {
        $response = ['error' => true, 'message' => 'Invalid Request', 'exams' => []];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $class = $_POST['class'] ?? null;

            if (!empty($class)) {
                $exams = $this->ApiModel->fetchExams($class) ?? [];
                $response['exams'] = $exams;
                $response['error'] = false;
                $response['message'] = empty($exams) ? "No exams found" : "Exams fetched successfully";
            } else {
                $response['message'] = "Class parameter is missing";
            }
        } else {
            $response['message'] = "Request method must be POST";
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
	public function fetchPosts()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class'])) {
				$posts = $this->ApiModel->fetchPosts($_POST['class']);
				$response['posts'] = $posts;
				$response['error'] = false;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			} 
		} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}
// public function fetchClassPosts($class)
// {
//     // SQL query to fetch only required fields
//     $sql = 'SELECT text, url, created_at 
//             FROM posts 
//             WHERE recipient_group = ? 
//             ORDER BY created_at DESC';

//     // Execute query safely with class parameter
//     $query = $this->db->query($sql, [$class]);

//     // Return results as associative array for JSON output
//     return $query->result_array();
// }

public function fetchClassPosts()
{
    header('Content-Type: application/json');

    $class = $this->input->post('class');

    if (!$class) {
        echo json_encode([
            "status" => false,
            "message" => "Class is required"
        ]);
        return;
    }

    $posts = $this->ApiModel->getClassPosts($class);

    echo json_encode([
        "status" => true,
        "posts" => $posts
    ]);
}

	public function fetchSubjects()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class'])) {
				$subjects = $this->ApiModel->fetchSubjects($_POST['class']);
				$response['subjects'] = $subjects;
				$response['error'] = false;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			} 
		} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}

	public function fetchResult()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['class']) && isset($_POST['subject']) && isset($_POST['rollNo'])) {
				$result = $this->ApiModel->fetchResult
					(
					$_POST['class'],
					 $_POST['subject'],
					  $_POST['rollNo']
					);
					$response['error'] = false;
					$response['result'] = $result;
			} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
			}
		} else {
				$response['error'] = true;
				$response['message'] = "Invalid Request";
		}

		echo json_encode($response);
	}


	 public function fetchLeaveRequests()
    {
        $student_id = $this->input->post('student_id');
        if (empty($student_id)) {
            echo json_encode(['error' => true, 'message' => 'Missing student_id']);
            return;
        }

        $requests = $this->ApiModel->get($student_id);
        echo json_encode(['error' => false, 'requests' => $requests]);
    }

   public function createLeaveRequest()
{
    header('Content-Type: application/json'); // ✅ always send JSON
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // ✅ hide notices/warnings
    ini_set('display_errors', 0);

    $student_id = $this->input->post('student_id');
    $date = $this->input->post('date');
    $reason = $this->input->post('reason');

    if (empty($student_id) || empty($date) || empty($reason)) {
        echo json_encode(['error' => true, 'message' => 'All fields are required']);
        return;
    }

    // ✅ Add this for debugging
    file_put_contents('C:/wamp64/www/kkblossom/debug_leave.txt', 
        "StudentID: $student_id | Date: $date | Reason: $reason\n", FILE_APPEND);

    $student = $this->StudentModel->get($student_id);
    if (!$student) {
        echo json_encode(['error' => true, 'message' => 'Student not found']);
        return;
    }

    $leaveData = [
        'student_id' => $student->id,
        'student_name' => $student->Name,
        'student_class' => $student->Class,
        'student_roll_no' => $student->Rollno,
        'date' => $date,
        'reason' => $reason,
        'status' => 0
    ];

    $result = $this->ApiModel->create($leaveData);
    if ($result) {
        echo json_encode(['error' => false, 'message' => 'Leave request created']);
    } else {
        echo json_encode(['error' => true, 'message' => 'Database insert failed']);
    }
}


public function fetchAttendance()
{
    ob_clean();
    header('Content-Type: application/json');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Debug log start
    file_put_contents('C:/wamp64/www/kkblossom/debug_attendance_log.txt', "API hit hua ✅\n", FILE_APPEND);

    try {
       // ✅ Step 1: Try to get from CI input
$student_id = $this->input->post('student_id');

// ✅ Step 2: Manual fallback if CI fails
if (!$student_id) {
    // Check native $_POST
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
    }

    // Check raw body (FormData from React)
    if (!$student_id) {
        $rawInput = file_get_contents("php://input");
        parse_str($rawInput, $parsed);
        if (isset($parsed['student_id'])) {
            $student_id = $parsed['student_id'];
        }
    }
}

// ✅ Step 3: Debug log
file_put_contents('C:/wamp64/www/kkblossom/debug_attendance_log.txt', "Student ID mila (final): " . $student_id . "\n", FILE_APPEND);

// ✅ Step 4: Still empty → send error
if (empty($student_id)) {
    echo json_encode(['error' => true, 'message' => 'Missing student_id']);
    return;
}


        $student = $this->StudentModel->get($student_id);
        if (!$student) {
            echo json_encode(['error' => true, 'message' => 'Student not found']);
            return;
        }

        // ✅ Fix table name 'attendance' not 'attendence'
        $attendanceData = $this->ApiModel->getStudentAttendance($student_id);

        if (empty($attendanceData)) {
            echo json_encode(['error' => true, 'message' => 'No attendance data found']);
            return;
        }

        $totalDays = $attendanceData[0];
        $presentDays = $attendanceData[1];
        $absentDates = $attendanceData[2];
        $workingDays = $attendanceData[3];

        $percent = ($totalDays != 0) ? round(($presentDays / $totalDays) * 100, 2) : 0;
        $status = ($percent >= 85)
            ? "Outstanding! 🏆"
            : (($percent >= 60)
                ? "Keep Going! 🔄"
                : "Needs Improvement! ⚠️");

        $response = [
            'error' => false,
            'student' => [
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollno' => $student->Rollno,
                'image' => base_url('assets/images/students/' . $student->image)
            ],
            'attendance' => [
                'total_days' => $totalDays,
                'present_days' => $presentDays,
                'percentage' => $percent,
                'status' => $status,
                'absent_dates' => $absentDates,
                'working_days' => $workingDays
            ]
        ];

        file_put_contents('C:/wamp64/www/kkblossom/debug_attendance_log.txt', print_r($response, true), FILE_APPEND);

        echo json_encode($response);

        file_put_contents('C:/wamp64/www/kkblossom/debug_attendance_log.txt', "✅ Response sent successfully\n", FILE_APPEND);
    } catch (Throwable $e) {
        file_put_contents('C:/wamp64/www/kkblossom/debug_attendance_log.txt', "❌ Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo json_encode(['error' => true, 'message' => $e->getMessage()]);
    }
}





public function fetchStudentProfile()
{
    ob_clean();
    header('Content-Type: application/json');
    error_reporting(0);
    ini_set('display_errors', 0);

    try {
        // ✅ Step 1: Get student_id from POST
        $student_id = $this->input->post('student_id');

        // Fallbacks (for React Native FormData issues)
        if (!$student_id && isset($_POST['student_id'])) {
            $student_id = $_POST['student_id'];
        }

        if (!$student_id) {
            $rawInput = file_get_contents("php://input");
            parse_str($rawInput, $parsed);
            if (isset($parsed['student_id'])) {
                $student_id = $parsed['student_id'];
            }
        }

        if (empty($student_id)) {
            echo json_encode(['error' => true, 'message' => 'Missing student_id']);
            return;
        }

        // ✅ Step 2: Fetch student record from database
        $student = $this->StudentModel->get($student_id);

        if (!$student) {
            echo json_encode(['error' => true, 'message' => 'Student not found']);
            return;
        }

        // ✅ Step 3: Prepare response data
        $imagePath = base_url('assets/images/students/' . $student->image);
        $response = [
            'error' => false,
            'student' => [
                'id' => $student->id,
                'Name' => $student->Name,
                'Class' => $student->Class,
                'Rollno' => $student->Rollno,
                'image' => $imagePath,
            ]
        ];

        echo json_encode($response);
    } catch (Throwable $e) {
        echo json_encode([
            'error' => true,
            'message' => $e->getMessage()
        ]);
    }
}



// notification

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

        $this->load->model('StudentModel');
        $student = $this->StudentModel->get($student_id);
        if (!$student) {
            echo json_encode(['error' => true, 'message' => 'Student not found']);
            return;
        }

        // ✅ Get notification counts using your existing model logic
        $notifications = [
            'messages'   => $this->StudentModel->loadRecentMessages($student_id),
            'assignments'=> $this->StudentModel->loadRecentAssignments($student_id, $student->Class),
            'exams'      => $this->StudentModel->loadRecentExams($student_id, $student->Class),
            'schoolPosts'=> $this->StudentModel->loadRecentSchoolPosts($student_id),
            'classPosts' => $this->StudentModel->loadRecentClassPosts($student_id, $student->Class),
            'events'     => $this->StudentModel->loadRecentEvents($student_id),
            'payments'   => $this->StudentModel->loadRecentPayments($student_id),
        ];

        echo json_encode(['error' => false, 'notifications' => $notifications]);
    } catch (Throwable $e) {
        echo json_encode(['error' => true, 'message' => $e->getMessage()]);
    }
}


// public function getNotifications()
// {
//     header('Content-Type: application/json');

//     $student_id = $this->input->post('student_id');

//     if (empty($student_id)) {
//         echo json_encode([
//             'error' => true,
//             'message' => 'Missing student_id'
//         ]);
//         return;
//     }

//     $this->load->model('StudentModel');
//     $student = $this->StudentModel->get($student_id);

//     if (!$student) {
//         echo json_encode([
//             'error' => true,
//             'message' => 'Student not found'
//         ]);
//         return;
//     }

//     $notifications = [
//         "messages" =>
//             count($this->StudentModel->loadRecentMessages($student_id)),

//         "assignments" =>
//             count($this->StudentModel->loadRecentAssignments($student_id, $student->Class)),

//         "exams" =>
//             count($this->StudentModel->loadRecentExams($student_id, $student->Class)),

//         "schoolPosts" =>
//             count($this->StudentModel->loadRecentSchoolPosts($student_id)),

//         "classPosts" =>
//             count($this->StudentModel->loadRecentClassPosts($student_id, $student->Class)),

//         "events" =>
//             count($this->StudentModel->loadRecentEvents($student_id)),

//         "payments" =>
//             count($this->StudentModel->loadRecentPayments($student_id))
//     ];

//     echo json_encode([
//         'error' => false,
//         'notifications' => $notifications
//     ]);
// }

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

    $this->load->model('StudentModel');
    $updated = $this->StudentModel->markNotificationAsRead($student_id, $type);

    if ($updated) {
        file_put_contents($debugPath, "✅ SUCCESS: Marked as read in DB.\n\n", FILE_APPEND);
        echo json_encode(['error' => false, 'message' => 'Notification marked as read']);
    } else {
        file_put_contents($debugPath, "❌ FAILED: Invalid notification type.\n\n", FILE_APPEND);
        echo json_encode(['error' => true, 'message' => 'Invalid notification type']);
    }
}


public function getAccounts() {
    $studentId = $this->input->post('student_id') ?? $_POST['student_id'];
    $accounts = $this->StudentModel->getAccounts($studentId);
    echo json_encode(["error" => false, "accounts" => $accounts]);
}

public function addAccount() {
     // Set timezone
    date_default_timezone_set('Asia/Kolkata');
    
    // Optional: turn on error reporting for debugging
   error_reporting(0);
ini_set('display_errors', 0);

    // Log incoming POST data
    file_put_contents('C:/wamp64/www/kkblossom/debug_add_account.txt', date('Y-m-d H:i:s') . " " . print_r($_POST, true) . "\n", FILE_APPEND);

   $currentId = $this->input->post('student_id') ?? $_POST['student_id'] ?? null;
$adm = $this->input->post('admission_number') ?? $_POST['admission_number'] ?? null;
$pass = $this->input->post('password') ?? $_POST['password'] ?? null;


    if(empty($currentId) || empty($adm) || empty($pass)) {
        echo json_encode(["error"=>true, "msg"=>"Missing data"]);
        return;
    }

    // Check login
    $student = $this->StudentModel->userLogin($adm, $pass);

    if($student) {

        // Now student contains FULL row including ID
        $otherId = $student->id;
     

        // Check if already added
        if($this->StudentModel->notAlreadyAdded($currentId, $otherId)) {

           // $student pura object hai jo userLogin se mila tha
$this->StudentModel->insertStudentAccount($currentId, $student);

            echo json_encode(["error"=>false, "msg"=>"Added"]);

        } else {
            echo json_encode(["error"=>true, "msg"=>"Account already added"]);
        }

    } else {
        echo json_encode(["error"=>true, "msg"=>"Invalid credentials"]);
    }
}


public function removeAccount() {
    $current = $this->input->post('student_id') ?? $_POST['student_id'];
    $other = $this->input->post('other_student_id') ?? $_POST['other_student_id'];
    $this->StudentModel->removeStudentAccount($current, $other);
    echo json_encode(["error"=>false]);
}

public function switchAccount() {
    $other = $this->input->post('other_student_id') ?? $_POST['other_student_id'];
    $info = $this->StudentModel->get($other);
    echo json_encode(["error"=>false, "new_id"=>$info->id]);
}

}

