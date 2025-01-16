<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
<div class="message">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="col-md-12 error-bar">
                <i class="las la-exclamation-triangle"></i>
                <?php echo $this->session->flashdata('error') ?>
                <?php $this->session->unset_userdata('error') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="col-md-12 col-lg-12 success-bar">
                <i class="las la-check-square"></i>
                <?php echo $this->session->flashdata('success') ?>
                <?php $this->session->unset_userdata('success') ?>
            </div>
        <?php } ?>
	</div>
    <div class="col-xs-12 message-list-container">
        <?php if (empty($payments)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($payments)) { ?>
            <?php foreach ($payments as $payment) { ?>
                <div class="col-xs-12 message-container">
                    <div class="col-xs-12 payment">
                        <form method="POST" action="<?php echo site_url('fee/pay') ?>">
                        <input type="hidden" name="fee_id" value="<?php echo $payment->feeid ?>" />
                        <input type="hidden" name="student_id" value="<?php echo $payment->student_id ?>" />
                            <p>Name: <?php echo $payment->studentname ?></p>
                            <p>Class: <?php echo $payment->class ?></p>
                            <p>Admission No: <?php echo $payment->admission_number ?></p>
                            <p>Tuition Fee: <?php echo $payment->tuition_fee ?></p>
                            <p>Annual Fee: <?php echo $payment->annual_fee ?></p>
                            <p>Admission Fee: <?php echo $payment->admission_fee ?></p>
                            <p>Transport Fee: <?php echo $payment->transport_fee ?></p>
                            <p>Last Date: <?php if($payment->lastdate != null) { echo date("d-m-Y", strtotime($payment->lastdate)); }?></p>
                            <p>Period: <?php echo $payment->period ?></p>
                            <?php if($payment->status == 0 || $payment->status == null) { ?>
                                <p>Late Fee: 
                                    <?php 
                                         if(date_create(date("Y-m-d")) > date_create($payment->lastdate)) {
                                             $days = date_diff(date_create($payment->lastdate), date_create(date("Y-m-d")));
                                             $lateFee = $days->format("%R%a") * 10;
                                             echo $lateFee;
                                        } else {
                                            $lateFee = 0;
                                            echo $lateFee;
                                        }
                                    ?>
                                </p>
                            <?php } else { ?>
                            <p>Late Fee Paid:
                            <?php echo $payment->late_fee_paid ?>
                            </p>
                            
                            <?php $lateFee = $payment->late_fee_paid; } ?>
                            <input type="hidden" name="late_fee" value="<?php echo $lateFee ?>">
                            <p>Amount: <?php $amount = intval($payment->amount) + $lateFee; echo $amount; ?></p>
                            <p>Status: <?php echo $payment->status ? "Paid" : "Unpaid" ?></p>
                            <p>Payment Mode: <?php echo $payment->payment_mode; ?></p>
                            <p>Payment Date: <?php if($payment->paidondate != null) { echo date("d-m-Y", strtotime($payment->paidondate)); } ?></p>
 
                            <?php 
                                if(!($payment->status)) { ?>
                                    <button type="submit" class="form-btn">Pay</button>
                                <?php }  ?>
                        </form>
                        <?php if($payment->status) { ?>
                        <form method="POST" action="<?php echo site_url('fee/receipt')  ?>" >
                            <input type="hidden" value="<?php echo $payment->feeid ?>" name="feeId" />
                            <button class="form-btn">Download Receipt</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
