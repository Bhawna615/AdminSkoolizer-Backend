<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Message Id</th>
		<th>To</th>
		<th>Class</th>
		<th>Roll No.</th>
		<th>Message</th>
		<th>Image</th>
		<th>Date/Time</th>
	</tr>

	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($messages)) { ?>
	<?php foreach ($messages as $row) { ?>
		<tr>
			<td><?php echo $row->message_id; ?></td>
			<td><?php echo $row->Name; ?></td>
			<td><?php echo $row->Class ?></td>
			<td><?php echo $row->Rollno ?></td>
			<td><?php echo $row->message; ?></td>
			<td>
				<?php if (!empty($row->message_file_url)) { ?>
					<a href="<?php echo $row->message_file_url; ?>"
							target="_blank"> View file
					</a>
				<?php } ?>
			</td>
			<td><?php echo $row->sent_at; ?></td>
		</tr>
	<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[6, "desc"]],
			responsive: true,
		});
	});
</script>
