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
		$data['posts'] = $this->PostModel->get();
		$this->load->view('posts/table', $data);
	}

	public function filter($year, $month)
	{
		$data['posts'] = $this->PostModel->getFilteredData($year, $month);
		$this->load->view('posts/table', $data);
	}

	public function create()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('posts/create', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules($this->config->item('post'));
		if ( $this->form_validation->run() === FALSE ) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('posts/create', $data);
		} else {
			$post = array(
				'text' => $this->input->post('text'),
				'recipient_group' => $this->input->post('recipient'),
				'file' => $this->input->post('file'),
				'url' => $this->input->post('url'),
                'created_at' => date("Y-m-d H:i:s")
			);

			if ($this->PostModel->insert($post)) {
				$this->createPostNotification($this->input->post('recipient'), $this->input->post('text'));
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
