<html  lang="en">
<head>
	<title>Reciept</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
	<style type="text/css">
		@font-face {
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}

		@font-face {
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}
	</style>
</head>
<body>
<div class="col-xs-12">
	<div class="col-xs-12 school-name-container">
		<div class="school-logo-container">
			<img
					src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
					class="school-logo"
					alt="School Logo"
			/>
		</div>
		<p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
		<p class="school-address"><?php echo $this->config->item('schoolAddress') ?></p>
	</div>
	<p class="page-title">RECEIPT</p>
	<div class="col-xs-12 page-body">
		<?php if (isset($reciept)) { ?>
			<?php foreach ($reciept as $row) { ?>
				<div class="col-xs-4">
					<p class="details">Name: <?php echo $row->studentname; ?></p>
					<p class="details">Date: <?php echo date("d F Y"); ?></p>
				</div>
				<div class="col-xs-4">
					<p class="details">Class: <?php echo $row->class; ?></p>
					<p class="details">No. : ________</p>
				</div>
				<div class="col-xs-4">
					<p class="details">Admission No: <?php echo $row->admission_number; ?></p>
				</div>

				<table class="table table-responsive table-bordered tbl">
					<thead>
						<tr>
							<th>Payment Id</th>
							<th>Period</th>
							<th>Amount</th>
							<th>Paid On</th>
							<th>Mode</th>
							<th>Transaction Id</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td><?php echo $row->feeid; ?></td>
						<td><?php echo $row->period; ?></td>
						<td><?php echo $row->amount_paid; ?></td>
						<td><?php $date = date('d F,Y', strtotime($row->paidondate));
							echo $date; ?></td>
						<td><?php echo $row->payment_mode; ?></td>
						<td><?php echo $row->razorpay_order_id ?></td>
					</tr>
					</tbody>
				</table>
			<?php } ?>
		<?php } ?>
		<p class="details" style="margin-top: 50px;">Signature and Seal</p>
		<p class="details">__________________</p>
	</div>
</div>
<script>
	window.onload = function () {
		window.print();
	}
</script>
</body>
</html>
