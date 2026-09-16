<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeStatistics extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }

        $this->load->helper(['url', 'string']);
        $this->load->library('form_validation');
        $this->load->model('Adminapi/FeeStatisticsModel');
    }

    // ✅ Get Periods
    public function getPeriods()
    {
        $data = $this->FeeStatisticsModel->getPeriods();
        echo json_encode($data);
    }

    // ✅ Chart Data
    public function getStatistics()
    {
        $data = $this->FeeStatisticsModel->getDateWiseData();
        echo json_encode($data);
    }

    public function displayStatistics($period)
{
    $fees = $this->FeeStatisticsModel->getDataByPeriod(urldecode($period));

    $output = [
        "totalFeeAmount" => 0,
        "totalFeeCount" => 0,
        "totalTuitionFee" => 0,
        "totalTransportFee" => 0,
        "totalAnnualFee" => 0,
        "totalAdmissionFee" => 0,
        "totalLateFee" => 0,
        "paidCount" => 0,
        "paidAmount" => 0,
        "pendingCount" => 0,
        "pendingAmount" => 0,
    ];

    foreach ($fees as $fee)
    {
        $output['totalFeeAmount'] += $fee->amount;
        $output['totalFeeCount'] += 1;
        $output['totalTuitionFee'] += $fee->tuition_fee;
        $output['totalTransportFee'] += $fee->transport_fee;
        $output['totalAnnualFee'] += $fee->annual_fee;
        $output['totalAdmissionFee'] += $fee->admission_fee;
        $output['totalLateFee'] += $fee->late_fee_paid;

        if($fee->status == true)
        {
            $output['paidCount'] += 1;
            $output['paidAmount'] += $fee->amount;
        }
        else
        {
            $output['pendingCount'] += 1;
            $output['pendingAmount'] += $fee->amount;
        }
    }

    echo json_encode($output);
}

public function getPayments($type, $period)
{
    if($type == "paid")
    {
        $data = $this->FeeStatisticsModel
        ->getPaidPaymentsByPeriod(urldecode($period));
    }

    else if($type == "pending")
    {
        $data = $this->FeeStatisticsModel
        ->getPendingPaymentsByPeriod(urldecode($period));
    }

    else
    {
        $data = $this->FeeStatisticsModel
        ->getTotalPaymentsByPeriod(urldecode($period));
    }

    echo json_encode($data);
}
public function getPaidPaymentsByDate($date)
{
    $data = $this->FeeStatisticsModel
    ->getPaidPaymentsByDate(urldecode($date));

    echo json_encode($data);
}
}