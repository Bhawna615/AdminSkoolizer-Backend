<?php


class Transport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('MovementModel');
        $this->load->model('TimetableModel');
        $this->load->model('TransportModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'My Transport',
            'page' => 'My Transport'
        );
        $id = $this->session->userdata('id');
        $data['passengerid'] = $this->TransportModel->getPassengerId($id);
        $data['info'] = $this->TransportModel->transportInfo($data['passengerid']);
        $data['activeroute'] = $this->TransportModel->loadActiveRoute($data['passengerid']);
        $data['lastroute'] = $this->TransportModel->loadLastRoute($data['passengerid']);
        foreach ($data['activeroute'] as $route) {
            $vehicleId = $route->bus_id;
        }
        foreach ($data['lastroute'] as $route) {
            $vehicleId = $route->bus_id;
        }
        
         if (isset($vehicleId)) {
            $data['vehicle'] = $this->TransportModel->vehicleInfo($vehicleId);
        }
        
        $this->load->view('student/transport/view', $data);
    }

}