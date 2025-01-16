<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Content</th>
		<th>Weightage</th>
		<th>Class</th>
		<th>Subject</th>
		<th>Created At</th>
	</tr>

	</thead>
	<tbody class="dataTableBody">
	<?php if( isset($questions)) { ?>
		<?php foreach ($questions as $question) { ?>
			<tr>
				<td><?php echo $question->id; ?></td>
				<td><?php echo $question->content; ?></td>
				<td><?php echo $question->weightage; ?></td>
				<td><?php echo $question->class ?></td>
				<td><?php echo $question->subject ?></td>
				<td><?php echo $question->created_at; ?></td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[5, "desc"]],
			responsive: true,
		});
	});
</script>


