<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Date</th>
		<th>On Leave</th>
		<th>Present</th>
		<th>Strength</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (!empty($attendance)) { ?>
		<?php foreach ($attendance as $row) { ?>
			<tr>
				<td><?php echo $row->Date; ?></td>
				<td><?php echo $row->onLeave; ?></td>
				<td><?php echo $row->Present; ?></td>
				<td><?php echo $row->Total; ?></td>
				<td>
					<form method="POST" action="<?php echo site_url('employee/attendancedetails') ?>">
						<input type="hidden" name="date" value="<?php echo $row->Date; ?>">
						<button class="dt-action-btn" type="submit">
							<i class="las la-eye btn-icon"></i>
						</button>
					</form>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[0, "desc"]],
			responsive: true,
		});
	});
</script>
