<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminReport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load database and models
        $this->load->database();
        $this->load->model('Adminapi/AdminExamModel');
        $this->load->model('Adminapi/AdminStudentModel');
        $this->load->model('Adminapi/AdminMetricsModel');

        // Force JSON response
        header('Content-Type: application/json');

        // ✅ CORS for React
        $allowedOrigin = "http://localhost:3000";
header("Access-Control-Allow-Origin: $allowedOrigin");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}


        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function customizedReportCard()
    {
        // ✅ Use POST for FormData
        $studentId = $_POST['id'] ?? null;

        if (!$studentId) {
            echo json_encode([
                "status" => false,
                "message" => "Student ID required"
            ]);
            return;
        }

        $student = $this->AdminStudentModel->getOne($studentId);

        if (!$student) {
            echo json_encode([
                "status" => false,
                "message" => "Student not found"
            ]);
            return;
        }

        $exams = $this->AdminExamModel->getAllExams($student->Class);

        // Prepare response data
        $data = [];
        $data['subjectsOrder'] = [
            'English','Hindi','Mathematics','Maths','Science',
            'Social Science','Sanskrit','EVS','A.I','Physics',
            'Chemistry','Biology','Accounts','Economics',
            'Political Science','History','Geography',
            'Computer','G.K','Drawing','I.P','P.Ed',
            'Business Studies','Legal Studies'
        ];

        $data['student']     = $student;
        $data['exams']       = $this->AdminExamModel->getTitle($exams);
        $data['subjects']    = $this->AdminExamModel->getSubjectsByStudent($student);
        $data['metrics']     = $this->AdminMetricsModel->getByStudentId($studentId);
        $data['metricsName'] = $this->AdminMetricsModel->getMetricsName($student);

        // Default remarks and result
        $data['remarks'] = '';
        $data['result']  = '';

        // Set remarks/result based on class
        switch ($student->Class) {
            case '1-A':
            case '1-B':
                $data['remarks'] = 'You have a strong foundation. Keep working hard.';
                $data['result']  = "Promoted to Class 2";
                break;

            case '2-A':
                $data['remarks'] = 'Your positive actions combined with positive thinking results in success.';
                $data['result']  = "Promoted to Class 3";
                break;

            case '3-A':
            case '3-B':
                $data['remarks'] = 'You have great potential. Continue improving.';
                $data['result']  = "Promoted to Class 4";
                break;

            case '4-A':
            case '4-B':
                $data['remarks'] = 'Wishing you success in the next academic level.';
                $data['result']  = "Promoted to Class 5";
                break;

            case '5-A':
            case '5-B':
                $data['remarks'] = 'Your dedication is building your bright future.';
                $data['result']  = "Promoted to Class 6";
                break;

            case '6-A':
            case '6-B':
                $data['remarks'] = 'Your dedication and efforts are the basis of your bright future.';
                $data['result']  = "Promoted to Class 7";
                break;

            case '7-A':
            case '7-B':
                $data['remarks'] = 'Continue striving for excellence.';
                $data['result']  = "Promoted to Class 8";
                break;

            case '8-A':
                $data['remarks'] = "Opportunities don't happen, you create them.";
                $data['result']  = "Promoted to Class 9";
                break;

            default:
                $data['remarks'] = "Keep progressing.";
                $data['result']  = "Promoted";
                break;
        }

        // ✅ Send JSON response
        echo json_encode([
            "status" => true,
            "data"   => $data
        ]);
    }
    public function reportCard()
{
    // Define subjects order
    $subjectsOrder = array(
        'English', 'Hindi', 'Mathematics', 'Maths', 'Science', 'Social Science', 
        'Sanskrit', 'EVS', 'A.I', 'Physics', 'Chemistry', 'Biology', 
        'Accounts', 'Economics', 'Political Science', 'History', 'Geography', 
        'Computer', 'G.K', 'Drawing', 'I.P', 'P.Ed', 'Business Studies', 'Legal Studies'
    );

    // Get student ID from POST request
    $studentId = $this->input->post('id');
    $student = $this->StudentModel->getOne($studentId);

    if (!$student) {
        // Return error if student not found
        echo json_encode([
            'status' => false,
            'message' => 'Student not found'
        ]);
        return;
    }

    // Get exams and marks
    $exams = $this->ExamModel->getAllExams($student->Class);
    $marks = $this->ExamModel->getTentativeMarksByStudent($student, $exams);
    $examTitles = $this->ExamModel->getTitle($exams);
    $subjects = $this->ExamModel->getSubjectsByStudent($student);

    // Get metrics
    $metrics = $this->MetricsModel->getByStudentId($studentId);
    $metricsName = $this->MetricsModel->getMetricsName($student);

    // Set remarks and result based on class
    $remarks = '';
    $result = '';
    switch ($student->Class) {
        case '1-A':
            $remarks = 'You have a solid foundation for success. Continue to work hard and believe in yourself.';
            $result = "Promoted to Class 2";
            break;
        case '1-B':
            $remarks = 'You are braver than you believe,stronger than you seem,and smarter than you think.';
            $result = "Promoted to Class 2";
            break;
        case '2-A':
            $remarks = 'Your positive actions combined with positive thinking results in success.';
            $result = "Promoted to Class 3";
            break;
        case '3-A':
        case '3-B':
            $remarks = 'You have great potential, work towards it.';
            $result = "Promoted to Class 4";
            break;
        case '4-A':
            $remarks = 'I know your future will be bright and I look forward to hear about your success. Wishing you all the best in life.';
            $result = "Promoted to Class 5";
            break;
        case '4-B':
            $remarks = 'I wish you the best for your next level of academic achievement may you find happiness in all your endeavours';
            $result = "Promoted to Class 5";
            break;
        case '5-A':
            $remarks = 'Every day is a new opportunity. Just believe in yourself and move forward.';
            $result = "Promoted to Class 6";
            break;
        case '5-B':
            $remarks = 'Your dedication and efforts are the basis of your bright future.';
            $result = "Promoted to Class 6";
            break;
        case '6-A':
            $remarks = 'Recognize your potential and put your best efforts to flourish in life.';
            $result = "Promoted to Class 7";
            break;
        case '6-B':
            $remarks = 'Believing in yourself is the first secret of success.';
            $result = "Promoted to Class 7";
            break;
        case '7-A':
            $remarks = 'Consistent efforts and hopeful attitude paves the way for future.';
            $result = "Promoted to Class 8";
            break;
        case '7-B':
            $remarks = 'A little progress each day adds upto big results.';
            $result = "Promoted to Class 8";
            break;
        case '8-A':
            $remarks = "Opportunities don't happen, you create them. All the Best.";
            $result = "Promoted to Class 9";
            break;
        default:
            $remarks = '';
            $result = '';
    }

    // Return JSON response for React
    echo json_encode([
        'status' => true,
        'data' => [
            'student' => $student,
            'subjectsOrder' => $subjectsOrder,
            'subjects' => $subjects,
            'marks' => $marks,
            'exams' => $examTitles,
            'metrics' => $metrics,
            'metricsName' => $metricsName,
            'remarks' => $remarks,
            'result' => $result
        ]
    ]);
}

}
