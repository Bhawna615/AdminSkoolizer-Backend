<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAdminByUsername($username)
    {
        return $this->db->where('username', $username)
                        ->get('admin') // your table name
                        ->row();
    }

    public function verifyPassword($username, $password)
    {
        $admin = $this->getAdminByUsername($username);
        return $admin ? password_verify($password, $admin->password) : false;
    }

    public function getUserType($username)
    {
        $admin = $this->db->select('usertype')
                          ->where('username', $username)
                          ->get('admin')
                          ->row();
        return $admin ? $admin->usertype : null;
    }

    public function getUserId($username)
    {
        $admin = $this->db->select('user_id')
                          ->where('username', $username)
                          ->get('admin')
                          ->row();
        return $admin ? $admin->user_id : null;
    }

    public function getSubjectsByStudent($student)
    {
        $sql = "SELECT DISTINCT(Subject) FROM conduct WHERE Class = ?";
        $query = $this->db->query($sql, array($student->Class));
        return $query->result();
    }
    public function getByStudentId($studentId)
	{
		$sql = 'SELECT * FROM metrics,student_metric WHERE metrics.metric_id = student_metric.metric_id AND student_metric.student_id = ?';
		$query = $this->db->query($sql, array($studentId));
		return $query->result();
	}
}
