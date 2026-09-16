<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentBirthdayModel extends CI_Model {

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


public function loadBirthdays()
{
    $day = date('d');
    $month = date('m');

    $sql = "SELECT 
                id,
                Name,
                Rollno,
                Smsno,
                Dob,
                Class
            FROM student
            WHERE DAY(Dob)=?
            AND MONTH(Dob)=?";

    $query = $this->db->query($sql, array($day, $month));

    return $query->result_array();
}
    public function insert($recipientIds, $message, $file, $url)
{
    foreach ($recipientIds as $recipientId) {

        $newMessage = array(
            'message' => $message,
            'student_id' => $recipientId,
            'message_file' => $file,
            'message_file_url' => $url,
            'sent_at' => date("Y-m-d H:i:s")
        );

        $this->db->insert('messages', $newMessage);
    }

    return true;
}
}