<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('fee/insertstructure'); ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Class
				</p>
				<select name="class">
					<?php if (isset($classes)) { ?>
						<?php foreach ($classes as $row) { ?>
							<option value="<?php echo $row->Classname; ?>"><?php echo $row->Classname; ?></option>
						<?php } ?>
					<?php } ?>
				</select>

				<p class="details">
					Admission Fee
				</p>
				<input
						type="number"
						name="admission_fee"
						class="form-input"
				>
				<?php if (form_error('admission_fee')) { ?>
					<?php echo form_error('admission_fee',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
				    Tuition Fee
				</p>
				<input
						type="number"
						name="tuition_fee"
						class="form-input"
				/>
				<?php if (form_error('tuition_fee')) { ?>
					<?php echo form_error('tuition_fee',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">
					Annual Fee
				</p>
				<input
						type="number"
						name="annual_fee"
						class="form-input"
				/>
				<?php if (form_error('annual_fee')) { ?>
					<?php echo form_error('annual_fee',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Siblings Discount
				</p>
				<input
						type="number"
						name="sibling_discount"
						class="form-input"
				/>
				<?php if (form_error('sibling_discount')) { ?>
					<?php echo form_error('sibling_discount',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
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
