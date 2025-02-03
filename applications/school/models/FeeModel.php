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
		$query=$this->db->query('SELECT * FROM student');
		$result=$query->result();
		return $result;
	}

	public function getFeeDetail($id)
	{
		$query=$this->db->query('SELECT * FROM student WHERE id='.$id);
		$result=$query->row();
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
	
// 	public function insertPayment(array $payment)
// 	{
// 		for ($i = 0; $i < count($payment['ids']); $i++){
// 			$student = $this->getFeeDetail($payment['ids'][$i]);
			
// 				$new = array(
// 				    'student_id' => $student->id,
// 					'studentname' => $student->Name,
// 					'class' => $student->Class,
// 					'rollno' => $student->Rollno,
// 					'admission_number' => $student->Admno,
// 					'admission_fee' =>  0,
// 					'annual_fee' =>  $student->annual_fee,
// 					'tuition_fee' =>  0,
// 					'transport_fee' =>  0,
// 					'amount' =>  $student->annual_fee,
// 					'lastdate' => $payment['lastDate'],
// 					'period' => $payment['period'],
// 					'session' => $payment['session']
// 				);
				
// 				$this->db->insert('fee', $new);
// 		}
// 		return true;
// 	}

	public function getFilteredData($year, $month, $class)
	{
		$sql = 'SELECT * FROM fee WHERE YEAR(created_at) = ? AND MONTH(created_at) =? AND class =? ORDER BY created_at desc';
		$query = $this->db->query($sql, array($year, $month, $class));
		return $query->result();
	}

	public function getFilteredStudentData($class)
	{
		$query = $this->db->query('SELECT * FROM student WHERE Class = ?', $class);
		$result = $query->result();
		return $result;
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
    
     public function getPendingPayments($period)
    {
        return $this->db->where('status', 0)->where('period', $period)->get('fee')->result();
    }
    
    public function getPeriods()
	{
		$sql = "SELECT DISTINCT(period) FROM fee";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getDataByPeriod($period)
	{
		$this->db->where('period', $period);
		return $this->db->get('fee')->result();
	}

	public function getTotalPaymentsByPeriod($period)
	{
		$this->db->where('period', $period);
		return $this->db->get('fee')->result();
	}

	public function getPaidPaymentsByPeriod($period)
	{
		$this->db->where('period', $period);
		$this->db->where('status', true);
		return $this->db->get('fee')->result();
	}

	public function getPendingPaymentsByPeriod($period)
	{
		$this->db->where('period', $period);
		$this->db->where('status', false);
		return $this->db->get('fee')->result();
	}

	public function getPaidPaymentsByDate($date)
	{
		$this->db->where('paidondate', date("Y-m-d", strtotime($date)));
		$this->db->where('status', true);
		return $this->db->get('fee')->result();
	}

	public function getDateWiseData()
	{
		$from = date("Y-m-d");
		$to = date("Y-m-d", strtotime('-7 days'));

        $dates = [];
        $diff = date_diff(date_create($to), date_create($from));
        for($i=0; $i <= $diff->days; $i++)
        {
            $dates[] = date("Y-m-d",strtotime($to));
            $to = date("Y-m-d",strtotime("+1 day",strtotime($to)));
        }

		foreach ($dates as $date) {
            $output[date("d-m-Y", strtotime($date))] = $this->getTotalFeeByDate($date);
        }

		return $output;	
	}

	public function getTotalFeeByDate($date)
	{
		$totalPaidFee = 0;
		$this->db->where('paidondate', date("Y-m-d", strtotime($date)));
		$this->db->where('status', true);
		$feeData = $this->db->get('fee')->result();

		foreach($feeData as $data) {
			$totalPaidFee = $totalPaidFee + $data->amount_paid;
		}

		return $totalPaidFee;
	}
	
	    public function updatePaidPayment($feeId, $updatedFee)
    {
        return $this->db->where('feeid', $feeId)->update('fee', $updatedFee);
    }

}
