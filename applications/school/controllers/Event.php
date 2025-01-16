<?php


class Event extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventModel');
		$this->load->library('session');
		$this->load->helper('url');
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
		$data['events'] = $this->EventModel->get();
		$this->load->view('timetable/events/view', $data);
	}

	public function add()
	{
		$this->load->view('timetable/events/add');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('event'));
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('timetable/events/add');
		} else {
			$newEvent = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'created_at' => date('Y-m-d H:i:s'),
			);

			$response = $this->EventModel->insert($newEvent);
			if ($response) {
				$this->session->set_flashdata('success', "Event Added Successfully");
				redirect('event');
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect('event/add');
			}
		}
	}

	public function edit($id)
	{
		$data['event'] = $this->EventModel->load($id);
		$this->load->view('timetable/events/edit', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules($this->config->item('event'));
		$updatedEventId = $this->input->post('id');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('timetable/events/edit/'.$updatedEventId);
		} else {
			$updatedEvent = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
			);

			$response = $this->EventModel->update($updatedEvent, $updatedEventId);
			if ($response) {
				$this->session->set_flashdata('success', "Event Updated Successfully");
				redirect('event');
			} else {
				$this->session->set_flashdata('error', "Failed to Update");
				redirect('event');
			}
		}
	}

	public function delete($id)
	{
		if ($this->EventModel->delete($id)) {
			$this->session->set_flashdata('success', "Event Deleted Successfully");
			redirect('event');
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect('event');
		}
	}

}
