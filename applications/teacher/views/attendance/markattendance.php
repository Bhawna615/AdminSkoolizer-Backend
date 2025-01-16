<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<p class="headings"><?php echo date('d F,Y'); ?></p>
	<form method="POST" action="<?php echo site_url('attendance/getrollcall') ?>">
		<div class="col-md-4">
			<p class="headings">Select a Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<button type="submit" class="form-submit">Mark</button>
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
