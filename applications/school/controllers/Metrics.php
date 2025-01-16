<?php


class Metrics extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MetricsModel');
		$this->load->model('StudentModel');
		$this->load->model('ClassModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
			if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function index()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('students/metrics/students', $data);
	}

	public function view()
	{
		$data['metrics'] = $this->MetricsModel->get();
		$this->load->view('students/metrics/view', $data);
	}

	public function display()
	{
		$data['students'] = $this->StudentModel->getInfoMany();
		$this->load->view('students/metrics/table', $data);
	}

	public function filter($class)
	{
		$data['students'] = $this->StudentModel->getFilteredData($class);
		$this->load->view('students/metrics/table', $data);
	}

	public function add($studentId)
	{
		$data['studentId'] = $studentId;
		$data['student'] = $this->StudentModel->getOne($studentId);
		$data['metrics'] = $this->MetricsModel->getByClass($data['student']->Class);
		$data['studentMetric'] = $this->MetricsModel->getStudentMetric($studentId);
		$this->load->view('students/metrics/add', $data);
	}

	public function create()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('students/metrics/create', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('metrics'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('students/metrics/create', $data);
		} else {
			$metric = array(
				'metric_name' => $this->input->post('name'),
				'ability' => $this->input->post('ability'),
				'metric_class' => $this->input->post('class')
			);

			if ($this->MetricsModel->insert($metric)) {
				$this->session->set_flashdata('success', "Created Successfully");
				redirect(site_url('metrics/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to create");
				redirect(site_url('metrics/view'));
			}
		}
	}

	public function edit($id)
	{
		$data['metric'] = $this->MetricsModel->getById($id);
		$this->load->view('students/metrics/edit', $data);
	}

	public function update()
	{
		$metricId = $this->input->post('id');
		$updatedMetric = array(
			'metric_name' => $this->input->post('name'),
			'ability' => $this->input->post('ability')
		);

		if ($this->MetricsModel->update($metricId, $updatedMetric)) {
			$this->session->set_flashdata('success', "Updated Successfully");
			redirect(site_url('metrics/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to update");
			redirect(site_url('metrics/view'));
		}
	}

	public function delete($id)
	{
		if ($this->MetricsModel->delete($id)) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect(site_url('metrics/view'));
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect(site_url('metrics/view'));
		}
	}

	public function mark()
	{
	    $metrics = $this->input->post('metrics');
	    $mark = $this->input->post('mark');
	    $combined_array = array_combine($metrics, $mark);
	    $studentId = $this->input->post('studentId');
	   // print_r($combined_array);
	    $this->MetricsModel->save($combined_array, $studentId);
// 		$metricId = $this->input->post('metricId');
// 		$data['studentId'] = $this->input->post('studentId');
// 		$data['metric'] = $this->MetricsModel->getById($metricId);
// 		$data['studentMetric'] = $this->MetricsModel->getOneStudentMetric(
// 			$this->input->post('studentId'),
// 			$this->input->post('metricId')
// 		);
        $this->add($studentId);
        }

	public function save()
	{
		$studentMetric = array(
			'student_id' => $this->input->post('studentId'),
			'metric_id' => $this->input->post('metricId'),
			'mark' => $this->input->post('mark')
		);
		if (!($this->MetricsModel->exists($studentMetric))) {
			if ($this->MetricsModel->save($studentMetric)) {
				$this->session->set_flashdata('success', "Saved Successfully");
				redirect(site_url('metrics/add/'.$this->input->post('studentId')));
			} else {
				$this->session->set_flashdata('error', "Failed to save");
				redirect(site_url('metrics/add/'.$this->input->post('studentId')));
			}
		} else {
			if ($this->MetricsModel->updateStudentMetric($studentMetric)) {
				$this->session->set_flashdata('success', "Saved Successfully");
				redirect(site_url('metrics/add/'.$this->input->post('studentId')));
			} else {
				$this->session->set_flashdata('error', "Failed to save");
				redirect(site_url('metrics/add/'.$this->input->post('studentId')));
			}
		}
	}

}
