<?php class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->config('settings');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('student/auth/login');
    }
	
}
?>