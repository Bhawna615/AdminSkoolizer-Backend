<?php


class StudentModel extends CI_Model
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

	public function getInfoMany($class) //get students info
	{
		return $this->db
					->where('Class', $class)
					->order_by('Rollno', 'ASC') // Roll number chhote se bada
					->get('student')
					->result();
	}
	
	public function getInfo($id) //get student info
	{
		$sql = 'SELECT * FROM student WHERE id=?';
		$query = $this->db->query($sql, $id);
		$result = $query->result();
		return $result;
	}

	public function getByClass($class) //get students from class
	{
		$sql = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
		$query = $this->db->query($sql, array($class));
		$result = $query->result();
		return $result;
	}

	public function updateTransportFacility($pid, $id)  //update transport facility
	{
		$sql = 'UPDATE student set Passengerid=? where id=?';
		$query = $this->db->query($sql, array($pid, $id));
		if (!$query) {
			echo "Something went wrong";
		}
	}

	public function getTransportInfo() //get students transport info
	{
		$query = $this->db->query('SELECT * FROM student WHERE Passengerid IS NULL ORDER BY Class');
		$result = $query->result();
		return $result;
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

	public function delete($id) //delete student
	{
		$this->db->where('id', $id);
		if ($this->db->delete('student')) {
			return true;
		} else {
			return false;
		}
	}

	public function viewByClass($class) //view student by class
	{
		$sql = 'SELECT * FROM student WHERE Class=?';
		$query = $this->db->query($sql, $class);
		$result = $query->result();
		return $result;
	}

	public function getTransportDetails($id)  //get Transport Details
	{
		$sql = 'SELECT Passengerid from student WHERE id=?';
		$query = $this->db->query($sql, $id);
		$result = $query->result();
		foreach ($result as $row) {
			$pid = $row->Passengerid;
		}

		if ($pid != NULL) {
			$sqla = 'SELECT * FROM passengers WHERE id=?';
			$querya = $this->db->query($sqla, $pid);
			$resulta = $querya->result();

			foreach ($resulta as $row) {
				$routeid = $row->Routeid;
				$stationid = $row->Stationid;
			}

			$sqlb = 'SELECT * FROM routes,stations WHERE routes.id=stations.RouteId AND routes.id=? AND stations.id=?';
			$queryb = $this->db->query($sqlb, array($routeid, $stationid));
			$resultb = $queryb->result();
			return $resultb;
		} else {
			return false;
		}
	}

	public function checkIfCodeUnique($content)
	{
		$sql = "SELECT * FROM student WHERE qrcode = ?";
		$query = $this->db->query($sql, $content);
		$rowCount = $query->num_rows();
		return $rowCount > 0 ? false : true;
	}

	public function getByQrCode($qrCode)
	{
		$query = $this->db->get_where('student', array('qrcode' => $qrCode));
		return $query->row();
	}

	public function updateClass($toClass, $ids)
	{
		foreach ($ids as $id) {
			$this->db->set('Class', $toClass);
			$this->db->where('id', $id);
			if (!$this->db->update('student')) {
				return false;
			}
		}

		return true;
	}

	public function getFilteredData($class)
	{
		$this->db->where('Class', $class);
		$this->db->order_by('Rollno', 'ASC'); // Ascending order
		return $this->db->get('student')->result();
	}

	public function getOne($id)
	{
		return $this->db
			->where('id', $id)
			->get('student')
			->row();
	}

	public function getAllByRollNo()
	{
		$query = $this->db->query('SELECT * FROM student');
		$result = $query->result();
		return $result;
	}

	public function getByClassWithAscendingRollNo($class)
	{
		$sql = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
		$query = $this->db->query($sql, $class);
		$result = $query->result();
		return $result;
	}

	public function getByClassWithAscendingRollNoWithRange($class, $admno_start, $admno_end)
	{
		$sql = 'SELECT * FROM student WHERE Class=? AND Admno > ? AND Admno < ? ORDER BY Rollno ASC';
		$query = $this->db->query($sql, array($class, $admno_start, $admno_end));
		$result = $query->result();
		return $result;
	}

	public function shiftRollNumbers($student)
	{
		$sql = 'UPDATE student SET Rollno = Rollno - 1 WHERE Class = ? AND Rollno > ?';
		$query = $this->db->query($sql, array($student->Class, $student->Rollno));
		if ($query) {
			return true;
		} else {
			return false;
		}

	}

	public function insertTransferredStudent($student)
	{
		if ($this->db->insert('transferred_students', $student)) {
			return true;
		} else {
			return false;
		}
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

	public function getAllCharacterCertificates()
	{
		return $this->db->get('character_certificates')->result();
	}

	public function getCharacterCertificate($id)
	{
		return $this->db->where('id', $id)->get('character_certificates')->row();
	}

	public function insertCharacterCertificate($characterCertificate)
	{
		return $this->db->insert('character_certificates', $characterCertificate);
	}

	public function get($id)
	{
		return $this->db->where('id', $id)->get('student')->row();
	}

	public function insertStudentDiscount($ids, $discountId)
	{
		for ($i = 0; $i < count($ids); $i++) {
			$studentDiscount = array(
				'student_id' => $ids[$i],
				'discount_id' => $discountId
			);
			$this->db->insert('student_discount', $studentDiscount);
		}
	}

	public function getLeaveRequests()
	{
		$class = $this->session->userdata('class');
		return $this->db->where('student_class', $class)->get('leave_requests')->result();
	}

	public function approveLeaveRequest($requestId)
	{
		return $this->db->set('status', true)
			->where('id', $requestId)
			->update('leave_requests');
	}

	public function getLeaveRequestsOfClass($class, $date)
	{
		return $this->db->where('date', $date)
			->where('student_class', $class)
			->where('status', true)
			->get('leave_requests')
			->result();
	}



	//  notificatons

	// public function getMessageCount($studentId)
	// {
	//     return $this->db->where('student_id', $studentId)->get('messages')->num_rows();
	// }



	// public function updateNotificationCheckTime($teacherId)
	// {
	// 	$this->db->set('notification_checked_at', date("Y-m-d H:i:s"));
	// 	$this->db->where('id', $teacherId);
	// 	$this->db->update('teachers');
	// }

	// public function getLeaveRequestCount($teacherId)
	// {
	// 	$teacher = $this->db->where('id', $teacherId)->get('teachers')->row();

	// 	// Agar teacher ne kabhi pehle leave request dekhi hai to only NEW requests count kare
	// 	if ($teacher->notification_checked_at) {
	// 		$this->db->where('created_at >', $teacher->notification_checked_at);
	// 	}

	// 	return $this->db->where('status', false)
	// 		->get('leave_requests')
	// 		->num_rows();
	// }





	//  notificatons

}
