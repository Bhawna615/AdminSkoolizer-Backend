<?php

include "phpqrcode/qrlib.php";

class Teacher extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TeacherModel');
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

	public function add() //add teacher
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('teachers/addteacher', $data);
	}

	public function insert() //insert teacher
	{
		$this->form_validation->set_rules($this->config->item('teacher'));

		if ($this->form_validation->run() === false) {
			$data['classes'] = $this->ClassModel->getAll();
			$this->load->view('teachers/addteacher', $data);
		} else {
			$img = null;
			if ($_FILES['image']['error'] != 4 && $_FILES['image']['error'] == 0) {
				$config['upload_path'] = './assets/images/teachers/';
				$config['allowed_types'] = 'gif|jpeg|png|jpg';
				$config['max_size'] = 10000;
				$config['max_width'] = 2000;
				$config['max_height'] = 2500;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$img = null;
				} else {
					$data = array('upload_data' => $this->upload->data());
					$img = $data['upload_data']['file_name'];
				}
			}

			$qrCodeContent = $this->generateQrCodeContent();
			$fileName = $qrCodeContent.'.png';
			$absoluteFilePath = "./assets/images/teachers/qrcode/".$fileName;

			if (!file_exists($absoluteFilePath)) {
				QRcode::png($qrCodeContent, $absoluteFilePath);
			}

			$data = array(
				'Teachername' => $_POST['name'],
				'Post' => $_POST['post'],
				'Contact' => $_POST['contact'],
				'Classteacher' => $_POST['class'],
				'Dob' => $_POST['dob'],
				'Doj' => $_POST['doj'],
				'image' => $img,
				'Email' => $_POST['email'],
				'qrcode' => $qrCodeContent
			);
			$empdata = array(
				'empname' => $_POST['name'],
				'Post' => $_POST['post']
			);

			$teacher = $this->TeacherModel->insert($data, $empdata);

			if ($teacher) {
				$this->session->set_flashdata('success', "Teacher added successfully");
				redirect(site_url('teacher/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect(site_url('teacher/add'));
			}
		}
	}

	public function generateQrCodeContent()
	{
		$this->load->helper('string');

		$qrCodeContent = random_string('alnum', 16);
		$response = $this->TeacherModel->checkIfCodeUnique($qrCodeContent);
		if ($response) {
			return $qrCodeContent;
		} else {
			$this->generateQrCodeContent();
		}
	}

	public function view()  //view teachers
	{
		$data['teachers'] = $this->TeacherModel->getAll();
		$this->load->view('teachers/viewteachers', $data);
	}

	public function profile($id) //teacher profile
	{
		$data['teacher'] = $this->TeacherModel->profile($id);
		$this->load->view('teachers/profile', $data);
	}

	public function edit($id)  //edit teacher
	{
		$this->load->model('ClassModel');
		$data['classes'] = $this->ClassModel->getAll();
		$data['teacher'] = $this->TeacherModel->profile($id);
		$this->load->view('teachers/editteacher', $data);
	}

	public function save() //save teacher
	{
		$this->form_validation->set_rules($this->config->item('teacher'));

		if ($this->form_validation->run() === false) {
			$data['classes'] = $this->ClassModel->getAll();
			$data['teacher'] = $this->TeacherModel->profile($this->input->post('id'));
			$this->load->view('teachers/editteacher', $data);
		} else {
			if ($_FILES['image']['error'] != 4 && $_FILES['image']['error'] == 0) {
				$config['upload_path'] = './assets/images/teachers/';
				$config['allowed_types'] = 'gif|jpeg|png|jpg';
				$config['max_size'] = 10000;
				$config['max_width'] = 2000;
				$config['max_height'] = 2500;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$img = null;
				} else {
					$data = array('upload_data' => $this->upload->data());
					$img = $data['upload_data']['file_name'];
				}
				$id = $_POST['id'];
				$data = array(
					'Teachername' => $_POST['name'],
					'Post' => $_POST['post'],
					'Contact' => $_POST['contact'],
					'Classteacher' => $_POST['class'],
					'Dob' => $_POST['dob'],
					'Doj' => $_POST['doj'],
					'Email' => $_POST['email'],
					'image' => $img
				);
				$this->TeacherModel->update($data, $id);
			} else {
				$id = $_POST['id'];
				$data = array(
					'Teachername' => $_POST['name'],
					'Post' => $_POST['post'],
					'Contact' => $_POST['contact'],
					'Classteacher' => $_POST['class'],
					'Dob' => $_POST['dob'],
					'Doj' => $_POST['doj'],
					'Email' => $_POST['email'],
				);

				$teacher = $this->TeacherModel->update($data, $id);

				if ($teacher) {
					$this->session->set_flashdata('success', 'Information Updated Successfully');
					redirect(site_url('teacher/view'));
				} else {
					$this->session->set_flashdata('error', 'Failed to Update');
					redirect(site_url('teacher/edit/') . $id);
				}
			}
		}
	}

	public function delete($id)  //delete teacher
	{
		$teacher = $this->TeacherModel->delete($id);
		if ($teacher) {
			$this->session->set_flashdata('success', 'Deleted Successfully');
			redirect(site_url('teacher/view/') . $id);
		} else {
			$this->session->set_flashdata('error', 'Failed to delete');
			redirect(site_url('teacher/view'));
		}
	}
	
	
	public function addToFormerDetails($id) 
	{
	    $data['teacher'] = $this->TeacherModel->get($id);
	    $this->load->view('teachers/former/add', $data);
    }
    
    public function addToFormer()
    {
        $this->form_validation->set_rules($this->config->item('formerTeacher'));
        
        if ($this->form_validation->run() === false) {
            $teacherId = $this->input->post('id');
    		$data['teacher'] = $this->TeacherModel->get($teacherId);
    	    $this->load->view('teachers/former/add', $data);
		} else {
            $teacherId = $this->input->post('id');
            $teacher = $this->TeacherModel->get($teacherId);
            $dateOfLeaving = $this->input->post('date_of_leaving');
        	if ($this->TeacherModel->insertToFormer($teacher, $dateOfLeaving)) {
					$this->session->set_flashdata('success', 'Moved to Former Successfully');
					redirect(site_url('teacher/viewFormer'));
				} else {
					$this->session->set_flashdata('error', 'Failed to Update');
					redirect(site_url('teacher/addToFormerDetails/') . $id);
				}
		}
    
    }
    
    public function viewFormer()
    {
        $data['formerTeachers'] = $this->TeacherModel->getFormer();
        $this->load->view('teachers/former/view', $data);
    }
    
    public function experienceCertificateDetails($id)
    {
        $data['id'] = $id;
        $data['teacher'] = $this->TeacherModel->get($id);
        $this->load->view('teachers/experience/details', $data);
    }
    
    public function generateExperienceCertificate()
    {
        $id = $this->input->post('id');
        $data['teacher'] = $this->TeacherModel->get($id);
        $data['designation'] = $this->input->post('designation');
        $data['fromDate'] = $this->input->post('from_date');
        $data['toDate'] = $this->input->post('to_date');
        $data['classesTaught'] = $this->input->post('classes_taught');
        $experienceCertificate = array(
            'name' => $data['teacher']->Teachername,
            'designation' => $data['teacher']->Post,
            'date_of_birth' => $data['teacher']->Dob,
            'date_of_joining' => $data['teacher']->Doj,
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'classes_taught' => $this->input->post('classes_taught')
            );
        if($this->TeacherModel->insertExperienceCertificate($experienceCertificate)) {
       	            $this->session->set_flashdata('success', 'Certificate generated successfully');
					redirect(site_url('teacher/experienceCertificate'));
				} else {
					$this->session->set_flashdata('error', 'Failed to generate');
					redirect(site_url('teacher/experienceCertificate'));
				}
    }
    
    public function experienceCertificate()
    {
       
        $this->load->view('teachers/experience/view');
    }
    
    public function displayExperienceCertificates()
    {

		$data['experienceCertificates'] = $this->TeacherModel->getAllExperienceCertificates();
		$this->load->view('teachers/experience/table', $data);

    }
    
    public function openExperienceCertificate()
    {
        $id = $this->input->post('id');
       $data['experienceCertificate'] = $this->TeacherModel->getExperienceCertificate($id); 
       $this->load->view('teachers/experience/certificate', $data);
    }
}
