<?php

// require "Textlocal.php";
require "Notification.php";

class Sms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SmsModel');
        $this->load->model('AttendanceModel');
        $this->load->model('ClassModel');
        $this->load->model('StudentModel');
        $this->load->model('FeeModel');
          $this->load->model('MessageModel');
        $this->load->library('session');
        $this->load->helper('url');
        date_default_timezone_set("Asia/Kolkata");
        $this->params = array(
            'username' => '',
            'hash' => '',
            'apiKey' => 'NTY0MzRmNjU3NTc3Nzc2YzRlNjQ1MDc4Njk3MjQyNzU='
        );
        $this->load->library('textlocal', $this->params);
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
    }

    public function inboxMessages()
    {
        $min_time =  strtotime('-1 week'); // Get sends between a month ago
        $max_time = time(); // and now
        $limit = 1000;
        $start = 0;
        $data['response'] = $this->textlocal->getAPIMessageHistory($start, $limit, $min_time, $max_time);
        $this->load->view('messages/inboxmessages',$data);
    }

    public function inboxMessaging()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['recieptents']=$this->SmsModel->loadRecipients();
        $this->load->view('messages/inbox',$data);
    }


    public function reason()
    {
        // $textLocal = new Textlocal('', '', 'NjI0YTUzNDE3MzRkNjE0ZDRhNjIzNzY5NmMzNDUxNDg=');

        $data['response'] = $this->textlocal->getBalance();
        $this->load->view('messages/choosereason', $data);
    }


    public function absentTemplate()
    {
        $data['absentees'] = $this->AttendanceModel->loadAllAbsentsToday();
        $this->load->view('smstemplates/absent', $data);
    }

    public function sendAbsentSms()
    {
        	$recipientIds = $this->input->post('id');
		
			$message = "Dear Parent, You are notified that your ward  is absent from school today. Regards, KK Blossoms";
			$url = NULL;
			$file = NULL;


			if ($this->MessageModel->insert($recipientIds, $message, $file, $url)) {
				$this->createMessageNotification($recipientIds);
				$this->session->set_flashdata('success', "Message sent Successfully");
				redirect(site_url('message/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Send");
				redirect(site_url('message/view'));
			}
        
        
        // if (isset($_POST['id'])) {
        //     $smsData = $this->SmsModel->getSmsData($_POST['id']);

        //     foreach ($smsData as $data) {
        //         $message = "Dear Parent, You are notified that your ward ".$data['name']." was absent from school on ".$data['date'].". Regards, SPIPS Sanjauli. SMS sent via Skoolizer.";
        //         $sender = 'SKOLZR';
        //         $response = $this->textlocal->sendSms($data['number'], $message, $sender);
        //     }

        //     $responseObject = json_decode(json_encode($response), true);
        //     if ( $responseObject['status'] === "success" ) {
        //         $this->session->set_flashdata('success', "Sent Successfully");
        //         redirect(site_url('sms/inboxmessages'));
        //     } else {
        //         $this->session->set_flashdata('error', "Failed to send");
        //         redirect(site_url('sms/inboxmessages'));
        //     }
        // } else {
        //     redirect(site_url('home/absenttemplate'));
        // }

    }
    
    public function createMessageNotification(array $recipientIds)
	{
		$recipients = $this->MessageModel->getRecipients($recipientIds);
		$messageNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Absent',
			'body' => 'Dear Parent, You are notified that your ward  is absent from school today.',
			'type' => 'message'
		);

		$notification = new Notification();
		$notification->send($messageNotification);
	}

    public function attendanceTemplate()
    {
        $data['classes']=$this->ClassModel->getAll();
        $this->load->view('smstemplates/attendanceselectclass',$data);
    }

    public function attendanceTemplateSms()
    {

        $class=$_POST['class'];
        $data['totalattendance']=$this->AttendanceModel->getTotal($class);
        $data['studentsabsent']=$this->AttendanceModel->getTotalAbsents($class);
        $data['students']=$this->StudentModel->getByClass($class);
        $this->load->view('smstemplates/attendance',$data);
    }

    public function sendAttendanceSms()
    {
        if (isset($_POST['id'])) {
            $count=count($_POST['id']);
            for ($i=0; $i <$count ; $i++) {
                $sql='SELECT * FROM student WHERE id=?';
                $query=$this->db->query($sql,$_POST['id'][$i]);
                $result=$query->result();
                foreach ($result as $row) {
                    $class=$row->Class;
                    $name=$row->Name;
                    $number=array($row->Smsno);
                }
                $total = $this->AttendanceModel->getTotal($class);
                $absent = $this->AttendanceModel->getTotalAbsentsById($class,$_POST['id'][$i]);
                $present = $total-$absent;
                $message = 'Dear Parent,%nThe Current attendance of your ward '.$name.' is '.$present.' out of '.$total.' days. %nFBPS Desk';
                $sender = 'MACMER';
                $response = $this->textlocal->sendSms($number,$message,$sender);
                redirect(site_url('sms/inboxmessages'));
            }
        } else {
            redirect(site_url('sms/attendancetemplate'));
        }
    }


    public function holidayTemplate()
    {
        $data['classes'] = $this->ClassModel->getAll();
        $data['students'] = $this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/holiday',$data);
    }

    public function sendHolidaySms()
    {
        
        	$recipientIds = $this->input->post('id');
        	$holiday = $this->input->post('holiday');
        	$date = $this->input->post('date');
		
			$message = "Dear Parent, on ".date("d M Y", strtotime($date))." there will be a holiday on account of ".$holiday.". Regards SPIPS";
			$url = NULL;
			$file = NULL;


			if ($this->MessageModel->insert($recipientIds, $message, $file, $url)) {
				$this->createHolidayMessageNotification($recipientIds);
				$this->session->set_flashdata('success', "Message sent Successfully");
				redirect(site_url('message/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Send");
				redirect(site_url('message/view'));
			}
			
			
        // if (isset($_POST['numbers']) && isset($_POST['holiday']) && isset($_POST['date'])) {
        //     $numbers=$_POST['numbers'];
        //     $date=date('d M,Y',strtotime($_POST['date']));
        //     $holiday=$_POST['holiday'];
        //     $message='Dear Parent,%non '.$date.' there will be a holiday on account of '.$holiday.'.Thanks.%nFBPS desk';
        //     $sender='MACMER';
        //     $this->textlocal->sendSms($numbers,$message,$sender);
        //     redirect(site_url('sms/inboxmessages'));
        // }
        // else
        // {
        //     redirect(site_url('sms/holidaytemplate'));
        // }
    }
    
      public function createHolidayMessageNotification(array $recipientIds)
	{
		$recipients = $this->MessageModel->getRecipients($recipientIds);
		$messageNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Holiday',
			'body' => 'Holiday Notification',
			'type' => 'message'
		);

		$notification = new Notification();
		$notification->send($messageNotification);
	}


    public function schoolClosedTemplate()
    {
        $data['classes'] = $this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/schoolclosed', $data);
    }

    public function sendSchoolClosedSms()
    {
        if (isset($_POST['numbers']) && isset($_POST['date']) && isset($_POST['reason']) && isset($_POST['numbers'])) {
            $numbers = $_POST['numbers'];
            $date = date('d M,Y',strtotime($_POST['date']));
            $reason = $_POST['reason'];
            $message = 'Dear Parent,%n the school will remian closed on '.$date.' due to '.$reason.'.Thanks.%nFBPS desk';
            $sender = 'MACMER';

            $this->textlocal->sendSms($numbers, $message, $sender);
            redirect(site_url('home/inboxmessages'));
        } else {
            redirect(site_url('home/schoolclosedtemplate'));
        }
    }

    public function vacationTemplate()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/vacation', $data);
    }

    public function sendVacationSms()
    {
        if (isset($_POST['numbers']) && isset($_POST['vacation']) && isset($_POST['from']) && isset($_POST['to'])) {
            $numbers = $_POST['numbers'];
            $from = date('d M,Y',strtotime($_POST['from']));
            $to = date('d M,Y',strtotime($_POST['to']));
            $vacation = $_POST['vacation'];
            $message = 'Dear Parent,%nThe '.$vacation.' vacation starts from '.$from.' to '.$to.'. Thanks.%nFBPS Desk';
            $sender = 'MACMER';
            $this->textlocal->sendSms($numbers, $message, $sender);
            redirect(site_url('sms/inboxmessages'));
        } else {
            redirect(site_url('sms/vacationtemplate'));
        }
    }

    public function feeReminderTemplate()
    {
        $data['students'] = $this->FeeModel->getPending();
//        $data['classes']=$this->ClassModel->getAll();
//        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/feereminder',$data);
    }

//     public function sendFeeReminder()
//     {

//         if (isset($_POST['id']) && isset($_POST['period']) && isset($_POST['date'])) {
// //            print_r($_POST['id']);
//             $count = count($_POST['id']);
//             for ($i=0; $i < $count; $i++) {
//                 $ids = explode(",", $_POST['id'][$i]);
//                 $sql = 'SELECT Name,Smsno FROM student WHERE id=?';
//                 $query = $this->db->query($sql, $ids[0]);
//                 $result = $query->result();
//                 foreach($result as $row)
//                 {
//                     $name = $row->Name;
//                     $number = $row->Smsno;
//                 }

//                 $sql2 = 'SELECT period,lastdate FROM fee WHERE feeid = ?';
//                 $query2 = $this->db->query($sql2, $ids[1]);
//                 $result2 = $query2->result();

//                 foreach ($result2 as $row2) {
//                     $period = $row2->period;
//                     $lastDate = $row2->lastdate;
//                 }

//                 $message = 'Dear Parent,%n The school fee of your ward '.$name.' for the period of '.$period.' is pending. Last date of fee submission is '.$lastDate.'.%n SPIPS Desk';
//                 print_r($message);
//                 echo "<br/>";
//                 //                $sender='MACMER';
// //                $this->textlocal->sendSms($number, $message, $sender);
//             }

//         } else {
//             redirect(site_url('sms/feeremindertemplate'));
//         }
//     }


    public function transportFeeTemplate()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/transportfeereminder',$data);
    }
    public function sendTransportFeeReminder()
    {
        if (isset($_POST['id']) && isset($_POST['period']) && isset($_POST['lastdate'])) {
            $params = array('username' => 'mactavishmercer@gmail.com', 'hash' => '5a57393c29d44921735fd0b49ff8b041af55c5ad88e62a8f7af323d711c213c1', 'apiKey' => '0bW7IvZZYV8-HWCqkLdI97a4iJZtKK3iNdaEMpu3uq' );
            $this->load->library('textlocal',$params);
            $count=count($_POST['id']);
            $period=$_POST['period'];
            $date=$_POST['lastdate'];

            for ($i=0; $i <$count ; $i++) {
                $id=$_POST['id'][$i];
                $sql='SELECT Name,Smsno FROM student WHERE id=?';
                $query=$this->db->query($sql,$id);
                $result=$query->result();
                foreach($result as $row)
                {
                    $name=$row->Name;
                    $number=$row->Smsno;
                }
                $message='Dear Parent,%n The bus fee of your ward '.$name.' for the period of '.$period.' is pending. Last date of fee submission is '.$date.'.%n FBPS Desk';

            }
        }
        else
        {
            redirect(site_url('sms/transportfeetemplate'));

        }
    }

    public function busDelayTemplate()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/busdelay',$data);
    }

    public function sendBusDelaySms()
    {
        if (isset($_POST['numbers']) && isset($_POST['delay'])) {
            $params = array('username' => 'mactavishmercer@gmail.com', 'hash' => '5a57393c29d44921735fd0b49ff8b041af55c5ad88e62a8f7af323d711c213c1', 'apiKey' => '0bW7IvZZYV8-HWCqkLdI97a4iJZtKK3iNdaEMpu3uq' );
            $this->load->library('textlocal',$params);
            $numbers=$_POST['numbers'];
            $delay=$_POST['delay'];
            $message='Dear parent,%nSchool bus will be arriving '.$delay.' today. Kindly bear with us for inconvenience.%nFBPS Desk';
            $sender='MACMER';
            $this->textlocal->sendSms($numbers,$message,$sender);
            redirect(site_url('sms/inboxmessages'));
        }
        else
        {
            redirect(site_url('sms/busdelaytemplate'));
        }
    }


    public function ptmTemplate()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/ptm', $data);
    }

    public function sendPtmSms()
    {
        if (isset($_POST['numbers']) && isset($_POST['date']) && isset($_POST['from']) && isset($_POST['to'])) {
            $numbers=$_POST['numbers'];
            $date=date('d M,Y',strtotime($_POST['date']));
            $from=date('g:i A',strtotime($_POST['from']));
            $to=date('g:i A',strtotime($_POST['to']));
            $message='Dear parent,%nyou are hereby requested to attend our PTM (Parent Teachers Meeting) on '.$date.' between '.$from.' to '.$to.'.%nFBPS Desk';
            $sender='MACMER';
            $this->textlocal->sendSms($numbers, $message, $sender);
            redirect(site_url('sms/inboxmessages'));
        }
        else
        {
            redirect(site_url('sms/ptmtemplate'));
        }
    }

    /*	function eventtemplate()
        {
            $data['classes']=$this->SmsModel->getallclassesdetails();
            $data['students']=$this->SmsModel->getstudentsinfo();
            $this->load->view('smstemplates/event',$data);
        }
    */
    public function customSms()
    {
        $data['classes']=$this->ClassModel->getAll();
        $data['students']=$this->StudentModel->getInfoMany();
        $this->load->view('smstemplates/customsms', $data);
    }

    public function sendCustomSms()
    {
        if (isset($_POST['numbers']) && isset($_POST['message'])) {
            $numbers=$_POST['numbers'];
            $text=$_POST['message'];
            $message='Dear Parent, '.$text.'. FBPS Desk';
            $sender='MACMER';
            $this->textlocal->sendSms($numbers, $message, $sender);
            redirect(site_url('home/inboxmessages'));
        } else {
            redirect(site_url('home/customsms'));
        }
    }

    public function birthdayTemplate()
    {
        $data['birthdays']=$this->SmsModel->loadBirthdays();
        $this->load->view('smstemplates/birthdays', $data);
    }

    public function sendbirthdaysms()
    {
        	$recipientIds = $this->input->post('id');
		
			$message = "Dear Student, The school wishes you a very happy birthday. Regards KK Blossoms.";
			$url = NULL;
			$file = NULL;


			if ($this->MessageModel->insert($recipientIds, $message, $file, $url)) {
				$this->createBirthdayMessageNotification($recipientIds);
				$this->session->set_flashdata('success', "Message sent Successfully");
				redirect(site_url('message/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Send");
				redirect(site_url('message/view'));
			}
			
			
        // if (isset($_POST['id'])) {
        //     $params = array('username' => 'mactavishmercer@gmail.com', 'hash' => '5a57393c29d44921735fd0b49ff8b041af55c5ad88e62a8f7af323d711c213c1', 'apiKey' => '0bW7IvZZYV8-HWCqkLdI97a4iJZtKK3iNdaEMpu3uq' );
        //     $this->load->library('textlocal', $params);
        //     $count = count($_POST['id']);
        //     for ($i=0; $i <$count ; $i++) {
        //         $sql = 'SELECT * FROM student WHERE id=?';
        //         $query = $this->db->query($sql,$_POST['id'][$i]);
        //         $result = $query->result();
        //         foreach ($result as $row) {
        //             $number = array($row->Smsno);
        //         }
        //         $message = 'We would like to wish you a very happy birthday and dream for a fabulous life towards your needs and desires.%nFBPS Desk';
        //         $sender = 'MACMER';
        //         $response = $this->textlocal->sendSms($number,$message,$sender);
        //         redirect(site_url('home/inboxmessages'));
        //     }
        // }
        // else
        // {
        //     redirect(site_url('home/birthdaytemplate'));
        // }
    }
    
    public function sendFeeReminder()
    {
        	$recipientIds = $this->input->post('id');
		
			$message = 'Dear Parent, The school fee of your ward is pending. You are requested to pay fee before due date to avoid late fee charges.';
			$url = NULL;
			$file = NULL;


			if ($this->MessageModel->insert($recipientIds, $message, $file, $url)) {
				$this->createFeeMessageNotification($recipientIds, $message);
				$this->session->set_flashdata('success', "Message sent Successfully");
				redirect(site_url('message/view'));
			} else {
				$this->session->set_flashdata('error', "Failed to Send");
				redirect(site_url('message/view'));
			}
			
			
    }
    
     public function createBirthdayMessageNotification(array $recipientIds)
	{
		$recipients = $this->MessageModel->getRecipients($recipientIds);
		$messageNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Party time',
			'body' => 'Dear Student, The school wishes you a very happy birthday. Regards KK Blossoms.',
			'type' => 'message'
		);

		$notification = new Notification();
		$notification->send($messageNotification);
	}

    public function createFeeMessageNotification(array $recipientIds, $message)
	{
		$recipients = $this->MessageModel->getRecipients($recipientIds);
		$messageNotification = array(
			'recipientIds' => $recipients,
			'title' => 'Fee Reminder',
			'body' => $message,
			'type' => 'message'
		);

		$notification = new Notification();
		$notification->send($messageNotification);
	}

    public function scheduled()
    {
        error_reporting(0);
        try {
            $data['response'] = json_decode(json_encode($this->textlocal->getScheduledMessages()));
            $this->load->view('smstemplates/scheduled', $data);
        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
            $this->load->view('smstemplates/scheduled', $data);
        }
    }

    public function cancelScheduled($smsId)
    {
        $response = $this->textlocal->cancelScheduledMessage($smsId);
        print_r($response);
    }

    public function schedule()
    {
        $data['classes'] = $this->ClassModel->getAll();
        $data['students'] = $this->StudentModel->getInfoMany();
        $this->load->view('sms/schedule', $data);
    }

    public function sendScheduledSms()
    {
        if (isset($_POST['id'])) {
            $smsData = $this->SmsModel->getBirthdaySmsData($_POST['id']);
            foreach ($smsData as $data) {
                $birthDate = date("Y").date("-m-d 12:00:00", strtotime($data['dob']));
                $unixTimestamp = strtotime($birthDate);
                $message = "Dear ".$data['name'].", We would like to wish you a very happy birthday and dream for a fabulous life towards your needs and desires. Regards, MPS Sanjauli. SMS sent via Skoolizer.";
                $sender = 'SKOLZR';
                $response = $this->textlocal->sendSms($data['number'], $message, $sender, $unixTimestamp);
            }

            $responseObject = json_decode(json_encode($response), true);
            if ( $responseObject['status'] === "success" ) {
                $this->session->set_flashdata('success', "Scheduled Successfully");
                redirect(site_url('sms/inboxmessages'));
            } else {
                $this->session->set_flashdata('error', "Failed to schedule");
                redirect(site_url('sms/inboxmessages'));
            }
        } else {
            redirect(site_url('home/absenttemplate'));
        }
    }


}
