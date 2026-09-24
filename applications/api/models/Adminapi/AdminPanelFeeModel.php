<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanelFeeModel extends CI_Model
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

    public function getAll() //get all classes
	{
		$query=$this->db->query('SELECT distinct(Classname) FROM classes');
		$result=$query->result();
		return $result;
	}

    	public function delete($id)  // delete fee structure
	{
		$this->db->where('feestructureid', $id);
		return $this->db->delete('feestructure') ? true : false;
	}

     public function getDiscount()
    {
        return $this->db->get('discounts')->result();
    }

     public function insertDiscount($discount)
    {
        return $this->db->insert('discounts', $discount);
    }
    public function getStudents() //get students info
	{
		$query=$this->db->query("SELECT * FROM student  WHERE Class != 'passed_out' Order By Rollno ASC");
		$result=$query->result();
		return $result;
	}

    public function assignDiscountToStudents($ids, $discountId)
    {
        for($i = 0; $i < count($ids); $i++ )
        {
            $studentDiscount = array(
                'student_id' => $ids[$i],
                'discount_id' => $discountId
                );
            $this->db->insert('student_discount', $studentDiscount);
        }
    }
    public function getFilteredStudentData($class)
	{
		$query = $this->db->query('SELECT * FROM student WHERE Class = ?', $class);
		$result = $query->result();
		return $result;
	}


    public function getFeeDetail($id)
	{
		$query=$this->db->query('SELECT * FROM student WHERE id='.$id);
		$result=$query->row();
		return $result;
	}

    public function insertPayment(array $payment)
	{
		for ($i = 0; $i < count($payment['ids']); $i++){
			$student = $this->getFeeDetail($payment['ids'][$i]);
			
				$new = array(
				    'student_id' => $student->id,
					'studentname' => $student->Name,
					'class' => $student->Class,
					'rollno' => $student->Rollno,
					'admission_number' => $student->Admno,
					'admission_fee' =>  0,
					'annual_fee' =>  0,
					'tuition_fee' =>  $student->tuition_fee,
					'transport_fee' =>  $student->transport_fee,
					'amount' =>  ($student->tuition_fee + $student->transport_fee),
					'lastdate' => $payment['lastDate'],
					'period' => $payment['period'],
					'session' => $payment['session']
				);
				
				$this->db->insert('fee', $new);
		}
		return true;
	}

	public function loadPayments()
{
    $year = date('Y');
    return $this->db
        ->where('YEAR(created_at)', $year)
        ->order_by('created_at', 'ASC')
        ->get('fee')
        ->result();
}

public function getFilteredData($year, $month, $class, $session = null)
{
    $this->db
        ->where('YEAR(created_at)', $year)
        ->where('MONTH(created_at)', $month)
        ->where('class', $class);

    if ($session) {
        $this->db->where('session', $session); // ✅ ADD
    }

    return $this->db
        ->order_by('created_at', 'DESC')
        ->get('fee')
        ->result();
}

public function getPaymentById($id){
    $this->db->where('feeid', $id);
    $query = $this->db->get('fee');
    return $query->row(); // ✅ object return karega
}

public function acceptPayment($data, $id)
{
    $this->db->where('feeid', $id);
    return $this->db->update('fee', $data);
}

public function updatePayment($feeId, $updatedFee)
    {
        return $this->db->where('feeid', $feeId)->update('fee', $updatedFee);
    }

	public function loadReceiptDetails($id)
{
    $sql = 'SELECT * FROM fee WHERE feeid=?';
    $query = $this->db->query($sql, [$id]);
    return $query->result();
}

public function updatePaidPayment($feeId, $data)
{
    return $this->db
        ->where('feeid', $feeId)
        ->update('fee', $data);
}

public function getPaidPayment($paymentId)
{
    return $this->db
        ->where('feeid', $paymentId)
        ->get('fee')
        ->row();
}

public function get_sessions()
{
    return $this->db
        ->distinct()
        ->select('session')
        ->order_by('session', 'DESC')
        ->get('fee')
        ->result_array();
}

public function getBySession($session)
{
    return $this->db
        ->where('session', $session)
        ->order_by('created_at', 'DESC')
        ->get('fee')
        ->result();
}

public function getPeriods()
{
    return $this->db
        ->distinct()
        ->select('period')
        ->order_by('period', 'DESC')
        ->get('fee')
        ->result();
}

public function getPendingPayments($period)
{
    return $this->db
        ->where('status', 0)
        ->where('period', $period)
        ->get('fee')
        ->result();
}

public function insertMessages($ids, $message)
{
    foreach ($ids as $id) {
        $data = [
            'message' => $message,
            'student_id' => $id,
            'message_file' => NULL,
            'message_file_url' => NULL,
            'sent_at' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('messages', $data);
    }

    return true;
}

}