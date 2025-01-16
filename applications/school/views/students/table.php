<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
	    <th>Student Id</th>
		<th>Roll No.</th>
		<th>Name</th>
		<th>Class</th>
		<th>Admission No</th>
        <th>Notifications</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($students)) {?>
	<?php foreach ($students as $row) { ?>
		<tr>
		    <td><?php echo $row->id ?></td>
			<td><?php echo $row->Rollno; ?></td>
			<td>
				<a href="<?php echo site_url('student/view/') . $row->id; ?>" style="color: black;" target="_blank">
					<?php echo $row->Name; ?>
				</a>
			</td>
			<td><?php echo $row->Class; ?></td>
			<td><?php echo $row->Admno ?></td>
            <td><?php if (isset($row->fcm_token)) { echo "Receiving"; } else { echo "Not Receiving"; }   ?></td>
			<td>
				<div class="dropdown">
					<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
					   style="cursor: pointer;">more_vert</i>
					<ul class="dropdown-menu" style="font-family: Questrial-Regular;">
						<li>
                            <a>
								<form method="POST" action="<?php echo site_url('student/examreport') ?>" target="_blank">
									<input type="hidden" name="id" value="<?php echo $row->id; ?>">
									<input type="hidden" name="roll" value="<?php echo $row->Rollno; ?>">
									<input type="hidden" name="class" value="<?php echo $row->Class; ?>">

									<input type="submit" title="Exam Report" name="" value="Exam Report"
										   style="background: transparent; border: none; text-align: right;">
								</form>
							</a>
                        </li>
                        <li>
                            <a>
                                <form method="POST" action="<?php echo site_url('exam/select') ?>" target="_blank">
                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                    <input type="hidden" name="roll" value="<?php echo $row->Rollno; ?>">
                                    <input type="hidden" name="class" value="<?php echo $row->Class; ?>">

                                    <input type="submit" title="Report Card" name="" value="Report Card"
                                           style="background: transparent; border: none; text-align: right;">
                                </form>
                            </a>
                        </li>
                        <li><a href="<?php echo site_url('attendance/studentattendance/') . $row->id; ?>">Attendance</a></li>
						<li><a href="<?php echo site_url('student/tcDetails/') . $row->id; ?>">Transfer Certificate</a></li>
						<li><a href="<?php echo site_url('student/characterCertificateDetails/') . $row->id; ?>">Character Certificate</a></li>
						<li><a href="<?php echo site_url('student/transportdetails/') . $row->id; ?>">Transport</a></li>
						<li><a href="<?php echo site_url('exam/getdetails/') . $row->id; ?>">Exams</a></li>
						<li><a href="<?php echo site_url('fee/getDetails/') . $row->id; ?>">Fee</a></li>
						<li><a href="<?php echo site_url('message/get/') . $row->id; ?>">Messages</a></li>
						<li><a href="<?php echo site_url('fee/createStudentPayment/') . $row->id; ?>" target="_blank">Create Fee Payment</a></li>
						<li><a onclick="myFunction(<?php echo $row->id; ?>)" style="cursor: pointer;">Delete</a></li>
					</ul>
				</div>
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
</script>

