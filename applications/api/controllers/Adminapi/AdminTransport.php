<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTransport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load Models
        $this->load->model('Adminapi/AdminTransportModel');

        // 🔥 IMPORTANT: Allow React to access API
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
    }

    // ✅ GET ALL ACTIVE ROUTES
    public function activeRoutes()
    {
        $routes = $this->AdminTransportModel->loadactiveroutes();

        if ($routes) {
            echo json_encode([
                "status" => "success",
                "data" => $routes
            ]);
        } else {
            echo json_encode([
                "status" => "empty",
                "data" => []
            ]);
        }
    }

    // ✅ GET ROUTE DETAILS
    public function activeRouteDetails($routeid)
    {
        $stations = $this->AdminStationModel->load($routeid);
        $passengers = $this->AdminTransportModel->load($routeid);

        echo json_encode([
            "status" => "success",
            "stations" => $stations,
            "passengers" => $passengers
        ]);
    }
     public function routes()
{
    $routes = $this->db->get('routes')->result();

    echo json_encode([
        "status" => true,
        "data" => $routes
    ]);
}
public function insertRoute()
{
    // 🔹 Read JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    // 🔹 Validate input
    if (
        !$data ||
        !isset($data['name']) || empty(trim($data['name'])) ||
        !isset($data['total']) || $data['total'] === ""
    ) {
        echo json_encode([
            "status" => false,
            "message" => "Route name and total passengers are required"
        ]);
        return;
    }

    // 🔹 Prepare data
    $insert = [
        'routename' => trim($data['name']),
        'Totalpassengers' => (int)$data['total']
    ];

    // 🔹 Insert into DB
    $response = $this->db->insert('routes', $insert);

    // 🔹 Response
    if ($response) {
        echo json_encode([
            "status" => true,
            "message" => "Route added successfully"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to insert route"
        ]);
    }
}
public function deleteRoute($id)
{
    $this->db->where('id', $id);
    $response = $this->db->delete('routes');

    echo json_encode([
        "status" => $response
    ]);
}
public function buses()
    {
        $data = $this->db->get('buses')->result();

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // 🔹 INSERT BUS (FROM REACT JSON)
    public function insertBus()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        // ✅ Validation
        if (
            !$input ||
            empty($input['name']) ||
            empty($input['model']) ||
            empty($input['regno']) ||
            empty($input['seats']) ||
            empty($input['capacity'])
        ) {
            echo json_encode([
                "status" => false,
                "message" => "All fields are required"
            ]);
            return;
        }

        // ✅ Prepare data
        $data = [
            "busname" => trim($input['name']),
            "model" => trim($input['model']),
            "regno" => trim($input['regno']),
            "seats" => (int)$input['seats'],
            "fueltankcapacity" => (int)$input['capacity']
        ];

        // ✅ Insert
        $insert = $this->db->insert('buses', $data);

        if ($insert) {
            echo json_encode([
                "status" => true,
                "message" => "Bus added successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed to add bus"
            ]);
        }
    }

    // 🔹 DELETE BUS
    public function deleteBus($id)
    {
        if (!$id) {
            echo json_encode([
                "status" => false,
                "message" => "Invalid ID"
            ]);
            return;
        }

        $this->db->where('id', $id);
        $delete = $this->db->delete('buses');

        echo json_encode([
            "status" => $delete
        ]);
    }

    // 🔹 GET SINGLE BUS (FOR EDIT)
    public function getBus($id)
    {
        $this->db->where('id', $id);
        $bus = $this->db->get('buses')->row();

        if ($bus) {
            echo json_encode([
                "status" => true,
                "data" => $bus
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Bus not found"
            ]);
        }
    }

    // 🔹 UPDATE BUS
    public function updateBus($id)
    {
        $input = json_decode(file_get_contents("php://input"), true);

        if (
            !$input ||
            empty($input['name']) ||
            empty($input['model']) ||
            empty($input['regno']) ||
            empty($input['seats']) ||
            empty($input['capacity'])
        ) {
            echo json_encode([
                "status" => false,
                "message" => "All fields are required"
            ]);
            return;
        }

        $data = [
            "busname" => trim($input['name']),
            "model" => trim($input['model']),
            "regno" => trim($input['regno']),
            "seats" => (int)$input['seats'],
            "fueltankcapacity" => (int)$input['capacity']
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('buses', $data);

        echo json_encode([
            "status" => $update
        ]);
    }
    public function getStations()
    {
        $data = $this->AdminTransportModel->getAll();

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    }

    // ✅ ADD STATION
    public function addStation()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $data = [
            "stationname" => $input['name'],
            "type"        => $input['type'],
            "charges"     => $input['charges'],
            "RouteId"     => $input['routeid'] ?? null
        ];

        $insert = $this->AdminTransportModel->insert($data);

        if ($insert) {
            echo json_encode([
                "status" => true,
                "message" => "Station added successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed to add station"
            ]);
        }
    }
public function getStudents()
{
    // Make sure you have a function in a model (like StudentModel) to fetch students
    $this->db->select('id, Rollno, Name, Class');
    $query = $this->db->get('student'); // Or whatever your table name is
    $students = $query->result();

    // CodeIgniter 3 JSON Response
    return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode([
            'status' => true,
            'data' => $students
        ]));
}
    // ✅ DELETE STATION
    public function deleteStation($id = null)
    {
        if (!$id) {
            echo json_encode([
                "status" => false,
                "message" => "ID required"
            ]);
            return;
        }

        $delete = $this->AdminTransportModel->delete($id);

        if ($delete) {
            echo json_encode([
                "status" => true,
                "message" => "Deleted successfully"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Delete failed"
            ]);
        }
    }

    // ✅ ADD PASSENGERS TO STATION
 public function addPassengers()
{
    // 1. Setup Headers for React (CORS)
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    // Handle Pre-flight OPTIONS request
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit;
    }

    // 2. Get and Decode JSON
    $json = file_get_contents("php://input");
    $input = json_decode($json, true);

    if (empty($input) || !isset($input['student_ids']) || !isset($input['station_id'])) {
        echo json_encode(["status" => false, "message" => "Invalid Input Data"]);
        return;
    }

    // 3. Call Model inside a try-catch or check result
    try {
        $ids = $input['student_ids'];
        $stationId = $input['station_id'];

        $result = $this->AdminTransportModel->insertPassenger($ids, $stationId);

        if ($result) {
            echo json_encode(["status" => true, "message" => "Added successfully"]);
        } else {
            echo json_encode(["status" => false, "message" => "Database insertion failed"]);
        }
    } catch (Exception $e) {
        // This will tell you exactly what went wrong instead of a generic 500
        echo json_encode(["status" => false, "message" => $e->getMessage()]);
    }
} public function getTransportStaff()
    {
        $staff = $this->AdminTransportModel->get();

        if ($staff) {
            echo json_encode($staff);
        } else {
            echo json_encode([]);
        }
    }

    // ✅ 2. Add Transport Staff
    public function addTransportStaff()
    {
        $config['upload_path']   = './assets/images/transport/';
        $config['allowed_types'] = 'gif|jpeg|png|jpg|JPG';
        $config['max_size']      = 10000;

        $this->load->library('upload', $config);

        $img = NULL;

        // ✅ Image Upload
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $img = $uploadData['file_name'];
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => $this->upload->display_errors()
                ]);
                return;
            }
        }

        // ✅ Collect Data
        $data = array(
            'drivername' => $this->input->post('name'),
            'Contact'    => $this->input->post('contact'),
            'Post'       => $this->input->post('post'),
            'Address'    => $this->input->post('address'),
            'busid'      => NULL,
            'routeId'    => NULL,
            'image'      => $img,
            'Email'      => $this->input->post('email')
        );

        $empdata = array(
            'empname' => $this->input->post('name'),
            'Post'    => $this->input->post('post')
        );

        $response = $this->AdminTransportModel->insertStaff($data, $empdata);

        if ($response) {
            echo json_encode([
                "status" => "success",
                "message" => "Added Successfully"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to add"
            ]);
        }
    }

    // ✅ 3. Delete Staff
    public function deleteTransportStaff($id = null)
    {
        if ($id == null) {
            echo json_encode([
                "status" => "error",
                "message" => "ID is required"
            ]);
            return;
        }

        $response = $this->AdminTransportModel->deleteStaff($id);

        if ($response) {
            echo json_encode([
                "status" => "success",
                "message" => "Deleted Successfully"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete"
            ]);
        }
    }
public function getTransportDetails($studentId = null)
{
    // ==========================================
    // GET STUDENT ID
    // Accept ID from:
    // 1. URL: getTransportDetails/10
    // 2. POST FormData
    // ==========================================

    if (empty($studentId)) {
        $studentId = $this->input->post('id');
    }

    // Also support GET parameter ?id=10
    if (empty($studentId)) {
        $studentId = $this->input->get('id');
    }

    if (empty($studentId) || !is_numeric($studentId)) {
        echo json_encode([
            'status' => false,
            'message' => 'Student ID is required.'
        ]);
        return;
    }


    // ==========================================
    // GET STUDENT DETAILS
    // ==========================================

    $studentQuery = $this->db->query(
        "SELECT * FROM student WHERE id = ?",
        array($studentId)
    );

    $student = $studentQuery->row();

    if (!$student) {
        echo json_encode([
            'status' => false,
            'message' => 'Student not found.'
        ]);
        return;
    }


    // ==========================================
    // GET TRANSPORT DETAILS
    // ==========================================

    $transportQuery = $this->db->query(
        "
        SELECT
            p.id AS passenger_id,
            p.Name AS passenger_name,
            p.Stationid,
            p.student_id,

            s.id AS station_id,
            s.stationname AS StationName,
            s.type,
            s.charges,

            r.id AS route_id,
            r.routename,
            r.Totalpassengers

        FROM student st

        LEFT JOIN passengers p
            ON p.id = st.Passengerid

        LEFT JOIN stations s
            ON s.id = p.Stationid

        LEFT JOIN routes r
            ON r.id = 1

        WHERE st.id = ?
        ",
        array($studentId)
    );

    $details = $transportQuery->result();


    // ==========================================
    // SUCCESS RESPONSE
    // ==========================================

    echo json_encode([
        'status' => true,
        'message' => 'Transport details fetched successfully.',
        'info' => $student,
        'details' => $details
    ]);
}
    // ✅ 4. Get Single Staff (for Edit)
    public function getSingleStaff($id = null)
    {
        if ($id == null) {
            echo json_encode([
                "status" => "error",
                "message" => "ID is required"
            ]);
            return;
        }

        $staff = $this->AdminTransportModel->getById($id);

        echo json_encode($staff);
    }

    // ✅ 5. Update Staff
    public function updateTransportStaff($id = null)
    {
        if ($id == null) {
            echo json_encode([
                "status" => "error",
                "message" => "ID is required"
            ]);
            return;
        }

        $config['upload_path']   = './assets/images/transport/';
        $config['allowed_types'] = 'gif|jpeg|png|jpg|JPG';

        $this->load->library('upload', $config);

        $img = $this->input->post('old_image');

        // ✅ Image Upload (Optional)
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $img = $uploadData['file_name'];
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => $this->upload->display_errors()
                ]);
                return;
            }
        }

        $data = array(
            'drivername' => $this->input->post('name'),
            'Contact'    => $this->input->post('contact'),
            'Post'       => $this->input->post('post'),
            'Address'    => $this->input->post('address'),
            'Email'      => $this->input->post('email'),
            'image'      => $img
        );

        $response = $this->AdminTransportModel->update($id, $data);

        if ($response) {
            echo json_encode([
                "status" => "success",
                "message" => "Updated Successfully"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to update"
            ]);
        }
    }
}