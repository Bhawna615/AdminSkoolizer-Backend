<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Class</th>
		<th>Roll No</th>
		<th>Metrics</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($students)) { ?>
	<?php foreach ($students as $student) { ?>
		<tr>
			<td><?php echo $student->id; ?></td>
			<td><?php echo $student->Name; ?></td>
			<td><?php echo $student->Class; ?></td>
			<td><?php echo $student->Rollno; ?></td>
			<td>
				<button
					class="dt-action-btn"
					title="Change"
					onclick="window.open('<?php echo site_url('metrics/add/'.$student->id) ?>')"
					target="_blank"
				>
					<i class="las la-pen btn-icon"></i>
				</button>
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

