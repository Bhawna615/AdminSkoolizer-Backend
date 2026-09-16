<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeStatisticsModel extends CI_Model {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
    $this->db->where(
        'paidondate',
        date("Y-m-d", strtotime($date))
    );

    $this->db->where('status', true);

    return $this->db->get('fee')->result();
}
}