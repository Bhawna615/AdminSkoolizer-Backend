<?php


class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getOne($qrCode)
    {
        return $this->db
            ->where('qrcode', $qrCode)
            ->get('student')
            ->row();
    }
    
    public function userLogin($admission_no, $password)
	{
		$sql = "SELECT * FROM student WHERE Admno = ?";
		$query = $this->db->query($sql, $admission_no);
		if ($query->num_rows() > 0) {
		    $this->db->where('Admno', $admission_no);
		    $student = $this->db->get('student')->row();
		    if(password_verify($password, $student->Password)) {
		        return $student;
		    } else {
		        return false;
		    }
		} else {
			return false;
		}
	}
}