<?php $this->view('header'); ?>
	<div class="col-md-12 innerview profile-holder" >
		<?php if(isset($teacher)) { ?>
			<div class="col-md-4">
				<div class="col-md-12">
					<?php if (isset($teacher->image)) { ?>
						<img src="<?php echo base_url('assets/images/teachers/').$teacher->image; ?>" class="icon">
					<?php     } else { ?>
						<img src="<?php echo base_url('assets/icons/user-black.svg'); ?>" class="icon">
					<?php } ?>
				</div>
				<div class="col-md-12">
					<img src="<?php echo base_url('assets/images/teachers/qrcode/') . $teacher->qrcode . ".png"; ?>"
						 class="icon">
				</div>
			</div>
			<form method="POST" action="<?php echo site_url('teacher/addToFormer') ?>">
    			<div class="col-md-4">
    			    <input type="hidden" name="id" value="<?php echo $teacher->id ?>" ?>
    				<p class="profile-heading">Name</p>
    				<p class="profile-info"><?php echo $teacher->Teachername; ?></p>
    				<p class="profile-heading">Post</p>
				    <p class="profile-info"><?php echo $teacher->Post ?></p>
    				<p class="profile-info"><?php echo "Class ".$teacher->Classteacher ?></p>
    				<p class="profile-heading">Contact</p>
    				<p class="profile-info"><?php echo $teacher->Contact; ?></span></p>
    				<p class="profile-heading">Date of Birth</p>
    				<p class="profile-info"><?php echo $teacher->Dob; ?></span></p>
    				<p class="profile-heading">Date of Joining</p>
    				<p class="profile-info"><?php echo $teacher->Doj; ?></span></p>
    				<p class="profile-heading">Email</p>
    				<p class="profile-info"><?php echo $teacher->Email; ?></span></p>
    				<p class="profile-heading">Date of Leaving</p>
    				<input 
    				    type="date"
    				    name="date_of_leaving" 
    				    class="form-input" 
    				/>
    				<?php if (form_error('date_of_leaving')) { ?>
						<?php echo form_error('date_of_leaving',
								'<div class="invalid-bar">
								<i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
    			</div>
    			<div class="col-md-4">
    
    			</div>
    
    			<div class="col-md-12" align="center">
    				<button class="btn-classic">
    					<i class="material-icons btn-icon">add</i>
    					Add to Former
    				</button>
    			</div>
			</form>
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
