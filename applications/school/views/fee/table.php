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
		<th>Late Fee Paid/Applicable</th>
		<th>Amount Paid</th>
		<th>Paid On</th>
		<th>Session</th>
		<th>Remarks</th>
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
				<td>
    			<?php if($row->status == 0 || $row->status == null) { ?>
                                <p>
                                    <?php 
                                         if(date_create(date("Y-m-d")) > date_create($row->lastdate)) {
                                             $days = date_diff(date_create($row->lastdate), date_create(date("Y-m-d")));
                                             $lateFee = ($days->format("%R%a") - 1) * 10;
                                             echo $lateFee;
                                        } else {
                                            $lateFee = 0;
                                            echo $lateFee;
                                        }
                                    ?>
                                </p>
								
                <?php } else { ?>
					<?php echo $row->late_fee_paid ?>
				<?php } ?>
				</td>
				<td><?php echo $row->amount_paid; ?></td>
				<td><?php echo $row->paidondate; ?></td>
				<td><?php echo $row->session; ?></td>
				<td><?php echo $row->remarks; ?></td>
				<td>
					<?php if ($row->status == true) { ?>
						<form method="POST" action="<?php echo site_url('fee/receipt') ?>">
							<input type="hidden" name="id" value="<?php echo $row->feeid ?>">
							<button class="dt-action-btn">
								<i class="la la-receipt btn-icon" title="Receipt"></i>
							</button>
						</form>
							<form method="POST" action="<?php echo site_url('fee/editPaidFee') ?>">
							<input type="hidden" name="id" value="<?php echo $row->feeid ?>">
							<button class="dt-action-btn">
								<i class="la la-pen btn-icon" title="Edit"></i>
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
