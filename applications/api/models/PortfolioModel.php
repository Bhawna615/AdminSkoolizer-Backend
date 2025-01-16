<?php


class PortfolioModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getBioData($id)
	{
		$this->db
			->where('id', $id);
		return $this->db
			->get('student')->row();
	}
}
