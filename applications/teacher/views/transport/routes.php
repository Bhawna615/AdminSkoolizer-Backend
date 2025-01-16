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

	<form method="POST" action="<?php echo site_url('route/create'); ?>">
		<button title="New Route"
				class="float" style="border: none;">
			<i class="material-icons" style="font-size: 40px; position: relative; top: 5px; outline: none;">
				add
			</i>
		</button>
	</form>
	<?php if ($routes == null) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">No Routes
			available.Click the icon in right down corner to Add.</p>
	<?php } ?>
	<?php foreach ($routes as $row) { ?>

		<div class="col-md-4"
			 style="background: #f95555; border-radius: 5px; margin-right: 30px; margin-bottom: 30px; padding: 20px; color: white;">
			<div class="col-md-12" style="padding: 0px;">
				<div class="col-md-8" style="padding: 0px;">
					<a href="<?php echo site_url('route/details/') . $row->id; ?>" style="color: white;"><p
								style="font-family: Nunito-Semibold; font-size: 16px; text-transform: uppercase;"><?php echo $row->routename; ?></p>
					</a>
				</div>
				<div class="col-md-4">
					<div class="dropdown" align="right">
						<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
						   style="cursor: pointer; ">more_vert</i>
						<ul class="dropdown-menu">
							<li><a onclick="myFunction(<?php echo $row->id; ?>)">Delete</a></li>
						</ul>
					</div>
				</div>
			</div>

			<p style="font-family: Nunito-Semibold; font-size: 16px;">Total
				Passengers: <?php echo $row->Totalpassengers; ?>

			</p>
		</div>
	<?php } ?>
</div>

<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ? All stations and passengers will be deleted!");
		if (r == true) {
			location.href = '<?php echo site_url('route/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>

<?php $this->view('footer'); ?>
