<?php


class Station extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('StationModel');
		$this->load->model('StudentModel');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->config('validation_rules');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function add() //add station
	{
		$data['routeid']=$_POST['routeid'];
		$this->load->view('transport/addstation',$data);
	}

	public function insert()  //insert station
	{
		$this->form_validation->set_rules($this->config->item('station'));

		if ( $this->form_validation->run() === FALSE ) {
			$data['routeid']=$this->input->post('routeid');
			$this->load->view('transport/addstation', $data);
		} else {
			$stime = date('H:i:s', strtotime($_POST['stime']));
			$etime = date('H:i:s', strtotime($_POST['etime']));

			$data = array(
				'stationname' => $this->input->post('name'),
				'Morningtime' => $stime,
				'Eveningtime' => $etime,
				'RouteId' => $_POST['routeid'],
				'Totalpassengers' => $_POST['total']
			);

			$response = $this->StationModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Added Succcessfully");
				redirect(site_url('route/details/').$this->input->post('routeid'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('route/details/').$this->input->post('routeid'));
			}
		}
	}

	public function delete($id)  //delete station
	{
		$response = $this->StationModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Succcessfully");
			redirect(site_url('route/routes'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('route/routes'));
		}
	}
	
	public function view()
	{
	    $this->load->view('transport/stations/view');
	}
	
		public function display()
	{
		$data['stations'] = $this->StationModel->getAll();
		$this->load->view('transport/stations/table', $data);
	}

	public function filter($class)
	{
		$data['stations'] = $this->StationModel->getAll();
		$this->load->view('transport/stations/table', $data);
	}
	
	public function addPassenger()
	{
	    $data['stationId'] = $this->input->post('station_id');
        $data['students'] = $this->StudentModel->getInfoMany();
        $this->load->view('transport/stations/add_passenger', $data);
	}
	
	public function insertPassenger()
	{
	    $ids = $this->input->post('id');
	    $stationId = $this->input->post('stationId');
	    
	    $this->StationModel->insertPassenger($ids, $stationId);
	}
}
