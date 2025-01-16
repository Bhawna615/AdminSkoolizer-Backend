<?php 
/**
 * 
 */
class Princi extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function verifyprincipal($email,$pass)
   {
    $sql='SELECT * FROM principal WHERE Email=?';
    $query=$this->db->query($sql,$email);
    $rows=$query->num_rows();
    $result=$query->result();
    if ($rows>0) {
         foreach ($result as $row) 
        {
           if ($pass==$row->Password)
            {
              return $result;
            }
            else
            {
                return false;
            }
        }
    }
    else
    {
        return false;
    }
       
    
   }

   function principalDetails($id)
   {
    $sql='SELECT * FROM principal WHERE id=?';
    $query=$this->db->query($sql,$id);
    $result=$query->result();
    return $result;
   }

   function teachers()
   {
    $query=$this->db->query("SELECT * FROM teachers");
    $result=$query->result();
    return $result;
   }

   function librarian()
   {
    $query=$this->db->query("SELECT * FROM librarian");
    $result=$query->result();
    return $result;
   }

   function transportstaff()
   {
    $query=$this->db->query("SELECT * FROM transportstaff");
    $result=$query->result();
    return $result;
   }

   function fetchtt($teacher,$day)
   {
    $sql="SELECT * FROM timetable,teachers WHERE timetable.TeacherId=teachers.id AND timetable.TeacherId=? AND timetable.Day=?";
    $query=$this->db->query($sql,array($teacher,$day));
    $result=$query->result();
    return $result;
   }

   function loadmessages()
   {
    $sql='SELECT * FROM messages,audience WHERE messages.id=audience.messageid ORDER BY messages.Timestamp desc LIMIT 20' ;
    $query=$this->db->query($sql);
    $result=$query->result();
    return $result;
   }

   function addnewmessage($recieptents,$message)
   {
      $this->db->insert('messages',$message);
      $insert_id=$this->db->insert_id();
      $array=explode(",",$recieptents);
      foreach ($array as $row) {
        if ($row=='Everyone') {
          $audience = array('audience' => $row ,
          'messageid' => $insert_id );
          $this->db->insert('audience',$audience);
          break;
        }
        else
        {
          $audience = array('audience' => $row ,
          'messageid' => $insert_id );
          $this->db->insert('audience',$audience);
        }
      }
  
   }

   function loadstudents()
   {
    $query=$this->db->query('SELECT * FROM student WHERE Feepending=TRUE');
    $result=$query->result();
    return $result;
   }

   function loadissuedbooks()
  {
    $query=$this->db->query('SELECT * FROM borrower,student WHERE borrower.BorrowerId=student.BorrowerId ORDER BY Timestamp desc');
    $result=$query->result();
    return $result;
  }

  function getStrength()
  {
    $query=$this->db->query('SELECT * FROM classes ORDER by Classname');
    $result=$query->result();
    return $result;

  }

  function loadroutes()
  {
    $query=$this->db->query('SELECT * FROM routes,subroutes WHERE routes.id=subroutes.routeid');
    $result=$query->result();
    return $result;
  }

    function updateuserpassword($id,$new)
   {
    $sql='UPDATE principal SET Password=? WHERE id=?';
    $query=$this->db->query($sql,array($new,$id));
    if (!$query) {
      echo "Something went wrong";
    }
   }

function uploadimage($id,$img)
   {
    $sql='UPDATE principal SET image=? WHERE id=?';
    $query=$this->db->query($sql,array($img,$id));
    if (!$query) {
        echo "Something went wrong";
    }
   }

   function loadattendance($date)
   {
    $sql='SELECT * FROM attendence WHERE Date=? ORDER BY Class';
    $query=$this->db->query($sql,$date);
    $result=$query->result();
    return $result;
   }

   function loademployees()
   {
    $query=$this->db->query('SELECT * FROM employees');
    $result=$query->result();
    return $result;
   }

   function loadempattendance($date)
   {
    $sql='SELECT * FROM empattendance WHERE Date=?';
    $query=$this->db->query($sql,$date);
    $result=$query->result();
    return $result;
   }

   function loadempabsentees($date)
   {
    $sql='SELECT * FROM empabsentees WHERE Date=?';
    $query=$this->db->query($sql,$date);
    $result=$query->result();
    return $result;
   }

   function loadstudentsbyclass($class)
   {
    $sql='SELECT * FROM student WHERE Class=? order by Rollno';
    $query=$this->db->query($sql,$class);
    $result=$query->result();
    return $result;
   }

}

?>