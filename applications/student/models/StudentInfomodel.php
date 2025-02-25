<?php

class StudentInfoModel {
    // Define properties
    private $db;

    // Constructor to initialize the database connection
    public function __construct($database) {
        $this->db = $database;
    }

    public function getStudentById($student_id)
    {
        return $this->db->where('id', $student_id)->get('student')->row();
    }
    
  
}
?>