<?php $this->view('header.php'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('movement') ?>">
		<div class="col-md-12">
			<label>
				<select name="movement" class="single-select">
					<option value="in">Check In</option>
					<option value="out">Check Out</option>
				</select>
			</label>
		</div>
		<div class="col-md-6">
			<button class="form-submit" type="submit">
				Proceed
			</button>
		</div>
	</form>
</div>
<?php $this->view('footer.php'); ?>
