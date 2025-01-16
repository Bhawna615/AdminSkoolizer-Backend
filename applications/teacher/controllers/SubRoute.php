<?php


class SubRoute extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SubRouteModel');
		$this->load->model('StationModel');
		$this->load->model('PassengerModel');
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

	public function add() //add sub route
	{
		$data['routeid'] = $_POST['routeid'];
		$id = $_POST['routeid'];
		$data['stations'] = $this->StationModel->load($id);
		$this->load->view('transport/addsubroute', $data);
	}

	public function insert() //insert sub route
	{
		$this->form_validation->set_rules($this->config->item('subroute'));

		if ($this->form_validation->run() === FALSE) {
			$data['routeid'] = $this->input->post('routeid');
			$data['stations'] = $this->StationModel->load($this->input->post('routeid'));
			$this->load->view('transport/addsubroute', $data);
		} else {
			$stime = date('H:i:s', strtotime($_POST['stime']));
			$etime = date('H:i:s', strtotime($_POST['etime']));
			$data = array(
				'subroutename' => $_POST['name'],
				'Departuretime' => $stime,
				'Arrivaltime' => $etime,
				'routeid' => $_POST['routeid'],
				'Firststation' => $_POST['fstation'],
				'Laststation' => $_POST['lstation']
			);

			$response = $this->SubRouteModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Added Succcessfully");
				redirect(site_url('route/details/').$this->input->post('routeid'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('route/details/').$this->input->post('routeid'));
			}
		}
	}

	public function delete($id)  //delete sub route
	{
		$response = $this->SubRouteModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Succcessfully");
			redirect(site_url('route/routes'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('route/routes'));
		}
	}
}
