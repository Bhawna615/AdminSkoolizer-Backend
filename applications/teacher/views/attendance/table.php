<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Date</th>
		<th>Class</th>
		<th>Absent</th>
		<th>On Leave</th>
		<th>Present</th>
		<th>Strength</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($attendance)) { ?>
		<?php foreach ($attendance as $row) { ?>
			<tr>
				<td><?php echo $row->Date; ?></td>
				<td><?php echo $row->Class; ?></td>
				<td><?php echo $row->Absent; ?></td>
				<td><?php echo $row->onLeave; ?></td>
				<td><?php echo $row->Present; ?></td>
				<td><?php echo $row->Strength ?></td>
				<td>
					<form method="POST" action="<?php echo site_url('attendance/details') ?>" target="_blank">
						<input type="hidden" name="class" value="<?php echo $row->Class; ?>">
						<input type="hidden" name="date" value="<?php echo $row->Date; ?>">
						<button class="dt-action-btn" type="submit">
							<i class="las la-eye btn-icon"></i>
						</button>
					</form>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[0, "desc"]],
			responsive: true,
		});
	});
</script>
