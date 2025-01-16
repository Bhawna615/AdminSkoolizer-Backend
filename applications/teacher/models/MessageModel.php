<?php


class MessageModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load($class) //load messages
	{
		$year = date('Y');
		$query = $this->db->query("SELECT * FROM messages,student WHERE student.Class = '$class' and messages.student_id=student.id AND YEAR(sent_at) = '$year' ORDER BY messages.sent_at desc LIMIT 2000");
		$result = $query->result();
		return $result;
	}

	public 	function loadById($id)  //Load messages by id
	{
		$sql='SELECT * FROM messages WHERE student_id = ?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	public function loadRecipients($class)
	{
		$query=$this->db->query("SELECT id,Name,Rollno,Class FROM student WHERE Class='$class'");
		$result=$query->result();
		return $result;
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

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM messages,student WHERE messages.student_id=student.id AND YEAR(sent_at) = ? AND MONTH(sent_at) =? AND student.Class =? ORDER BY sent_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function getRecipients(array $recipientIds)
	{
		$recipients = array();
		foreach ($recipientIds as $key => $id) {
			$this->db->where('id', $id);
			$this->db->select('fcm_token');
			$query = $this->db->get('student');
			$student = $query->row();
			$recipients[] = $student->fcm_token;
		}
		return $recipients;
	}
}
