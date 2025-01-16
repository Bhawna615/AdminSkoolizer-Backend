<?php


class EventParticipation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventParticipationModel');
		$this->load->helper('url');
		$this->load->library('session');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function view($eventId)
	{
		$data['participants'] = $this->EventParticipationModel->get($eventId);
		$this->load->view('timetable/events/participants/view', $data);
	}

}
