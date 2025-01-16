<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Class</th>
		<th>Subject</th>
		<th>Duration</th>
		<th>Max Marks</th>
		<th>Created At</th>
		<th>Action</th>
	</tr>

	</thead>
	<tbody class="dataTableBody">
	<?php if( isset($questionPapers)) { ?>
		<?php foreach ($questionPapers as $questionPaper) { ?>
			<tr>
				<td><?php echo $questionPaper->id; ?></td>
				<td><?php echo $questionPaper->class ?></td>
				<td><?php echo $questionPaper->subject ?></td>
				<td><?php echo $questionPaper->duration; ?></td>
				<td><?php echo $questionPaper->max_marks; ?></td>
				<td><?php echo $questionPaper->created_at; ?></td>
				<td><button
							onclick="location.href='<?php echo site_url('questionPaper/generate/'.$questionPaper->id)?>'"
							class="dt-action-btn">
						<i class="las la-eye btn-icon"></i>
					</button>
					<button
							onclick="myFunction(<?php echo $questionPaper->id ?>)"
							class="dt-action-btn">
						<i class="las la-trash btn-icon"></i>
					</button>
				</td>
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
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('questionPaper/delete/') ?>' + id;
		} else {
			void (0);
		}
	}
</script>
