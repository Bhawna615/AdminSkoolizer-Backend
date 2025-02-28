<!-- <table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Student Id</th>
		<th>Roll No.</th>
		<th>Name</th>
		<th>Class</th>
		<th>Admission No</th>
		<th>Notifications</th> -->
<!--<th>Actions</th>-->
<!-- </tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($students)) { ?>
	<?php foreach ($students as $row) { ?>
		<tr>
			<td><?php echo $row->id ?></td>
			<td><?php echo $row->Rollno; ?></td>
			<td>
				<a href="<?php echo site_url('student/view/') . $row->id; ?>" style="color: black;">
					<?php echo $row->Name; ?>
				</a>
			</td>
			<td><?php echo $row->Class; ?></td>
			<td><?php echo $row->Admno ?></td>
			<td><?php if (isset($row->fcm_token)) {
				echo "Receiving";
			} else {
				echo "Not Receiving";
			} ?></td> -->
		<!--<td>-->
		<!--	<div class="dropdown">-->
		<!--		<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"-->
		<!--		   style="cursor: pointer;">more_vert</i>-->
		<!--		<ul class="dropdown-menu" style="font-family: Questrial-Regular;">-->
		<!--			<li>-->
		<!--                         <a>-->
		<!--					<form method="POST" action="<?php echo site_url('student/examreport') ?>" target="_blank">-->
		<!--						<input type="hidden" name="id" value="<?php echo $row->id; ?>">-->
		<!--						<input type="hidden" name="roll" value="<?php echo $row->Rollno; ?>">-->
		<!--						<input type="hidden" name="class" value="<?php echo $row->Class; ?>">-->

		<!--						<input type="submit" title="Exam Report" name="" value="Exam Report"-->
		<!--							   style="background: transparent; border: none; text-align: right;">-->
		<!--					</form>-->
		<!--				</a>-->
		<!--                     </li>-->
		<!--                     <li>-->
		<!--                         <a>-->
		<!--                             <form method="POST" action="<?php echo site_url('exam/select') ?>" target="_blank">-->
		<!--                                 <input type="hidden" name="id" value="<?php echo $row->id; ?>">-->
		<!--                                 <input type="hidden" name="roll" value="<?php echo $row->Rollno; ?>">-->
		<!--                                 <input type="hidden" name="class" value="<?php echo $row->Class; ?>">-->

		<!--                                 <input type="submit" title="Report Card" name="" value="Report Card"-->
		<!--                                        style="background: transparent; border: none; text-align: right;">-->
		<!--                             </form>-->
		<!--                         </a>-->
		<!--                     </li>-->
		<!--                     <li><a href="<?php echo site_url('attendance/studentattendance/') . $row->id; ?>">Attendance</a></li>-->
		<!--			<li><a href="<?php echo site_url('student/tcDetails/') . $row->id; ?>">Transfer Certificate</a></li>-->
		<!--			<li><a href="<?php echo site_url('student/characterCertificateDetails/') . $row->id; ?>">Character Certificate</a></li>-->
		<!--			<li><a href="<?php echo site_url('student/transportdetails/') . $row->id; ?>">Transport</a></li>-->
		<!--			<li><a href="<?php echo site_url('exam/getdetails/') . $row->id; ?>">Exams</a></li>-->
		<!--			<li><a href="<?php echo site_url('fee/getDetails/') . $row->id; ?>">Fee</a></li>-->
		<!--			<li><a href="<?php echo site_url('message/get/') . $row->id; ?>">Messages</a></li>-->
		<!--			<li><a href="<?php echo site_url('fee/createStudentPayment/') . $row->id; ?>" target="_blank">Create Fee Payment</a></li>-->
		<!--			<li><a onclick="myFunction(<?php echo $row->id; ?>)" style="cursor: pointer;">Delete</a></li>-->
		<!--		</ul>-->
		<!--	</div>-->
		<!--</td>-->
		<!-- </tr>
	<?php } ?>
	<?php } ?>
	</tbody>
</table> -->
<!-- <script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#table').DataTable({
				"order": [[2, "asc"]],
				responsive: true,
			});
		});
	});
</script>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('student/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script> -->





<style>
	.student-cards-container {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		justify-content: center;
		align-items: center;
		height: max-content;
		width: 100%;

	}

	.student-card {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background: rgb(205, 219, 243);
		gap: 20px;
		border: 1px solid #e3e3e3;
		border-radius: 10px;
		padding: 15px;
		box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
		transition: all 0.3s ease;
		width: 100%;
	}

	.student-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
	}

	/* Animated Heading */
	.animated-heading {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Nunito-Semibold;
		color: #4F6476;
		font-size: 28px;
		margin-bottom: 25px;
		animation: slideDown 1s ease-in-out;
	}

	.animated-heading i {
		font-size: 30px;
		color: #6C63FF;
		margin-right: 12px;
		animation: bounce 1.5s infinite ease-in-out;
	}

	.student-table {
		width: 100%;
		margin-top: 10px;

	}

	.student-table td {
		padding: 5px;
		text-align: left;
		font-size: 1.2rem;
		font-family: Nunito-Semibold;
		color: #333;
	}

	.view-btn {
		display: inline-block;
		margin-top: 10px;
		padding: 8px 12px;
		background: #4F6476;
		color: #ffffff;
		text-decoration: none;
		border-radius: 5px;
		transition: background 0.3s;
	}

	.view-btn:hover {
		background: #0056b3;
	}
</style>



<div class="col-md-12 innerview">
	<div class="animated-heading">
		<i class="las la-graduation-cap"></i> Student Details
	</div>
	<div class="message">
		<?php if ($this->session->flashdata('error')) { ?>
			<div class="col-md-12 error-bar">
				<i class="las la-exclamation-triangle"></i>
				<?php echo $this->session->flashdata('error') ?>
				<?php $this->session->unset_userdata('error') ?>
			</div>
		<?php } ?>
		<?php if ($this->session->flashdata('success')) { ?>
			<div class="col-md-12 col-lg-12 success-bar">
				<i class="las la-check-square"></i>
				<?php echo $this->session->flashdata('success') ?>
				<?php $this->session->unset_userdata('success') ?>
			</div>
		<?php } ?>
	</div>

	<div class="student-cards-container">
		<?php if (isset($students)) {
			usort($students, function ($a, $b) {
				return $a->Rollno - $b->Rollno;
			});
			?>
			<?php foreach ($students as $row) { ?>
				<div class="student-card">
					<h3
						style="padding: 10px; font-weight:bold; font-size:1.5rem; color: #124E66; text-transform:capitalize; background-color: #fff">
						<?php echo $row->Name; ?></h3>
					<table class="student-table" border="1" cellspacing="0" cellpadding="10"
						style="width: 100%; text-align: left; border-collapse: collapse;">
						<tr style="border:none;">
							<th style="padding: 10px; font-size:1.1rem;"><strong>Student ID:</strong></th>
							<td style="padding: 10px; font-size:1.1rem;"><?php echo $row->id; ?></td>
						</tr>
						<tr style="border:none;">
							<th style="padding: 10px; font-size:1.1rem;"><strong>Roll No:</strong></th>
							<td style="padding: 10px; font-size:1.1rem;"><?php echo $row->Rollno; ?></td>
						</tr>
						<tr style="border:none;">
							<th style="padding: 10px; font-size:1.1rem;"><strong>Class:</strong></th>
							<td style="padding: 10px; font-size:1.1rem;"><?php echo $row->Class; ?></td>
						</tr>
						<tr style="border:none;">
							<th style="padding: 10px; font-size:1.1rem;"><strong>Admission No:</strong></th>
							<td style="padding: 10px; font-size:1.1rem;"><?php echo $row->Admno; ?></td>
						</tr>
						<tr style="border:none;">
							<th style="padding: 10px; font-size:1.1rem;"><strong>Notifications:</strong></th>
							<td style="padding: 10px; font-size:1.1rem;">
								<?php echo isset($row->fcm_token) ? "Receiving" : "Not Receiving"; ?></td>
						</tr>
					</table>
					<a href="<?php echo site_url('student/view/') . $row->id; ?>" class="view-btn">View Details</a>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>