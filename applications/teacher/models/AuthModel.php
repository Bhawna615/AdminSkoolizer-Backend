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
		$teacher = $this->db
			->where('Email', $userName)
			->get('teachers')
			->row();

		if(password_verify($password, $teacher->Password)){
		    return $teacher;
		} else {
		    return false;
		}
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
