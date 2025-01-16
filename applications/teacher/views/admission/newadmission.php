<?php $this->view('header'); ?>
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
	<div class="col-md-12 form-box">
		<div class="col-md-12 title-bar">
			<p style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; margin: 0px;">Student Admission</p>
		</div>
		<div class="col-md-12" style="padding-top: 20px;">
			<form action="<?php echo site_url('student/enroll'); ?>" method="POST" enctype="multipart/form-data">
				<div class="col-md-4">
					<p class="details">Name</p>
					<input
							type="text"
							name="name"
							class="form-input"
							value="<?php echo set_value('name') ?>"
					/>
					<?php if (form_error('name')) { ?>
						<?php echo form_error('name',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">Class</p>
					<select name="class" class="form-select">
						<?php if (isset($classes)) { ?>}
							<?php foreach ($classes as $row) { ?>
								<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
							<?php } ?>
						<?php } ?>
					</select>

					<p class="details">
						Father's Name
					</p>
					<input
							type="text"
							name="fname"
							class="form-input"
							value="<?php echo set_value('fname') ?>"
					/>
					<?php if (form_error('fname')) { ?>
						<?php echo form_error('fname',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Mother's Name
					</p>
					<input
							type="text"
							name="mname"
							class="form-input"
							value="<?php echo set_value('mname') ?>"
					/>
					<?php if (form_error('mname')) { ?>
						<?php echo form_error('mname',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Student Image
					</p>
					<input
							type="file"
							name="image"
							class="form-input"
					/>
				</div>

				<div class="col-md-4">
					<p class="details">
						Guardian's Name
					</p>
					<input
							type="text"
							name="gname"
							class="form-input"
					/>

					<p class="details">
						Contact No.
					</p>
					<input
							type="number"
							name="contact"
							class="form-input"
							value="<?php echo set_value('contact') ?>"
					/>
					<?php if (form_error('contact')) { ?>
						<?php echo form_error('contact',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Admission No.
					</p>
					<input
							type="text"
							name="admno"
							class="form-input"
							value="<?php echo set_value('admno') ?>"
					/>
					<?php if (form_error('admno')) { ?>
						<?php echo form_error('admno',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						SMS No.
					</p>
					<input
							type="number"
							name="smsno"
							placeholder="Enter 10 digit Number"
							class="form-input"
							value="<?php echo set_value('smsno') ?>"
					/>
					<?php if (form_error('smsno')) { ?>
						<?php echo form_error('smsno',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Roll No
					</p>
					<input
							type="number"
							name="rollno"
							class="form-input"
							value="<?php echo set_value('rollno') ?>"
					/>
					<?php if (form_error('rollno')) { ?>
						<?php echo form_error('rollno',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
					
						<p class="details">
					    Gender
					</p>
					<select name="gender" class="form-select">
					    <option value="m">Male</option>
					    <option value="f">Female</option>
					</select>
				</div>

				<div class="col-md-4">
					<p class="details">
						Aadhar No.
					</p>
					<input
							type="text"
							name="aadharno"
							class="form-input"
							value="<?php echo set_value('aadharno') ?>"
					/>
					<?php if (form_error('aadharno')) { ?>
						<?php echo form_error('aadharno',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Date of Birth
					</p>
					<input
							type="text"
							id="my_date_picker"
							name="dob"
							placeholder="dd-mm-yyyy"
							class="form-input"
							value="<?php echo set_value('dob') ?>"
					
					/>
					<?php if (form_error('dob')) { ?>
						<?php echo form_error('dob',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Last School
					</p>
					<input
							type="text"
							name="lastschool"
							class="form-input"
					/>

					<p class="details">
						Email
					</p>
					<input
							type="text"
							name="email"
							class="form-input"
							value="<?php echo set_value('email') ?>"
					/>
					<?php if (form_error('email')) { ?>
						<?php echo form_error('email',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Address
					</p>
					<input
							type="text"
							name="address"
							class="form-input"
							value="<?php echo set_value('address') ?>"
					/>
					<?php if (form_error('address')) { ?>
						<?php echo form_error('address',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
						<p class="details">
						Date of Admission
					</p>
				        <input
							type="text"
							id="date_of_admission"
							name="date_of_admission"
							placeholder="dd-mm-yyyy"
							class="form-input"
							value="<?php echo set_value('date_of_admission') ?>"
					
					    />
				</div>
				</div>


				<div class="col-md-12" align="center" style="margin-top: 20px; margin-bottom: 20px; ">
					<input
							type="submit"
							name="" value="Admit"
							class="form-submit"
					/>
				</div>
			</form>
		</div>
	</div>
</div>

  <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#my_date_picker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
     <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#date_of_admission" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('footer'); ?>
