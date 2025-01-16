<?php $this->view('header'); ?>
	<div class="col-md-12 innerview profile-holder" >
		<?php foreach ($teacher as $row) { ?>
			<div class="col-md-4">
				<div class="col-md-12">
					<?php if (isset($row->image)) { ?>
						<img src="<?php echo base_url('assets/images/teachers/').$row->image; ?>" class="icon">
					<?php     } else { ?>
						<img src="<?php echo base_url('assets/icons/user-black.svg'); ?>" class="icon">
					<?php } ?>
				</div>
				<div class="col-md-12">
					<img src="<?php echo base_url('assets/images/teachers/qrcode/') . $row->qrcode . ".png"; ?>"
						 class="icon">
				</div>
			</div>
			<div class="col-md-4">
				<p class="profile-heading">Name</p>
				<p class="profile-info"><?php echo $row->Teachername; ?></p>
				<p class="profile-heading">Post</p>
				<p class="profile-info"><?php echo $row->Post ?></p>
				<p class="profile-heading">Class Teacher</p>
				<p class="profile-info"><?php echo "Class ".$row->Classteacher ?></p>
				<p class="profile-heading">Contact</p>
				<p class="profile-info"><?php echo $row->Contact; ?></span></p>
				<p class="profile-heading">Date of Birth</p>
				<p class="profile-info"><?php echo $row->Dob; ?></span></p>
				<p class="profile-heading">Date of Joining</p>
				<p class="profile-info"><?php echo $row->Doj; ?></span></p>
				<p class="profile-heading">Email</p>
				<p class="profile-info"><?php echo $row->Email; ?></span></p>

			</div>
			<div class="col-md-4">

			</div>

			<div class="col-md-12" align="center">
				<button class="btn-classic"
						onclick="location.href='<?php echo site_url('teacher/edit/').$row->id ?>'">
					<i class="material-icons btn-icon">edit</i>
					Edit Profile
				</button>
			</div>
		<?php } ?>
	</div>

<script type="text/javascript">
	function myFunction(id) {
  
  var r = confirm("Are you sure ?");
  if (r == true) {
    location.href='<?php echo site_url('teacher/delete/') ?>'+id;
  } else {
    javascript:void(0);
  }
}
</script>

<?php $this->view('footer'); ?>
