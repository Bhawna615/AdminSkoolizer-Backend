<?php class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->config('settings');
        

        // Auto logout if class is passed_out
    if ($this->session->userdata('class')) {
        $class = strtolower($this->session->userdata('class'));
        if ($class == 'passed_out' || $class == 'passed out') {
            session_destroy();
            redirect(site_url('home'));
            exit;
        }
    }
    }

    public function verify($qrCode)
    {
        $student = $this->AuthModel->getOne($qrCode);
        if (!empty($student)) {
             // YAHAN CHECK LAGAYEIN
        if (strtolower($student->Class) == 'passed_out' || strtolower($student->Class) == 'passed out') {
            exit('You are passed out and cannot login.');
        }
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
             // YAHAN CHECK LAGAYEIN
        if (strtolower($student->Class) == 'passed_out' || strtolower($student->Class) == 'passed out') {
            exit('You are passed out and cannot login.');
        }
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
            // YAHAN CHECK LAGAYEIN
        if (strtolower($student->Class) == 'passed_out' || strtolower($student->Class) == 'passed out') {
            exit('You are passed out and cannot login.');
        }
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