<?php $this->view('header'); ?>

<div class="col-md-12 innerview">
	<?php if ($staff == null) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">Not yet Added.
			Click the icon in right down corner to Add.</p>
	<?php } ?>
	<div class="col-md-12">

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="col-md-12 col-lg-12 success-bar">
				<i class="las la-check-square"></i>
				<?php echo $this->session->flashdata('success') ?>
			</div>
		<?php } ?>
		<?php if ($this->session->flashdata('error')) { ?>
			<div class="col-md-12 error-bar">
				<i class="las la-exclamation-triangle"></i>
				<?php echo $this->session->flashdata('error') ?>
			</div>
		<?php } ?>
	</div>
	<form method="POST" action="<?php echo site_url('transportstaff/add'); ?>">
		<button title="Add Staff" type="submit" class="float" style="border: none;"><i class="material-icons"
																					   style="font-size: 30px;">add</i>
		</button>
	</form>
	<?php foreach ($staff as $row) { ?>
		<div class="col-md-12"
			 style=" border-radius: 5px; margin-bottom: 20px;  padding: 0px; border: 1px solid #EBEBEC;">
			<div class="col-md-2" style="background: #f95555; border-radius: 5px; padding: 10px 0 10px; 0 "
				 align="center">
				<?php if (isset($row->image)) { ?>
					<img src="<?php echo base_url('assets/images/transport/') . $row->image; ?>"
						 style="border-radius: 50%; width: 100px; height: 100px;">
				<?php } else { ?>
					<img src="<?php echo base_url('assets/icons/user.svg'); ?>"
						 style="border-radius: 50%; width: 100px; height: 100px;">
				<?php } ?>
			</div>
			<div class="col-md-6" style="background: #fff; padding: 20px;">
				<p style="font-family: Questrial-Regular; font-size: 16px;"><?php echo $row->drivername; ?></p>
				<p style="font-family: Questrial-Regular; font-size: 16px;"><?php echo $row->Post; ?></p>
				<p style="font-family: Questrial-Regular; font-size: 16px;"><?php echo $row->Address; ?></p>
			</div>
			<div class="col-md-2" style="padding-top: 20px;">
				<div class="dropdown" align="right">
					<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
					   style="cursor: pointer;">more_vert</i>
					<ul class="dropdown-menu">
						<li><a onclick="myFunction(<?php echo $row->id; ?>)">Delete</a></li>
					</ul>
				</div>
			</div>

		</div>
		<br>
	<?php } ?>
</div>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('transportstaff/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
