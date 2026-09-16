<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMetricsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getByStudentId($studentId)
    {
        $sql = 'SELECT * FROM metrics,student_metric 
                WHERE metrics.metric_id = student_metric.metric_id 
                AND student_metric.student_id = ?';

        $query = $this->db->query($sql, array($studentId));
        return $query->result();
    }

    public function getMetricsName($student)
    {
        $this->db->distinct();
        $this->db->select('metric_name');
        $this->db->where('metric_class', $student->Class);

        $metrics = $this->db->get('metrics')->result();

        $metricName = [];

        foreach ($metrics as $metric) {
            $metricName[] = $metric->metric_name;
        }

        return $metricName;
    }
}
