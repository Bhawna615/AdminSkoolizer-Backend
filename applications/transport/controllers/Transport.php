<?php
class Transport extends CI_Controller{
	function __construct(){
		 parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Travel');
        $this->load->config('settings');
        $this->load->library('session');
        if (isset($_SESSION['ID'])) {
			$id=$_SESSION['ID'];
		}
		else
		{
			redirect(site_url('home'));
		}
		date_default_timezone_set("Asia/Kolkata");
	}
	public function index(){
		if (isset($_SESSION['ID'])) {
			$id = $_SESSION['ID'];
		}
		$data['result'] = $this->Travel->profile($id);
		$data['currentroute'] = $this->Travel->loadCurrentRoute($id);
		$this->load->view('transport/home', $data);
	}

	function signout()
	{
		session_destroy();
		redirect(site_url('home'));
	}

	function showroutes()
	{
		$data['routes'] = $this->Travel->loadroutes();
		$this->load->view('transport/chooseroute', $data);
	}

	function showroutedetails()
	{
		$routeid=$this->input->post('route');
		$data['details']=$this->Travel->routedetails($routeid);
		$data['buses'] = $this->Travel->loadBuses();
		$this->load->view('transport/choosetiming',$data);
	}

	function startroute()
	{
		$id = $_SESSION['ID'];
		$data = array(
		    'routeid' => $this->input->post('routeid'),
		    'subrouteid' => $this->input->post('subrouteid'),
		    'driverid' => $id,
            'bus_id' => $this->input->post('busId')
		);
		$this->Travel->beginRoute($id, $data);
		redirect(site_url('transport'));
	}

	function endroute()
	{
		$id=$_SESSION['ID'];
		$this->Travel->finishRoute($id);
		redirect(site_url('transport'));
	}
	function stations()
	{
		$id=$_SESSION['ID'];
		$routeid = $this->input->post('routeid');
		$data['stations']=$this->Travel->loadstations($routeid);
		$data['passengers']=$this->Travel->loadPassengers($id);
		$this->load->view('transport/stations',$data);
	}

	function changepresence($passengerid)
	{
		$data['status']=$this->Travel->togglestatus($passengerid);
		foreach ($data['status'] as $row) {
			$status=$row->Presence;
		}
		echo $status;
		return $status;
	}

	function settings()
    {
        $id=$_SESSION['ID'];
        $data['settings']=$this->Travel->profile($id);
        $this->load->view('transport/settings/settings',$data);
    }

    function changepassword()
    {
        $id=$_SESSION['ID'];
        $data['password']=$this->Travel->profile($id);
        $this->load->view('transport/settings/changepassword',$data);
    }

    function updatepassword()
    {
        $old=$this->input->post('old');
        $new=password_hash($this->input->post('new'), PASSWORD_BCRYPT);
        $id=$_SESSION['ID'];
        $data['password']=$this->Travel->profile($id);
        foreach ($data['password'] as $row) {
            if (password_verify($old, $row->Password)) {
                $this->transport->updateuserpassword($id,$new);
                $this->load->view('alerts/updatepassword');
            }
            else
            {
                $this->load->view('alerts/failed'); 
            }
        }
    }

    function changeimage()
    {
        $this->load->view('transport/settings/changeimage');
    }

    function uploadimage()
    {
        $id=$_SESSION['ID'];
                $config['upload_path']          = './assets/images/transport/';
                $config['allowed_types']        = 'gif|jpeg|png|jpg';
                $config['max_size']             = 500;
                $config['max_width']            = 2000;
                $config['max_height']           = 2500;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                      $img=$data['upload_data']['file_name'];
                      $this->Travel->uploadimage($id,$img);
                redirect('transport/settings');
                }
                
    }

    function messages()
    {
        $data['messages']=$this->Travel->loadmessages();
        $this->load->view('transport/messages',$data);
    }

    public function mybus()
    {
        $data = array(
            'page' => 'My Buses',
            'title' => 'My Buses'
            );
    	$data['bus'] = $this->Travel->mybusdetails();
    	$this->load->view('transport/busdetails', $data);
    }

    function passengerslist()
    {
    	$data['passengers']=$this->Travel->viewpassengerslist();
    	$this->load->view('transport/passengerslist',$data);
    	
    }

    function routetimings()
    {
    	$data['routetimings']=$this->Travel->getroutetimings();
    	$this->load->view('transport/routetimings',$data);
    }

}
?>