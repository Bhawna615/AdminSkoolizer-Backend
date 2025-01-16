<?php


class Route extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RouteModel');
		$this->load->model('StationModel');
		$this->load->model('SubRouteModel');
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

	public function activeRoutes()
	{
		$data['routes'] = $this->RouteModel->loadactiveroutes();
		$this->load->view('transport/activeroutes', $data);
	}

	public function routes()
	{
		$data['routes'] = $this->RouteModel->load();
		$this->load->view('transport/routes', $data);
	}

	public function create() //newroute
	{
		$this->load->view('transport/newroute');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('route'));

		if ($this->form_validation->run() === FALSE ) {
			$this->load->view('transport/newroute');
		} else {
			$data = array(
				'routename' => $this->input->post('name'),
				'Totalpassengers' => $this->input->post('total')
			);

			$response = $this->RouteModel->insert($data);

			if ($response) {
				$this->session->set_flashdata('success', "Added Succcessfully");
				redirect(site_url('route/routes'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('route/routes'));
			}
		}
	}

	public function details($id) //routedetails
	{
		$data['routeid'] = $id;
		$data['stations'] = $this->StationModel->load($id);
		$data['subroutes'] = $this->SubRouteModel->load($id);
		$data['passengers'] = $this->PassengerModel->load($id);
		$this->load->view('transport/routedetails', $data);
	}

	public function delete($id)
	{
		$response = $this->RouteModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Succcessfully");
			redirect(site_url('route/routes'));
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect(site_url('route/routes'));
		}
	}

	public function activeRouteDetails($routeid)
	{
		$data['stations']=$this->StationModel->load($routeid);
		$data['passengers']=$this->PassengerModel->load($routeid);
		$this->load->view('transport/activeroutedetails',$data);
	}
}
