<?php


class HomeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getStudentCount() //get students count
	{
	    $class = $this->session->userdata('class');
		$query = $this->db->query("SELECT id FROM student WHERE Class='$class'");
		$result = $query->num_rows();
		return $result;
	}

	public function getTeacherCount() //get teacher count
	{
		$query=$this->db->query('SELECT id FROM teachers');
		$result=$query->num_rows();
		return $result;
	}

	public function getClassesCount() // get classes count
	{
		$query=$this->db->query('SELECT id FROM classes');
		$result=$query->num_rows();
		return $result;
	}

	public function getEmployeeCount()
	{
		$query=$this->db->query('SELECT id FROM employees');
		$result=$query->num_rows();
		return $result;
	}

	public function getActiveRouteCount()
	{
		$query=$this->db->query('SELECT id FROM currentroute WHERE status=FALSE');
		$result=$query->num_rows();
		return $result;
	}

	public function getAbsentCount()
	{
	    $class = $this->session->userdata('class');
		$date=date('Y-m-d');
		$sql="SELECT absenteeid FROM absentees WHERE Date=? and Class = ? ";
		$query=$this->db->query($sql,array($date, $class));
		$result=$query->num_rows();
		return $result;
	}

	public function getEmpAbsentCount()
	{
		$date=date('Y-m-d');
		$sql='SELECT id FROM empabsentees WHERE Date=?';
		$query=$this->db->query($sql,$date);
		$result=$query->num_rows();
		return $result;
	}

	public function getExamCount()
	{
	    $class = $this->session->userdata('class');
		$date=date('Y-m-d');
		$sql='SELECT id FROM conduct WHERE Date=? and Class =?';
		$query=$this->db->query($sql,array($date, $class));
		$result=$query->num_rows();
		return $result;
	}

	public function getBirthdayCount()
	{
	    $class = $this->session->userdata('class');
		$day=date('d');
		$month=date('m');
		$sql='SELECT id FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=? and Class=?';
		$query=$this->db->query($sql,array($day,$month, $class));
		$result=$query->num_rows();
		return $result;
	}

	public function loadBirthdays()
	{
	    $class = $this->session->userdata('class');
		$day=date('d');
		$month=date('m');
		$sql='SELECT * FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=? and Class = ?';
		$query=$this->db->query($sql,array($day,$month, $class));
		$result=$query->result();
		return $result;
	}

	public function test()
	{
		$data['students']=$this->Home_model->marksform();
		$this->load->view('test',$data);
	}
	
	public function getPendingFeeCount()
	{
	     return $this->db->where('status', 0)->get('fee')->num_rows();
	}
	
		public function getLeaveRequestCount()
	{
	    $class = $this->session->userdata('class');
	    return $this->db->where('status', false)->where('student_class', $class)
	    ->get('leave_requests')->num_rows();
	}


	function getteacherdetail($teacherId){
		$this->db->where('id', $teacherId);
        $query = $this->db->get('teachers'); // Assuming you have a 'students' table
        return $query->row(); // Return a single row
	}


	// notification

	public function leaveRequestMessages($teacherId)
	{
		    // Teacher ki details fetch karo
		$teacher = $this->db->where('id', $teacherId)->get('teachers')->row();
		$class = $this->session->userdata('class');
        
    
        $this->db->where('created_at >', $teacher->notification_checked_at);
        $this->db->where('student_class', $class);
        
        return $this->db->get('leave_requests')->num_rows();
	}
		
	public function updateNotificationCheckTime($teacherId)
    {
        $this->db->set('notification_checked_at', date("Y-m-d H:i:s"));
        $this->db->where('id', $teacherId);
        $this->db->update('teachers');
    }

	// notification
}
