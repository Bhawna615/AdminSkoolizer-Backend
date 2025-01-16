<?php $this->view('header'); ?>

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

<div class="col-md-12 innerview profile-holder">
	<?php foreach ($student as $row) { ?>
		<div class="col-md-4">
			<div class="col-md-12">
				<?php if (isset($row->image)) { ?>
					<img src="<?php echo base_url('assets/images/students/') . $row->image; ?>" class="icon">
				<?php } else { ?>
					<img src="<?php echo base_url('assets/icons/user-black.png'); ?>" class="icon">
				<?php } ?>
			</div>
			<div class="col-md-12">
				<img src="<?php echo base_url('assets/images/students/qrcode/') . $row->qrcode . ".png"; ?>"
					 class="icon">
			</div>
		</div>
		<div class="col-md-4">
			<p class="profile-heading">Name</p>
			<p class="profile-info"><?php echo $row->Name; ?></p>
			<p class="profile-heading">Class</p>
			<p class="profile-info"><?php echo $row->Class; ?></p>
			<p class="profile-heading">Roll No.</p>
			<p class="profile-info"> <?php echo $row->Rollno; ?></p>
			<p class="profile-heading">Father's Name</p>
			<p class="profile-info"><?php echo $row->Fname; ?></span></p>
			<p class="profile-heading">Mother's Name</p>
			<p class="profile-info"><?php echo $row->Mname; ?></span></p>
			<p class="profile-heading">Guardian's Name</p>
			<p class="profile-info"><?php echo $row->Guardianname; ?></span></p>
			<p class="profile-heading">Address</p>
			<p class="profile-info"><?php echo $row->Address; ?></span></p>
			<p class="profile-heading">Contact</p>
			<p class="profile-info"><?php echo $row->Contact; ?></span></p>
			<p class="profile-heading">House</p>
			<p class="profile-info"><?php echo $row->House; ?></span></p>

		</div>
		<div class="col-md-4">
			<p class="profile-heading">Transport ID</p>
			<p class="profile-info"><?php echo $row->Passengerid; ?></span></p>
			<p class="profile-heading">Admission Number</p>
			<p class="info"><?php echo $row->Admno; ?></span></p>
			<p class="profile-heading">Sms Number</p>
			<p class="profile-info"><?php echo $row->Smsno; ?></span></p>
			<p class="profile-heading">Aadhar Number</p>
			<p class="profile-info"><?php echo $row->Aadharno ?></span></p>
			<p class="profile-heading">Date of Birth</p>
			<p class="profile-info"><?php echo date("d F Y", strtotime($row->Dob)); ?></span></p>
			<p class="profile-heading">Last School</p>
			<p class="profile-info"><?php echo $row->Lastschool; ?></span></p>
			<p class="profile-heading">Email</p>
			<p class="profile-info"><?php echo $row->Email; ?></span></p>
			<p class="profile-heading">Admission Date</p>
			<p class="profile-info"><?php if($row->admission_date != Null) { echo date("d-m-Y", strtotime($row->admission_date)); } ?></span></p>
			<p class="profile-heading">Gender</p>
			<p class="profile-info">
			    <?php if(isset($row->gender)) { 
			        if($row->gender == "m") { 
			        echo "Male";
			        } else { 
			        echo "Female"; 
			        } 
			        }
			        ?>
			        </span></p>
		</div>

		<div class="col-md-12" align="center">
			<!--<button class="btn-classic"-->
			<!--		onclick="location.href='<?php echo site_url('student/edit/').$row->id ?>'">-->
			<!--	<i class="material-icons btn-icon">edit</i>-->
			<!--	Edit Profile-->
			<!--</button>-->
		</div>
	<?php } ?>
</div>

<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('student/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>

<?php $this->view('footer'); ?>
