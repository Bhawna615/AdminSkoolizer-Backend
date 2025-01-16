<?php


class MovementModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function read()
	{
		$currentYear = date('Y');
		$query = $this->db
			->query("SELECT * FROM movements WHERE YEAR(timestamp) = '$currentYear'");
		return $query->result();
	}


	public function getStudentByQrCode($qrCode)
	{
		$this->db->where('qrcode', $qrCode);
		return $this->db->get('student')->first_row();
	}

	public function store($movement)
	{
		return $this->db->insert('movements', $movement) ? true : false;
	}

	public function duplicate($movement)
	{
		$date = date("Y-m-d");
		$this->db->where('name', $movement['name']);
		$this->db->where('class', $movement['class']);
		$this->db->where('roll_no', $movement['roll_no']);
		$this->db->where('date(timestamp)', $date);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get('movements');
		$mostRecentMovement = $query->row();
        return !empty($mostRecentMovement) ? $mostRecentMovement->movement === $movement['movement'] : false;
	}

	public function mostRecent()
	{
		$sql = 'SELECT student.image, movements.name, movements.class, movements.roll_no, movements.movement, movements.timestamp FROM movements,student WHERE movements.student_id = student.id ORDER BY timestamp desc';
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function filter($year, $month, $class)
	{
		$sql = 'SELECT * FROM movements WHERE YEAR(timestamp) = ? AND MONTH(timestamp) =? AND class =? ORDER BY timestamp DESC';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function filterTwo($class)
	{
		$currentDate = date("Y-m-d");
		$sql = 'SELECT DISTINCT * FROM movements WHERE DATE(timestamp) = ? AND class = ? ORDER BY timestamp desc';
		$query = $this->db->query($sql, array($currentDate, $class));
		return $query->result();
	}

}
