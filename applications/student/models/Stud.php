<?php

/**
 *  
 */
class Stud extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();

		
	}
	function takeout($id)
	{
		$this->load->database();
		
		$sql='SELECT * FROM student WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;

	}
	function attend($rollno,$class)
	{
		$sql="SELECT * FROM absentees WHERE Rollno=? AND Class=?";
		$query=$this->db->query($sql,array($rollno,$class));
		$sql2="SELECT * FROM attendence WHERE Class=?";
		$query2=$this->db->query($sql2,$class);
		$row2=$query2->num_rows();
		$row=$query->num_rows();  
		$result=$row2-$row;
		$attend=array($row2,$result);
		return $attend;
		}



	function studentList($class)
	{
		$sql='SELECT * FROM student WHERE Class=?';
		$query=$this->db->query($sql,$class);
		$row=$query->result();
		return $row;
	}
	function conduct($data)
	{
		$this->load->database();
		$this->db->insert('conduct',$data);
	}
	function totalClasses($class)
	{
		$sql='SELECT Date FROM attendence WHERE Class=?';
		$query=$this->db->query($sql,$class);
		$row=$query->num_rows();
		return $row;

	}


	function checkPrev($class)
	{
        $date=date('Y-m-d');
		$sql='SELECT DISTINCT Subject FROM conduct WHERE Class=? AND Date<?';
		$query=$this->db->query($sql,array($class,$date));
		$row=$query->num_rows();
		
		$result=$query->result();
		if ($row>0) 
		{
			return $result;	
		}
		else
		{
			return False;
		}
	}

	function getMarks($subject,$class,$rollno)
	{
		$sql='SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND conduct.Subject=? AND conduct.Class=? AND exam.Rollno=? ORDER BY conduct.Date desc';
		$query=$this->db->query($sql,array($subject,$class,$rollno));
		$row=$query->result();
		
		return $row;
	}

	function newUser($email,$password,$class,$roll)
	{
		
		$sql="UPDATE student SET Email=?,Password=? WHERE Class=? AND Rollno=?";
		$query=$this->db->query($sql,array($email,$password,$class,$roll));
		if (!$query) {
			echo "Something went wrong";		
		}
		else
		{
		return;
		}
	}
	function verifyUser($email,$password)
	{
		$sql='SELECT * FROM student WHERE Email=?';
		$query=$this->db->query($sql,$email);
		$result=$query->result();
		foreach ($result as $row) {
			if ($password==$row->Password) {
				return $result;
			}
			else
			{
				return FALSE;
			}
		}
	}


	

   function ifExam($class)
   {
    $sql='SELECT * FROM conduct WHERE Class=? ORDER BY Date desc';
    $query=$this->db->query($sql,$class);
    $result=$query->result();
    return $result;
   }

   function getResults($code,$roll)
   {
    $sql='SELECT * FROM exam WHERE Examcode=? AND Rollno=?';
    $query=$this->db->query($sql,array($code,$roll));
    $result=$query->result();
    return $result;
   }
   function showHw($date,$class)
   {
    $sql='SELECT * FROM assignment WHERE Class=? AND Date=?';
    $query=$this->db->query($sql,array($class,$date));
    $result=$query->result();
    return $result;
   }
  


   function StudentprofileContent($id)
   {
    $sql='SELECT * FROM student WHERE id=?';
    $query=$this->db->query($sql,$id);
    $result=$query->result();
    return $result;
   }

   function updateprofiledetails($id,$data)
   {
    
   }

   
   
   function updatePass($id,$new)
   {
    $sql='UPDATE Password SET  ';
   } 	

   function CheckStudentState($class,$roll)
   {
   	$sql='SELECT Email FROM student WHERE Class=? AND Rollno=?';
   	$query=$this->db->query($sql,array($class,$roll));
   	$result=$query->result();
   	return $result;
   }

   function BorrowerProfile($id)
   {
   	$sql='SELECT * FROM student,borrower WHERE student.BorrowerId=borrower.BorrowerId AND student.id=? ORDER BY borrower.IssueDate';
   	$query=$this->db->query($sql,$id);
   	$result=$query->result();
   	return $result;
   }

   function getpassengerid($id)
   {
   	$sql='SELECT Passengerid FROM student WHERE id=?';
   	$query=$this->db->query($sql,$id);
   	$result=$query->result();
   	return $result;
   }

   function timetable($class)
   {
   	$day=date('l');
   	$sql='SELECT Subjectname,Stime,Etime,Teachername FROM timetable,teachers WHERE timetable.TeacherId= teachers.id AND timetable.Class=? AND timetable.Day=? ORDER BY Stime ASC';
   	$query=$this->db->query($sql,array($class,$day));
   	$result=$query->result();
   	return $result;
   }

   function Transportinfo($data)
   {
   	foreach($data as $row)
   	{
   		$pid=$row->Passengerid;
   	}
   	$sql='SELECT * FROM passengers,routes,stations WHERE passengers.Routeid=routes.id AND passengers.Stationid=stations.id AND passengers.id=?';
   	$query=$this->db->query($sql,$pid);
   	if (!$query) {
   		echo "Something went wrong";
   	}
   	$result=$query->result();
   	return $result;

   }

   function loadactiveroute($data)
   {
   	foreach($data as $row)
   	{
   		$pid=$row->Passengerid;
   	}
   	$sql='SELECT * FROM passengers,currentroute,transportstaff,subroutes WHERE passengers.Routeid=currentroute.routeid AND currentroute.driverid=transportstaff.id AND currentroute.subrouteid=subroutes.id AND passengers.id=? AND currentroute.status=FALSE';
   	$query=$this->db->query($sql,$pid);
   	$result=$query->result();
   	return $result;
   }

   function loadlastroute($data)
   {
   	$date=date("Y-m-d");
   	foreach($data as $row)
   	{
   		$pid=$row->Passengerid;
   	}
   	$sql='SELECT * FROM passengers,currentroute,transportstaff,subroutes WHERE passengers.Routeid=currentroute.routeid AND currentroute.driverid=transportstaff.id AND currentroute.subrouteid=subroutes.id AND passengers.id=? AND date(currentroute.Reachedat)=? AND currentroute.status=TRUE ORDER BY currentroute.Reachedat desc LIMIT 1';
   	$query=$this->db->query($sql,array($pid,$date));
   	$result=$query->result();
   	return $result;
   }

   function updateuserpassword($id,$new)
   {
   	$sql='UPDATE student SET Password=? WHERE id=?';
   	$query=$this->db->query($sql,array($new,$id));
   	if (!$query) {
   		echo "Something went wrong";
   	}
   }

   function loadmessages($id)
   {
    $sql='SELECT * FROM messages WHERE recipientid=? ORDER BY Timestamp desc';
    $query=$this->db->query($sql,$id);
    $result=$query->result();
    return $result;
   }
  

function uploadimage($id,$img)
   {
    $sql='UPDATE student SET image=? WHERE id=?';
    $query=$this->db->query($sql,array($img,$id));
    if (!$query) {
        echo "Something went wrong";
    }
   }

}

?> 