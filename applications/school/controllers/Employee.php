<?php


class Employee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmployeeModel');
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
		$data['employees'] = $this->EmployeeModel->load();
		$this->load->view('employees/employees', $data);
	}

	public function attendance()
	{
		$data['employees'] = $this->EmployeeModel->load();
		$this->load->view('employees/employeeattendance', $data);
	}


	public function submitAttendance()
	{
		$date = date('Y-m-d');
		$mark = $this->EmployeeModel->verifyIfAttendance($date);
		if ($mark == false) {
			$count = count($_POST['id']);

			for ($i = 0; $i < $count; $i++) {
				$data[$_POST['id'][$i]] = $_POST['mark'][$i];
			}
			$final = array_combine($_POST['id'], $_POST['mark']);
			$leavecount = 0;
			$presentcount = 0;
			foreach ($final as $key => $value) {

				if ($value == 'Leave') {
					$leave = true;
					$data = array(
						'Date' => $date,
						'empid' => $key
					);
					$this->EmployeeModel->markAbsentees($data);
					$leavecount = $leavecount + 1;
				} else {
					if ($value == 'Present') {
						$presentcount = $presentcount + 1;
					}
				}
			}
			$attendance = array(
				'Date' => $date,
				'onLeave' => $leavecount,
				'Present' => $presentcount,
				'Total' => $count
			);

			$response = $this->EmployeeModel->markAttendance($attendance);

			if ($response) {
				$this->session->set_flashdata('success', "Marked Successfully");
				redirect(site_url('employee/viewattendance'));
			} else {
				$this->session->set_flashdata('error', "Failed to Mark attendance");
				redirect(site_url('employee/viewattendance'));
			}
		} else {
			$this->load->view('alerts/attendancetaken');
		}
	}

	public function viewAttendance()
	{
		$data['classes'] = $this->ClassModel->getAll();
		$this->load->view('employees/viewattendance');
	}

	public function display()
	{
		$data['attendance'] = $this->EmployeeModel->getAttendance();
		$this->load->view('employees/table', $data);
	}

	public function filter($year, $month)
	{
		$data['attendance'] = $this->EmployeeModel->getFilteredData($year, $month);
		$this->load->view('employees/table', $data);
	}


	public function attendanceDetails()
	{
		$date = $_POST['date'];
		$data['employees'] = $this->EmployeeModel->load();
		$data['details'] = $this->EmployeeModel->loadAbsentees($date);
		$this->load->view('employees/attendancedetails', $data);
	}

	public function delete($id)
	{
		$response = $this->EmployeeModel->delete($id);
		if ($response) {
			$this->session->set_flashdata('success', "Deleted Successfully");
			redirect('employee/view');
		} else {
			$this->session->set_flashdata('error', "Failed to delete");
			redirect('employee/view');
		}


	}

	public function add()
	{
		$this->load->view('employees/addemployee');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->config->item('employee'));

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('employees/addemployee');
		} else {
			$data = array(
				'empname' => $_POST['name'],
				'Post' => $_POST['post']
			);
			$response = $this->EmployeeModel->insert($data);
			if ($response) {
				$this->session->set_flashdata('success', "Employee Added Successfully");
				redirect('employee/view');
			} else {
				$this->session->set_flashdata('error', "Failed to add");
				redirect('employee/view');
			}
		}
	}

	public function select()
    {
        $this->load->view('employees/attendance/select');
    }

    public function viewByMonth()
    {
        $data['month'] = $_POST['month'];
        $data['employees'] = $this->EmployeeModel->load();
        $data['attendance'] = $this->EmployeeModel->getAttendanceByMonth($this->input->post('month'));
        $data['absents'] = $this->EmployeeModel->getAbsentsByMonth($this->input->post('month'));
        $this->load->view('employees/attendance/view', $data);
    }
}
