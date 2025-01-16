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
	    $sql = 'SELECT * FROM student_metric WHERE student_id = ?';
	    $query = $this->db->query($sql, $studentId);
	    $num_rows = $query->num_rows();
	    
	    if($num_rows < 1) {
	        foreach($combined_array as $key => $value) {
	          $studentMetric = array(
	                'student_id' => $studentId,
	                'metric_id' => $key,
	                'mark' => $value
	            );
	            
	            $this->db->insert('student_metric', $studentMetric);
	        }
	    } else {
	        $studentMetric = $query->result();
	        foreach($studentMetric as $metric) {
	            foreach($combined_array as $key => $value) {
	                if($metric->metric_id == $key) {
	                    $sql2 = 'UPDATE student_metric SET mark = ? WHERE student_id = ? AND metric_id = ?';
	                    $query2 = $this->db->query($sql2, array($value, $studentId, $key));
	                }
	            }
	        }
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

}
