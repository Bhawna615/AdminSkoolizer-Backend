<?php


class EmployeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load()  //load employees
	{
		$query = $this->db->query('SELECT * FROM employees');
		$result = $query->result();
		return $result;
	}



	public function verifyIfAttendance($date)
	{
		$sql='SELECT * FROM empattendance WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->num_rows();
		if ($result>0) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getAttendance()
	{
		$currentYear = date('Y');
		$sql = 'SELECT * FROM empattendance WHERE YEAR(Date) = ?';
		$query = $this->db->query($sql, array($currentYear));
		$result = $query->result();
		return $result;
	}

	public function loadAbsentees($date)
	{
		$sql='SELECT * FROM empabsentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->result();
		return $result;

	}

	public function insert($data)  //insert employees
	{
		return $this->db->insert('employees',$data) ? true : false;
	}

	public 	function delete($id)  //delete employees
	{
		$this->db->where('id', $id);
		return $this->db->delete('employees') ? true : false;
	}

	public function markAbsentees($data)
	{
		$this->db->insert('empabsentees',$data);
	}

	public function markAttendance($attendance)
	{
		return $this->db->insert('empattendance', $attendance) ? true : false;
	}

	public function getFilteredData($year, $month)
	{
		$sql = 'SELECT * FROM empattendance WHERE YEAR(Date) = ? AND MONTH(Date) =? ORDER BY Date DESC';
		$query = $this->db->query($sql, array($year, $month));
		return $query->result();
	}

	public function getAttendanceByMonth($month)
    {
        $currentYear = date('Y');
        $sql = 'SELECT * FROM empattendance WHERE Month(Date)=? AND Year(Date)=?';
        $query = $this->db->query($sql, array($month, $currentYear));
        $result = $query->result();
        return $result;
    }

    public function getAbsentsByMonth($month)
    {
        $currentYear = date('Y');
        $sql = 'SELECT * FROM empabsentees WHERE Month(Date)=? AND Year(Date)=?';
        $query = $this->db->query($sql, array( $month, $currentYear));
        $result = $query->result();
        return $result;
    }
}
