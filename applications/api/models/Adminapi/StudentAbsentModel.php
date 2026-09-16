<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentAbsentModel extends CI_Model {

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function loadAllAbsentsToday()
{
    $date = date('Y-m-d');

    $sql = "SELECT 
                student.id,
                student.Name,
                student.Class,
                student.Rollno,
                student.Smsno
            FROM absentees
            JOIN student 
            ON absentees.Class = student.Class
            AND absentees.Rollno = student.Rollno
            WHERE absentees.Date = ?
            ORDER BY student.Class ASC";

    $query = $this->db->query($sql, array($date));

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