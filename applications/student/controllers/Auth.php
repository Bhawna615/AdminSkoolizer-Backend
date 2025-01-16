<?php class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function verify($qrCode)
    {
        $student = $this->AuthModel->getOne($qrCode);
        if (!empty($student)) {
            $isLoggedIn = array(
                'loggedIn' => true,
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollNo' => $student->Rollno,
                'image' => $student->image
                );
            $this->session->set_userdata($isLoggedIn);
            redirect(site_url('student'));
        } else {
            exit('Page not found');
        }
    }
    
     public function verifyFromApp($qrCode)
    {
        $student = $this->AuthModel->getOne($qrCode);
        if (!empty($student)) {
            $isLoggedIn = array(
                'loggedIn' => true,
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollNo' => $student->Rollno,
                'image' => $student->image
                );
            $this->session->set_userdata($isLoggedIn);
            redirect(site_url('fee'));
        } else {
            exit('Page not found');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(site_url('home'));
    }
    
    public function signIn()
    {
        $admissionNo = $this->input->post('admission_number');
        $password = $this->input->post('password');
        $student = $this->AuthModel->userLogin($admissionNo, $password);
        if($student) {
              $isLoggedIn = array(
                'loggedIn' => true,
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollNo' => $student->Rollno,
                'image' => $student->image
                );
            $this->session->set_userdata($isLoggedIn);
            redirect(site_url('student'));
        } else {
            exit('Invalid credentials');
        }
    }
}

?>