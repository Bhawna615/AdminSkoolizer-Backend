<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStudentMetricsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

   public function getInfoMany()
{
	return $this->db
		->where("Class !=", "passed_out")
		->order_by("Rollno", "ASC")
		->get("student")
		->result();
}

public function getFilteredData($class)
{
	return $this->db
		->where("Class", $class)
		->order_by("Rollno", "ASC")
		->get("student")
		->result();
}


 // 🔹 GET METRICS BY CLASS
    public function getByClass($class)
    {
        return $this->db
            ->where('metric_class', $class)
            ->order_by('metric_id', 'ASC')
            ->get('metrics')
            ->result();
    }

    // 🔹 GET STUDENT METRICS WITH MARKS
    // public function getAllStudentMetric($studentId)
    // {
    //     return $this->db
    //         ->select('student_metric.metric_id, student_metric.mark')
    //         ->from('student_metric')
    //         ->where('student_metric.student_id', $studentId)
    //         ->get()
    //         ->result();
    // }
public function getAllStudentMetric($studentId)
	{
				$sql = 'SELECT * FROM metrics,student_metric WHERE metrics.metric_id = student_metric.metric_id AND student_metric.student_id = ?';
		$query = $this->db->query($sql, array($studentId));
		return $query->result();
	}

    // 🔹 SAVE / UPDATE METRICS (used by mark())
   public function save($combined_array, $studentId)
{
    $existing = $this->db
        ->where('student_id', $studentId)
        ->get('student_metric')
        ->result();

    $existingMap = [];
    foreach ($existing as $row) {
        $existingMap[$row->metric_id] = true;
    }

    foreach ($combined_array as $metricId => $mark) {

        if (isset($existingMap[$metricId])) {
            $this->db
                ->where([
                    'student_id' => $studentId,
                    'metric_id'  => $metricId
                ])
                ->update('student_metric', [
                    'mark' => $mark
                ]);
        } else {
            $this->db->insert('student_metric', [
                'student_id' => $studentId,
                'metric_id'  => $metricId,
                'mark'       => $mark
            ]);
        }
    }
}


}