<?php $this->view('header') ?>
<div class="col-md-12 innerview">
	<form action="<?php echo site_url('fee/updateStudentFee') ?>" method="POST">
			<div class="col-md-4">
			    <input type="hidden" name="id" value="<?php echo $payment->feeid ?>" />
			    <input type="hidden" name="student_id" value="<?php echo $payment->student_id ?>" />
			    
				<p class="details">Student Name</p>
				<p class="profile-info"><?php echo $payment->studentname ?></p>
				<input type="hidden" name="student_name" value="<?php echo $payment->studentname ?>" />
				
				<p class="details">Class</p>
					<p class="profile-info"><?php echo $payment->class ?></p>
				<input type="hidden" name="student_class" value="<?php echo $payment->class ?>" />
				
				<p class="details">Roll No.</p>
					<p class="profile-info"><?php echo $payment->rollno ?></p>
				<input type="hidden" name="rollno" value="<?php echo $payment->rollno ?>" />
	
				
				<p class="details">Session</p>
				<select name="session">
				    <option value="<?php echo $payment->session ?>"><?php echo $payment->session ?></option>
				    <option value="2024-2025">2024-2025</option>
				</select>
			</div>
			<div class="col-md-4">
				<p class="details">Tuition Fee</p>
				<input type="number" name="tuition_fee" class="form-input" value="<?php echo $payment->tuition_fee ?>" />
				
				<p class="details">Annual Fee</p>
				<input type="number" name="annual_fee" class="form-input" value="<?php echo $payment->annual_fee ?>"/>
				
				<p class="details">Admission Fee</p>
				<input type="number" name="admission_fee" class="form-input" value="<?php echo $payment->admission_fee ?>"/>
				
				<p class="details">Transport Fee</p>
				<input type="number" name="transport_fee" class="form-input" value="<?php echo $payment->transport_fee ?>"/>
			
			</div>
			<div class="col-md-4">
				<p class="details">Last Date</p>
				<input type="date" name="last_date" class="form-input" value="<?php echo $payment->lastdate ?>"/>
				
				<p class="details">Period</p>
				<input type="period" name="period" value="March" class="form-input" value="<?php echo $payment->period ?>"/>
				
				<p class="details">Status</p>
				<select name="status">
				    <?php if($payment->status) { ?>
				         <option value="0">Unpaid</option>
				         <option value="1" selected>Paid</option>
				    <?php } else { ?>
				        <option value="0" selected>Unpaid</option>
				         <option value="1" >Paid</option>
				    <?php } ?>
				   
				</select>
				
				<p class="details">Payment Mode</p>
				<select name="payment_mode">
				    <option value="<?php echo $payment->payment_mode ?>"><?php echo $payment->payment_mode ?></option>
				    <option value="">Select</option>
				    <option value="cash">cash</option>
				    <option value="cheque">cheque</option>
				    <option value="online">online</option>
				</select>
				
				<p class="details">Amount Paid</p>
				<input type="number" name="amount_paid"  class="form-input" value="<?php echo $payment->amount_paid ?>"/>
				
				
				<p class="details">Payment Date</p>
				<input type="date" name="payment_date" value="<?php echo $payment->paidondate ?>"/>
				<?php if (form_error('payment_date')) { ?>
					<?php echo form_error('payment_date',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>
			</div>
		<div class="col-md-12" align="center">
			<button class="form-submit">Update</button>
		</div>
	</form>
</div>
<?php $this->view('footer') ?>
