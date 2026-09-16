<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFeeModel extends CI_Model
{
   
    public function loadFeeDetails($id)
	{
		$sql='SELECT Class,Rollno FROM student WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		foreach ($result as $row) {
			$class=$row->Class;
			$roll=$row->Rollno;
		}

		$sqla='SELECT * FROM fee WHERE student_id = ?';
		$querya=$this->db->query($sqla,array($id));
		$resulta=$querya->result();
		return $resulta;
	}
	public function getPaymentsBySessionAndClass($session)
    {
        $this->db->where('session', $session);
        // $this->db->where('class', $class);
        $query = $this->db->get('fee');
        return $query->result();
    }
	public function updatePayment($feeId, $data)
{
    $this->db->where('feeid', $feeId);
    return $this->db->update('fee', $data);
}
}