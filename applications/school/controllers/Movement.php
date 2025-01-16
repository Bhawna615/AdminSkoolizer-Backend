<?php


class Movement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('ClassModel');
		$this->load->model('MovementModel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function select()
	{
		$this->load->view('movements/select');
	}

	public function index()
	{
		if (!isset($_POST['movement'])) {
			$data['movement'] = $this->session->movement;
		} else {
			$this->session->movement = $this->input->post('movement');
			$data['movement'] = $this->session->movement;
		}
		$data['mostRecentMovement'] = $this->MovementModel->mostRecent();
		$this->load->view('movements/add', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules($this->config->item('movement'));
		if ($this->form_validation->run() === FALSE) {
			$data['mostRecentMovement'] = $this->MovementModel->mostRecent();
			$this->load->view('movements/add', $data);
		} else {
			$student = $this->StudentModel->getByQrCode($this->input->post('qrcode'));
			if (!empty($student)) {
				$movement = array(
					'name' => $student->Name,
					'class' => $student->Class,
					'roll_no' => $student->Rollno,
					'movement' => $this->input->post('movement'),
					'student_id' => $student->id,
                    'timestamp' => date("Y-m-d H:i:s")
				);

				if (!($this->MovementModel->duplicate($movement))) {
					$response = $this->MovementModel->store($movement);
					if ($response) {
						$this->session->set_flashdata('success', 'Captured');
						$this->session->set_flashdata('capture', 'success');
						redirect(site_url('movement'));
					} else {
						$this->session->set_flashdata('error', 'Failed to Capture');
						$this->sesion->set_flashdata('capture', 'failed');
						redirect(site_url('movement'));
					}
				} else {
					$this->session->set_flashdata('error', 'Already Checked '.$this->input->post('movement'));
					redirect(site_url('movement'));
				}
			} else {
				$this->session->set_flashdata('error', 'Invalid QR Code');
				redirect(site_url('movement'));
			}
		}
	}

	public function view()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('movements/view', $data);
	}

	public function display()
	{
		$data['movements'] = $this->MovementModel->read();
		$this->load->view('movements/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['movements'] = $this->MovementModel->filter($year, $month, $class);
		$this->load->view('movements/table', $data);
	}
}
