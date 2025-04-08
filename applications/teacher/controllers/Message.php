<?php

require 'Notification.php';

class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MessageModel');
		$this->load->model('ClassModel');
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

	public function view()
	{
		$this->load->view('messages/messages');
	}

	public function display()
	{
	    $class = $this->session->userdata('class');
		$data['messages'] = $this->MessageModel->load($class);
		$this->load->view('messages/table', $data);
	}

	public function filter($year, $month, $class)
	{
		$data['messages'] = $this->MessageModel->getFilteredData($year, $month, $class);
		$this->load->view('messages/table', $data);
	}

	public function create()  //newmessage
	{
	    $class = $this->session->userdata('class');
		$data['classes'] = $this->ClassModel->getAll();
		$data['recipients'] = $this->MessageModel->loadRecipients($class);
		$this->load->view('messages/newmessage', $data);
	}

	public function send()  //sendmessage
	{
		$this->form_validation->set_rules($this->config->item('message'));
		if ($this->form_validation->run() === false) {
			$data['classes'] = $this->ClassModel->getAll();
			$data['recipients'] = $this->MessageModel->loadRecipients();
			$this->load->view('messages/newmessage', $data);
		} else {

			$upload_path = './assets/messages/';
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true);
			}
		
			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = '*'; // or specify: 'jpg|png|pdf|doc|ppt|pptx'
			$config['max_size']      = 10240; // 10MB
			$config['encrypt_name']  = TRUE;
		
			$this->load->library('upload', $config);
		
			$file_url = null;
			if ($this->upload->do_upload('file')) {
				$file_data = $this->upload->data();
				$file_url = base_url('assets/messages/' . $file_data['file_name']);
			}
			
			$recipientIds = $this->input->post('id');
			$message = $this->input->post('message');
			$url = $file_url;
			$file = $file_data['file_name'];


			if ($this->MessageModel->insert($recipientIds, $message, $file, $url)) {
				$this->createMessageNotification($recipientIds);
				$this->session->set_flashdata('success', "Message sent Successfully");
				redirect(site_url('message/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Send");
				redirect(site_url('message/view'));
			}
		}
	}

	public function get($id)  //getmessages
	{
		$this->load->model('StudentModel');
		$data['info'] = $this->StudentModel->getInfo($id);
		$data['messages'] = $this->MessageModel->loadById($id);
		$this->load->view('students/messages', $data);
	}

	public function createMessageNotification(array $recipientIds)
	{
		$recipients = $this->MessageModel->getRecipients($recipientIds);
		$messageNotification = array(
			'recipientIds' => $recipients,
			'title' => 'New Message',
			'body' => 'You have a new message',
			'type' => 'message'
		);

		$notification = new Notification();
		$notification->send($messageNotification);
	}

}
