<?php
class AdminVisitorsModel extends CI_Model {
 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private $table = "visitors"; // change if your table name is different

    public function getAllVisitors()
    {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result();
    }

    public function addVisitor($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateVisitor($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteVisitor($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}