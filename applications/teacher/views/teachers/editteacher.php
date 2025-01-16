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
	<div class="col-md-12 form-box">
		<div class="col-md-12 title-bar">
			<p style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; margin: 0px;">
				Edit Teacher
			</p>
		</div>
		<div class="col-md-12" style="padding-top: 20px;">
			<form method="POST" action="<?php echo site_url('teacher/save') ?>" enctype="multipart/form-data">
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

				<?php foreach ($teacher as $details) { ?>
					<div class="col-md-4">
						<input
								type="hidden"
								name="id"
								value="<?php echo $details->id; ?>"
						/>

						<p class="details">Teacher Name</p>
						<input
								type="text"
								name="name"
								class="form-input"
								value="<?php echo $details->Teachername ?>"
						/>
						<?php if (form_error('name')) { ?>
							<?php echo form_error('name',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>

						<p class="details">Post</p>
						<input
								type="text"
								name="post"
								class="form-input"
								value="<?php echo $details->Post ?>"
						/>
						<?php if (form_error('post')) { ?>
							<?php echo form_error('post',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>

						<p class="details">Contact</p>
						<input
								type="number"
								name="contact"
								class="form-input"
								value="<?php echo $details->Contact ?>"
						/>
						<?php if (form_error('contact')) { ?>
							<?php echo form_error('contact',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>
					</div>
					<div class="col-md-4">
						<p class="details">Class Teacher of</p>
						<select name="class">
							<option selected="selected" value="<?php echo $details->Classteacher; ?>">
								Class
								<?php echo $details->Classteacher; ?>
							</option>
							<?php foreach ($classes as $row) { ?>
								<option value="<?php echo $row->Classname; ?>">
									<?php echo "Class " . $row->Classname; ?>
								</option>
							<?php } ?>
						</select>

						<p class="details">Section</p>
						<select name="section">
							<option>A</option>
							<option>B</option>
						</select>

						<p class="details">
							Image
						</p>
						<input
								type="file"
								name="image"
						/>
					</div>
					<div class="col-md-4">
						<p class="details">Email</p>
						<input
								type="email"
								name="email"
								class="form-input"
								value="<?php echo $details->Email ?>"
						/>
						<?php if (form_error('email')) { ?>
							<?php echo form_error('email',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>

						<p class="details">Date of Birth</p>
						<input
								type="date"
								name="dob"
								class="form-input"
								value="<?php echo $details->Dob ?>"
						/>
						<?php if (form_error('dob')) { ?>
							<?php echo form_error('dob',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>

						<p class="details">Date of Joining</p>
						<input
								type="date"
								name="doj"
								class="form-input"
								value="<?php echo $details->Doj ?>"
						/>
						<?php if (form_error('doj')) { ?>
							<?php echo form_error('doj',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
							?>
						<?php } ?>
					</div>
					<div class="col-md-12" align="center">
						<button type="submit" class="form-submit">Save</button>
					</div>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php $this->view('footer'); ?>
