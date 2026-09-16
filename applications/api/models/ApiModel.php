<?php


class ApiModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

// 	public function userLogin($qrcode)
// 	{
// 		$sql = "SELECT * FROM student WHERE qrcode = ?";
// 		$query = $this->db->query($sql, $qrcode);
// 		if ($query->num_rows() > 0) {
// 			return true;
// 		} else {
// 			return false;
// 		}
// 	}
	
		public function userLogin($admission_no, $password)
	{
		$sql = "SELECT * FROM student WHERE Admno = ?";
		$query = $this->db->query($sql, $admission_no);
		if ($query->num_rows() > 0) {
		    $this->db->where('Admno', $admission_no);
		    $student = $this->db->get('student')->row();
		    if(password_verify($password, $student->Password)) {
		        return true;
		    } else {
		        return false;
		    }
		} else {
			return false;
		}
	}

// 	public function getUserData($qrcode)
// 	{
// 		$sql = "SELECT * FROM student WHERE qrcode = ?";
// 		$query = $this->db->query($sql, $qrcode);
// 		return $query->row();
// 	}
	
		public function getUserData($admission_no)
	{
		$sql = "SELECT * FROM student WHERE Admno = ?";
		$query = $this->db->query($sql, $admission_no);
		return $query->row();
	}

	public function fetchSchedule($claass)
	{
		$day=date('l');
		$sql='SELECT Subjectname,Stime,Etime,Teachername FROM timetable,teachers WHERE timetable.TeacherId= teachers.id AND timetable.Class=? AND timetable.Day=? ORDER BY Stime ASC';
		$query=$this->db->query($sql, array($claass, $day));
		$result=$query->result();
		return $result;
	}

	public function fetchAssignment($class, $date)
	{
		$sql='SELECT * FROM assignment WHERE Class=? AND Date=?';
		$query=$this->db->query($sql, array($class,$date));
		$result=$query->result();
		return $result;
	}

	public function fetchExams($class)
	{
		$sql='SELECT * FROM conduct WHERE Class=? ORDER BY Date desc';
		$query=$this->db->query($sql, $class);
		$result=$query->result();
		return $result;
	}

	public function fetchPosts($class)
	{
		$sql='SELECT * FROM posts WHERE post_for_class=? ORDER BY post_date desc';
		$query=$this->db->query($sql, $class);
		$result=$query->result();
		return $result;
	}

	public function fetchSubjects($class)
	{
		$this->db->select('Subject');
		$this->db->distinct();
		$query = $this->db->get_where('conduct', array('Class' => $class));
		return $query->result();
	}

	public function fetchResult($class, $subject, $rollNo)
	{
		$sql='SELECT * FROM exam,conduct WHERE
		exam.Examcode=conduct.id AND conduct.Subject=? 
		AND conduct.Class=? AND exam.Rollno=? ORDER BY conduct.Date desc';

		$query = $this->db->query($sql, array($subject, $class, $rollNo));
		return $query->result();
	}

	public function getLastMovement($id)
	{
		$sql = 'SELECT * FROM movements WHERE student_id = ? ORDER BY timestamp DESC';
		$query = $this->db->query($sql, $id);
		return $query->row();
	}

	 public function get($id)
    {
        return $this->db
            ->where('student_id', $id)
            ->order_by('created_at', 'desc')
            ->get('leave_requests')
            ->result();
    }

    public function create($data)
    {
        return $this->db->insert('leave_requests', $data);
    }



	 public function getStudentAttendance($student_id)
    {
        // 🔹 Step 1: Fetch student info first
        $studentQuery = $this->db->where('id', $student_id)->get('student');
        $student = $studentQuery->row();

        if (!$student) {
            return [0, 0, [], []]; // student not found
        }

        $class = $student->Class;
        $roll = $student->Rollno;

        // 🔹 Step 2: Count total working days (for that class)
        $attendanceQuery = $this->db->select('id, Date')
            ->where('Class', $class)
            ->get('attendence');
        $totalDays = $attendanceQuery->num_rows();

        // 🔹 Step 3: Fetch absent days (absentees)
        $absentQuery = $this->db->select('Date')
            ->where('Class', $class)
            ->where('Rollno', $roll)
            ->get('absentees');
        $absentDays = $absentQuery->num_rows();
        $absentDates = $absentQuery->result();

        // 🔹 Step 4: Fetch all unique working days
        $workingQuery = $this->db->distinct()
            ->select('Date')
            ->where('Class', $class)
            ->get('attendence');
        $workingDays = $workingQuery->result();

        // 🔹 Step 5: Calculate present days
        $presentDays = $totalDays - $absentDays;

        // 🔹 Step 6: Return structured array
        return [
            $totalDays,   // 0: Total Days
            $presentDays, // 1: Present Days
            $absentDates, // 2: Absent Dates Array
            $workingDays  // 3: Working Days Array
        ];
    }

	// ✅ Get a student's full info
    public function getStudent($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('students');
        return $query->row();
    }

	 // Fetch posts for a particular class
    public function getClassPosts($class)
    {
        return $this->db
            ->where('recipient_group', $class)
            ->order_by('created_at', 'DESC')
            ->get('posts')
            ->result();
    }
}
