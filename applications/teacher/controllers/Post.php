<?php

require 'Notification.php';

class Post extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
		$this->load->model('ClassModel');
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

	public function view()
	{
		$this->load->view('posts/view');
	}

	public function display()
	{
	    $class = $this->session->userdata('class');
		$data['posts'] = $this->PostModel->get($class);
		$this->load->view('posts/table', $data);
	}

	public function filter($year, $month)
	{
		$data['posts'] = $this->PostModel->getFilteredData($year, $month);
		$this->load->view('posts/table', $data);
	}

	public function create()
	{
		$this->load->view('posts/create');
	}

	public function save()
{
	$this->form_validation->set_rules($this->config->item('post'));

	if ($this->form_validation->run() === FALSE) {
		$this->load->view('posts/create');
	} else {
		// File Upload Setup
		$upload_path = './assets/posts/';
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
			$file_url = base_url('assets/posts/' . $file_data['file_name']);
			
		} else {
			// File upload failed, show error if needed:
			$error = $this->upload->display_errors();
			echo "<pre>Upload Error: "; print_r($error); echo "</pre>";
			// You can choose to return or continue without file
		}

		// Prepare Post Data
		$post = array(
			'text' => $this->input->post('text'),
			'recipient_group' => $this->session->userdata('class'),
			'file' => $file_data['file_name'],
			'url' => $file_url,
			'created_at' => date("Y-m-d H:i:s")
		);

		if ($this->PostModel->insert($post)) {
			$this->createPostNotification($this->session->userdata('class'), $this->input->post('text'));
			$this->session->set_flashdata('success', "Saved Successfully");
			redirect('post/view');
		} else {
			$this->session->set_flashdata('error', "Failed to Save");
			redirect('post/view');
		}
	}
}

	public function delete($id)
	{
		$data['file'] = $this->PostModel->getFile($id);
		if (!empty($data['file'])) {
			$this->load->view('posts/deletejs', $data);
		}
		if ($this->PostModel->delete($id)) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect('post/view');
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect('post/view');
		}
	}

	public function createPostNotification($recipientGroup, $post)
	{
		$recipients = $this->PostModel->getRecipients($recipientGroup);

		if ($recipientGroup == "school") {
			$postNotification = array(
				'recipientIds' => $recipients,
				'title' => 'New Post From School',
				'body' => $post,
				'type' => 'schoolPost'
			);
		} else {
			$postNotification = array(
				'recipientIds' => $recipients,
				'title' => 'New Post for your Class',
				'body' => $post,
				'type' => 'classPost'
			);
		}

		$notification = new Notification();
		$notification->send($postNotification);
	}


}
