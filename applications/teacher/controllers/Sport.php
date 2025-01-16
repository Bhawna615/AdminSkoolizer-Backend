<?php


class Sport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->model('ClassModel');
        $this->load->model('SportsModel');
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

    public function index()
    {
        $data['events'] = $this->SportsModel->all();
        $this->load->view('sports/view', $data);
    }

    public function add()
    {
        $this->load->view('sports/create');
    }

    public function insert()
    {
        $this->form_validation->set_rules($this->config->item('sport'));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('sports/create');
        } else {
            $newEvent = array(
                'name' => $this->input->post('name'),
                'date' => $this->input->post('date'),
                'created_at' => date('Y-m-d H:i:s'),
            );

            $response = $this->SportsModel->insert($newEvent);
            if ($response) {
                $this->session->set_flashdata('success', "Event Added Successfully");
                redirect('sport');
            } else {
                $this->session->set_flashdata('error', "Failed to add");
                redirect('sport/add');
            }
        }
    }

    public function edit($id)
    {
        $data['event'] = $this->SportsModel->one($id);
        $this->load->view('sports/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules($this->config->item('sport'));
        $updatedEventId = $this->input->post('id');
        if ($this->form_validation->run() === FALSE) {
            redirect(site_url('sport/edit/'.$updatedEventId));
        } else {
            $updatedEvent = array(
                'name' => $this->input->post('name'),
                'date' => $this->input->post('date'),
            );

            $response = $this->SportsModel->update($updatedEvent, $updatedEventId);
            if ($response) {
                $this->session->set_flashdata('success', "Event Updated Successfully");
                redirect('sport');
            } else {
                $this->session->set_flashdata('error', "Failed to Update");
                redirect('sport');
            }
        }
    }

    public function delete($id)
    {
        if ($this->SportsModel->delete($id)) {
            $this->session->set_flashdata('success', "Event Deleted Successfully");
            redirect('sport');
        } else {
            $this->session->set_flashdata('error', "Failed to Delete");
            redirect('sport');
        }
    }
}