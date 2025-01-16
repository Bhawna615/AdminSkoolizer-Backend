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
			<p style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; margin: 0px;">Details</p>
		</div>
		<div class="col-md-12" style="padding-top: 20px;">
			<form action="<?php echo site_url('student/updateTc'); ?>" method="POST" enctype="multipart/form-data">
			
			    <?php foreach ($student as $detail) { ?>
			        <input type="hidden" name="id" value="<?php echo $detail->id ?>" />
			        <input type="hidden" name="name" value="<?php echo $detail->name ?>" />
			        <input type="hidden" name="father_name" value="<?php echo $detail->father_name ?>" />
			        <input type="hidden" name="mother_name" value="<?php echo $detail->mother_name ?>" />
			        <input type="hidden" name="last_class" value="<?php echo $detail->last_class ?>" />
			        <input type="hidden" name="date_of_birth" value="<?php echo $detail->date_of_birth ?>" />
			        <input type="hidden" name="roll_no" value="<?php echo $detail->roll_no ?>" />
			    <?php } ?>
			    <?php foreach($student as $detail) { ?>
				<div class="col-md-4">
				    	<p class="details">Name</p>
					<input
							type="text"
							name="name"
							class="form-input"
							value="<?php echo $detail->name; ?>"
					/>

                    	<p class="details">Father's Name</p>
					<input
							type="text"
							name="father_name"
							class="form-input"
							value="<?php echo $detail->father_name; ?>"
					/>
                    
                    	<p class="details">Mother's Name</p>
					<input
							type="text"
							name="mother_name"
							class="form-input"
							value="<?php echo $detail->mother_name; ?>"
					/>
					
						<p class="details">Last Class</p>
					<input
							type="text"
							name="last_class"
							class="form-input"
							value="<?php echo $detail->last_class; ?>"
					/>
					
					<p class="details">Date Of Birth</p>
					<input
							type="text"
							name="date_of_birth"
							id="date-of-birth"
							placeholder="dd-mm-yyyy"
							class="form-input"
							value="<?php echo $detail->date_of_birth; ?>"
					/>
					
						<p class="details">Roll No</p>
					<input
							type="text"
							name="roll_no"
							class="form-input"
							value="<?php echo $detail->roll_no; ?>"
					/>

					<p class="details">Category</p>
					<input
							type="text"
							name="category"
							class="form-input"
							value="<?php echo $detail->category; ?>"
					/>

					<p class="details">Date of Admission</p>
			            <input
							type="text"
							id="date-of-admission"
							name="admission_date"
							placeholder="dd-mm-yyyy"
							class="form-input"
							value="<?php echo $detail->date_of_admission; ?>"
					
				    	/>
				    	
				    			<p class="details">Class of Admission</p>
			            <input
							type="text"
							id="class-of-admission"
							name="admission_class"
							class="form-input"
							value="<?php echo $detail->class_of_admission; ?>"
					
				    	/>

					<p class="details">
						Whether failed, if so once/twice in the same class:
					</p>
					<input
							type="text"
							name="failed_mark"
							class="form-input"
							value="<?php echo $detail->failed_mark; ?>"
					/>

					
					<p class="details">
						Any fee concession availed of: if so the nature of such concession
					</p>
					<input
							type="text"
							name="fee_concession"
							class="form-input"
							value="<?php echo $detail->fee_concession; ?>"
					/>
					
					<p class="details">
						Total no. of working days
					</p>
					<input
							type="text"
							name="total_days"
							class="form-input"
							value="<?php echo $detail->working_days; ?>"
					/>
					
					<p class="details">
						Total no. of days present
					</p>
					<input
							type="text"
							name="present_days"
							class="form-input"
							value="<?php echo $detail->present_days; ?>"
					/>
					
						<p class="details">
						Admission Number
					</p>
					<input
							type="text"
							name="admission_number"
							class="form-input"
							value="<?php echo $detail->admission_number; ?>"
					/>
					
					
					
		
		
					
				</div>
				
				<div class="col-md-4">
				    	<p class="details">
						Subjects Studied
					</p>
					<input
							type="text"
							name="subjects"
							class="form-input"
							value="<?php echo $detail->subjects_studied; ?>"
					/>
					
					<p class="details">
						Whether qualified to admission in higher Class?
					</p>
					<input
							type="text"
							name="qualified_mark"
							class="form-input"
							value="<?php echo $detail->qualified_mark; ?>"
					/>
					
					<p class="details">
						Date up to which school dues have been paid:
					</p>
					<input
							type="text"
							name="dues_date"
							class="form-input"
								value="<?php echo $detail->dues_date; ?>"
					/>
					
						<p class="details">
						School/board Annual examination last taken with result:
					</p>
					<input
							type="text"
							name="last_school"
							class="form-input"
								value="<?php echo $detail->last_school; ?>"
					/>
					
							<p class="details">
						Nationality
					</p>
					<input
							type="text"
							name="nationality"
							class="form-input"
								value="<?php echo $detail->nationality; ?>"
					/>
					
						<p class="details">
						Session
					</p>
					<input
							type="text"
							name="session"
							class="form-input"
								value="<?php echo $detail->session; ?>"
					/>
					
					
				</div>
				
				<div class="col-md-4">
				    <p class="details">
					    Date of Application for Transfer Certificate:
					</p>
					
					      <input
							type="text"
							id="application-date"
							name="application_date"
							placeholder="dd-mm-yyyy"
							class="form-input"
								value="<?php echo $detail->application_date; ?>"
				    	/>
				    	
				    <p class="details">
					    Date of issue of Transfer Certificate
					</p>
					
					      <input
							type="text"
							id="issue-date"
							name="issue_date"
							placeholder="dd-mm-yyyy"
							class="form-input"
								value="<?php echo $detail->issue_date; ?>"
				    	/>
				    	
				    <p class="details">
					    Reason for leaving the school
					</p>
					<input
							type="text"
							name="reason"
							class="form-input"
								value="<?php echo $detail->reason; ?>"
					/>
					
								<p class="details">
					    Whether NCC cader/Boy Scout/Girl Guide (Details may be given):
					</p>
					<input
							type="text"
							name="ncc"
							class="form-input"
								value="<?php echo $detail->ncc; ?>"
					/>
					
					
					<p class="details">
					    Games played or extra curricular activities in which the pupil usually took part(mention achievement level there in):
					</p>
					<input
							type="text"
							name="games_played"
							class="form-input"
								value="<?php echo $detail->games_played; ?>"
					/>
					
					<p class="details">
					    General Conduct
					</p>
					<input
							type="text"
							name="general_conduct"
							class="form-input"
								value="<?php echo $detail->general_conduct; ?>"
					/>
					
					<p class="details">
					    Any other Remarks
					</p>
					<input
							type="text"
							name="remarks"
							class="form-input"
								value="<?php echo $detail->remarks; ?>"
					/>
				</div>
				
                <?php } ?>

				<div class="col-md-12" align="center" style="margin-top: 20px; margin-bottom: 20px; ">
					<input
							type="submit"
							name="" 
							value="Update"
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
                $( "#application-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
      <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#issue-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
     <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#date-of-admission" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
     <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#date-of-birth" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('footer'); ?>
