<?php


class FeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function load()  //load fee structure
	{
		$query=$this->db->query('SELECT * FROM feestructure');
		$result=$query->result();
		return $result;
	}

	public function insert($data) //insert fee structure
	{
		return $this->db->insert('feestructure', $data) ? true : false;
	}

	public function getStudentFeeDetail()
	{
		$query=$this->db->query('SELECT * FROM student,feestructure WHERE student.Class=feestructure.feeclass ORDER BY student.Class ASC');
		$result=$query->result();
		return $result;
	}

	public function getFeeDetail($id)
	{
		$query=$this->db->query('SELECT * FROM student,feestructure WHERE student.Class=feestructure.feeclass AND student.id='.$id);
		$result=$query->result();
		return $result;
	}

	public function loadPayments()
	{
		$year = date('Y');
		$query = $this->db->query("SELECT * FROM fee WHERE YEAR(created_at) = '$year' ORDER BY created_at");
		$result = $query->result();
		return $result;
	}


	public function loadReceiptDetails($id)
	{
		$sql='SELECT * FROM fee WHERE feeid=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	public function delete($id)  // delete fee structure
	{
		$this->db->where('feestructureid', $id);
		return $this->db->delete('feestructure') ? true : false;
	}

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

	public function get($id)
	{
		$this->db->where('feeid', $id);
		$query = $this->db->get('fee');
		return $query->result();
	}

	public function update($updatedPayment, $paymentId)
	{
		$this->db->where('feeid', $paymentId);
		return $this->db->update('fee', $updatedPayment) ? true : false;
	}

	public function insertPayment(array $payment)
	{
		for ($i = 0; $i < count($payment['ids']); $i++){
			$students = $this->getFeeDetail($payment['ids'][$i]);
			$admissionFee = !(empty($payment['admission-fee'])) ? ((array_key_exists($payment['ids'][$i], $payment['admission-fee']) ? $payment['admission-fee'][$payment['ids'][$i]] : 0)) : 0;
			$annualFee = !(empty($payment['annual-fee'])) ? (array_key_exists($payment['ids'][$i], $payment['annual-fee']) ? $payment['annual-fee'][$payment['ids'][$i]] : 0) : 0;
			$tuitionFee = !(empty($payment['tuition-fee'])) ? ((array_key_exists($payment['ids'][$i], $payment['tuition-fee']) ? $payment['tuition-fee'][$payment['ids'][$i]] : 0)) : 0;
			$siblingDiscount= !(empty($payment['sibling-discount'])) ? ((array_key_exists($payment['ids'][$i], $payment['sibling-discount']) ? $payment['sibling-discount'][$payment['ids'][$i]] : 0)) : 0;
			foreach ($students as $student) {
				$new = array(
				    'student_id' => $student->id,
					'studentname' => $student->Name,
					'class' => $student->Class,
					'rollno' => $student->Rollno,
					'admission_fee' =>  $admissionFee,
					'annual_fee' =>  $annualFee,
					'tuition_fee' =>  $tuitionFee,
					'sibling_discount' =>  $siblingDiscount,
					'amount' =>  ($admissionFee + 
					              $annualFee +
					              $tuitionFee -
					              $siblingDiscount),
					'lastdate' => $payment['lastDate'],
					'period' => $payment['period']
				);
				
				$this->db->insert('fee', $new);
			}
			
		}
		return true;
	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM fee WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at desc';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function getFilteredStudentData($class)
	{
		$query = $this->db->query("SELECT * FROM student,feestructure WHERE student.Class=feestructure.feeclass AND student.Class = '$class'");
		return $query->result();
	}

	public function getPending()
    {
        $query = $this->db->query("SELECT * FROM student,fee WHERE student.Class = fee.class AND student.Rollno = fee.rollno AND fee.status = 0");
        return $query->result();
    }
    
    public function getDiscount()
    {
        return $this->db->get('discounts')->result();
    }
    
    public function insertDiscount($discount)
    {
        return $this->db->insert('discounts', $discount);
    }
    
    public function getDiscounts()
    {
        return $this->db->get('discounts')->result();
    }
    
    public function getStudentDiscount()
    {
        return $this->db->get('student_discount')->result();
    }
    
    public function insertStudentFee($fee)
    {
        return $this->db->insert('fee', $fee);
    }
    
    public function getPayment($paymentId)
    {
        return $this->db->where('feeid', $paymentId)->get('fee')->row();
    }
    
    public function updatePayment($feeId, $updatedFee)
    {
        return $this->db->where('feeid', $feeId)->update('fee', $updatedFee);
    }
    
    public function getPendingPayments()
    {
        return $this->db->where('status', 0)->get('fee')->result();
    }

}
