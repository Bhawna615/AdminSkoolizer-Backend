<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeworkModel extends CI_Model
{

 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // get all classes
    public function getClasses()
    {
        $this->db->distinct();
        $this->db->select('Classname');
        $query = $this->db->get('classes');

        return $query->result();
    }

     // ✅ get subjects by class
    public function getSubjects($class)
    {
        $sql = "SELECT * FROM timetable 
                WHERE Class=? AND TeacherId !=0 
                GROUP BY Subjectname";

        $query = $this->db->query($sql, [$class]);
        return $query->result();
    }

    // ✅ insert homework
    public function submitHomework($data)
    {
        return $this->db->insert('assignment', $data);
    }

     public function get()
    {
        $year = date('Y');

        $this->db->select('*');
        $this->db->from('assignment');
        $this->db->where('YEAR(Date)', $year, FALSE);
        $this->db->order_by('Date', 'DESC');

        return $this->db->get()->result();
    }

     public function getFilteredData($year, $month, $class)
    {
        $this->db->select('*');
        $this->db->from('assignment');
        $this->db->where('YEAR(Date)', $year, FALSE);
        $this->db->where('MONTH(Date)', $month, FALSE);
        $this->db->where('Class', $class);
        $this->db->order_by('Date', 'DESC');

        return $this->db->get()->result();
    }

     public function deleteHomework($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('assignment');
    }
}