<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMessageModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
public function loadById($id)  // Load messages by id
{
    $sql = 'SELECT * FROM messages WHERE student_id = ? ORDER BY sent_at DESC';
    $query = $this->db->query($sql, $id);
    return $query->result();
}

public function load() //load messages
	{
		$year = date('Y');
		$query = $this->db->query("SELECT * FROM messages,student WHERE messages.student_id=student.id AND YEAR(sent_at) = '$year' ORDER BY messages.sent_at desc LIMIT 2000");
		$result = $query->result();
		return $result;
	}
public function loadRecipients()
	{
		$query=$this->db->query('SELECT id,Name,Rollno,Smsno,Class FROM student');
		$result=$query->result();
		return $result;
	}


public function insert($recipientIds, $message, $file, $url)
{
	foreach ($recipientIds as $recipientId) {

		$newMessage = array(
			'message' => $message,
			'student_id' => $recipientId,
			'sent_at' => date("Y-m-d H:i:s")
		);

		// ✅ FILE TABHI SAVE HOGI JAB FILE EXIST KRE
		if (!empty($file)) {
			$newMessage['message_file'] = $file;
			$newMessage['message_file_url'] = $url;
		}

		$this->db->insert('messages', $newMessage);
	}

	return true;
}



	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM messages,student WHERE messages.student_id=student.id AND YEAR(sent_at) = ? AND MONTH(sent_at) =? AND student.Class =? ORDER BY sent_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	// public function getRecipients(array $recipientIds)
	// {
	// 	$recipients = array();
	// 	foreach ($recipientIds as $key => $id) {
	// 		$this->db->where('id', $id);
	// 		$this->db->select('fcm_token');
	// 		$query = $this->db->get('student');
	// 		$student = $query->row();
	// 		$recipients[] = $student->fcm_token;
	// 	}
	// 	return $recipients;
	// }

	public function getRecipients($recipientIds)
{
    $this->db->select('fcm_token');
    $this->db->from('student'); // ensure table name correct
    $this->db->where_in('id', $recipientIds);

    $query = $this->db->get();
    $result = $query->result_array();

    return array_column($result, 'fcm_token');
}
	public function loadAllAbsentsToday()
	{
		$date=date('Y-m-d');
		$sql='SELECT * FROM absentees,student WHERE absentees.Class=student.Class AND absentees.Rollno=student.Rollno AND  Date=? ORDER BY student.Class';
		$query=$this->db->query($sql,$date);
		$result=$query->result();
		return $result;
	}

    public function getAll() //get all classes
	{
		$query=$this->db->query('SELECT distinct(Classname) FROM classes');
		$result=$query->result();
		return $result;
	}

	
	 public function get($id)
    {
        return $this->db->where('id', $id)->get('student')->row();
    }

	public function loadRecentMessages($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->message_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('sent_at >', $checkedAt);
        $this->db->where('student_id', $studentId);
        return $this->db->get('messages')->num_rows();
    }
	public function updateMessageCheckTime($studentId)
    {
        $this->db->set('message_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Assignments Notification */
    public function loadRecentAssignments($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->assignment_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('Class', $studentClass);
        return $this->db->get('assignment')->num_rows();
    }

    public function updateAssignmentCheckTime($studentId)
    {
        $this->db->set('assignment_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Exams Notification */
    public function loadRecentExams($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->exam_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('Class', $studentClass);
        return $this->db->get('conduct')->num_rows();
    }

    public function updateExamCheckTime($studentId)
    {
        $this->db->set('exam_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

	 public function loadRecentSchoolPosts($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->school_post_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('recipient_group', 'school');
        return $this->db->get('posts')->num_rows();
    }

    public function updateSchoolPostCheckTime($studentId)
    {
        $this->db->set('school_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Class Posts Notification */
    public function loadRecentClassPosts($studentId, $studentClass)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->class_post_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('recipient_group', $studentClass);
        return $this->db->get('posts')->num_rows();
    }

    public function updateClassPostCheckTime($studentId)
    {
        $this->db->set('class_post_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Events Notification */
    public function loadRecentEvents($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->event_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        return $this->db->get('events')->num_rows();
    }

    public function updateEventCheckTime($studentId)
    {
        $this->db->set('event_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Fee Notification */
    public function loadRecentPayments($studentId)
    {
        $student = $this->get($studentId);
        $checkedAt = $student->fee_checked_at ?? '2000-01-01 00:00:00';

        $this->db->where('created_at >', $checkedAt);
        $this->db->where('student_id', $studentId);
        return $this->db->get('fee')->num_rows();
    }

    public function updateFeeCheckTime($studentId)
    {
        $this->db->set('fee_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        $this->db->update('student');
    }

    /** 🔹 Mark notification type as read */
    public function markNotificationAsRead($studentId, $type)
    {
        $fieldMap = [
            'messages' => 'message_checked_at',
            'assignments' => 'assignment_checked_at',
            'exams' => 'exam_checked_at',
            'schoolPosts' => 'school_post_checked_at',
            'classPosts' => 'class_post_checked_at',
            'events' => 'event_checked_at',
            'payments' => 'fee_checked_at'
        ];

        if (!isset($fieldMap[$type])) return false;

        $this->db->set($fieldMap[$type], date("Y-m-d H:i:s"));
        $this->db->where('id', $studentId);
        return $this->db->update('student');
    }
}