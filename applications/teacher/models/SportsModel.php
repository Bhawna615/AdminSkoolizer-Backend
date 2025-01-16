<?php


class SportsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all()
    {
        return $this->db->get('sports')->result();
    }

    public function insert($newEvent)
    {
        return $this->db->insert('sports', $newEvent) ? true : false;
    }

    public function one($eventId)
    {
        $this->db->where('id', $eventId);
        return $this->db->get('sports')->row();
    }

    public function update($event, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('sports', $event) ? true : false;
    }

    public function delete($id)
    {
        $this->db->where('sport_id', $id)
            ->delete('sport_participants');
        $this->db->where('id', $id);
        return $this->db->delete('sports') ? true : false;
    }
}