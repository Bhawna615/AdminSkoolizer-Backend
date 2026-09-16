<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'applications/school/controllers/phpqrcode/qrlib.php';

class AdminStudent extends CI_Controller {

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

        $this->load->model('Adminapi/AdminStudentModel');
        $this->load->model('Adminapi/AdminClassModel');
        $this->load->helper(['url', 'string']);
        $this->load->library(['form_validation', 'upload']);
        $this->output->enable_profiler(FALSE);
    }

    public function classes()
    {
        $data = $this->AdminClassModel->getAllClassesDetails();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
public function viewMany()
{
    try {
        $students = $this->AdminStudentModel->getInfoMany();

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                "status" => true,
                "data" => $students
            ]));

    } catch (Throwable $e) {
        return $this->output
            ->set_status_header(500)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                "status" => false,
                "error" => $e->getMessage()
            ]));
    }
}
public function display()
{
    $students = $this->AdminStudentModel->getAllStudents();

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => true,
            'data' => $students
        ]));
}
public function displayPassedOut()
{
    $students = $this->AdminStudentModel->getPassedOutStudents();

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => true,
            'data' => $students
        ]));
}

public function SponseredDisplay()
{
    $students = $this->AdminStudentModel->getSponsoredStudents();

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => true,
            'data' => $students
        ]));
}
    public function enroll()
    {
        try {

            // ===============================
            // VALIDATION
            // ===============================
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('class', 'Class', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required');

            if ($this->form_validation->run() === FALSE) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        "status" => false,
                        "errors" => $this->form_validation->error_array()
                    ]));
            }

            // ===============================
            // ENSURE DIRECTORIES EXIST
            // ===============================
            $imgPath = FCPATH . 'assets/images/students/';
            $qrPath  = FCPATH . 'assets/images/students/qrcode/';

            if (!is_dir($imgPath)) mkdir($imgPath, 0777, true);
            if (!is_dir($qrPath)) mkdir($qrPath, 0777, true);

            // ===============================
            // IMAGE UPLOAD
            // ===============================
            $img = null;
            if (!empty($_FILES['image']['name'])) {
                $config = [
                    'upload_path'   => $imgPath,
                    'allowed_types' => 'jpg|jpeg|png',
                    'max_size'      => 10000
                ];
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    throw new Exception($this->upload->display_errors('', ''));
                }
                $img = $this->upload->data('file_name');
            }

            // ===============================
            // SAFE DATES
            // ===============================
            $dob  = $this->input->post('dob');
            $adm  = $this->input->post('date_of_admission');

            $dob  = $dob ? date('Y-m-d', strtotime($dob)) : null;
            $adm  = $adm ? date('Y-m-d', strtotime($adm)) : null;

            // ===============================
            // QR CODE
            // ===============================
            $qr = random_string('alnum', 16);
            QRcode::png($qr, $qrPath . "$qr.png");

            // ===============================
            // DATA
            // ===============================
            $data = [
                'Name'            => $this->input->post('name'),
                'Class'           => $this->input->post('class'),
                'Fname'           => $this->input->post('fname'),
                'Mname'           => $this->input->post('mname'),
                'Guardianname'    => $this->input->post('gname'),
                'Contact'         => $this->input->post('contact'),
                'Admno'           => $this->input->post('admno'),
                'Smsno'           => $this->input->post('smsno'),
                'Rollno'          => $this->input->post('rollno'),
                'Aadharno'        => $this->input->post('aadharno'),
                'Dob'             => $dob,
                'admission_date'  => $adm,
                'gender'          => $this->input->post('gender'),
                'height'          => $this->input->post('height'),
                'weight'          => $this->input->post('weight'),
                'blood_group'     => $this->input->post('blood_group'),
                'image'           => $img,
                'qrcode'          => $qr,
                'password'        => password_hash(random_string('alnum', 8), PASSWORD_BCRYPT)
            ];

            if (!$this->AdminStudentModel->enroll($data)) {
                throw new Exception("Database insert failed");
            }

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => true,
                    "message" => "Admission Successful"
                ]));

        } catch (Throwable $e) {

            // 🔥 THIS WILL SHOW YOU THE REAL ERROR IN REACT
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => false,
                    "error"  => $e->getMessage()
                ]));
        }
    }
  public function filter($class)
{
    try {
        $students = $this->AdminStudentModel->getFilteredData($class);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => true,
                'data' => $students
            ]));

    } catch (Throwable $e) {
        return $this->output
            ->set_status_header(500)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => false,
                'error' => $e->getMessage()
            ]));
    }
}


public function listCreate()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $classes = $input['classes'] ?? [];
    $fields  = $input['fields'] ?? [];
    $admno_start = $input['admno_start'] ?? null;
    $admno_end   = $input['admno_end'] ?? null;

    $data = [];
    $data['fields'] = $fields;
    $data['students'] = [];

    if ($admno_start != null && $admno_end != null) {

        for ($i = 0; $i < count($classes); $i++) {
            $data['students'][$classes[$i]] =
                $this->AdminStudentModel->getByClassWithAscendingRollNoWithRange(
                    $classes[$i],
                    $admno_start,
                    $admno_end
                );
        }

    } else {

        for ($i = 0; $i < count($classes); $i++) {
            $data['students'][$classes[$i]] =
                $this->AdminStudentModel->getByClassWithAscendingRollNo(
                    $classes[$i]
                );
        }
    }

    echo json_encode([
        'status' => true,
        'data' => $data
    ]);
}



public function examReport()
{
    // Accept BOTH GET and POST
    $student_id = $this->input->post('student_id');
    
    if (!$student_id) {
        $student_id = $this->input->get('student_id');
    }

    if (!$student_id) {
        echo json_encode([
            "status" => false,
            "message" => "Missing parameters"
        ]);
        return;
    }

    $this->load->model('AdminStudentModel');

    $data['student'] = $this->AdminStudentModel->getInfo($student_id);
    $data['report']  = $this->AdminStudentModel->getExamReportByStudent($student_id);
    $data['metrics'] = $this->AdminStudentModel->getByStudentId($student_id);

    echo json_encode([
        "status" => true,
        "data"   => $data
    ]);
}
public function getOne($id)
	{
		return $this->db
			->where('id', $id)
			->get('student')
			->row();
	}
  public function generateTc()
{
    try {

        // ===============================
        // 1️⃣ GET STUDENT ID
        // ===============================
        $input = json_decode(file_get_contents("php://input"), true);
$id = $this->input->post('id') ?? $input['id'] ?? null;

        if (!$id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Student ID is required'
                ]));
        }

        // ===============================
        // 2️⃣ CHECK IF STUDENT EXISTS
        // ===============================
        $studentInfo = $this->AdminStudentModel->getTcById($id);

        if (!$studentInfo) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Student not found'
                ]));
        }

        // ===============================
        // 3️⃣ PREPARE TC DATA
        // ===============================
        $tcDetails = [
            'name'              => $this->input->post('name'),
            'father_name'       => $this->input->post('father_name'),
            'mother_name'       => $this->input->post('mother_name'),
            'last_class'        => $this->input->post('last_class'),
            'roll_no'           => $this->input->post('roll_no'),
            'nationality'       => $this->input->post('nationality'),
            'category'          => $this->input->post('category'),
            'last_school'       => $this->input->post('last_school'),
            'date_of_admission' => $this->input->post('admission_date'),
            'last_class'   => $this->input->post('last_class'),
            'admission_number'  => $this->input->post('admission_number'),
            'date_of_birth'     => $this->input->post('date_of_birth'),
            'failed_mark'       => $this->input->post('failed_mark'),
            'fee_concession'    => $this->input->post('fee_concession'),
            'working_days'      => $this->input->post('total_days'),
            'present_days'      => $this->input->post('present_days'),
            'subjects_studied'  => $this->input->post('subjects'),
            'qualified_mark'    => $this->input->post('qualified_mark'),
            'dues_date'         => $this->input->post('dues_date'),
            'application_date'  => $this->input->post('application_date'),
            'issue_date'        => $this->input->post('issue_date'),
            'reason'            => $this->input->post('reason'),
            'ncc'               => $this->input->post('ncc'),
            'games_played'      => $this->input->post('games_played'),
            'general_conduct'   => $this->input->post('general_conduct'),
            'remarks'           => $this->input->post('remarks'),
            'student_id'        => $id,
            'session'           => $this->input->post('session')
        ];

        // ===============================
        // 4️⃣ INSERT INTO TRANSFERRED TABLE
        // ===============================
        $inserted = $this->AdminStudentModel->insertTransferredStudent($tcDetails);

        if (!$inserted) {
            throw new Exception("Failed to insert TC data");
        }

        // ===============================
        // 5️⃣ DELETE ORIGINAL STUDENT
        // ===============================
        $this->AdminStudentModel->deleteStudent($id);

        // ===============================
        // 6️⃣ SUCCESS RESPONSE
        // ===============================
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => true,
                'message' => 'Transfer Certificate generated successfully',
                'details' => $tcDetails,
                'student' => $studentInfo
            ]));

    } catch (Throwable $e) {

        return $this->output
            ->set_status_header(500)
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => false,
                'error'  => $e->getMessage()
            ]));
    }
}



// Get all transferred students
    public function displayTransferredStudents() {
        $students = $this->AdminStudentModel->getTransferredStudents();
        echo json_encode(['students' => $students]);
    }

    // Get single student for view
  public function viewTc($id = null)
{
    if (!$id) {
        echo json_encode([
            'status' => false,
            'message' => 'Student ID required'
        ]);
        return;
    }

    $student = $this->AdminStudentModel->getTransferredStudentData($id);

    if ($student && count($student) > 0) {
        echo json_encode([
            'status' => true,
            'details' => $student[0]   // ✅ Return single object
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'No TC found'
        ]);
    }
}

    // Get single student for edit
    public function editTc() {
        $id = $this->input->post('id');
        $student = $this->AdminStudentModel->getTransferredStudentData($id);
        echo json_encode(['student' => $student]);
    }

    // Update student TC details
  
public function updateTc()
{
    // Always return JSON
    header('Content-Type: application/json; charset=utf-8');

    // Do NOT display PHP warnings/errors in API response
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING);
    ini_set('display_errors', 0);

    try {

        $raw = file_get_contents("php://input");

        if (!$raw) {
            echo json_encode([
                'status' => false,
                'message' => 'No data received'
            ]);
            return;
        }

        $data = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode([
                'status' => false,
                'message' => 'Invalid JSON: ' . json_last_error_msg()
            ]);
            return;
        }

        $id = $data['id'] ?? null;

        if (!$id) {
            echo json_encode([
                'status' => false,
                'message' => 'ID missing'
            ]);
            return;
        }

        // Copy all submitted fields
        $tcDetails = $data;

        // ID should not be updated
        unset($tcDetails['id']);

        // Update timestamp
        $tcDetails['updated_at'] = date('Y-m-d H:i:s');

        // Update database
        $updated = $this->AdminStudentModel
                       ->updateTransferredStudent(
                           $tcDetails,
                           $id
                       );

        if ($updated) {

            echo json_encode([
                'status' => true,
                'message' => 'Updated Successfully'
            ]);

        } else {

            echo json_encode([
                'status' => false,
                'message' => 'Update Failed'
            ]);
        }

    } catch (Exception $e) {

        // Log the real error instead of displaying it
        log_message(
            'error',
            'TC Update Error: ' . $e->getMessage()
        );

        echo json_encode([
            'status' => false,
            'message' => 'Unable to update Transfer Certificate.'
        ]);
    }
}

public function generateCharacterCertificate()
{
    header('Content-Type: application/json');

    try {

        // ✅ Read RAW JSON input (for axios JSON requests)
        $rawInput = file_get_contents("php://input");
        $jsonData = json_decode($rawInput, true);

        // ✅ Support BOTH JSON and FormData
        $id = $this->input->post('student_id') 
              ?? $this->input->post('id') 
              ?? $jsonData['student_id'] 
              ?? $jsonData['id'] 
              ?? null;

        $admission_date = $this->input->post('admission_date') 
                          ?? $jsonData['admission_date'] 
                          ?? null;

        $graduation_date = $this->input->post('graduation_date') 
                           ?? $jsonData['graduation_date'] 
                           ?? null;

        // ✅ Check Student ID
        if (empty($id)) {
            echo json_encode([
                'status' => false,
                'message' => 'Student ID is required'
            ]);
            return;
        }

        // ✅ Get student from database
        $student = $this->AdminStudentModel->getInfo($id);

        if (!$student) {
            echo json_encode([
                'status' => false,
                'message' => 'Student not found'
            ]);
            return;
        }

        // ✅ Prepare certificate data
        $characterCertificate = array(
            'student_id'     => $student->id,
            'name'           => $student->Name,
            'class'          => $student->Class,
            'roll_no'        => $student->Rollno,
            'father_name'    => $student->Fname,
            'mother_name'    => $student->Mname,
            'admission_no'   => $student->Admno,
            'admission_date' => $admission_date,
            'graduation_date'=> $graduation_date,
            'timestamp'     => date('Y-m-d H:i:s')
        );

        // ✅ Insert into DB
        $insert = $this->AdminStudentModel->insertCharacterCertificate($characterCertificate);

        if ($insert) {
            echo json_encode([
                'status' => true,
                'message' => 'Certificate generated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Failed to generate certificate'
            ]);
        }

    } catch (Throwable $e) {

        echo json_encode([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
}
public function displayCharacterCertificates()
{
    header('Content-Type: application/json');

    $certificates = $this->AdminStudentModel->getAllCharacterCertificates();

    echo json_encode($certificates);
}
public function openCharacterCertificate()
{
    header('Content-Type: application/json');

    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode([
            'status' => false,
            'message' => 'Certificate ID required'
        ]);
        return;
    }

    $certificate = $this->AdminStudentModel->getCharacterCertificate($id);

    if ($certificate) {
        echo json_encode($certificate);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Certificate not found'
        ]);
    }
}
public function getTransportDetails($id)
{
    // Get Passenger ID from student
    $query = $this->db->query(
        'SELECT Passengerid FROM student WHERE id = ?',
        array($id)
    );

    $student = $query->row();

    if (!$student || empty($student->Passengerid)) {
        return false;
    }

    $pid = $student->Passengerid;

    // Get Route ID and Station ID from passengers
    $query = $this->db->query(
        'SELECT Routeid, Stationid FROM passengers WHERE id = ?',
        array($pid)
    );

    $passenger = $query->row();

    if (!$passenger) {
        return false;
    }

    $routeid  = $passenger->Routeid;
    $stationid = $passenger->Stationid;

    // Get route + station details
    $sql = '
        SELECT
            routes.id AS route_id,
            routes.routename,
            routes.Totalpassengers,
            stations.id AS station_id,
            stations.StationName
        FROM routes
        LEFT JOIN stations
            ON routes.id = stations.RouteId
        WHERE routes.id = ?
        AND stations.id = ?
    ';

    $query = $this->db->query(
        $sql,
        array($routeid, $stationid)
    );

    return $query->result();
}
public function getExamDetails()
{
    header('Content-Type: application/json');

    $id = $this->input->post('id');

    // ✅ Validate Student ID
    if (empty($id) || !is_numeric($id)) {
        echo json_encode([
            "status"  => false,
            "message" => "Student ID missing or invalid"
        ]);
        return;
    }

    $this->load->model('Adminapi/AdminStudentModel');
    $this->load->model('Adminapi/AdminExamModel');

    $info  = $this->AdminStudentModel->getInfo($id);
    $exams = $this->AdminExamModel->load($id);

    // ✅ If student not found
    if (empty($info)) {
        echo json_encode([
            "status"  => false,
            "message" => "No student found"
        ]);
        return;
    }

    // If info is array → take first row
    $studentData = is_array($info) ? $info[0] : $info;

    // ✅ Clean & Format Exam Data
    $cleanExams = [];

    if (!empty($exams)) {
        foreach ($exams as $exam) {

            // ----- Safe Exam Name -----
            $examName = (!empty($exam->Examname) && strtolower($exam->Examname) != 'na')
                ? $exam->Examname
                : "N/A";

            // ----- Safe Subject -----
            $subject = (!empty($exam->Subject) && strtolower($exam->Subject) != 'na')
                ? $exam->Subject
                : "N/A";

            // ----- Safe Date (send raw YYYY-MM-DD or datetime) -----
            $date = (!empty($exam->Date) && strtolower($exam->Date) != 'na' && $exam->Date != "0000-00-00" && $exam->Date != "0000-00-00 00:00:00")
                ? $exam->Date
                : null;

            // Push cleaned data
            $cleanExams[] = [
                "Examname" => $examName,
                "Subject"  => $subject,
                "Date"     => $date // raw date, format in React
            ];
        }
    }

    // ✅ Final JSON Response
    echo json_encode([
        "status" => true,
        "info"   => $studentData,
        "exams"  => $cleanExams
    ]);
}
public function get($id)
{
    $student = $this->AdminStudentModel->getInfo($id);

    echo json_encode([
        "status" => "success",
        "student" => $student
    ]);
}

    // POST /api/student/credentials - Create credentials
    public function createCredentials() {
        $studentId = $this->input->post('id');
        $student = $this->AdminStudentModel->get($studentId);
        if ($student) {
            echo json_encode(['success' => true, 'student' => $student]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Student not found']);
        }
    }

    // POST /api/student/storeCredentials - Store password
    public function view($id)
{
    header('Content-Type: application/json');

    $student = $this->AdminStudentModel->getInfo($id);

    if ($student) {
        echo json_encode($student);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Student not found"]);
    }
}

    // ✅ Store / Update Credentials
    public function storeCredentials()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $studentId = $input['id'];
        $password = $input['password'];

        if (empty($password)) {
            echo json_encode([
                "status" => false,
                "message" => "Password required"
            ]);
            return;
        }

        $data = [
            "Password" => password_hash($password, PASSWORD_BCRYPT)
        ];

        $updated = $this->AdminStudentModel->updateCredentials($data, $studentId);

        if ($updated) {
            echo json_encode([
                "status" => true,
                "message" => "Credentials generated successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed to generate credentials"
            ]);
        }
    }

    // GET /api/student/edit/{id} - Get student info + classes for editing
    public function edit($id)
{
    header('Content-Type: application/json');

    $student = $this->AdminStudentModel->getInfo($id);
    $classes = $this->AdminClassModel->getAllClassesDetails();

    echo json_encode([
        "status" => true,
        "student" => $student,
        "classes" => $classes
    ]);
}

    // PUT /api/student/update/{id} - Update student info
   public function update()
{
    header('Content-Type: application/json');

    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode(["status" => false, "message" => "Student ID missing"]);
        return;
    }

    $img = null;

    // ✅ SAFE IMAGE CHECK (FIXED)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $config['upload_path'] = './assets/images/students/';
        $config['allowed_types'] = 'gif|jpeg|png|jpg|JPG';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $img = $uploadData['file_name'];
        }
    }

    $data = array(
        'Name' => $this->input->post('name'),
        'Class' => $this->input->post('class'),
        'Fname' => $this->input->post('fname'),
        'Mname' => $this->input->post('mname'),
        'Guardianname' => $this->input->post('gname'),
        'Contact' => $this->input->post('contact'),
        'Admno' => $this->input->post('admno'),
        'Smsno' => $this->input->post('smsno'),
        'Rollno' => $this->input->post('rollno'),
        'Aadharno' => $this->input->post('aadharno'),
        'Dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
        'Lastschool' => $this->input->post('lastschool'),
        'Address' => $this->input->post('address'),
        'admission_date' => date("Y-m-d", strtotime($this->input->post('date_of_admission'))),
        'gender' => $this->input->post('gender'),
        'height' => $this->input->post('height'),
        'weight' => $this->input->post('weight'),
        'blood_group' => $this->input->post('blood_group'),
        'tuition_fee' => $this->input->post('tuition_fee'),
        'annual_fee' => $this->input->post('annual_fee'),
        'admission_fee' => $this->input->post('admission_fee'),
        'transport_fee' => $this->input->post('transport_fee'),
    );

    if ($img) {
        $data['image'] = $img;
    }

    $response = $this->AdminStudentModel->update($data, $id);

    if ($response) {
        echo json_encode(["status" => true, "message" => "Updated Successfully"]);
    } else {
        echo json_encode(["status" => false, "message" => "Update Failed"]);
    }
}

  public function delete($id)
{
    if (empty($id)) {
        echo json_encode([
            "status" => false,
            "message" => "Invalid Student ID"
        ]);
        return;
    }

    $response = $this->AdminStudentModel->delete($id);

    if ($response) {
        echo json_encode([
            "status" => true,
            "message" => "Student Deleted Successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to delete student"
        ]);
    }
}
public function displayLeaveRequests()
{
    header('Content-Type: application/json');

    $leaveRequests = $this->AdminStudentModel->getLeaveRequests();

    if ($leaveRequests) {
        echo json_encode([
            "status" => true,
            "data" => $leaveRequests
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "No Leave Requests Found"
        ]);
    }
}
public function approveLeaveRequest($requestId)
{
    header('Content-Type: application/json');

    if (!$requestId) {
        echo json_encode([
            "status" => false,
            "message" => "Request ID missing"
        ]);
        return;
    }

    $response = $this->AdminStudentModel->approveLeaveRequest($requestId);

    if ($response) {
        echo json_encode([
            "status" => true,
            "message" => "Leave Request Approved"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to approve leave request"
        ]);
    }
}


}
