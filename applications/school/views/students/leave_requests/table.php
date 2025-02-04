<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Student Id</th>
		<th>Name</th>
		<th>Class</th>
		<th>Roll No</th>
		<th>Date</th>
		<th>Reason</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($leaveRequests)) { ?>
	<?php foreach ($leaveRequests as $request) { ?>
		<tr>
			<td><?php echo $request->id; ?></td>
			<td><?php echo $request->student_id; ?></td>
			<td><?php echo $request->student_name; ?></td>
			<td><?php echo $request->student_class; ?></td>
			<td><?php echo $request->student_roll_no; ?></td>
			<td><?php echo $request->date; ?></td>
			<td><?php echo $request->reason; ?></td>
			<td><?php if($request->status) {echo "Approved"; } else { echo "Unapproved";} ?></td>
			<td>
			<?php if(!($request->status)) { ?>
				<button  onclick="myFunction(<?php echo $request->id ?>)" class="dt-action-btn" title="Approve">
					<i class="las la-check btn-icon"></i>
				</button>
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
				"order": [[7, "desc"]],
				responsive: true,
			});
		});
	});
</script>

<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure you want to approve this request ?");
		if (r == true) {
			location.href = '<?php echo site_url('student/approveLeaveRequest/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>