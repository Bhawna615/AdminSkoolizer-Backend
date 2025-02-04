<?php $this->view('header') ?>
<div class="col-md-12 innerview">
	<form action="<?php echo site_url('fee/update') ?>" method="POST">
		<?php if (isset($payments)) { ?>
		<?php foreach ($payments as $payment) { ?>
			<div class="col-md-4">
				<p class="details">Student Name</p>
				<p class="profile-info"><?php echo $payment->studentname ?></p>
				<p class="details">Class</p>
				<p class="profile-info"><?php echo $payment->class ?></p>
				<p class="details">Roll No.</p>
				<p class="profile-info"><?php echo $payment->rollno ?></p>
				<p class="details">Payment Date</p>
				<input type="date" name="payment_date" />
				<?php if (form_error('payment_date')) { ?>
					<?php echo form_error('payment_date',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">Amount</p>
				<p class="profile-info"><?php echo $payment->amount ?></p>
				<input type="hidden" name="amount" value="<?php  echo $payment->amount ?>">
				<p class="details">Period</p>
				<p class="profile-info"><?php echo $payment->period ?></p>
				<p class="details">Last Date</p>
				<p class="profile-info"><?php echo $payment->lastdate ?></p>
			</div>
			<div class="col-md-4">
			    <p class="details">Late Fee Paid</p>
				<input
					type="number"
					name="late_fee_paid"
					class="form-input"
				/>
				<p class="details">Amount Paid</p>
				<input
					type="number"
					name="amount_paid"
					class="form-input"
				/>
				<?php if (form_error('amount_paid')) { ?>
					<?php echo form_error('amount_paid',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>


				<p class="details">Payment Mode</p>
				<select name="payment_mode" class="form-select">
					<option value="cash">Cash</option>
					<option value="cheque">Cheque</option>
					<option value="online">Online</option>
				</select>
				<input type="hidden" name="payment_id" value="<?php echo $payment->feeid ?>">
			</div>
		<?php } ?>
		<?php } ?>
		<div class="col-md-12" align="center">
			<button class="form-submit">Accept</button>
		</div>
	</form>
</div>
<?php $this->view('footer') ?>
