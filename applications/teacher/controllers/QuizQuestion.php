<?php


class QuizQuestion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuizModel');
		$this->load->model('QuizQuestionModel');
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

	public function view($quizId)
	{
		$data['quizId'] = $quizId;
		$data['quizQuestions'] = $this->QuizQuestionModel->get($quizId);
		$this->load->view('exams/quizzes/questions/view', $data);
	}

	public function add($quizId)
	{
		$data['quizId'] = $quizId;
		$this->load->view('exams/quizzes/questions/add', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('quizQuestion'));
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('exams/quizzes/questions/add');
		} else {
			$quizId = $this->input->post('quizId');
			$question = array(
				'question' => $this->input->post('question'),
				'options' => $this->input->post('options'),
				'correct_option' => $this->input->post('correct'),
				'quiz_id' => $this->input->post('quizId'),
				'created_at' => date("Y-m-d H:i:s")
			);

			if ($this->QuizQuestionModel->insert($question)) {
				$this->session->set_flashdata('success', "Question Added Successfully");
				redirect('quizQuestion/view/'.$quizId);
			} else {
				$this->session->set_flashdata('error', "Failed to Add");
				redirect('quizQuestion/view'.$quizId);
			}
		}
	}

	public function edit($questionId)
	{
		$data['question'] = $this->QuizQuestionModel->load($questionId);
		$this->load->view('exams/quizzes/questions/edit', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules($this->config->item('quizQuestion'));
		$questionId = $this->input->post('questionId');
		$quizId = $this->input->post('quizId');
		if ($this->form_validation->run() === FALSE) {
			$data['question'] = $this->QuizQuestionModel->load($questionId);
			$this->load->view('exams/quizzes/questions/edit', $data);
		} else {
			$updatedQuestion = array(
				'question' => $this->input->post('question'),
				'options' => $this->input->post('options'),
				'correct_option' => $this->input->post('correct'),
			);

			if ($this->QuizQuestionModel->update($updatedQuestion, $questionId)) {
				$this->session->set_flashdata('success', "Question Updated Successfully");
				redirect('quizQuestion/view/'.$quizId);
			} else {
				$this->session->set_flashdata('error', "Failed to Update");
				redirect('quizQuestion/view'.$quizId);
			}
		}
	}

	public function delete($id, $quizId)
	{
		if ($this->QuizQuestionModel->delete($id)) {
			$this->session->set_flashdata('success', "Question Deleted Successfully");
			redirect('quizQuestion/view/'.$quizId);
		} else {
			$this->session->set_flashdata('error', "Failed to Delete");
			redirect('quizQuestion/view'.$quizId);
		}
	}
}
