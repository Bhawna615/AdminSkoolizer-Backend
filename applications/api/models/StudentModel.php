<?php


class StudentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function updateFcmToken($studentId, $token)
	{
		$this->db->where('id', $studentId);
		$this->db->set('fcm_token', $token);
		return $this->db->update('student') ? false : true;
	}
}
