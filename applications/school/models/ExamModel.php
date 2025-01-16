<?php


class ExamModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function uploadMarks(array $marks)
	{
	   
	    $userName = $this->session->userdata('username');
		for ($i = 0; $i < count($marks['roll_no']) ; $i++) {
			$mark = array(
				'Rollno' => $marks['roll_no'][$i],
				'Name' => $marks['name'][$i],
				'student_id' => $marks['id'][$i],
				'Examcode'=> $marks['exam_code'],
				'Marksobtained' => $marks['marks'][$i],
				'uploaded_by' => $userName
			);
			$this->db->insert('marks', $mark);
		}

		$exam = array(
			'Result' => true
		);

		$this->db->where('id', $marks['exam_code']);
		return $this->db->update('conduct', $exam) ? true : false;
	}

	public function submit($data)
	{
		return $this->db->insert('conduct', $data) ? true : false;
	}

	public function getExams($class, $examType)
	{
		$year = date('Y');
		$query = $this->db->query("SELECT * FROM conduct WHERE Class = '$class' AND Examtype = '$examType' ORDER BY Date DESC");
		$result = $query->result();
		return $result;

	}

	public function marksForm($class)
	{
		$sql='SELECT * FROM student WHERE Class=? Order By Rollno ASC';
		$query=$this->db->query($sql,array($class));
		$result=$query->result();
		return $result;
	}

	public function loadResult($id)
	{
		$sql='SELECT * FROM marks,conduct WHERE marks.Examcode=conduct.id AND marks.Examcode=? ORDER BY marks.Rollno ASC';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	public function getExamReport($params)
	{
		$sql='SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND conduct.Class=? AND exam.Rollno=?';
		$query=$this->db->query($sql,$params);
		$result=$query->result();
		return $result;
	}

	public function delete($id)  //delete exam
	{
		$this->db->where('Examcode', $id);
		if ($this->db->delete('marks')) {
		    $this->db->where('Examcode', $id);
		    $this->db->delete('exam');
			$this->db->where('id', $id);
			return $this->db->delete('conduct') ? true : false;
		} else {
			return false;
		}
	}

	public function load($id)  //load exams
	{
		$sql='SELECT Class FROM student WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		foreach ($result as $row) {
			$class=$row->Class;
		}

		$sqla='SELECT * FROM conduct WHERE Class=?';
		$querya=$this->db->query($sqla,$class);
		$resulta=$querya->result();
		return $resulta;

	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM conduct WHERE YEAR(Date) = ? AND MONTH(Date) =? AND Class =? ORDER BY Date desc';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function getOne($id)
	{
		return $this->db
			->where('id', $id)
			->get('conduct')
			->row();
	}

	public function getByStudent(array $student)
    {
        $sql = "SELECT DISTINCT(Examtype) FROM conduct WHERE class = ? AND Result = ?";
        $query = $this->db->query($sql, array($student['class'], true));
        return $query->result();
    }

    public function getTitle($exams)
    {
        $examination = array();
        for ($i = 0; $i < count($exams); $i++) {
            $sql = "SELECT * FROM conduct WHERE Examtype = ?";
            $query = $this->db->query($sql, array($exams[$i]));
            $examination[] = $query->row();
        }
        return $examination;
    }

    public function getMarksByStudent($student, $exams)
    {
        $marks = array();
        for ($i = 0; $i < count($exams); $i++) {
            $sql = "SELECT * FROM conduct,exam WHERE conduct.id = exam.Examcode AND conduct.Examtype = ? AND exam.Name = ? AND exam.Rollno =? AND conduct.Class = ?";
            $query = $this->db->query($sql, array($exams[$i], $student->Name, $student->Rollno, $student->Class));
            $marks[] = $query->result();
        }

//        print_r($marks);
//        echo "<br/>";
        $subjectWiseMark = array();
        foreach ($marks as $key => $exam) {
            foreach ($exam as $item) {
                $subjectWiseMark[] = array(
                    'subject' => $item->Subject,
                    'examType' => $item->Examtype,
                    'marksObtained' => $item->Marksobtained,
                    'maxMarks' => $item->Maxmarks
                );
            }
        }
        return $subjectWiseMark;
    }
    
        public function getTentativeMarksByStudent($student, $exams)
    {
        $marks = array();
        for ($i = 0; $i < count($exams); $i++) {
            $sql = "SELECT * FROM conduct,marks WHERE conduct.id = marks.Examcode AND conduct.Examtype = ? AND marks.Name = ? AND marks.Rollno =? AND conduct.Class = ?";
            $query = $this->db->query($sql, array($exams[$i], $student->Name, $student->Rollno, $student->Class));
            $marks[] = $query->result();
        }

//        print_r($marks);
//        echo "<br/>";
        $subjectWiseMark = array();
        foreach ($marks as $key => $exam) {
            foreach ($exam as $item) {
                $subjectWiseMark[] = array(
                    'subject' => $item->Subject,
                    'examType' => $item->Examtype,
                    'marksObtained' => $item->Marksobtained,
                    'maxMarks' => $item->Maxmarks
                );
            }
        }
        return $subjectWiseMark;
    }

    public function getSubjectsByStudent($student)
    {
        $sql = "SELECT DISTINCT(Subject) FROM conduct WHERE Class = ?";
        $query = $this->db->query($sql, array($student->Class));
        return $query->result();
    }
    
    public function loadSavedResult($examId)
    {
        $sql='SELECT * FROM marks,conduct WHERE marks.Examcode=conduct.id AND marks.Examcode=?';
		$query=$this->db->query($sql, $examId);
		$result=$query->result();
		return $result;
    }
    
    public function save($marksRow)
    {
        $this->db->insert('exam', $marksRow);
    }
    
    public function updateSavedStatus($examId)
    {
        $this->db->set('saved', TRUE);
		$this->db->where('id', $examId);
		return $this->db->update('conduct') ? true : false;
    }
    
    public function updateMarks(array $marks, $examCode)
    {
        $this->db->where('Examcode', $examCode);
        $this->db->delete('marks');
        $userName = $this->session->userdata('username');
		for ($i = 0; $i < count($marks['roll_no']) ; $i++) {
			$mark = array(
				'Rollno' => $marks['roll_no'][$i],
				'Name' => $marks['name'][$i],
				'Examcode'=> $marks['exam_code'],
				'Marksobtained' => $marks['marks'][$i],
				'uploaded_by' => $userName
			);
			$this->db->insert('marks', $mark);
		}
		
		return true;
    }
    
    public function loadExamsByTeacherId($teacherId)
    {
        $sql = "SELECT * FROM timetable,conduct WHERE timetable.Class = conduct.Class AND timetable.Subjectname = conduct.Subject AND timetable.TeacherId = ? AND Day = 'Monday'";
        $query = $this->db->query($sql, $teacherId);
		$result = $query->result();
		return $result;
    }
    
    	public function getFilteredDataByTeacher($year, $month, $class, $teacherId)
	{
	    $sql = "SELECT * FROM timetable,conduct WHERE timetable.Class = conduct.Class AND timetable.Subjectname = conduct.Subject AND timetable.TeacherId = ? AND Day = 'Monday' AND YEAR(Date) = ? AND MONTH(Date) =? AND conduct.Class =? ORDER BY Date desc";
		$query = $this->db->query($sql, array($teacherId, $year, $month, $class));
		return $query->result();
	}
	
	public function getFilteredExams($class, $exam)
	{
	    $sql = 'SELECT * FROM conduct WHERE Class = ? AND Examtype = ?';
	    $query = $this->db->query($sql, array($class, $exam));
	    $result = $query->result();
	    return $result;
	}
	
	public function getResults()
	{
	    $sql = "SELECT * FROM marks";
	    $query = $this->db->query($sql);
	    $result = $query->result();
	    return $result;
	}
	
	public function getAllExamTypes()
	{
	    $sql = 'SELECT DISTINCT(Examtype) FROM conduct';
	    $query = $this->db->query($sql);
	    $result = $query->result();
	    return $result;
	}

}
