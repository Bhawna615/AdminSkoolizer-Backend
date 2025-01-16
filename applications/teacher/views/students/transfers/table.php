<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Father's Name</th>
		<th>Mother's Name</th>
		<th>Last Class</th>
		<th>Roll No</th>
		<th>Admission No</th>
		<th>Session</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($students)) { ?>
	<?php foreach ($students as $row) { ?>
		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->name; ?></td>
			<td><?php echo $row->father_name; ?></td>
			<td><?php echo $row->mother_name; ?></td>
			<td><?php echo $row->last_class; ?></td>
			<td><?php echo $row->roll_no; ?></td>
			<td><?php echo $row->admission_number; ?></td>
			<td><?php echo $row->session ?></td>
			<td>
			    <form class="dt-action-form" method="POST" action="<?php echo site_url('student/viewTc'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="View SLC">
								<i class="las la-eye btn-icon"></i>
							</button>
				</form>
				<form class="dt-action-form" method="POST" action="<?php echo site_url('student/editTc'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Edit SLC">
								<i class="las la-pen btn-icon"></i>
							</button>
				</form>
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
				"order": [[0, "asc"]],
				responsive: true,
			});
		});
	});
</script>
