<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function enroll($data) //enroll student
	{
		if ($this->db->insert('student', $data)) {
			$this->db->where('id', $this->db->insert_id());
			$student = $this->db->get('student')->first_row();
			return $student;
		} else {
			return false;
		}
	}

   
public function getAllStudents()
{
    return $this->db
        ->select('
            id,
            Name,
            Class,
            Rollno,
            Admno,
            admission_date,

        ')
        ->from('student')
        ->order_by('id', 'DESC')
        ->get()
        ->result_array();
}

public function getPassedOutStudents()
{
    return $this->db
        ->select('
            id,
            Name,
            Class,
            Rollno,
            Admno,
            admission_date,
        ')
        ->from('student')
        ->where('Class', 'passed_out')
        ->order_by('id', 'DESC')
        ->get()
        ->result_array();
}
public function getSponsoredStudents()
{
    return $this->db
        ->select('
            id,
            Name,
            Class,
            Rollno,
            Admno,
            admission_date,
            tuition_fee
        ')
        ->from('student')
        ->where('tuition_fee', '0')
        ->where('Class !=', 'passed_out')
        ->order_by('Rollno', 'ASC')
        ->get()
        ->result_array();
}

    public function getInfoMany() //get students info
	{
		$query=$this->db->query("SELECT * FROM student  WHERE Class != 'passed_out' Order By Rollno ASC");
		$result=$query->result();
		return $result;
	}
    public function getFilteredData($class)
{
    $this->db->where('Class', $class);
    $this->db->order_by('Rollno', 'ASC');
    return $this->db->get('student')->result_array();
}


public function getByClassWithAscendingRollNo($class)
{
    $sql = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
    $query = $this->db->query($sql, $class);
    return $query->result();
}

public function getByClassWithAscendingRollNoWithRange($class, $admno_start, $admno_end)
{
    $sql = 'SELECT * FROM student 
            WHERE Class=? 
            AND Admno > ? 
            AND Admno < ? 
            ORDER BY Rollno ASC';

    $query = $this->db->query($sql, array($class, $admno_start, $admno_end));
    return $query->result();
}
// 🔹 Get students by class
	public function getByClass($class)
	{
		$sql = "SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC";
		$query = $this->db->query($sql, array($class));
		return $query->result();
	}

	// 🔹 Update class (promotion)
	public function updateClass($toClass, $ids)
	{
		foreach ($ids as $id) {
			$this->db->where('id', $id);
			$this->db->set('Class', $toClass);
			if (!$this->db->update('student')) {
				return false;
			}
		}
		return true;
	}
     public function getOne($studentId)
    {
        return $this->db
            ->where('id', $studentId)
            ->get('student')
            ->row();
    }



    public function getLeaveRequests()
	 {
		return $this->db->get('leave_requests')->result();
	 }
 public function approveLeaveRequest($requestId)
	 {
		return $this->db->set('status', true)
		->where('id', $requestId)
		->update('leave_requests');
	 }
public function getInfo($id)
{
    $sql='SELECT * FROM student WHERE id=?';
    $query=$this->db->query($sql,$id);
    return $query->row();
}

public function getExamReport($params)
	{
		$sql='SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND conduct.Class=? AND exam.Rollno=?';
		$query=$this->db->query($sql,$params);
		$result=$query->result();
		return $result;
	}
    public function getByStudentId($studentId)
	{
		$sql = 'SELECT * FROM metrics,student_metric WHERE metrics.metric_id = student_metric.metric_id AND student_metric.student_id = ?';
		$query = $this->db->query($sql, array($studentId));
		return $query->result();
	}
    public function getExamReportByStudent($student_id)
{
    // 1. Fetch student info to get Class and Rollno
    $student = $this->db->get_where('student', ['id' => $student_id])->row();

    if (!$student) {
        return []; // No student found
    }

    // 2. Define parameters for the query
    $params = [$student->Class, $student->Rollno];

    // 3. Run the query
    $sql = "SELECT * 
            FROM exam, conduct 
            WHERE exam.Examcode = conduct.id 
              AND conduct.Class = ? 
              AND exam.Rollno = ?";

    $query = $this->db->query($sql, $params);

    // 4. Return result
    return $query->result();
}

 public function insertTransferredStudent($student)
     {
         if($this->db->insert('transferred_students', $student)) {
             return true;
         } else {
             return false;
         }
     }
public function delete($id)
{
    $this->db->where('id', $id);
    $this->db->delete('student');

    return $this->db->affected_rows() > 0;
}
    public function deleteStudent($id)
{
    return $this->db
        ->where('id', $id)
        ->delete('student');
}
public function getTransferredStudents()
     {
        $query = $this->db->query('SELECT * FROM transferred_students');
		$result = $query->result();
		return $result;
     }
     
     public function getTransferredStudentData($id)
     {
        $sql = 'SELECT * FROM transferred_students WHERE id=?';
		$query = $this->db->query($sql, $id);
		$result = $query->result();
		return $result;
     }
     
     public function updateTransferredStudent($student, $id)
     {
         $this->db->where('id', $id);
         return $this->db->update('transferred_students', $student);
     }
     public function getTcById($id)
    {
        return $this->db->get_where('transferred_students', ['id' => $id])->row_array();
    }
     public function insertCharacterCertificate($data)
{
    return $this->db->insert('character_certificates', $data);
}

public function getAllCharacterCertificates()
{
    return $this->db->get('character_certificates')->result();
}

public function getCharacterCertificate($id)
{
    return $this->db->where('id', $id)
                    ->get('character_certificates')
                    ->row();
}
public function getTransportDetails($id) // Get Transport Details
{
    // Get Passenger ID from student
    $query = $this->db->query(
        'SELECT Passengerid FROM student WHERE id = ?',
        array($id)
    );

    $student = $query->row();

    if (!$student || empty($student->Passengerid)) {
        return false;
    }

    $pid = $student->Passengerid;

    // Get Route ID and Station ID from passengers
    $query = $this->db->query(
        'SELECT Routeid, Stationid FROM passengers WHERE id = ?',
        array($pid)
    );

    $passenger = $query->row();

    if (!$passenger) {
        return false;
    }

    $routeid = $passenger->Routeid;
    $stationid = $passenger->Stationid;

    // Get route and station
    $sql = '
        SELECT 
            routes.id AS route_id,
            routes.routename,
            routes.Totalpassengers,
            stations.id AS station_id,
            stations.StationName
        FROM routes
        LEFT JOIN stations 
            ON routes.id = stations.RouteId
        WHERE routes.id = ?
        AND stations.id = ?
    ';

    $query = $this->db->query(
        $sql,
        array($routeid, $stationid)
    );

    return $query->result();
}
     public function updateCredentials($credentials, $studentId)
	 {
		 return $this->db->where('id', $studentId)->update('student', $credentials);
	 }
    public function update($data, $id) //update student 
{
    $this->db->where('id', $id); 

    if ($this->db->update('student', $data)) { 
        return true; 
    } else { 
        return false; 
    } 
}


/* ADD THIS FUNCTION */
public function markAsTransferred($id)
{
    return $this->db
        ->where('id', $id)
        ->update('student', [
            'Class' => 'passed_out'
        ]);
}

}
