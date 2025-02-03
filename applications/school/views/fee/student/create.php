<?php $this->view('header') ?>
  <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
<div class="col-md-12 innerview">
	<form action="<?php echo site_url('fee/insertStudentFee') ?>" method="POST">
		<?php if (isset($students)) { ?>
		<?php foreach ($students as $student) { ?>
			<div class="col-md-4">
			    <input type="hidden" name="student_id" value="<?php echo $student->id ?>" />
			    
				<p class="details">Student Name</p>
				<p class="profile-info"><?php echo $student->Name ?></p>
				<input type="hidden" name="student_name" value="<?php echo $student->Name ?>" />
				
				<p class="details">Class</p>
					<p class="profile-info"><?php echo $student->Class ?></p>
				<input type="hidden" name="student_class" value="<?php echo $student->Class ?>" />
				
				<p class="details">Roll No.</p>
					<p class="profile-info"><?php echo $student->Rollno ?></p>
				<input type="hidden" name="rollno" value="<?php echo $student->Rollno ?>" />
				
				<p class="details">Admission No.</p>
					<p class="profile-info"><?php echo $student->Admno ?></p>
				<input type="hidden" name="admission_number" value="<?php echo $student->Admno ?>" />
	
				
				<p class="details">Session</p>
				<select name="session">
				    <option value="2024-2025">2024-2025</option>
				</select>
			</div>
			<div class="col-md-4">
				<p class="details">Tuition Fee</p>
				<input type="number" name="tuition_fee" class="form-input" value="0"/>
				
				<p class="details">Annual Fee</p>
				<input type="number" name="annual_fee" class="form-input" value="0"/>
				
				<p class="details">Admission Fee</p>
				<input type="number" name="admission_fee" class="form-input" value="0"/>
				
				<p class="details">Transport Fee</p>
				<input type="number" name="transport_fee" class="form-input" value="0"/>
				
				<p class="details">Any Other Fee</p>
				<input type="number" name="late_fee" class="form-input" value="0"/>
			
			</div>
			<div class="col-md-4">
				<p class="details">Last Date</p>
				<input type="text" id="last-date" name="last_date" class="form-input" />
				
				<p class="details">Period</p>
				<input type="period" name="period" value="March" class="form-input" />
				
				<p class="details">Status</p>
				<select name="status">
				    <option value="0">Unpaid</option>
				    <option value="1">Paid</option>
				</select>
				
				<p class="details">Payment Mode</p>
				<select name="payment_mode">
				    <option value="">Select</option>
				    <option value="cash">cash</option>
				    <option value="cheque">cheque</option>
				    <option value="online">online</option>
				</select>
				
				<p class="details">Amount Paid</p>
				<input type="number" name="amount_paid"  class="form-input"/>
				
				
				<p class="details">Payment Date</p>
				<input type="text" id="payment-date" name="payment_date" />
				<?php if (form_error('payment_date')) { ?>
					<?php echo form_error('payment_date',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>
				
				<p class="details">Remarks</p>
				<input type="text" name="remarks"  class="form-input"/>
			</div>
		<?php } ?>
		<?php } ?>
		<div class="col-md-12" align="center">
			<button class="form-submit">Create</button>
		</div>
	</form>
</div>

  <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#last-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
     <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#payment-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('footer') ?>
