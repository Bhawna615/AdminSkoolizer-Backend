<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCountModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

 // Total Students Count
    public function getTotalStudents()
    {
        return $this->db->count_all('student');
    }

    public function getPassedOutStudents()
{
    $query = $this->db->query("SELECT id FROM student WHERE Class = 'passed_out'");

    return $query->num_rows();
}

    public function getTotalTeachers()
    {
        $query=$this->db->query('SELECT id FROM teachers');
        return $query->num_rows();
    }

    public function getTotalClasses()
    {
        $query=$this->db->query('SELECT id FROM classes');
        return $query->num_rows();
    }

    public function getTotalEmployees()
    {
        $query=$this->db->query('SELECT id FROM employees');
        return $query->num_rows();
    }

    public function getTotalActiveRoutes()
    {
        $query = $this->db->query("SELECT id FROM currentroute WHERE status=FALSE");

        return $query->num_rows();
    }

    public function getTotalAbsentStudents()
    {
       $date=date('Y-m-d');
		$sql='SELECT absenteeid FROM absentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
        return $query->num_rows();
    }

    public function getTotalEmployeeAbsent()
    {
        $date=date('Y-m-d');
		$sql='SELECT id FROM empabsentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
        return $query->num_rows();
    }

    public function getTotalExamsToday()
    {
       $date=date('Y-m-d');
		$sql='SELECT id FROM conduct WHERE Date=?';
		$query=$this->db->query($sql,$date);
        return $query->num_rows();
    }

    public function getTotalBirthdaysToday()
    {
       $day=date('d');
		$month=date('m');
		$sql='SELECT id FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=?';
		$query=$this->db->query($sql,array($day,$month));
        return $query->num_rows();
    }

    public function getTotalFeePending()
    {
        return $this->db->where('status', 0)->get('fee')->num_rows();
    }

    public function getTotalLeaveRequests()
    {
         return $this->db->where('status', false)
	    ->get('leave_requests')->num_rows();
    }

     public function getTotalSponseredStudents() 
     {
        $query=$this->db->query("SELECT id FROM student  WHERE tuition_fee = '0' AND Class != 'passed_out'");
	    return $query->num_rows();
     }

    
}