<?php


class MetricsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		return $this->db
			->get('metrics')
			->result();
	}

	public function insert(array $metric)
	{
		return $this->db
			->insert('metrics', $metric)
			?
			true
			:
			false;
	}

	public function getById($id)
	{
		return $this->db
			->where('metric_id', $id)
			->get('metrics')->row();
	}

	public function getByClass($class)
	{
		return $this->db
			->where('metric_class', $class)
			->get('metrics')->result();
	}

	public function getByStudentId($studentId)
	{
		$sql = 'SELECT * FROM metrics,student_metric WHERE metrics.metric_id = student_metric.metric_id AND student_metric.student_id = ?';
		$query = $this->db->query($sql, array($studentId));
		return $query->result();
	}

	public function update($id, $updatedMetric)
	{
		return $this->db
			->where('metric_id', $id)
			->update('metrics', $updatedMetric)
			?
			true
			:
			false;
	}

	public function delete($id)
	{
		return $this->db
			->where('metric_id', $id)
			->delete('metrics')
			?
			true
			:
			false;
	}

    public function save($combined_array, $studentId)
    {
        // Get all existing student metrics for this student
        $sql = 'SELECT * FROM student_metric WHERE student_id = ?';
        $query = $this->db->query($sql, array($studentId));
        
        $existingMetrics = array(); // To store existing metric IDs
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $existingMetrics[$row->metric_id] = $row->mark;
            }
        }
        
        // Start a transaction for atomic operations
        $this->db->trans_start();
        
        foreach ($combined_array as $metric_id => $mark) {
            if (array_key_exists($metric_id, $existingMetrics)) {
                // Update existing record
                $this->db->set('mark', $mark);
                $this->db->where('student_id', $studentId);
                $this->db->where('metric_id', $metric_id);
                $this->db->update('student_metric');
            } else {
                // Insert new record
                $studentMetric = array(
                    'student_id' => $studentId,
                    'metric_id'  => $metric_id,
                    'mark'       => $mark
                );
                $this->db->insert('student_metric', $studentMetric);
            }
        }
        
        // Complete the transaction
        $this->db->trans_complete();
    
        // Check if transaction was successful
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed, log error or throw exception
            log_message('error', 'Database transaction failed while saving student metrics.');
        }
    }


	public function getStudentMetric($studentId)
	{
		return $this->db
			->where('student_id', $studentId)
			->get('student_metric')
			->result();
	}

	public function getOneStudentMetric($studentId, $metric_id)
	{
		return $this->db
			->where('student_id', $studentId)
			->where('metric_id', $metric_id)
			->get('student_metric')
			->row();
	}

	public function updateStudentMetric($studentMetric)
	{
		$this->db->where('student_id', $studentMetric['student_id']);
		$this->db->where('metric_id', $studentMetric['metric_id']);
		return $this->db->update('student_metric', $studentMetric) ? true : false;
	}

	public function exists($studentMetric)
	{
		$this->db->where('student_id', $studentMetric['student_id']);
		$this->db->where('metric_id', $studentMetric['metric_id']);
		$query = $this->db->get('student_metric')->num_rows();
		return $query > 0;
	}
	
	public function getMetricsName($student)
	{
	    $this->db->distinct();
	    $this->db->select('metric_name');
	    $this->db->where('metric_class', $student->Class);
	    $metrics = $this->db->get('metrics')->result();
	    foreach($metrics as $metric)
	    {
	        $metricName[] = $metric->metric_name;
	    }
	    
	    return $metricName;
	}

}
