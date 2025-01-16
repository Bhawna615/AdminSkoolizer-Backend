<?php

/**
 *
 */
class Teacher extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Teach');
        $this->load->library('session');
        $this->load->config('settings');
        $this->load->library('encryption');
        error_reporting(0);
        date_default_timezone_set("Asia/Calcutta");


    }

    function index()
    {
        if (isset($_SESSION['ID'])) {
            $id = $_SESSION['ID'];
        } else {
            redirect(site_url('home'));
        }
        $data['info'] = $this->Teach->myProfile($id);
        $data['timetable'] = $this->Teach->timetable($id);
        $data['id'] = $id;
        $this->load->view('teacher', $data);

    }

    function signUpRequest()
    {

        $this->load->view('teacher/signuppage');
    }

    function exploreClass($class)
    {
        $class = $this->encryption->decrypt(base64_decode($class));
        if (isset($_SESSION['ID'])) {
            $id = $_SESSION['ID'];
        } else {
            redirect(site_url('home'));
        }
        $data['myclass'] = $this->Teach->manageClasses($id);
        $data['class'] = $class;
        $this->load->view('content/class', $data);

    }

    function viewstudents()
    {

        $id = $_SESSION['ID'];
        $data['title'] = 'View Students';
        $data['classes'] = $this->Teach->getteacherclasses($id);
        $this->load->view('content/classlist', $data);
    }

    function showstudents($class)
    {
        $data['students'] = $this->Teach->studentList($class);
        $this->load->view('teacher/showstudents', $data);
    }

    function loadForm()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'New Exam';
        $data['classes'] = $this->Teach->getteacherclasses($id);
        $data['subject'] = $this->Teach->explore($class, $id);
        $this->load->helper('form');
        $this->load->view('content/conductForm', $data);
    }

    public function conduct()
    {
        $data = array(
            'Examname' => $this->input->post('topic'),
            'Subject' => $this->input->post('subject'),
            'Class' => $this->input->post('class'),
            'Maxmarks' => $this->input->post('marks'),
            'Date' => $this->input->post('date')

        );
        $this->Teach->conduct($data);
        $this->load->view('teacher/conducted', $data);
    }

    function attendance()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'View Attendance';
        $data['classes'] = $this->Teach->getteacherclasses($id);
        $this->load->view('teacher/viewattendance', $data);
    }

    function displayattendance($class)
    {
        $data['total'] = $this->Teach->totalClasses($class);
        $total = $data['total'];
        $data['attendence'] = $this->Teach->totalAbsent($class, $total);
        $data['class'] = $class;
        $this->load->view('content/attendence', $data);
    }

    function getattendancebydate($date, $class)
    {
        $data['attendance'] = $this->Teach->loadbydate($date, $class);
        $data['students'] = $this->Teach->studentList($class);
        $this->load->view('teacher/attendancebydate', $data);
    }

    function exam()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Select Exam';
        $data['exams'] = $this->Teach->loadconductedexams($id);
        $this->load->view('teacher/showexams', $data);
    }

    function showresults($code)
    {
        $data['title'] = 'Result';
        $data['result'] = $this->Teach->loadresults($code);
        $this->load->view('teacher/showresults', $data);
    }

    function display($id)
    {
        $data['exam'] = $this->Teach->getMarks($id);
        $this->load->view('content/examreport', $data);
    }

    function analyze($class)
    {
        $class = $this->encryption->decrypt(base64_decode($class));
        $data['exam'] = $this->Teach->checkPrev($class);
        $data['class'] = $class;
        $this->load->view('content/analyze', $data);

    }

    function analysis($id, $max)
    {
        $data['exam'] = $this->Teach->analyzeResult($id);
        $data['max'] = $max;
        foreach ($data['exam'][3] as $row) {
            $data['percent'] = ($row['sum(Marksobtained)'] * 100) / ($row['count(id)'] * $max);
        }

        $this->load->view('teacher/analysis', $data);
    }

    public function takeAttendance()
    {
        $data['title'] = 'Mark Attendance';
        $id = $_SESSION['ID'];
        $class = $this->Teach->getclassteacher($id);
        $this->load->library('session');
        $_SESSION['class'] = $class;

        $data['check'] = $this->Teach->check($class);
        if ($data['check'] < 1) {
            $data['class'] = $class;
            $data['count'] = $this->Teach->count($class);
            foreach ($data['count'] as $row) {
                $_SESSION['count'] = $row['count(Rollno)'];
            }
            $this->load->view('teacher/rollcall', $data);
        } else {
            $this->load->view('alerts/attendancetaken');
        }
    }

    function studentAppear($class, $offset)
    {

        $data['rollcall'] = $this->Teach->rollCall($class, $offset);
        $this->load->view('teacher/student', $data);
    }

    public function mark()
    {
        $data['title'] = 'Review Attendance';
        $this->load->library('session');
        if (isset($_SESSION['class'])) {
            $data['class'] = $_SESSION['class'];
            $class = $_SESSION['class'];
        } else {
            redirect(site_url('teacher'));
        }

        if (!isset($_SESSION['mark'])) {
            $_SESSION['mark'] = array();
        }
        $roll = $this->input->post('roll');
        $mark = $this->input->post('mark');
        $_SESSION['mark'][$roll] = $mark;
//        if (isset($roll)) {
//            if (!array_key_exists($roll, $_SESSION['mark'])) {
//                $_SESSION['mark'][$roll] = $mark;
//            }
//        }

        $present = array();
        $absent = array();
        $leave = array();
        foreach ($_SESSION['mark'] as $key => $value) {
            if ($value == 'Present') {
                $present[] = $key;

            }
            if ($value == 'Absent') {
                $absent[] = $key;
            }
            if ($value == 'Leave') {
                $leave[] = $key;
            }
        }
        $data['present'] = $this->Teach->getNamebyRoll($present, $class);
        $_SESSION['pcount'] = count($data['present']);
        $_SESSION['present'] = $data['present'];
        $data['absent'] = $this->Teach->getNamebyRoll($absent, $class);
        $_SESSION['absent'] = $data['absent'];
        $data['leave'] = $this->Teach->getNamebyRoll($leave, $class);
        $_SESSION['leave'] = $data['leave'];
        $this->load->view('teacher/review', $data);
    }

    function remark($mark)
    {
        $data['mark'] = $mark;
        $this->load->view('teacher/remark', $data);
    }

    function assign()
    {
        $this->load->library('session');
        $roll = $this->input->post('roll');
        $mark = $this->input->post('mark');
        foreach ($_SESSION['mark'] as $key => $value) {
            if ($roll == $key) {
                $_SESSION['mark'][$key] = $mark;
            }
        }
        $this->mark();

    }

    function submitAttendence()
    {
        $this->load->library('session');
        if (isset($_SESSION['class'])) {
            $class = $_SESSION['class'];
        }
        if (isset($_SESSION['count'])) {
            $count = $_SESSION['count'];
        }
        if (isset($_SESSION['pcount'])) {
            $pcount = $_SESSION['pcount'];
        }
        $arr = array();
        if (isset($_SESSION['mark'])) {
            foreach ($_SESSION['mark'] as $key => $value) {
                if ($value == 'Absent') {
                    $arr[] = $key;
                } elseif ($value == 'Leave') {
                    $onleave[] = $key;
                }
            }
            if (isset($arr)) {
                $absentcount = count($arr);
            }

            if (isset($onleave)) {
                $leavecount = count($onleave);
            }


            $data = array(
                'Date' => date('y-m-d'),
                'Class' => $class,
                'onLeave' => $leavecount,
                'Absent' => $absentcount,
                'Present' => $pcount,
                'Strength' => $count
            );


            foreach ($_SESSION['absent'] as $key => $value) {

                $Absentdata = array(
                    'Date' => date('y-m-d'),
                    'Class' => $class,
                    'Rollno' => $key,
                    'onLeave' => false

                );
                $this->Teach->Absentdata($Absentdata);
            }
            foreach ($_SESSION['leave'] as $key => $value) {

                $leavedata = array(
                    'Date' => date('y-m-d'),
                    'Class' => $class,
                    'Rollno' => $key,
                    'onLeave' => true

                );
                $this->Teach->Absentdata($leavedata);

            }


            $this->Teach->finalSubmit($data);
            unset($_SESSION['mark']);

            $this->load->view('teacher/submitting');
        }

    }


    function getSubjects($class)
    {
        $this->Teach->subjects($class);
    }

    function signout()
    {
        session_destroy();
        redirect(site_url('home'));
    }

    function assignHw()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Assign Homework';
        $data['classes'] = $this->Teach->getteacherclasses($id);
        $this->load->view('teacher/assign', $data);
    }

    function submitHw()
    {
        $date = date('Y-m-d');
        $data = array(
            'Date' => $date,
            'Subjectname' => $this->input->post('subject'),
            'Class' => $this->input->post('class'),
            'Assignment' => $this->input->post('topic')
        );
        $this->Teach->homework($data);
        echo "Please wait while homework is being uploaded......";
        header('refresh:5; url=' . site_url('Teacher'));
    }

    function profile($id)
    {
        $data['profile'] = $this->Teach->myProfile($id);
        $this->load->view('teacher/profile', $data);
    }

    function settings()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Settings';
        $data['settings'] = $this->Teach->myProfile($id);
        $this->load->view('teacher/settings', $data);
    }

    function changepassword()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Change Password';
        $data['password'] = $this->Teach->myProfile($id);
        $data['id'] = $id;
        $this->load->view('teacher/changepassword', $data);
    }

    function updatepassword()
    {

        $old = $this->input->post('old');
        $new = password_hash($this->input->post('new'), PASSWORD_BCRYPT);
        $id = $_SESSION['ID'];
        $data['password'] = $this->Teach->myProfile($id);
        foreach ($data['password'] as $row) {
            if (password_verify($old, $row->Password)) {
                $this->Teach->updateuserpassword($id, $new);
                $this->load->view('alerts/updatepassword');
            } else {
                $this->load->view('alerts/failed');
            }
        }
    }

    function email()
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $email = $this->input->post('email');
        $link = '192.168.43.70/macmer/index.php/home/treset';
        $this->email->to($email);
        $this->email->from('raghavkumakshay@gmail.com', 'Akshay');
        $this->email->subject('Password Recovery Email');
        $this->email->message('Your Password recovery link is <a href=' . $link . '>' . $link . '</a>');
        $this->email->send();
        if ($this->email->send()) {
            echo "Email Sent.";
        }
    }

    function forgotpassword()
    {
        $this->load->view('teacher/forgot');
    }


    function test()
    {
        $this->load->view('teacher/conducted');
    }

    function absents($roll, $class)
    {

        $data['absents'] = $this->Teach->totalAbsents($roll, $class);
        $this->load->view('teacher/absents', $data);

    }

    function selection()
    {
        $id = $_SESSION['ID'];
        $class = $this->input->post('class');
        if (isset($class) && !empty($class)) {

            $data['subjects'] = $this->Teach->getsubjects($class, $id);
            foreach ($data['subjects'] as $row) {
                echo '<option value="' . $row->Subjectname . '">' . $row->Subjectname . '</option>';
            }
        }
    }

    function conductexam()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Exams';
        $data['exams'] = $this->Teach->loadexams($id);
        $this->load->view('teacher/exams', $data);
    }

    function homework()
    {
        $id = $_SESSION['ID'];
        $data['title'] = 'Homework';
        $data['homework'] = $this->Teach->loadhw($id);
        $this->load->view('teacher/homework', $data);
    }

    function messages()
    {
        $data['messages'] = $this->Teach->loadmessages();
        $this->load->view('teacher/messages', $data);
    }

    function changeimage()
    {
        $data['title'] ='Change Image';
        $this->load->view('teacher/settings/changeimage', $data);
    }

    function uploadimage()
    {
        $id = $_SESSION['ID'];
        $config['upload_path'] = './assets/images/teachers/';
        $config['allowed_types'] = 'gif|jpeg|png|jpg';
        $config['max_size'] = 500;
        $config['max_width'] = 2000;
        $config['max_height'] = 2500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('alerts/errorimage', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $img = $data['upload_data']['file_name'];
            $this->Teach->uploadimage($id, $img);
            redirect('teacher/settings');
        }
    }
}

?>