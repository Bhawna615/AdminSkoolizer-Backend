<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAttendanceModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getStudentAttendance($id)
    {
        if (!$id) {
            return [0, 0, []];
        }

        // 🔹 Get Student Info
        $sql = 'SELECT Class, Rollno FROM student WHERE id = ?';
        $query = $this->db->query($sql, [$id]);
        $student = $query->row();

        if (!$student) {
            return [0, 0, []];
        }

        $class = $student->Class;
        $roll  = $student->Rollno;

        // 🔹 Total Working Days for Class
        $sqla = 'SELECT id FROM attendence WHERE Class = ?';
        $querya = $this->db->query($sqla, [$class]);
        $totalDays = $querya->num_rows();

        // 🔹 Get Absent Dates
        $sqlb = 'SELECT Date FROM absentees WHERE Class = ? AND Rollno = ?';
        $queryb = $this->db->query($sqlb, [$class, $roll]);
        $absentCount = $queryb->num_rows();
        $absentDates = $queryb->result();

        // 🔹 Present Days = Total - Absent
        $presentDays = $totalDays - $absentCount;

        return [
            $totalDays,
            $presentDays,
            $absentDates
        ];
    }
    public function getInfoFlexible($id)
{
    // Try ID
    $this->db->where('id', $id);
    $query = $this->db->get('student');
    if ($query->num_rows() > 0) {
        return $query->row();
    }

    // Try student_id
    $this->db->where('id', $id);
    $query = $this->db->get('student');
    if ($query->num_rows() > 0) {
        return $query->row();
    }

    // Try admission number
    $this->db->where('Admno', $id);
    $query = $this->db->get('student');
    if ($query->num_rows() > 0) {
        return $query->row();
    }

    return null;
}

}
