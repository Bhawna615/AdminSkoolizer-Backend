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
	<div class="message col-md-12">
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
	<form method="POST" action="<?php echo site_url('attendance/getrollcall') ?>">
		<div class="col-md-4">
		<p class="headings">Select a Date</p>
				<input
							type="text"
							id="my_date_picker"
							name="date"
							placeholder="dd-mm-yyyy"
							class="form-input"
							value="<?php echo date('d-m-Y'); ?>"
					
					/>
			<p class="headings">Select a Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<button type="submit" class="form-submit">Mark</button>
		</div>
	</form>
</div>
<script>
        $(document).ready(function() {
          
            $(function() {
                $( "#my_date_picker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('footer'); ?>
