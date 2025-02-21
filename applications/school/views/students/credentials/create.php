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
			<form action="<?php echo site_url('student/storeCredentials'); ?>" method="POST" enctype="multipart/form-data">
			    <input type="hidden" name="id" value="<?php echo $id ?>" />
				<div class="col-md-4">
				    <?php if(isset($student)) { ?>
    					<p class="details">Admission No.</p>
    					<input
    							type="text"
    							name="email"
    							class="form-input"
    							value="<?php echo $student->Admno ?>"
                                disabled
    					/>
                        <input
    							type="hidden"
    							name="id"
    							class="form-input"
    							value="<?php echo $student->id ?>"
    					/>
					<?php } ?>
					<p class="details">Password</p>
					<input
							type="password"
							name="password"
							class="form-input"
						
					/>
				
				
				<div class="col-md-12" align="center" style="margin-top: 20px; margin-bottom: 20px; ">
					<input
							type="submit"
							name="" 
							value="Generate"
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
                $( "#from-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
    
      <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#to-date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('footer'); ?>
