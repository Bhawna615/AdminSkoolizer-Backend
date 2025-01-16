<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('fee/addDiscount'); ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Fee type
				</p>
				<select name="fee_type">
					<option value="admission_fee">Admission Fee</option>
					<option value="annual_fee">Annual Fee</option>
					<option value="tuition_fee">Tuition Fee</option>
					<option value="transport_fee">Transport Fee</option>
				</select>

				<p class="details">
					Amount
				</p>
				<input
						type="number"
						name="amount"
						class="form-input"
				>
				<?php if (form_error('admission_fee')) { ?>
					<?php echo form_error('admission_fee',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

			
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Add" class="form-submit">
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
