<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
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
<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>PaymentId</th>
		<th>Transaction Id</th>
		<th>EasePay Id</th>
		<th>Student Name</th>
		<th>Class</th>
		<th>Admission No.</th>
		<th>Admission Fee</th>
		<th>Annual Fee</th>
		<th>Tuition Fee</th>
		<th>Transport Fee</th>
		<th>Amount</th>
		<th>Last Date</th>
		<th>Period</th>
		<th>Status</th>
		<th>Payment Mode</th>
		<th>Late Fee Paid</th>
		<th>Amount Paid</th>
		<th>Paid On</th>
		<th>Session</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($payments)) { ?>
		<?php foreach ($payments as $row) { ?>
			<tr>
				<td><?php echo $row->feeid; ?></td>
				<td><?php echo $row->razorpay_order_id ?></td>
				<td><?php echo $row->easepay_id ?></td>
				<td><?php echo $row->studentname; ?></td>
				<td><?php echo $row->class; ?></td>
				<td><?php echo $row->admission_number; ?></td>
				<td><?php echo $row->admission_fee; ?></td>
				<td><?php echo $row->annual_fee; ?></td>
				<td><?php echo $row->tuition_fee; ?></td>
				<td><?php echo $row->transport_fee; ?></td>
				<td><?php echo $row->amount; ?></td>
				<td><?php echo $row->lastdate; ?></td>
				<td><?php echo $row->period; ?></td>
				<td><?php if ($row->status == true) {
						echo "Paid";
					} else {
						echo "Pending";
					} ?>
				</td>
				<td><?php echo $row->payment_mode ?></td>
				<td><?php echo $row->late_fee_paid ?></td>
				<td><?php echo $row->amount_paid; ?></td>
				<td><?php echo $row->paidondate; ?></td>
				<td><?php echo $row->session; ?></td>
				<td>
					<?php if ($row->status == true) { ?>
						<form method="POST" action="<?php echo site_url('fee/receipt') ?>">
							<input type="hidden" name="id" value="<?php echo $row->feeid ?>">
							<button class="dt-action-btn">
								<i class="la la-receipt btn-icon" title="Receipt"></i>
							</button>
						</form>
					<?php } else { ?>
						<form action="<?php echo site_url('fee/accept/') ?>" method="POST">
							<input type="hidden" name="id" value="<?php echo $row->feeid; ?>">
							<button class="dt-action-btn" title="Accept Payment" type="submit">
								<i class="la la-hand-holding-usd btn-icon"></i>
							</button>
						</form>
								<form action="<?php echo site_url('fee/editStudentFee') ?>" method="POST">
							<input type="hidden" name="id" value="<?php echo $row->feeid; ?>">
							<button class="dt-action-btn" title="Edit Payment" type="submit">
								<i class="la la-pen btn-icon"></i>
							</button>
						</form>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#table').DataTable({
			    "order": [[0, "desc"]],
				responsive: true,
			});
		});
	});
</script>
</body>
</html>