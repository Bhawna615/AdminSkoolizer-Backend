<?php


class SportParticipant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->model('ClassModel');
        $this->load->model('SportsModel');
        $this->load->model('SportParticipantModel');
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

    public function view($sportEventId)
    {
        $data['sportEventId'] = $sportEventId;
        $data['participants'] = $this->SportParticipantModel->all($sportEventId);
        $this->load->view('sports/participants/view', $data);
    }

    public function add($sportEventId)
    {
        $data['sportEventId'] = $sportEventId;
        $data['classes'] = $this->ClassModel->getAll();
        $this->load->view('sports/participants/add', $data);
    }

    public function filterStudent($class, $sportEventId)
    {
        $data['sportEventId'] = $sportEventId;
        $data['students'] = $this->SportParticipantModel->getFilteredStudentData($class);
        $this->load->view('sports/participants/table', $data);
    }

    public function displayStudent($sportEventId)
    {
        $data['sportEventId'] = $sportEventId;
        $data['students'] = $this->StudentModel->getInfoMany();
        $this->load->view('sports/participants/table', $data);
    }

    public function insert()
    {
        $participants = array(
            'ids' => $this->input->post('id'),
            'sport_id' => $this->input->post('eventId')
        );

        if ($this->SportParticipantModel->insert($participants)) {
            $this->session->set_flashdata('success', "Added Successfully");
            redirect(site_url('SportParticipant/view/'.$this->input->post('eventId')));
        } else {
            $this->session->set_flashdata('error', "Failed to Add");
            redirect(site_url('SportParticipant/view/'.$this->input->post('eventId')));
        }
    }

    public function delete($id, $sportId)
    {
        if ($this->SportParticipantModel->delete($id)) {
            $this->session->set_flashdata('success', "Participant Deleted Successfully");
            redirect(site_url('SportParticipant/view/'.$sportId));
        } else {
            $this->session->set_flashdata('error', "Failed to Delete");
            redirect(site_url('SportParticipant/view/'.$sportId));
        }
    }
}