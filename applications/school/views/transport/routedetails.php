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


	<div class="col-md-12">
		<p style=" font-family: Nunito-Semibold; font-size: 20px;">Stations</p>
		<?php foreach ($stations as $row) { ?>
			<div class="col-md-4"
				 style="background: #f95555; color: white; margin-right: 20px; margin-bottom: 20px; padding: 20px; border-radius: 5px;">
				<div class="col-md-12" style="padding: 0px;">
					<div class="col-md-8" style="padding: 0px;">
						<p style="font-family: Nunito-Semibold; text-transform: uppercase; font-size: 20px; text-align: center;"><?php echo $row->stationname; ?></p>
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

				<?php foreach ($passengers as $key) { ?>
					<p style="font-family: Questrial-Regular; font-size: 16px;"><?php if ($key->Stationid == $row->id) {
							echo $key->Name;
						} ?></p>
				<?php } ?>
				<form method="POST" action="<?php echo site_url('passenger/add') ?>">
					<input type="hidden" name="station" value="<?php echo $row->id; ?>">
					<input type="hidden" value="<?php echo $routeid; ?>" name="route">
					<div align="center" style="margin-top: 20px;">
						<button style="background: white; border: 1px solid #f95555; color: #f95555; border-radius: 5px; padding: 5px 10px 5px 10px; ">
							Add Passenger
						</button>
					</div>

				</form>
			</div>


		<?php } ?>
		<form method="POST" action="<?php echo site_url('station/add') ?>">
			<input type="hidden" name="routeid" value="<?php echo $routeid; ?>">
			<button type="submit"
					style="background: white; border: 1px solid #f95555; border-radius: 5px; color: #f95555; font-family: Nunito_regular; padding: 10px 20px 10px 20px; font-size: 20px; outline: none;">
				Add Station
			</button>
		</form>
	</div>

	<div class="col-md-12" style="margin-top: 30px;">
		<p style=" font-family: Nunito-Semibold; font-size: 20px;">Route Timings</p>
		<?php foreach ($subroutes as $row) { ?>

			<div class="col-md-4"
				 style="padding: 20px; border-radius: 5px; color: white; margin-right: 20px; border: none; margin-bottom: 20px;  background: #f95555;">
				<div class="col-md-12" style="padding: 0px;">
					<div class="col-md-8" style="padding: 0px;">
						<p style="text-transform: uppercase; font-family: Nunito-Semibold; font-size: 20px;"><?php echo $row->Firststation . " - " . $row->Laststation; ?></p>
					</div>
					<div class="col-md-4">
						<div class="dropdown" align="right">
							<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
							   style="cursor: pointer;">more_vert</i>
							<ul class="dropdown-menu">
								<li><a onclick="myFunction2(<?php echo $row->id; ?>)">Delete</a></li>
							</ul>
						</div>
					</div>
				</div>


				<p style="font-family: Nunito-Semibold; font-size: 18px;"><?php echo $row->subroutename; ?></p>
				<p style="font-family: Questrial-Regular; font-size: 18px;">Departure: <?php echo date('g:i A',
							strtotime($row->Departuretime)); ?></p>
				<p style="font-family: Questrial-Regular; font-size: 18px;">Arrival: <?php echo date('g:i A',
							strtotime($row->Arrivaltime)); ?></p>
			</div>
		<?php } ?>
		<form method="POST" action="<?php echo site_url('SubRoute/add') ?>">
			<input type="hidden" name="routeid" value="<?php echo $routeid; ?>">

			<button style="background: white; border: 1px solid #f95555; border-radius: 5px; color: #f95555; font-family: Nunito_regular; padding: 10px 20px 10px 20px; font-size: 20px; outline: none;">
				Add Subroute
			</button>


		</form>
	</div>

</div>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ? All passengers will be deleted");
		if (r == true) {
			location.href = '<?php echo site_url('station/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}

	function myFunction2(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('SubRoute/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
