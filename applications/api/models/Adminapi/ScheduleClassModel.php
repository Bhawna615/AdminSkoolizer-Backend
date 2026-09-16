<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleClassModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        return $this->db->insert('classes', $data);
    }

    public function getAllClassesDetails()
    {
        return $this->db->get('classes')->result();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('classes');
    }

    public function getStrength($classes)
    {
        $strengthArray = [];

        foreach ($classes as $class) {

            $count = $this->db
                ->where('Class', $class->Classname)
                ->count_all_results('student');

            $strengthArray[$class->Classname] = $count;
        }

        return $strengthArray;
    }
}