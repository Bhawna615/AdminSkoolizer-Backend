<?php
class Lib extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}
		function verifyUser($email,$password)
	{
		$sql='SELECT * FROM librarian WHERE Email=?';
		$query=$this->db->query($sql,$email);
		$result=$query->result();
		foreach ($result as $row) {
			if (password_verify($password, $row->Password)) {
				return $result;
			}
			else
			{
				return FALSE;
			}
		}
	}

	function profile($id)
	{
		$sql='SELECT * FROM librarian WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	function findstudent($class,$roll)
	{
		$sql="SELECT * FROM student WHERE Class=? AND Rollno=?";
		$query=$this->db->query($sql,array($class,$roll));
		$result=$query->result();
		return $result;
	}

	function registerbook($borrower)
	{
		$this->db->insert('borrower',$borrower);
	}

	function loadissuedbooks()
	{
		$query=$this->db->query('SELECT * FROM borrower,student WHERE borrower.BorrowerId=student.BorrowerId ORDER BY Timestamp desc');
		$result=$query->result();
		return $result;
	}

	function findborrower($class,$roll)
	{
		$sql='SELECT * FROM borrower,student WHERE borrower.BorrowerId=student.BorrowerId AND student.Class=? AND student.Rollno=?';
		$query=$this->db->query($sql,array($class,$roll));
		$result=$query->result();
		return $result;
	}
	function insertbook($book)
	{
		$this->db->insert('books',$book);
	}

	function getbooks()
	{
		$query=$this->db->query('SELECT * FROM books');
		$result=$query->result();
		return $result;
	}

	function markreturn($transactionid)
	{
		$date=date('Y-m-d');
		$sql='UPDATE borrower SET ReturnDate=? WHERE TransactionId=?';
		$query=$this->db->query($sql,array($date,$transactionid));
		if (!$query) {
			echo "Something went wrong";
		}
	}

	    function updateuserpassword($id,$new)
   {
    $sql='UPDATE librarian SET Password=? WHERE id=?';
    $query=$this->db->query($sql,array($new,$id));
    if (!$query) {
      echo "Something went wrong";
    }
   }

function uploadimage($id,$img)
   {
    $sql='UPDATE librarian SET image=? WHERE id=?';
    $query=$this->db->query($sql,array($img,$id));
    if (!$query) {
        echo "Something went wrong";
    }
   }

   function getoverduebooks()
   {
   	$date=date('Y-m-d');
   	$sql='SELECT * from borrower,student where borrower.BorrowerId=student.BorrowerId and borrower.DueDate<? AND borrower.ReturnDate IS NULL order by borrower.DueDate desc';
   	$query=$this->db->query($sql,$date);
   	$result=$query->result();
   	return $result;
   }

    function loadmessages()
   {
    $sql='SELECT * FROM messages,audience WHERE messages.id=audience.messageid AND (audience.audience="Everyone" OR audience.audience="Librarian") ORDER BY messages.Timestamp desc';
    $query=$this->db->query($sql);
    $result=$query->result();
    return $result;
   }

}
?>