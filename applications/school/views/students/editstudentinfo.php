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
			<p style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; margin: 0px;">Edit Details</p>
		</div>
		<form action="<?php echo site_url('student/update'); ?>" method="POST" enctype="multipart/form-data">
			<?php foreach ($student as $row) { ?>
			<div class="col-md-4">
				<input
						type="hidden"
						name="id"
						value="<?php echo $row->id; ?>"
						class="form-input"
				/>
				<p class="details">
					Name
				</p>
				<input
						type="text"
						name="name"
						value="<?php echo $row->Name; ?>"
						class="form-input"
				/>
				<?php if (form_error('name')) { ?>
					<?php echo form_error('name',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>


				<p class="details">
					Class
				</p>
				<select name="class">
					<option value="<?php echo $row->Class; ?>">
						Class
						<?php echo $row->Class; ?>
					</option>
					<?php foreach ($classes as $key) { ?>
						<option value="<?php echo $key->Classname; ?>"><?php echo "Class " . $key->Classname; ?></option>
					<?php } ?>
				</select>

				<p class="details">
					Father's Name
				</p>
				<input
						type="text"
						name="fname"
						value="<?php echo $row->Fname; ?>"
						class="form-input"
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
						value="<?php echo $row->Mname; ?>"
						class="form-input"
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
				/>
				
					<p class="details">
						Height
					</p>
					<input
							type="text"
							name="height"
							class="form-input"
							value="<?php echo $row->height; ?>"
					/>
					<?php if (form_error('height')) { ?>
						<?php echo form_error('height',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">
					Guardian's Name
				</p>
				<input
						type="text"
						name="gname"
						value="<?php echo $row->Guardianname; ?>"
						class="form-input"
				/>

				<p class="details">
					Contact No.
				</p>
				<input
						type="number"
						name="contact"
						value="<?php echo $row->Contact; ?>"
						class="form-input"
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
						value="<?php echo $row->Admno; ?>"
						class="form-input"
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
						value="<?php echo $row->Smsno; ?>"
						class="form-input"
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
						value="<?php echo $row->Rollno; ?>"
						class="form-input"
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
					    <?php if($row->gender == 'm'){ ?>
					        <option value="m" selected>Male</option>
					        <option value="f">Female</option>
					    <?php } else if($row->gender == 'f') {?>
					        <option value="f" selected>Female</option>
					        <option value="m" >Male</option>
					    <?php } else {?>
					         <option value="m">Male</option>
					        <option value="f">Female</option>
					    <?php } ?>
					</select>
					<p class="details">
						Weight
					</p>
					<input
							type="text"
							name="weight"
							class="form-input"
							value="<?php echo $row->weight; ?>"
					/>
					<?php if (form_error('weight')) { ?>
						<?php echo form_error('weight',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>	
			</div>

			<div class="col-md-4">
				<p class="details">
					Aadhar No.
				</p>
				<input
						type="text"
						name="aadharno"
						value="<?php echo $row->Aadharno; ?>"
						class="form-input"
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
							value="<?php echo date("d-m-Y", strtotime($row->Dob)); ?>"
					
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
						value="<?php echo $row->Lastschool; ?>"
						class="form-input"
				/>

				<p class="details">
					Email
				</p>
				<input
						type="text"
						name="email"
						value="<?php echo $row->Email; ?>"
						class="form-input"
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
						value="<?php echo $row->Address; ?>"
						class="form-input"
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
							value="<?php echo $row->admission_date; ?>"
					    />
					    
					<p class="details">
						Tuition Fee
					</p>
				        <input
							type="text"
							name="tuition_fee"
							placeholder=""
							class="form-input"
							value="<?php echo $row->tuition_fee; ?>"
					    />
					    
					    	<p class="details">
						Admission Fee
					</p>
				        <input
							type="text"
							name="admission_fee"
							placeholder=""
							class="form-input"
							value="<?php echo $row->admission_fee; ?>"
					    />
					    
					    	<p class="details">
						Annual Fee
					</p>
				        <input
							type="text"
							name="annual_fee"
							placeholder=""
							class="form-input"
							value="<?php echo $row->annual_fee; ?>"
					    />
					    
					    	<p class="details">
						Transport Fee
					</p>
				        <input
							type="text"
							name="transport_fee"
							placeholder=""
							class="form-input"
							value="<?php echo $row->transport_fee; ?>"
					    />
					    
					 <p class="details">
						Blood Group
					</p>
					<input
							type="text"
							name="blood_group"
							class="form-input"
							value="<?php echo $row->blood_group; ?>"
					/>
					<?php if (form_error('blood_group')) { ?>
						<?php echo form_error('blood_group',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
			</div>
			<?php } ?>
			<div class="col-md-12" align="center" style="margin-top: 20px; margin-bottom: 20px;">
				<input type="submit" class="form-submit" name="" value="UPDATE">
			</div>
		</form>
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
