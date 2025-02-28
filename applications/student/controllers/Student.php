<?php
/**
 * 
 */
class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('session');
        $this->load->config('settings');
		$this->load->helper('url');
		$this->load->model('StudentModel');
        $this->load->model('MovementModel');
        $this->load->model('TimetableModel');
        $this->load->model('AuthModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }

	}
	

	public function index()
	{
	    $data = array(
	        'title' => 'Dashboard',
            'page' => 'Home'
        );
        $studentId = $this->session->userdata('id');
        $studentClass = $this->session->userdata('class');
        $data['recentAssignments'] = $this->StudentModel->loadRecentAssignments($studentId, $studentClass);
        $data['recentExams'] = $this->StudentModel->loadRecentExams($studentId, $studentClass);
        $data['recentSchoolPosts'] = $this->StudentModel->loadRecentSchoolPosts($studentId);
        $data['recentClassPosts'] = $this->StudentModel->loadRecentClassPosts($studentId, $studentClass);
        $data['recentEvents'] = $this->StudentModel->loadRecentEvents($studentId);
        $data['recentPayments'] = $this->StudentModel->loadRecentPayments($studentId);
        $data['recentMessages'] = $this->StudentModel->loadRecentMessages($studentId);
	    $data['mostRecentMovement'] = $this->MovementModel->mostRecent($this->session->userdata('id'));
	    $data['scheduleList'] = $this->TimetableModel->getByClass($this->session->userdata('class'));
        $data['student'] = $this->StudentModel->getInfoById($studentId); // Fetch the logged-in student's info
        $data['info'] = $this->StudentModel->getInfoById($studentId);
	    $this->load->view('student/home', $data);
	}

   

    public function profile()
    {
        $data = array(
            'title' => 'Profile',
            'page' => 'Profile'
        );
        $id = $this->session->userdata('id');
        
        $studentId = $this->session->userdata('id');
        $studentClass = $this->session->userdata('class');
        $data['recentAssignments'] = $this->StudentModel->loadRecentAssignments($studentId, $studentClass);
        $data['recentExams'] = $this->StudentModel->loadRecentExams($studentId, $studentClass);
        $data['recentSchoolPosts'] = $this->StudentModel->loadRecentSchoolPosts($studentId);
        $data['recentClassPosts'] = $this->StudentModel->loadRecentClassPosts($studentId, $studentClass);
        $data['recentEvents'] = $this->StudentModel->loadRecentEvents($studentId);
        $data['recentPayments'] = $this->StudentModel->loadRecentPayments($studentId);
        $data['recentMessages'] = $this->StudentModel->loadRecentMessages($studentId);
        
        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $data['student'] = $this->StudentModel->get($id);
        $this->load->view('student/profile/view', $data);
    }
    
    public function notification()
    {
        $id = $this->session->userdata('id');
        $count = $this->StudentModel->getMessageCount($id);
        print_r($count);
    }
    
    public function notifications()
    {
        $data = array(
            'title' => 'Notifications',
            'page' => 'Notifications'
        );
        $id = $this->session->userdata('id');
        $this->StudentModel->updateNotificationCheckTime($id);
        $this->load->view('student/notifications/view', $data);
    }
    
    public function changePassword()
    {
        
        $data['studentId'] = $this->session->userdata('id');
        $this->load->view('student/profile/change_password', $data);
    }
    
    public function updatePassword()
    {
        $studentId = $this->input->post('id');
        $currentPassword = $this->input->post('current_password');
        $newPassword = $this->input->post('new_password');
        $confirmNewPassword = $this->input->post('confirm_new_password');
        if(strcmp($newPassword, $confirmNewPassword) == 0 ){
                 $student = $this->StudentModel->get($studentId);
                    if(password_verify($currentPassword, $student->Password)){
                        $updatedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                        
                            if($this->StudentModel->updatePassword($updatedPassword, $studentId)){
                                  $this->session->set_flashdata('success', "Password Changed Successfully");
                                    redirect(site_url('student/profile'));
                            } else {
                                $this->session->set_flashdata('error', "Failed to change Password");
                                redirect(site_url('student/profile'));
                            }
                    } else {
                          $this->session->set_flashdata('error', "Wrong Current Password");
                         redirect(site_url('student/profile'));
                    }
        } else {
                 $this->session->set_flashdata('error', "New Password and Confirm New Password do not match");
             redirect(site_url('student/profile'));
        }
       
    }

    public function accounts()
    {
        $data = array(
            'title' => 'My Accounts',
            'page' => 'My Accounts'
        );
        $studentId = $this->session->userdata('id');
        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $data['accounts'] = $this->StudentModel->getAccounts($studentId);
        $this->load->view('student/accounts/view', $data);
    }

    public function addAccount()
    {
        $studentId = $this->session->userdata('id');
        $data['info'] = $this->StudentModel->getInfoById($studentId);
        $this->load->view('student/accounts/add',$data);
    }

    public function auth()
    {
        $currentStudentId = $this->session->userdata('id');
        $admissionNo = $this->input->post('admission_number');
        $password = $this->input->post('password');
        
        // ✅ Authenticate User
        $studentAccount = $this->AuthModel->userLogin($admissionNo, $password);
    
        if ($studentAccount && $this->StudentModel->notAlreadyAdded($currentStudentId, $studentAccount)) {
            // ✅ Insert Only if Not Already Added
            $this->StudentModel->insertStudentAccount($currentStudentId, $studentAccount);
            $this->session->set_flashdata('success', "Account added Successfully");
        } else {
            $this->session->set_flashdata('error', "Account already Added or Invalid Credentials");
        }
        
        redirect(site_url('student/accounts'));
    }
    

    public function switchAccount($id)
    {
        $switchToStudent = $this->StudentModel->get($id);
        session_destroy();
        redirect(site_url('auth/verify/').$switchToStudent->qrcode);
    }

    public function removeAccount($otherStudentId)
    {
        $currentStudentId = $this->session->userdata('id');
        if($this->StudentModel->removeStudentAccount($currentStudentId, $otherStudentId)) {
            $this->session->set_flashdata('success', "Account Removed Successfully");
            redirect(site_url('student/accounts'));
        } else {
            $this->session->set_flashdata('error', "Failed to remove");
            redirect(site_url('student/accounts'));
        }
    }
}
 
?>