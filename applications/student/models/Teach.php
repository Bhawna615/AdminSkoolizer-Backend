<?php

/**
 *
 */
class Teach extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function takeout($id)
    {
        $this->load->database();

        $sql = 'SELECT * FROM student WHERE id=?';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;

    }

    function attend($rollno, $class)
    {
        $sql = "SELECT * FROM absentees WHERE Rollno=? AND Class=?";
        $query = $this->db->query($sql, array($rollno, $class));
        $sql2 = "SELECT * FROM attendence WHERE Class=?";
        $query2 = $this->db->query($sql2, $class);
        $row2 = $query2->num_rows();
        $row = $query->num_rows();
        $result = $row2 - $row;
        $attend = array($row2, $result);
        return $attend;
    }

    function explore($class, $id)
    {
        $sql = 'SELECT * FROM timetable WHERE Class=? AND TeacherId=?';
        $query = $this->db->query($sql, array($class, $id));
        $row = $query->result();
        return $row;
    }

    function studentList($class)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
        $query = $this->db->query($sql, $class);
        $row = $query->result();
        return $row;
    }

    function conduct($data)
    {
        $this->load->database();
        $this->db->insert('conduct', $data);
    }

    function totalClasses($class)
    {
        $sql = 'SELECT Date FROM attendence WHERE Class=?';
        $query = $this->db->query($sql, $class);
        $row = $query->num_rows();
        return $row;

    }

    function totalAbsent($class, $total)
    {
        $sql = 'SELECT Date FROM attendence WHERE Class=?';
        $query = $this->db->query($sql, $class);
        $row = $query->num_rows();

        $sql2 = 'SELECT Rollno FROM student WHERE Class=?';
        $query2 = $this->db->query($sql2, $class);
        $row2 = $query2->result();
        if ($row > 0) {

            $attendence = array();
            foreach ($row2 as $key) {

                $sql3 = 'SELECT Date,Rollno FROM absentees WHERE Class=? AND Rollno=?';
                $query3 = $this->db->query($sql3, array($class, $key->Rollno));
                $row3 = $query3->num_rows();
                $attendence[$key->Rollno] = $row3;
            }
            foreach ($attendence as $key => $value) {
                $attendence[$key] = 100 - ($value / $total) * 100;
            }

            foreach ($attendence as $key => $value) {
                $sql4 = 'UPDATE student SET Attendence=? WHERE Class=? AND Rollno=?';
                $query4 = $this->db->query($sql4, array($value, $class, $key));
            }

        }

        $sql5 = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
        $query5 = $this->db->query($sql5, $class);
        $row5 = $query5->result();
        return $row5;
    }

    function checkPrev($class)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM conduct WHERE Class=? AND Date<?';
        $query = $this->db->query($sql, array($class, $date));
        $row = $query->num_rows();

        $result = $query->result();
        if ($row > 0) {
            return $result;
        } else {
            return false;
        }
    }

    function getMarks($code)
    {
        $sql = 'SELECT * FROM exam WHERE Examcode=? ORDER BY Marksobtained desc';
        $query = $this->db->query($sql, $code);
        $row = $query->result();

        return $row;
    }

    function rollCall($class, $offset)
    {
        $sql = "SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC LIMIT $offset,1";
        $query = $this->db->query($sql, $class);
        $result = $query->result();
        return $result;

    }

    function count($class)
    {
        $sql = "SELECT count(Rollno) FROM student WHERE Class=?";
        $query = $this->db->query($sql, $class);
        $result = $query->result_array();
        return $result;
    }

    function getNamebyRoll($arr, $class)
    {

        $list = array();
        foreach ($arr as $key => $value) {
            $sql = "SELECT Rollno,Name FROM student WHERE Rollno=? AND Class=?";
            $query = $this->db->query($sql, array($value, $class));
            $result = $query->result_array();

            foreach ($result as $row) {
                $list[$row['Rollno']] = $row['Name'];
            }

        }
        return $list;

    }

    function finalSubmit($data)
    {
        $this->db->insert('attendence', $data);

    }

    function Absentdata($data)
    {
        $this->db->insert('absentees', $data);
    }

    function check($class)
    {
        $date = date('Y-m-d');
        $sql = "SELECT * FROM attendence WHERE Class=? AND Date=?";

        $query = $this->db->query($sql, array($class, $date));
        $result = $this->db->affected_rows($query);
        return $result;

    }


    function verifyTeacher($email, $password)
    {
        $sql = 'SELECT * FROM teachers WHERE Email=?';
        $query = $this->db->query($sql, $email);
        $result = $query->result();

        foreach ($result as $row) {
            if ($password == $row->Password) {
                return $result;
            } else {
                return false;
            }
        }
    }

    function Addteacher($data)
    {
        $this->db->insert('teachers', $data);
        redirect(site_url('home'));
    }

    function myProfile($id)
    {
        $sql = 'SELECT * FROM teachers WHERE id=?';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;
    }

    function homework($data)
    {
        $this->db->insert('assignment', $data);
    }

    function totalAbsents($roll, $class)
    {
        $sql = "SELECT * FROM absentees WHERE Rollno=? AND Class=?";
        $query = $this->db->query($sql, array($roll, $class));
        $result = $query->result();
        return $result;
    }

    function timetable($id)
    {
        $day = date('l');
        $sql = 'SELECT * FROM timetable,teachers WHERE timetable.TeacherId=teachers.id AND teachers.id=? AND Day=?';
        $query = $this->db->query($sql, array($id, $day));
        $result = $query->result();
        return $result;
    }

    function allClasses($id)
    {
        $sql = 'SELECT Class FROM timetable WHERE TeacherId=? ORDER BY Class ASC';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;
    }

    function getclassteacher($id)
    {
        $sql = 'SELECT Classteacher FROM teachers WHERE id=?';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        foreach ($result as $row) {
            $class = $row->Classteacher;
        }

        return $class;
    }

    function getteacherclasses($id)
    {
        $sql = 'SELECT distinct(Class) FROM timetable WHERE TeacherId=? ORDER BY Class ASC';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;
    }

    function loadbydate($date, $class)
    {
        $sql = 'SELECT Rollno,onLeave FROM absentees WHERE Class=? AND Date=?';
        $query = $this->db->query($sql, array($class, $date));
        $rows = $query->num_rows();
        $result = $query->result();
        if ($rows < 1) {
            return 0;
        } else {
            return $result;
        }
    }

    function getsubjects($class, $id)
    {
        $sql = 'SELECT DISTINCT(Subjectname) FROM timetable WHERE Class=? AND TeacherId=? ';
        $query = $this->db->query($sql, array($class, $id));
        $result = $query->result();
        return $result;
    }

    function loadexams($id)
    {
        $sql = 'SELECT * FROM teachers,conduct,timetable WHERE timetable.Class=conduct.Class AND teachers.id=timetable.TeacherId AND conduct.Subject=timetable.Subjectname AND teachers.id=? ORDER BY conduct.Date DESC';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;
    }

    function loadconductedexams($id)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT conduct.id,conduct.Subject,conduct.Date,conduct.Examname,conduct.Maxmarks FROM teachers,conduct,timetable WHERE timetable.Class=conduct.Class AND teachers.id=timetable.TeacherId AND conduct.Subject=timetable.Subjectname AND teachers.id=? AND conduct.Date<? ORDER BY conduct.Date DESC';
        $query = $this->db->query($sql, array($id, $date));
        $result = $query->result();
        return $result;
    }

    function loadresults($code)
    {
        $sql = 'SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND exam.Examcode=? ORDER BY Rollno ASC';
        $query = $this->db->query($sql, $code);
        $result = $query->result();
        return $result;
    }

    function updateuserpassword($id, $new)
    {
        $sql = 'UPDATE teachers SET Password=? WHERE id=?';
        $query = $this->db->query($sql, array($new, $id));
        if (!$query) {
            echo "Something went wrong";
        }
    }

    function loadhw($id)
    {
        $sql = 'SELECT timetable.Class,timetable.Subjectname,assignment.Date,assignment.Assignment FROM assignment,timetable,teachers WHERE assignment.Class=timetable.Class AND teachers.id=timetable.TeacherId AND  teachers.id=? AND assignment.Subjectname=timetable.Subjectname ORDER BY assignment.Date desc';
        $query = $this->db->query($sql, $id);
        $result = $query->result();
        return $result;
    }

    function loadmessages()
    {
        $sql = 'SELECT * FROM audience,messages WHERE audience.messageid=messages.id AND (audience.audience="Everyone" OR audience.audience="Teachers") ORDER BY messages.Timestamp desc';
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    function uploadimage($id, $img)
    {
        $sql = 'UPDATE teachers SET image=? WHERE id=?';
        $query = $this->db->query($sql, array($img, $id));
        if (!$query) {
            echo "Something went wrong";
        }
    }

}

?>