<?php

class Visitor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ExamModel');
        $this->load->model('ClassModel');
        $this->load->model('MessageModel');
        $this->load->model('StudentModel');
        $this->load->model('TimetableModel');
        $this->load->model('MetricsModel');
        $this->load->model('VisitorModel');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->config('validation_rules');
        $this->load->library('session');
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
    }

    public function view()
    {
        $data['visitors'] = $this->VisitorModel->get();
        $this->load->view('visitor/view', $data);
    }

    public function add()
    {
        $this->load->view('visitor/add');
    }

    public function insert()
    {
        $this->form_validation->set_rules($this->config->item('visitor'));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('visitor/add');
        } else {
            $visitor = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'purpose' => $this->input->post('purpose'),
                'phone' => $this->input->post('phone')
            );

            $response = $this->VisitorModel->insert($visitor);
            if ($response) {
                $this->session->set_flashdata('success', "Visitor Added Successfully");
                redirect('visitor/view');
            } else {
                $this->session->set_flashdata('error', "Failed to add");
                redirect('visitor/view');
            }
        }
    }

    public function delete($id)
    {
        $response = $this->VisitorModel->delete($id);
        if ($response) {
            $this->session->set_flashdata('success', "Deleted Successfully");
            redirect('visitor/view');
        } else {
            $this->session->set_flashdata('error', "Failed to delete");
            redirect('visitor/view');
        }
    }
}