<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEmployeeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

  // 🔹 Get All Employees
    public function getAll()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

    // 🔹 Insert Employee
    public function insert($data)
    {
        return $this->db->insert('employees', $data);
    }

    // 🔹 Delete Employee
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('employees');
    }

    // 🔹 Get Single Employee (future update ke liye useful)
    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('employees')->row();
    }

    // 🔹 Update Employee (future use)
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
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
    public function markAbsentees($data)
	{
		$this->db->insert('empabsentees',$data);
	}

	public function markAttendance($attendance)
	{
		return $this->db->insert('empattendance', $attendance) ? true : false;
	}

    public function getAttendance()
	{
		$currentYear = date('Y');
		$sql = 'SELECT * FROM empattendance WHERE YEAR(Date) = ?';
		$query = $this->db->query($sql, array($currentYear));
		$result = $query->result();
		return $result;
	}

    public function getFilteredData($year, $month)
	{
		$sql = 'SELECT * FROM empattendance WHERE YEAR(Date) = ? AND MONTH(Date) =? ORDER BY Date DESC';
		$query = $this->db->query($sql, array($year, $month));
		return $query->result();
	}
    	public function loadAbsentees($date)
	{
		$sql='SELECT * FROM empabsentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->result();
		return $result;

	}
	public function getAttendanceByMonth($month)
{
    $currentYear = date('Y');
    $sql = 'SELECT * FROM empattendance WHERE Month(Date)=? AND Year(Date)=?';
    return $this->db->query($sql, [$month, $currentYear])->result();
}

public function getAbsentsByMonth($month)
{
    $currentYear = date('Y');
    $sql = 'SELECT * FROM empabsentees WHERE Month(Date)=? AND Year(Date)=?';
    return $this->db->query($sql, [$month, $currentYear])->result();
}

}