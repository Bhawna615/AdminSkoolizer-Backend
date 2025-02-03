<?php $this->view('header') ?>
<div class="col-md-12 innerview">
	<form action="<?php echo site_url('fee/updatePaidFee') ?>" method="POST" >
			<div class="col-md-4">
			    <input type="hidden" name="id" value="<?php echo $payment->feeid ?>" />
			    <input type="hidden" name="student_id" value="<?php echo $payment->student_id ?>" />
			    
				<p class="details">Student Name</p>
				<input type="text" name="student_name" value="<?php echo $payment->studentname ?>" />
				
				<p class="details">Class</p>
				<input type="text" name="student_class" value="<?php echo $payment->class ?>" />
				
				<p class="details">Roll No.</p>
					<p class="profile-info"><?php echo $payment->rollno ?></p>

                <p class="details">Session</p>
				<p class="profile-info"><?php echo $payment->session?></p>

                <p class="details">Transaction Id</p>
				<p class="profile-info"><?php echo $payment->razorpay_order_id ?></p>

                <p class="details">Easepay Id</p>
				<p class="profile-info"><?php echo $payment->easepay_id ?></p>

                <p class="details">Student Id</p>
				<p class="profile-info"><?php echo $payment->student_id ?></p>




			</div>
			<div class="col-md-4">
                <p class="details">Payment Mode</p>
				<p class="profile-info"><?php echo $payment->payment_mode ?></p>

                <p class="details">Late Fee Paid</p>
				<p class="profile-info"><?php echo $payment->late_fee_paid ?></p>

                <p class="details">Amount Paid</p>
				<input type="text" name="amount_paid" value="<?php echo $payment->amount_paid ?>" />

                <p class="details">Payment Date</p>
				<p class="profile-info"><?php echo $payment->paidondate ?></p>

			</div>
			<div class="col-md-4">
                <p class="details">Admission No</p>
                <input type="text" name="admission_number" value="<?php echo $payment->admission_number ?>" />

                <p class="details">Tuition Fee</p>
				<p class="profile-info"><?php echo $payment->tuition_fee ?></p>

                <p class="details">Annual Fee</p>
				<p class="profile-info"><?php echo $payment->annual_fee ?></p>

                <p class="details">Admission Fee</p>
				<p class="profile-info"><?php echo $payment->admission_fee ?></p>

                <p class="details">Transport Fee</p>
				<p class="profile-info"><?php echo $payment->transport_fee ?></p>

                <p class="details">Amount</p>
				<input type="text" name="amount" value="<?php echo $payment->amount ?>" />

                <p class="details">Last Date</p>
				<p class="profile-info"><?php echo $payment->lastdate ?></p>

                <p class="details">Period</p>
				<p class="profile-info"><?php echo $payment->period ?></p>

                <p class="details">Status</p>
				<p class="profile-info"><?php echo $payment->status ? "Paid" : "Unpaid" ?></p>
			</div>
		<div class="col-md-12" align="center">
			<button class="form-submit">Update</button>
		</div>
	</form>
</div>
<?php $this->view('footer') ?>
