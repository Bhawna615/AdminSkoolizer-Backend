<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTeacherModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
public function get($id)
	{
	    return $this->db->where('id', $id)->get('teachers')->row();
	}
   public function insertToFormer($teacher,$date_of_leaving)
{

    $data = [

        "name" => $teacher->Teachername,
        "designation" => $teacher->Post,
        "date_of_birth" => $teacher->Dob,
        "date_of_joining" => $teacher->Doj,
        "date_of_leaving" => $date_of_leaving,
        "contact" => $teacher->Contact

    ];

    return $this->db->insert("former_teachers",$data);

}
public function update($data, $id) //update teacher
	{
		$this->db->where('id', $id);
		if ($this->db->update('teachers', $data)) {
			return true;
		} else {
			return false;
		}
	}
    public function updateTeacherCredentials($credentials, $teacherId)
    {
        return $this->db->where('id', $teacherId)->update('teachers', $credentials);
    }
public function Teacherprofile($id) //teacher profile
	{
		$sql='SELECT * FROM teachers WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

  public function insertExperienceCertificate($experienceCertificate)
{
    if(empty($experienceCertificate['date_of_birth'])){
        $experienceCertificate['date_of_birth'] = date('Y-m-d');
    }

    if(empty($experienceCertificate['date_of_joining'])){
        $experienceCertificate['date_of_joining'] = date('Y-m-d');
    }

    return $this->db->insert('experience_certificates', $experienceCertificate);
}
    public function getAllExperienceCertificates()
    {
        return $this->db->get('experience_certificates')->result();
    }
    
    public function getExperienceCertificate($id)
    {
        return $this->db->where('id', $id)->get('experience_certificates')->row();
    }
    public function getTeacher($id)
{
    $teacher = $this->TeacherModel->get($id);
    echo json_encode($teacher);
}
public function updateCredentials($id,$data)
{
    $this->db->where('id',$id);
    return $this->db->update('teachers',$data);
}

public function delete($id)  //delete teacher
	{
		$this->db->where('id', $id);
		$this->db->select('empid');
		$query = $this->db->get('teachers');
		$result = $query->row();
		$empId = $result->empid;
		
		$this->db->where('id', $empId);
		$this->db->delete('employees');

		$this->db->where('id', $id);
		if ($this->db->delete('teachers')) {
			return true;
		} else {
			return false;
		}
	}
    public function profile($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('teachers');

    return $query->result();
}

}
