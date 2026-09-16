<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminExam extends CI_Controller {

   public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->model('Adminapi/AdminExamModel');
    $this->load->model('Adminapi/AdminStudentModel'); // add this
    $this->load->model('Adminapi/AdminMetricsModel'); // add this


    $this->load->library('form_validation');
    $this->load->library('session');
    // JSON output
    $this->output->set_content_type('application/json');

    $allowedOrigin = "http://localhost:3000"; 
    header("Access-Control-Allow-Origin: $allowedOrigin");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

public function getClasses()
{
    $data = $this->AdminExamModel->getAll();
    echo json_encode($data);
}
public function reportCard()
{
    $studentId = $this->input->post('id');

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

    $remarks = '';
    $result = '';

    switch ($student->Class) {
        case '1-A':
            $remarks = 'You have a solid foundation for success. Continue to work hard and believe in yourself.';
            $result = "Promoted to Class 2";
            break;

        case '1-B':
            $remarks = 'You are braver than you believe, stronger than you seem, and smarter than you think.';
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
    }

    $response = [
        "status" => true,
        "student" => $student,
        "marks" => $this->AdminExamModel->getTentativeMarksByStudent($student, $exams),
        "exams" => $this->AdminExamModel->getTitle($exams),
        "subjects" => $this->AdminExamModel->getSubjectsByStudent($student),
        "metrics" => $this->AdminMetricsModel->getByStudentId($studentId),
        "metricsName" => $this->AdminMetricsModel->getMetricsName($student),
        "remarks" => $remarks,
        "result" => $result
    ];

    echo json_encode($response);
}

 public function getMarksForm() {
        $class = $this->input->post('class');
        $code = $this->input->post('code');
        $examType = $this->input->post('examType');

        $students = $this->marksForm($class);
        $exam = $this->getOne($code);

        echo json_encode([
            'students' => $students,
            'exam' => $exam,
            'examType' => $examType
        ]);
    }
    public function getExam($id) {
        $exam = $this->AdminExamModel->getOne($id);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($exam));
    }

 public function getExamTypes() {
    $data = $this->AdminExamModel->getAllExamTypes();

    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
}
public function updateExamTeacher()
{
    $examId = $_POST['examId'];
    $teacherId = $_POST['teacherId'];

    $this->db->where('id', $examId);
    $res = $this->db->update('exam', ['teacher_id' => $teacherId]);

    echo json_encode(["status" => $res]);
}
public function getExams()
{
    
    $class = $_POST['class'] ?? null;
   $examType = $_POST['examType'] ?? null;

    $data = [
        "exams" => $this->AdminExamModel->getexams($class, $examType),
        "teachers" => $this->AdminExamModel->getteachers($class)
    ];

    echo json_encode($data);
}
    // ✅ Upload marks (called from React)
    public function uploadMarks() {
        $marks = [
            'roll_no'   => $this->input->post('rollno'),
            'name'      => $this->input->post('name'),
            'exam_code' => $this->input->post('code'),
            'marks'     => $this->input->post('marks'),
            'id'        => $this->input->post('id')
        ];

        $status = $this->AdminExamModel->uploadMarks($marks);

        if ($status) {
            echo json_encode(['status' => true, 'message' => 'Successfully Uploaded']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to Upload']);
        }
    }

    // ✅ Get a single exam info
    public function getOne($id) {
        return $this->AdminExamModel->getOne($id);
    }

    // ✅ Get students of a class
    public function marksForm($class) {
        return $this->AdminExamModel->marksForm($class);
    }
 // Load results for a given exam
    public function loadResult($examCode) {
        $result = $this->AdminExamModel->loadResult($examCode);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    // Save/update marks for an exam
    public function saveMarks() {
        $marks = array(
            'roll_no' => $this->input->post('rollno'),
            'name' => $this->input->post('name'),
            'exam_code' => $this->input->post('code'),
            'marks' => $this->input->post('marks')
        );

        $examCode = $this->input->post('code');

        if ($this->AdminExamModel->updateMarks($marks, $examCode)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'message' => 'Successfully Uploaded']));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Failed to Upload']));
        }
    }
    public function deleteExam()
{
    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode([
            "status" => false,
            "message" => "Invalid ID"
        ]);
        return;
    }

    $response = $this->AdminExamModel->delete($id);

    if ($response) {
        echo json_encode([
            "status" => true,
            "message" => "Deleted Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to Delete"
        ]);
    }
}
public function viewResult()
{
    // ✅ Get exam ID from POST
    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode([
            'status' => false,
            'message' => 'Exam ID missing'
        ]);
        return;
    }

    // ✅ Fetch data from model
    $result = $this->AdminExamModel->loadresult($id);
    $details = $this->AdminExamModel->getOne($id);

    // ✅ Return JSON (IMPORTANT for React)
    echo json_encode([
        'status'  => true,
        'result'  => $result,
        'details' => $details
    ]);
}
  
    // ================= QUIZ APIs =================

    // ✅ Get all quizzes
    public function quizList()
    {
        $data = $this->AdminExamModel->get();
        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // ✅ Get all classes (for dropdown)
    public function classList()
    {
        $data = $this->AdminExamModel->getAll();
        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // ✅ Insert quiz
   // ✅ Insert quiz
public function quizInsert()
{
    $name = $this->input->post('name');
    $class = $this->input->post('class');
    $date = $this->input->post('date');

    // Validate fields
    if (empty($name) || empty($class) || empty($date)) {
        echo json_encode([
            "status" => false,
            "message" => "Name, class and expiry date are required",
            "received" => [
                "name" => $name,
                "class" => $class,
                "date" => $date
            ]
        ]);
        return;
    }

    $data = [
        "name" => $name,
        "class" => $class,
        "expiry_date" => $date,
        "created_at" => date("Y-m-d H:i:s")
    ];

    // Insert quiz
    $result = $this->AdminExamModel->insert($data);

    if ($result) {
        echo json_encode([
            "status" => true,
            "message" => "Quiz Added Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to insert quiz",
            "db_error" => $this->db->error()
        ]);
    }
}

    // ✅ Delete quiz
    public function quizDelete($id)
    {
        if ($this->AdminExamModel->deleteQuiz($id)) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    // ================= QUIZ QUESTION APIs =================

    // ✅ Get questions by quizId
    public function quizQuestionList($quizId)
    {
        $data = $this->AdminExamModel->getQuestioQuiz($quizId);

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // ✅ Insert question
    public function quizQuestionInsert()
{
    $input = json_decode(file_get_contents("php://input"), true);

    // ✅ DEBUG (optional)
    // print_r($input); exit;

    if (
        empty($input['question']) ||
        empty($input['options']) ||
        empty($input['correct_option']) ||
        empty($input['quiz_id'])
    ) {
        echo json_encode([
            "status" => false,
            "message" => "All fields are required"
        ]);
        return;
    }

    $data = [
        "question" => $input['question'],
        "options" => $input['options'],
        "correct_option" => $input['correct_option'],
        "quiz_id" => $input['quiz_id'],
        "created_at" => date("Y-m-d H:i:s")
    ];

    if ($this->AdminExamModel->insertQuestionQuiz($data)) {
        echo json_encode(["status" => true, "message" => "Added"]);
    } else {
        echo json_encode(["status" => false, "message" => "Failed"]);
    }
}

    // ✅ Get single question (for edit)
    public function quizQuestionGet($id)
    {
        $data = $this->AdminExamModel->loadQuestioQuiz($id);

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // ✅ Update question
    public function quizQuestionUpdate()
{
    header('Content-Type: application/json');

    $input = json_decode(file_get_contents("php://input"), true);

    if (
        empty($input['id']) ||
        !isset($input['question']) ||
        !isset($input['options']) ||
        !isset($input['correct_option'])
    ) {
        echo json_encode([
            "status" => false,
            "message" => "Required data missing",
            "received_data" => $input
        ]);
        return;
    }

    $updatedQuestion = [
        "question" => $input['question'],
        "options" => $input['options'],
        "correct_option" => $input['correct_option']
    ];

    $updated = $this->AdminExamModel->updateQuestioQuiz(
        $updatedQuestion,
        $input['id']
    );

    if ($updated) {
        echo json_encode([
            "status" => true,
            "message" => "Question Updated Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to Update Question"
        ]);
    }
}

    // ✅ Delete question
   public function quizQuestionDelete($quizId)
{
    if ($this->AdminExamModel->deleteQuestioQuiz($quizId)) {
        echo json_encode([
            "status" => true,
            "message" => "Deleted Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Delete Failed"
        ]);
    }
}
 public function display()
{
    $data = $this->AdminExamModel->getQuestionPapers();
    echo json_encode($data);
}

public function filter($year, $month, $class)
{
    $data = $this->AdminExamModel->getFilteredData($year, $month, $class);
    echo json_encode($data);
}
 // ✅ Get all questions
    public function getQuestions()
    {
        $data = $this->AdminExamModel->getQuestions();
        echo json_encode($data);
    }

    // ✅ Filter questions
    public function getFilteredQuestions($class, $subject)
    {
        $data = $this->AdminExamModel->getFilteredQuestions($class, $subject);
        echo json_encode($data);
    }

    // =========================
    // SUBJECTS
    // =========================

    public function getSubjectsByClass($class)
{
    $subjects = $this->AdminExamModel->getSubjectsByClass($class);
    echo json_encode($subjects);
}

    // =========================
    // QUESTION PAPER
    // =========================

    // ✅ Create Question Paper
     public function createQuestionPaper() {

        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input) {
            echo json_encode(["status" => "error", "message" => "No data received"]);
            return;
        }

        $data = [
            'exam'        => $input['exam'],
            'subject'     => $input['subject'],
            'class'       => $input['class'],
            'duration'    => $input['duration'],
            'max_marks'   => $input['max_marks'],
            'questions_id'=> implode(",", $input['questions'])
        ];

        $insert = $this->AdminExamModel->createQuestionPaper($data);

        if ($insert) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    // ✅ Delete Question Paper (optional)
    public function deleteQuestionPaper($id)
    {
        $result = $this->AdminExamModel->deleteQuestionPaper($id);

        if ($result) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    // =========================
    // OPTIONAL (FUTURE USE)
    // =========================

    // ✅ Get all question papers
    public function getQuestionPapers()
    {
        $data = $this->AdminExamModel->getQuestionPapers();
        echo json_encode($data);
    }
public function classes()
{
    $data = $this->AdminExamModel->getClasses();
    echo json_encode($data);
}
    // ✅ Get one paper with questions
    public function getQuestionPaperDetails($id)
    {
        $paper = $this->AdminExamModel->getQuestionPaperById($id);
        $questions = $this->AdminExamModel->getQuestionsByPaper($id);

        echo json_encode([
            "paper" => $paper,
            "questions" => $questions
        ]);
    }
   
    public function getClassAndExamTypes()
    {
        $this->load->model('AdminExamModel');

        $data['examTypes'] = $this->AdminExamModel->getAllExamTypes();
        $data['classes'] = $this->AdminExamModel->getAll();

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    public function generateClassWiseReport()
    {
        $this->load->model('AdminExamModel');

        $subjectsOrder = array(
            'English','Hindi','Mathematics','Science','Social Science','Sanskrit',
            'EVS','A.I','Physics','Chemistry','Biology','Accounts','Economics',
            'Political Science','History','Geography','Legal Studies','Computer',
            'G.K','Drawing','I.P','P.Ed','I.P/P.Ed'
        );

        $class = $this->input->post('class');
        $exam = $this->input->post('exam');

        $students = $this->AdminExamModel->getByClassWithAscendingRollNo($class);
        $exams = $this->AdminExamModel->getFilteredExams($class, $exam);
        $results = $this->AdminExamModel->getResults();

        echo json_encode([
            "status" => true,
            "data" => [
                "students" => $students,
                "exams" => $exams,
                "results" => $results,
                "subjectsOrder" => $subjectsOrder,
                "class" => $class,
                "exam" => $exam
            ]
        ]);
    }
 public function getClassWiseMetrics($class = null)
{
    if (!$class) {
        $class = $this->input->get('class');
    }

    $metrics = $this->AdminExamModel->getByClass($class);
    $students = $this->AdminExamModel->getByClasses($class);

    $studentMetrics = [];

    foreach ($students as $student) {
        $studentMetrics[$student->id] = $this->AdminExamModel->getStudentMetric($student->id);
    }

    echo json_encode([
        "metrics" => $metrics,
        "students" => $students,
        "studentMetrics" => $studentMetrics
    ]);
}
public function getCustomReportCard($studentId = null)
{
    if (!$studentId) {
        $studentId = $this->input->get('studentId');
    }

    $student = $this->AdminExamModel->getStudent($studentId);
    $subjects = $this->AdminExamModel->getSubjects($student->Class);
    $metrics = $this->AdminExamModel->getStudentMetrics($studentId);

    echo json_encode([
        "student" => $student,
        "subjects" => $subjects,
        "metrics" => $metrics
    ]);
}
public function getExamDetails()
{
    $class = $this->input->post('class');

    if (empty($class)) {
        echo json_encode([
            "status" => false,
            "message" => "Class missing"
        ]);
        return;
    }

    $data = [
        "status" => true,
        "subjects" => $this->AdminExamModel->getsubjects($class),
        "teachers" => $this->AdminExamModel->getteachers($class)
    ];

    echo json_encode($data);
}
public function submitExam()
{
    $subject = $this->AdminExamModel->getById($this->input->post('subject'));

    $data = array(
        'Examname' => $_POST['topic'],
        'Subject' => $subject->Subjectname,
        'Examtype' => $_POST['type'],
        'teacher_id'=> $subject->TeacherId,
        'Class' => $_POST['class'],
        'Maxmarks' => $_POST['marks'],
        'Date' => $_POST['date'],
        

    );

    $response = $this->AdminExamModel->submit($data);

    echo json_encode(["status" => $response]);
}

public function saveResult()
{
    $id = $this->input->post('id');

    // Check exam ID
    if (empty($id)) {
        echo json_encode([
            'status'  => false,
            'message' => 'Exam ID is required'
        ]);
        return;
    }

    // Check whether exam exists
    $exam = $this->AdminExamModel->getOne($id);

    if (!$exam) {
        echo json_encode([
            'status'  => false,
            'message' => 'Exam not found'
        ]);
        return;
    }

    // Load uploaded marks from marks table
    $result = $this->AdminExamModel->loadSavedResult($id);

    if (empty($result)) {
        echo json_encode([
            'status'  => false,
            'message' => 'No uploaded result found for this exam',
            'exam_id' => $id
        ]);
        return;
    }

    // Save each student's result into exam table
    foreach ($result as $row) {

        $marksRow = [
            'Rollno'        => $row->Rollno,
            'Name'          => $row->Name,
            'student_id'    => $row->student_id,
            'Examcode'      => $row->Examcode,
            'Marksobtained' => $row->Marksobtained,
            'uploaded_by'   => $this->session->userdata('username')
        ];

        $saveResult = $this->AdminExamModel->save($marksRow);

if (!$saveResult) {
    echo json_encode([
        'status'  => false,
        'message' => 'Failed to save result',
        'db_error' => $this->db->error(),
        'data' => $marksRow
    ]);
    return;
}
    }

    // IMPORTANT: use $id, NOT $examId
    $response = $this->AdminExamModel->updateSavedStatus($id);

    if ($response) {

        echo json_encode([
            'status'  => true,
            'message' => 'Result saved successfully',
            'exam_id' => $id,
            'count'   => count($result)
        ]);

    } else {

        echo json_encode([
            'status'  => false,
            'message' => 'Result saved but exam status could not be updated'
        ]);
    }
}

}
