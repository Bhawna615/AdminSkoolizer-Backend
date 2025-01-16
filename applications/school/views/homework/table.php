<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Class</th>
		<th>Subject</th>
		<th>Homework</th>
		<th>Date</th>
		<th>File</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (!empty($homework)) { ?>
	<?php foreach ($homework as $row) { ?>
		<tr>
			<td><?php echo $row->Class ?></td>
			<td><?php echo $row->Subjectname; ?></td>
			<td><?php echo $row->Assignment; ?></td>
			<td><?php echo date('d F,Y', strtotime($row->Date)); ?></td>
			<td>
				<?php if (!empty($row->file_url)) { ?>
					<a href="<?php echo $row->file_url; ?>"
					   target="_blank"> View file
					</a>
				<?php } ?>
			</td>
			<td>
				<button
					onclick="myFunction(<?php echo $row->id; ?>)"
					class="dt-action-btn"
					title="Delete">
					<i class="las la-trash btn-icon"></i>
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
