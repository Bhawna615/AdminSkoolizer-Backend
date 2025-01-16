<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('exam/generateClassWiseMetrics') ?>" target="_blank">
		<div class="col-md-4">
			<p class="headings">Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Go" class="form-submit">
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
