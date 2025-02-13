<?php


class AttendanceModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	
    public function getStudentAttendance($id)
    {
        // Fetch student details using the student ID
        $sql = 'SELECT * FROM student WHERE id = ?';
        $query = $this->db->query($sql, $id);
        $result = $query->row(); // Fetch a single row

        if ($result) {
            $class = $result->Class;
            $roll = $result->Rollno;

            // Fetch total attendance days for the class
            $sqla = 'SELECT id FROM attendence WHERE Class = ?';
            $querya = $this->db->query($sqla, $class);
            $totalDays = $querya->num_rows();

            // Fetch absent days for the student
            $sqlb = 'SELECT Date FROM absentees WHERE Class = ? AND Rollno = ?';
            $queryb = $this->db->query($sqlb, array($class, $roll));
            $absentDays = $queryb->num_rows();
            $presentDays = $totalDays - $absentDays;
            $absentDates = $queryb->result();
            
            // Fetch working days for the student from attendence table
            $sql = "SELECT DISTINCT Date FROM attendence WHERE Class = ?";
            $query = $this->db->query($sql, array($class));
            $workingDays = $query->result();
            

            $info = array($totalDays, $presentDays, $absentDates, $workingDays);
            
            return $info;
        } else {
            return array(0, 0, array(), array()); // Return empty data if student not found
        }
    }

	
	
	
}
