<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminExamModel extends CI_Model
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

public function getAllExams($class)
	{
	    $exams = array();
	    $sql = 'SELECT * FROM conduct WHERE Class=?  group by Examtype order by id asc';
	    $query = $this->db->query($sql, array($class));
	    $result = $query->result();
	    foreach($result as $row) {
	        $exams[] = $row->Examtype;
	    }
	    return $exams;
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
public function getSubjectsByStudent($student)
    {
        $sql = "SELECT DISTINCT(Subject) FROM conduct WHERE Class = ?";
        $query = $this->db->query($sql, array($student->Class));
        return $query->result();
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

     public function getAll()
{
    return $this->db->get('classes')->result();
}

public function getSubjects($class)
	{
	    $sql='SELECT * FROM timetable WHERE Class=? AND TeacherId !=0 GROUP BY Subjectname';
// 		$sql='SELECT distinct(Subjectname) FROM timetable WHERE Class=? AND TeacherId !=0';
		$query=$this->db->query($sql,array($class));
		$result=$query->result();
		return $result;
	}


public function getById($id)
{
    $this->db->where('timetableid', $id);
    return $this->db->get('timetable')->row();
}

public function getteachers($class) {
    $sql = "SELECT DISTINCT t.id, t.Teachername
            FROM teachers t
            JOIN timetable tt ON t.id = tt.TeacherId
            WHERE tt.Class = ?";
    $query = $this->db->query($sql, array($class));
    return $query->result();
}
	public function submit($data)
	{
		return $this->db->insert('conduct', $data) ? true : false;
        }
       public function getExams($class, $examType)
{
    $query = $this->db->query("
        SELECT conduct.*, teachers.Teachername 
        FROM conduct 
        LEFT JOIN teachers ON conduct.teacher_id = teachers.id
        WHERE conduct.Class = '$class' 
        AND conduct.Examtype = '$examType'
        ORDER BY conduct.Date DESC
    ");
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
    return $this->db->insert('exam', $marksRow);
}
    public function updateSavedStatus($examId)
    {
        $this->db->set('saved', TRUE);
		$this->db->where('id', $examId);
		return $this->db->update('conduct') ? true : false;
    }
public function loadResult($examCode) {
        $sql = 'SELECT * FROM marks 
                INNER JOIN conduct ON marks.Examcode = conduct.id 
                WHERE marks.Examcode = ? 
                ORDER BY marks.Rollno ASC';
        $query = $this->db->query($sql, [$examCode]);
        return $query->result();
    }

    public function updateMarks(array $marks, $examCode) {
        // Delete existing marks
        $this->db->where('Examcode', $examCode);
        $this->db->delete('marks');

        $userName = $this->session->userdata('username');

        // Insert new marks
        for ($i = 0; $i < count($marks['roll_no']); $i++) {
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

// ================================
    // 1️⃣ Get Exam Details
    // ================================
    public function marksForm($class) {
        $sql = "SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC";
        $query = $this->db->query($sql, array($class));
        return $query->result();
    }

    public function getOne($id) {
        return $this->db->where('id', $id)->get('conduct')->row();
    }

    public function uploadMarks(array $marks) {
        $userName = $this->session->userdata('username');

        for ($i = 0; $i < count($marks['roll_no']); $i++) {
            $mark = [
                'Rollno'        => $marks['roll_no'][$i],
                'Name'          => $marks['name'][$i],
                'student_id'    => $marks['id'][$i],
                'Examcode'      => $marks['exam_code'],
                'Marksobtained' => $marks['marks'][$i],
                'uploaded_by'   => $userName
            ];
            $this->db->insert('marks', $mark);
        }

        $this->db->where('id', $marks['exam_code']);
$update = $this->db->update('conduct', [
    'Result' => 1,
    'saved'  => 0
]);

return $update ? true : false;
    }

   public function delete($id)
{
    $this->db->where('Examcode', $id);
    $marksDeleted = $this->db->delete('marks');

    if ($marksDeleted) {
        $this->db->where('Examcode', $id);
        $this->db->delete('exam');

        $this->db->where('id', $id);
        return $this->db->delete('conduct') ? true : false;
    } else {
        return false;
    }
} 
   

    // Fetch all unique exam types from exam table
    public function getAllExamTypes() {
    $this->db->distinct(); // ✅ correct way
    $this->db->select('Examtype');
    $this->db->from('conduct');
    $query = $this->db->get();

    return $query->result();
}
public function get()
	{
		return $this->db
			->get('quizzes')
			->result();
	}

	public function insert($quiz)
	{
		return $this->db
			->insert('quizzes', $quiz) ? true : false;
	}

	public function deleteQuiz($id)
	{
		$this->db->where('id', $id);
		return $this->db
			->delete('quizzes') ? true : false;

	}
    public function getQuestioQuiz($quizId)
	{
		return $this->db
			->get_where('quiz_questions', array('quiz_id' => $quizId))
			->result();
	}

	public function insertQuestionQuiz($question)
	{
		return $this->db
			->insert('quiz_questions', $question) ? true : false;
	}

	public function loadQuestioQuiz($id)
	{
		$this->db
			->where('id', $id);
		return $this->db
			->get('quiz_questions')
			->row();
	}

	
public function updateQuestioQuiz($question, $id)
{
    $this->db->where('id', $id);

    return $this->db->update('quiz_questions', $question)
        ? true
        : false;
}


	public function deleteQuestioQuiz($quizId)
{
    return $this->db
        ->where('quiz_id', $quizId)
        ->delete('quiz_questions');
}
   public function getQuestionPapers()
	{
		return $this->db
			->get('question_papers')
			->result();
	}
    public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM question_papers WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}
    // =========================
    // QUESTIONS
    // =========================

    // ✅ Get all questions
    public function getQuestions()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get('questions')
            ->result_array();
    }

    // ✅ Filter questions (class + subject)
    public function getFilteredQuestions($class, $subject)
    {
        return $this->db
            ->where('class', $class)
            ->where('subject', $subject)
            ->order_by('id', 'DESC')
            ->get('questions')
            ->result_array();
    }

    // =========================
    // SUBJECTS
    // =========================

    // ✅ Get subjects by class
  public function getSubjectsByClass($class)
{
    return $this->db
        ->select('Subjectname')
        ->distinct()
        ->where('Class', $class)
        ->get('timetable')
        ->result();
}

    // =========================
    // QUESTION PAPER
    // =========================

    // ✅ Create Question Paper
    public function createQuestionPaper($data)
    {
        return $this->db->insert('question_papers', $data);
    }

    // ✅ Delete Question Paper
    public function deleteQuestionPaper($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('question_papers');
    }
public function getClasses()
{
    return $this->db->get('classes')->result();
}
    // ✅ Get all question papers (optional)
   

    // ✅ Get single question paper
    public function getQuestionPaperById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('question_papers')
            ->row_array();
    }

    // ✅ Get questions of a paper
    public function getQuestionsByPaper($paperId)
    {
        $paper = $this->getQuestionPaperById($paperId);

        if (!$paper) return [];

        $ids = explode(",", $paper['questions_id']);

        return $this->db
            ->where_in('id', $ids)
            ->get('questions')
            ->result_array();
    }
    public function getByClassWithAscendingRollNo($class)
    {
        $sql = 'SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
        $query = $this->db->query($sql, $class);
        $result = $query->result();
        return $result;
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
   
	public function getByClass($class)
	{
		return $this->db
			->where('metric_class', $class)
			->get('metrics')->result();
	}
	
    public function getByClasses($class) //get students from class
	{
		$sql='SELECT * FROM student WHERE Class=? ORDER BY Rollno ASC';
		$query = $this->db->query($sql, array($class));
		$result = $query->result();
		return $result;
	}
    public function getStudentMetric($studentId)
	{
		return $this->db
			->where('student_id', $studentId)
			->get('student_metric')
			->result();
	}
      public function getStudent($studentId)
    {
        return $this->db
            ->where('id', $studentId)
            ->get('student')
            ->row();
    }

    // ✅ Get Subjects by Class


    // ✅ Get Metrics (Co-Scholastic + Attendance)
    public function getStudentMetrics($studentId)
    {
        return $this->db
            ->where('student_id', $studentId)
            ->get('student_metric')
            ->result();
    }

    // ✅ OPTIONAL (if you want subject marks later)
    public function getSubjectMarks($studentId)
    {
        return $this->db
            ->where('student_id', $studentId)
            ->get('marks')
            ->result();
    }
    


}