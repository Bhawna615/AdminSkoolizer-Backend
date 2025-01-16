<?php $this->view('header'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="col-md-12 innerview">
    	<div class="message">
        </div>
        <?php if(isset($fees)) { ?>
            <?php foreach($fees as $fee) { ?>
                <?php $totalFeeAmount  = $totalFeeAmount + $fee->amount;
                        $totalFeeCount = $totalFeeCount + 1;
                        $totalTuitionFee = $totalTuitionFee + $fee->tuition_fee;
                        $totalTransportFee = $totalTransportFee + $fee->transport_fee;
                        $totalAnnualFee = $totalAnnualFee + $fee->annual_fee;
                        $totalAdmissionFee = $totalAdmissionFee + $fee->admission_fee;
                        $totalLateFee = $totalLateFee + $fee->late_fee_paid; ?>
                <?php if($fee->status == true) { 
                    $paidCount = $paidCount + 1;   
                    $paidAmount = $paidAmount + $fee->amount;
                } else {
                    $pendingCount = $pendingCount + 1;
                    $pendingAmount = $pendingAmount + $fee->amount;
                    
                    } ?>
            <?php } ?>
        <?php } ?>

        <div class="col-md-12">
                <div class="col-md-6">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
                </div>
        </div>
        <div class="col-md-12" style="margin-top: 30px;">
            <div class="card col-md-3">
                <a href="<?php echo site_url('fee/viewTotalPaymentsByPeriod/').$period ?>">
                    Total Fee to be Collected : <?php echo $totalFeeAmount ?>
                </a>
            </div>

            <div class="card col-md-3">
                <a href="<?php echo site_url('fee/viewPaidPaymentsByPeriod/').$period ?>">Total Paid Fee : <?php echo $paidAmount ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Pending Fee : <?php echo $pendingAmount ?></a>
            </div>
            
            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewTotalPaymentsByPeriod/').$period ?>">Total Payments : <?php echo $totalFeeCount ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPaidPaymentsByPeriod/').$period ?>">Total Paid Payments : <?php echo $paidCount ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Pending Payments : <?php echo $pendingCount ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Tuition Fee : <?php echo $totalTuitionFee ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Transport Fee : <?php echo $totalTransportFee ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Annual Fee : <?php echo $totalAnnualFee ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Admission Fee : <?php echo $totalAdmissionFee ?></a>
            </div>

            <div class="card col-md-3">
            <a href="<?php echo site_url('fee/viewPendingPaymentsByPeriod/').$period ?>">Total Late Fee Collected : <?php echo $totalLateFee ?></a>
            </div>
        </div>
        
  
</div>
<script>
const xValues = ["Total Paid Fee", "Total Pending Fee"];
const yValues = [<?php echo $paidAmount ?>, <?php echo $pendingAmount ?>];
const barColors = [
  "#2C56BB",
  "#FFAE10",
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});
</script>

<script>
const x2Values = ["Tuition Fee", "Transport Fee", "Annual Fee", "Admission Fee"];
const y2Values = [<?php echo $totalTuitionFee ?>, <?php echo $totalTransportFee ?>, <?php echo $totalAnnualFee ?>, <?php echo $totalAdmissionFee ?>];
const bar2Colors = [
  "#2C56BB",
  "#FFAE10",
  "#1F1F1F",
  "#059862",
];

new Chart("myChart2", {
  type: "pie",
  data: {
    labels: x2Values,
    datasets: [{
      backgroundColor: bar2Colors,
      data: y2Values
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});
</script>

<?php $this->view('footer'); ?>