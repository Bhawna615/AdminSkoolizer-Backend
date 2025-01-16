<?php $this->view('header'); ?>
<style>
	.headings {
		font-family: Nunito_regular;
		font-size: 20px;
	}

	select {
		font-family: Nunito_regular;
		outline: none;
		border: 1px solid;
		font-size: 20px;
		margin-bottom: 30px;
	}
</style>
<div class="col-md-12 innerview">
	<div class="col-md-12 innerview">
		<div class="col-md-12">
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="col-md-12 error-bar">
                    <i class="las la-exclamation-triangle"></i>
                    <?php echo $this->session->flashdata('error') ?>
                    <?php $this->session->unset_userdata('error') ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="col-md-12 col-lg-12 success-bar">
                    <i class="las la-check-square"></i>
                    <?php echo $this->session->flashdata('success') ?>
                    <?php $this->session->unset_userdata('success') ?>
                </div>
            <?php } ?>
		</div>
		<form method="POST" action="<?php echo site_url('timetable/get'); ?>">
			<p class="headings">Select Class</p>
			<select name="class">
				<?php foreach ($classes as $row) { ?>
					<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
				<?php } ?>
			</select>
			<p class="headings">Select Day</p>
			<select name="day">
				<option value="<?php echo date('l'); ?>">Today</option>
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
			</select>
			<div class="col-md-12" style="padding: 0px;">
				<input type="submit" name="" value="Go"
					   style="background: #f95555; color: white; font-family: Nunito-Semibold; border: none; width: 20%; font-size: 20px; padding: 5px 0 5px 0; border-radius: 5px;">
			</div>

		</form>
	</div>
</div>

<?php $this->view('footer'); ?>
