<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<div class="col-md-12">
		<p style="font-family: Nunito-Semibold; font-size: 20px; background: white; position: relative; bottom: 35px; width: 21%; padding-left: 13px; background: #f95555; border-radius: 5px; color: white;">
			Assign Homework</p>
		<form method="POST" action="<?php echo site_url('homework/assign') ?>">
			<div class="col-md-6">
				<p class="details">Class</p>
			</div>
			<div class="col-md-6" align="right">

				<select name="class">
					<?php if (isset($classes)) { ?>
						<?php foreach ($classes as $row) { ?>
							<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
						<?php } ?>
					<?php } ?>
				</select>

			</div>
			<div class="col-md-12" align="center">
				<button type="submit"
						style="background: #f95555; color: white; border: none; border-radius: 5px; padding: 5px 25px 5px 25px; font-family: Nunito_regular; font-size: 18px;">
					Proceed
				</button>
			</div>

		</form>
	</div>
</div>

<?php $this->view('footer'); ?>
