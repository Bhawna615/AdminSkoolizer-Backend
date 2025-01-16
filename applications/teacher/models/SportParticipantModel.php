<?php


class SportParticipantModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all($eventId)
    {
        return $this->db->where('sport_id', $eventId)
            ->get('sport_participants')->result();
    }

    public function insert(array $participants)
    {
        for ($i = 0; $i < count($participants['ids']); $i++){
            $student = $this->getStudent($participants['ids'][$i]);
                $new = array(
                    'name' => $student->Name,
                    'class' => $student->Class,
                    'rollno' => $student->Rollno,
                    'student_id' => $student->id,
                    'sport_id' => $participants['sport_id']
                );
                $this->db->insert('sport_participants', $new);
        }
        return true;
    }

    public function getStudent($i)
    {
        return $this->db->where('id', $i)->get('student')->row();
    }

    public function getFilteredStudentData($class)
    {
        $query=$this->db->query("SELECT * FROM student WHERE Class = '$class'");
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)
            ->delete('sport_participants') ? true : false;
    }
}