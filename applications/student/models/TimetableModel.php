<?php


class TimetableModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getByClass($class)
    {
        $currentDay = date('l');
        $sql = 'SELECT Subjectname,Stime,Etime,Teachername FROM timetable,teachers WHERE timetable.TeacherId= teachers.id AND timetable.Class=? AND timetable.Day=? ORDER BY Stime ASC';
        $query = $this->db->query($sql, array($class, $currentDay));
        $result = $query->result();
        return $result;
    }
}