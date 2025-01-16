<?php


class HomeworkModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get() // get homework
	{
		$year = date('Y');
		$query = $this->db->query("SELECT * FROM assignment WHERE YEAR(Date) = '$year' ORDER BY Date desc");
		$result = $query->result();
		return $result;
	}

	public function submit(array $homework)  //submit homework
	{
		return $this->db->insert('assignment', $homework) ? true : false;
	}

	public 	function delete($id)  //delete homework
	{
		$this->db->where('id', $id);
		return $this->db->delete('assignment') ? true : false;
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM assignment WHERE YEAR(Date) = ? AND MONTH(Date) =? AND Class =? ORDER BY Date desc';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function getFile($id)
	{
		return $this->db
			->select('file')
			->where('id', $id)
			->get('assignment')
			->row();
	}
}
