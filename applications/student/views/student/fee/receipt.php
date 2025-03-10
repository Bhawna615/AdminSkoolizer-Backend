<html lang="en">

<head>
	<title>Receipt</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet" />
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

		.details {
			font-size: 14px;
			font-family: 'Nunito-Regular', sans-serif;
			margin-bottom: 8px;
		}

		.page-title {
			font-size: 26px;
			font-family: 'Rubik-Medium', sans-serif;
			font-weight: bold;
			text-align: center;
			margin-bottom: 30px;
			text-transform: uppercase;
		}

		.table {
			width: 100%;
			margin-bottom: 20px;
			border-collapse: collapse;
		}

		.table th,
		.table td {
			padding: 12px;
			text-align: left;
			border: 1px solid #ddd;
		}

		.table th {
			background-color: #f7f7f7;
			color: #333;
			font-size: 16px;
			font-family: 'Montserrat-Medium', sans-serif;
			text-transform: uppercase;
		}

		.table td {
			font-size: 14px;
		}

		.table td:nth-child(2) {
			font-weight: bold;
		}

		.col-xs-12 {
			margin: 40px;
		}

		.signature-container {
			margin-top: 50px;
			padding-top: 30px;
			border-top: 2px solid #333;
			text-align: center;
		}

		.signature-container p {
			font-size: 16px;
			font-family: 'Questrial-Regular', sans-serif;
		}



		.school-name-container {
			text-align: center;
			margin-bottom: 20px;
		}

		.school-logo-container img {
			width: 100px;
			/* Increase the size of the logo */
			height: auto;
			margin-bottom: 5px;
		}

		.school-name {
			font-size: 28px;
			/* Increase the font size for school name */
			font-family: 'Montserrat-Medium', sans-serif;
			font-weight: bold;
			color: #333;
		}

		.school-address {
			font-size: 14px;
			color: #555;
		}
	</style>
</head>

<body>
	<div class="col-xs-12">
		<div class="col-xs-12 school-name-container">
			<div class="school-logo-container">
				<img src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
					class="school-logo" alt="School Logo" />
			</div>
			<p class="school-name"
				style="font-size: 20px; font-family: 'Montserrat-Medium', sans-serif; text-align: center;">
				<?php echo $this->config->item('schoolName') ?></p>
			<p class="school-address" style="font-size: 14px; text-align: center;">
				<?php echo $this->config->item('schoolAddress') ?></p>
		</div>
		<p class="page-title">Receipt</p>
		<div class="col-xs-12 page-body">
			<?php if (isset($reciept)) { ?>
				<?php foreach ($reciept as $row) { ?>


					<table class="table">

						<tr>
							<th>Name</th>
							<td><?php echo $row->studentname; ?></td>
						</tr>
						<tr>
							<th>Date</th>
							<td><?php echo date("d F Y"); ?></td>
						</tr>
						<tr>
							<th>Class</th>
							<td><?php echo $row->class; ?></td>
						</tr>
						<tr>
							<th>Admission No</th>
							<td><?php echo $row->admission_number; ?></td>
						</tr>



						<tr>
							<th>Payment Id</th>
							<td><?php echo $row->feeid; ?></td>
						</tr>
						<tr>
							<th>Period</th>
							<td><?php echo $row->period; ?></td>
						</tr>


						<tr>
							<th>Fee</th>
							<td>
								<table class="table" style="border: none;">

									<tr>
										<th>Tuition Fee</th>
										<td><?php echo $row->tuition_fee; ?></td>
									</tr>
									<tr>
										<th>Transport Fee</th>
										<td><?php echo $row->transport_fee; ?></td>
									</tr>
									<tr>
										<th>Annual Fee</th>
										<td><?php echo $row->annual_fee; ?></td>
									</tr>
									<tr>
										<th><strong>Addmission Fee</strong></th>
										<td><strong><?php echo $row->admission_fee; ?></strong></td>
									</tr>
									<tr>
										<th><strong>Amount</strong></th>
										<td><strong><?php echo $row->amount; ?></strong></td>
									</tr>
									<tr>
										<th>Late Fee</th>
										<td><?php echo $row->late_fee_paid; ?></td>
									</tr>
									<tr>
										<th>Total Amount</th>
										<td><?php echo $row->amount_paid; ?></td>
									</tr>
								</table>
							</td>
						</tr>


						<tr>
							<th>Paid On</th>
							<td><?php $date = date('d F,Y', strtotime($row->paidondate));
							echo $date; ?></td>
						</tr>
						<tr>
							<th>Mode</th>
							<td><?php echo $row->payment_mode; ?></td>
						</tr>
						<tr>
							<th>Transaction Id</th>
							<td><?php echo $row->razorpay_order_id ?></td>
						</tr>
					</table>
				<?php } ?>
			<?php } ?>

			<div class="signature-container">
				<p>Signature and Seal</p>
				<p>__________________</p>
			</div>
		</div>
	</div>

	<script>
		window.onload = function () {
			window.print();
		}
	</script>
</body>

</html>