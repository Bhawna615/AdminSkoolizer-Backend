<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceModel extends CI_Model {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    // GET ALL CLASSES
    public function getClasses()
    {
        return $this->db->get('classes')->result();
    }

    // VERIFY ATTENDANCE
    public function verifyAttendance($class,$date)
    {
        return $this->db
            ->where('Class',$class)
            ->where('Date',$date)
            ->get('attendence')
            ->num_rows();
    }

    // GET STUDENTS BY CLASS
    public function getStudentsByClass($class)
    {
        return $this->db
            ->where('Class',$class)
            ->order_by('Rollno','ASC')
            ->get('student')
            ->result();
    }

    // INSERT ABSENTEES
    public function insertAbsentee($data)
    {
        return $this->db->insert('absentees',$data);
    }

    // SAVE ATTENDANCE SUMMARY
    public function saveAttendance($data)
    {
        return $this->db->insert('attendence',$data);
    }

    // GET ATTENDANCE
    public function getAttendance($year)
    {
        return $this->db
            ->query("SELECT * FROM attendence WHERE YEAR(Date)=$year")
            ->result();
    }

    public function getFilteredData($year, $month, $class)
{
    $sql = 'SELECT * FROM attendence
            WHERE YEAR(Date)=?
            AND MONTH(Date)=?
            AND Class=?
            ORDER BY Date DESC';

    $query = $this->db->query($sql, [$year,$month,$class]);

    return $query->result();
}

 // GET ABSENT / LEAVE DETAILS
    public function getDetails($class, $date)
    {
        $sql = "SELECT *
                FROM absentees
                WHERE Class=? AND Date=?";

        $query = $this->db->query($sql, [$class, $date]);

        return $query->result();
    }

    public function delete($class, $date)
{
    $this->db->where('Date', $date);
    $this->db->where('Class', $class);
    $this->db->delete('absentees');

    $this->db->where('Date', $date);
    $this->db->where('Class', $class);
    $this->db->delete('attendence');
}
public function getAbsentees($class, $date)
{
    $this->db->where('Class', $class);
    $this->db->where('Date', $date);

    return $this->db->get('absentees')->result();
}

public function byMonth($class, $month, $currentYear)
	{
		$sql='SELECT * FROM attendence WHERE Month(Date)=? AND Year(Date)=? AND Class=?';
		$query=$this->db->query($sql,array($month, $currentYear, $class));
		$result=$query->result();
		return $result;
	}

	public function getAbsents($class, $month, $currentYear)
	{
		$sql='SELECT * FROM absentees WHERE Class=? AND Month(Date)=? AND Year(Date)=?';
		$query=$this->db->query($sql,array($class, $month, $currentYear));
		$result=$query->result();
		return $result;
	}

}