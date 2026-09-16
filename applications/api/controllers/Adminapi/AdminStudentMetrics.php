<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentMetrics extends CI_Controller {

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

		$this->load->model('Adminapi/AdminClassModel');   
		$this->load->model('Adminapi/AdminStudentModel');
		$this->load->model('Adminapi/AdminStudentMetricsModel');
        $this->load->helper(['url', 'string']);

		
	}

	// 🔹 GET classes
	public function getAllClasses()
	{
		echo json_encode($this->AdminClassModel->getAll());
	}

	// 🔹 GET all students
	public function display()
	{
		echo json_encode($this->AdminStudentMetricsModel->getInfoMany());
	}

	// 🔹 GET filtered students
	public function filter($class)
	{
		echo json_encode($this->AdminStudentMetricsModel->getFilteredData($class));
	}


    // 🔹 GET ALL METRICS
    public function getMetrics()
    {
        echo json_encode(
            $this->db->get('metrics')->result()
        );
    }

    // 🔹 GET METRIC BY ID
    public function getById($id)
    {
        echo json_encode(
            $this->db->where('metric_id', $id)
                     ->get('metrics')
                     ->row()
        );
    }

    // 🔹 UPDATE METRIC
   // 🔹 UPDATE METRIC
public function update()
{
    $metric_id = $this->input->post('metric_id');

    $data = [
        'metric_name' => $this->input->post('metric_name'),
        'ability'     => $this->input->post('ability')
    ];

    if (!empty($metric_id)) {
        $this->db->where('metric_id', $metric_id);
        $this->db->update('metrics', $data);

        echo json_encode([
            'status' => true,
            'message' => 'Metric updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Metric ID missing'
        ]);
    }
}


    // 🔹 DELETE METRIC
    public function delete($id)
    {
        $this->db->where('metric_id', $id)->delete('metrics');
        echo json_encode(['status' => true]);
    }

    // 🔹 GET CLASSES
public function getClasses()
{
    $query = $this->db
        ->select('DISTINCT(Classname)')
        ->get('classes')
        ->result();

    echo json_encode($query);
}
public function insert()
{
    $metric = [
        'metric_name'  => $this->input->post('name'),
        'ability'      => $this->input->post('ability'),
        'metric_class' => $this->input->post('class')
    ];

    if ($this->db->insert('metrics', $metric)) {
        echo json_encode([
            'status' => true,
            'message' => 'Created Successfully'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Failed to create'
        ]);
    }
}


    // ===== LOAD STUDENT + METRICS =====
    public function addData($studentId)
    {
        $student = $this->AdminStudentModel->getOne($studentId);
        $allMetrics = $this->AdminStudentMetricsModel->getByClass($student->Class);
        $studentMetrics = $this->AdminStudentMetricsModel->getAllStudentMetric($studentId);
        

        $marks = [];
        foreach ($studentMetrics as $m) {
            $marks[$m->metric_id] = $m->mark;
        }

        foreach ($allMetrics as &$m) {
            $m->mark = $marks[$m->metric_id] ?? "";
        }

        echo json_encode([
            "student" => $student,
            "metrics" => $allMetrics
        ]);
    }

    // ===== SAVE MARKS =====
 public function mark()
{
    $input = json_decode(file_get_contents("php://input"), true);

    $studentId = $input['studentId'];
    $metrics   = $input['metrics'];

    $data = [];
    foreach ($metrics as $m) {
        $data[$m['metric_id']] = $m['mark'];
    }

    $this->AdminStudentMetricsModel->save($data, $studentId);

    echo json_encode([
        'status' => true,
        'message' => 'Saved'
    ]);
}




}
