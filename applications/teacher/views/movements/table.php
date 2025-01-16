<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Movement Id</th>
		<th>Name</th>
		<th>Class</th>
		<th>Roll No</th>
		<th>Checked</th>
		<th>Date/Time</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (!empty($movements)) { ?>
		<?php foreach ($movements as $movement) { ?>
			<tr>
				<td><?php echo $movement->id; ?></td>
				<td><?php echo $movement->name; ?></td>
				<td><?php echo $movement->class; ?></td>
				<td><?php echo $movement->roll_no; ?></td>
				<td><?php echo $movement->movement; ?></td>
				<td><?php echo $movement->timestamp ?></td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[5, "desc"]],
			responsive: true,
		});
	});
</script>
