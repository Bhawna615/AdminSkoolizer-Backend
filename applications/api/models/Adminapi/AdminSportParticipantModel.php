<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSportParticipantModel extends CI_Model 
{

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     // 🔹 Get all participants for a sport event
    public function all($sportId)
    {
        return $this->db->where('sport_id', $sportId)
                        ->get('sport_participants')
                        ->result();
    }
    
    // 🔹 Delete participant
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sport_participants') ? true : false;
    }
     // 🔹 Get all classes
    public function getAll()
    {
        return $this->db
            ->select('DISTINCT(Classname)')
            ->get('classes')
            ->result();
    }
     // 🔹 Get all active students
    public function getInfoMany()
    {
        return $this->db
            ->where('Class !=', 'passed_out')
            ->order_by('Rollno', 'ASC')
            ->get('student')
            ->result();
    }
     // 🔹 Get filtered students by class
    public function getFilteredStudentData($class)
    {
        return $this->db
            ->where('Class', $class)
            ->get('student')
            ->result();
    }
     // 🔹 Get single student
    public function getStudent($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('student')
            ->row();
    }

}
