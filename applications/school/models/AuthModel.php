<?php


class AuthModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function verify($userName, $password)
	{
		$admin = $this->db
			->select('password')
			->where('username', $userName)
			->get('admin')
			->row();

		return password_verify($password, $admin->password);
	}
	
	public function getUserType($userName) 
	{
	    $userType = $this->db
			->select('usertype')
			->where('username', $userName)
			->get('admin')
			->row();
			
			return $userType;
	}
	
	public function getUserId($userName) 
	{
	    $userId = $this->db
			->select('user_id')
			->where('username', $userName)
			->get('admin')
			->row();
			
			return $userId;
	}


}
