<?php


class ExamModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($class)
    {
        return $this->db
            ->where('Class', $class)
            ->order_by('Date', 'desc')
            ->get('conduct')
            ->result();
    }

    public function getDistinct($class)
    {
        $sql = 'SELECT DISTINCT(Subject) FROM conduct WHERE Class = ?';
        $query = $this->db->query($sql, $class);
        $result = $query->result();
        return $result;
    }

    public function getAllExamsBySubjectAndClass($subject, $class)
    {
        return $this->db->where('Subject', $subject)
            ->where('Class', $class)
            ->where('Result', true)
            ->where('saved', true)
            ->get('conduct')->result();
    }

    public function getMarks($exams, $rollNo, $name)
    {
        foreach ($exams as $exam) {
            $row = $this->db->where('Examcode', $exam->id)
                ->where('Name', $name)
                ->get('exam')->row();

            $marksObtained[$exam->id] = $row->Marksobtained;
        }
        return $marksObtained;
    }
}