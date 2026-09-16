<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentPromote extends CI_Controller {

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
        $this->load->helper(['url', 'string']);
		$this->load->library('form_validation');

		
	}

	// 🔹 GET: All classes
	public function getAllClassesDetails()
	{
		$data = $this->AdminClassModel->getAllClassesDetails();
		echo json_encode($data);
	}

	// 🔹 GET: Students by class
	public function getByClassJSON($class)
	{
		$data = $this->AdminStudentModel->getByClass($class);
		echo json_encode($data);
	}

	// 🔹 POST: Promote students
	public function updateClass()
	{
		$ids     = $this->input->post('ids');
		$toClass = $this->input->post('toClass');

		if (empty($ids) || empty($toClass)) {
			echo json_encode([
				'status' => false,
				'message' => 'Invalid input'
			]);
			return;
		}

		if ($this->AdminStudentModel->updateClass($toClass, $ids)) {
			echo json_encode([
				'status' => true,
				'message' => 'Promotion Successful'
			]);
		} else {
			echo json_encode([
				'status' => false,
				'message' => 'Failed to Promote'
			]);
		}
	}
}
