<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
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

	<form method="POST" action="<?php echo site_url('bus/add'); ?>">
		<button title="Add Bus" type="submit" class="float" style="border: none;"><i class="material-icons"
																					 style="font-size: 30px;">add</i>
		</button>

	</form>
	<?php if ($buses == null) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">Not yet Added.
			Click the icon in right down corner to Add.</p>
	<?php } ?>
	<?php foreach ($buses as $row) { ?>
		<div class="col-md-3" style="background: #f95555; color: white; padding: 20px; border-radius: 5px; margin-right: 20px">
			<div class="col-md-12" style="padding: 0px;">
				<div class="col-md-8" style="padding: 0px;">
					<p style="font-family: RedhatR; font-size: 18px;"><?php echo $row->busname; ?></p>
				</div>
				<div class="col-md-4">
					<div class="dropdown" align="right">
						<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
						   style="cursor: pointer;">more_vert</i>
						<ul class="dropdown-menu">
							<li><a onclick="myFunction(<?php echo $row->id; ?>)">Delete</a></li>
						</ul>
					</div>
				</div>
			</div>


			<p style="font-family: RedhatR; font-size: 16px;">Model: <?php echo $row->model; ?></p>
			<p style="font-family: Nunito-Semibold; font-size: 16px;"><?php echo $row->regno; ?></p>
			<p style="font-family: Nunito-Semibold; font-size: 16px;">No. of Seats: <?php echo $row->seats; ?></p>
			<p style="font-family: Nunito-Semibold; font-size: 16px;">Fuel Tank (in
				Litres): <?php echo $row->fueltankcapacity; ?></p>
		</div>

	<?php } ?>
</div>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('bus/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
