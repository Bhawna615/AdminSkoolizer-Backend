<?php
/**
 * 
 */
class Principal extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Princi');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        if (!isset($_SESSION['ID'])) {
            redirect(site_url('Home'));
        }
    }
    function index()
    {
        $id=$_SESSION['ID'];
        $data['principal']=$this->Princi->principalDetails($id);
        $this->load->view('principal',$data);
    }


    function signout()
    {
        session_destroy();
        redirect(site_url('home'));
    }
    function ea()
    {
        $data['teachers']=$this->Princi->teachers();
        $data['transportstaff']=$this->Princi->transportstaff();
        $this->load->view('principal/employeeattendance',$data);
    }

    function tt()
    {
        $data['teachers']=$this->Princi->teachers();
        $this->load->view('principal/teachertimetableform',$data);
    }

    function showtt()
    {
        $teacherid=$this->input->post('teacher');
        $day=$this->input->post('day');
        $data['timetable']=$this->Princi->fetchtt($teacherid,$day);
        $this->load->view('principal/teachertimetable',$data);

    }

    function messages()
    {
        $data['messages']=$this->Princi->loadmessages();
        $this->load->view('principal/messages',$data);
    }

    function newmessage()
    {
        $_SESSION['message']='Set';
        $this->load->view('Principal/newmessage');
    }

    function writemessage()
    {
        if (!isset($_SESSION['message'])) {
            redirect(site_url('Principal'));
        }
        $data['target']=$this->input->post('audience');
        $this->load->view('principal/writemessage',$data);
    }
    function postmessage()
    {
        if (!isset($_SESSION['message'])) {
            redirect(site_url('Principal'));
        }
        $recieptents=$this->input->post('recieptents');
        $message = array('message' =>$this->input->post('message'));
        $this->Princi->addnewmessage($recieptents,$message);
        unset($_SESSION['message']);
        redirect('principal');
    }

    function pendingfee()
    {
        $data['students']=$this->Princi->loadstudents();
        $this->load->view('principal/pendingfee',$data);

    }

    function library()
    {
        $data['books']=$this->Princi->loadissuedbooks();
        $this->load->view('principal/issuedbooks',$data);
    }

    function strength()
    {
        $data['strength']=$this->Princi->getstrength();
        $data['teachers']=$this->Princi->teachers();
        $data['transportstaff']=$this->Princi->transportstaff();
        $this->load->view('principal/strength',$data);

    }

    function busroutes()
    {
        $data['routes']=$this->Princi->loadroutes();
        $this->load->view('Principal/showroutes',$data);
    }

    function busdetail()
    {
        $data['details']=$this->Princi->transportstaff();
        $this->load->view('principal/busdetails',$data);
    }

    function settings()
    {
        $id=$_SESSION['ID'];
        $data['settings']=$this->Princi->principalDetails($id);
        $this->load->view('principal/settings/settings',$data);
    }

    function changepassword()
    {
        $id=$_SESSION['ID'];
        $data['password']=$this->Princi->principalDetails($id);
        $this->load->view('principal/settings/changepassword',$data);
    }

    function updatepassword()
    {
        $old=$this->input->post('old');
        $new=password_hash($this->input->post('new'), PASSWORD_BCRYPT);
        $id=$_SESSION['ID'];
        $data['password']=$this->Princi->principalDetails($id);
        foreach ($data['password'] as $row) {
            if (password_verify($old, $row->Password)) {
                $this->Princi->updateuserpassword($id,$new);
                $this->load->view('alerts/updatepassword');
            }
            else
            {
                $this->load->view('alerts/failed'); 
            }
        }
    }

    function changeimage()
    {
        $this->load->view('principal/settings/changeimage');
    }

    function uploadimage()
    {
        $id=$_SESSION['ID'];
                $config['upload_path']          = './assets/images/principal/';
                $config['allowed_types']        = 'gif|jpeg|png|jpg';
                $config['max_size']             = 500;
                $config['max_width']            = 2000;
                $config['max_height']           = 2500;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                      $img=$data['upload_data']['file_name'];
                      $this->Princi->uploadimage($id,$img);
                redirect('principal/settings');
                }
                
    }

    function classwiseattendance()
    {
        $this->load->view('principal/classwiseattendance');
    }

    function attendancebydate($date)
    {
        $data['attendance']=$this->Princi->loadattendance($date);
        $this->load->view('principal/showbydate',$data);
    }

    function empattendancebydate($date)
    {
        $data['employee']=$this->Princi->loademployees();
        $data['attendance']=$this->Princi->loadempattendance($date);
        $data['absentees']=$this->Princi->loadempabsentees($date);
        $this->load->view('principal/showbydateemp',$data);
    }

    function viewstudents()
    {
        $data['classes']=$this->Princi->getstrength();
        $this->load->view('principal/viewstudents',$data);
    }

    function displaystudents($class)
    {
        $data['students']=$this->Princi->loadstudentsbyclass($class);
        $this->load->view('principal/displaystudents',$data);
    }


}

?>