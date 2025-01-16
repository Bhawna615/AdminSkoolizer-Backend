<?php $this->view('header'); ?>
<style type="text/css">
	input[type = file] {
		border: 1px solid;
		border-color: #A1A1A1;
		font-family: Questrial-Regular;
		outline: none;
		width: 90%;
		margin-bottom: 10px;
	}

	select {
		border: 1px solid;
		border-color: #A1A1A1;
		width: 90%;
		font-family: Questrial-Regular;
		outline: none;
		font-size: 18px;
		margin-bottom: 10px;
	}
</style>
<div class="col-md-12 innerview">

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

	<form method="POST" action="<?php echo site_url('timetable/insert'); ?>">
		<div class="col-md-4">
			<p class="details">Class</p>
			<select name="class">
				<?php foreach ($classes as $row) { ?>
					<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
				<?php } ?>
			</select>

			<p class="details">Teacher</p>
			<select name="teacher">
				<?php foreach ($teachers as $row) { ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->Teachername; ?></option>
				<?php } ?>
			</select>

			<p class="details">Day</p>
			<select name="day">
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
			</select>
		</div>

		<div class="col-md-4">
			<p class="details">Subject name</p>
			<input
					type="text"
					name="subjectname"
					class="form-input"
					value="<?php echo set_value('subjectname') ?>"
			/>
			<?php if (form_error('subjectname')) { ?>
				<?php echo form_error('subjectname',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">Start Time</p>
			<input
					type="time"
					name="stime"
					class="form-input"
					value="<?php echo set_value('stime') ?>"
			/>
			<?php if (form_error('stime')) { ?>
				<?php echo form_error('stime',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">End Time</p>
			<input
					type="time"
					name="etime"
					class="form-input"
					value="<?php echo set_value('etime') ?>"
			/>
			<?php if (form_error('etime')) { ?>
				<?php echo form_error('etime',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>
		</div>

		<div class="col-md-4">

		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Submit" class="form-submit">
		</div>
	</form>
</div>

<?php $this->view('footer'); ?>
