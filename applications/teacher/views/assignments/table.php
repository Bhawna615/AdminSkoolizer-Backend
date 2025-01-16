<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Class</th>
		<th>Subject</th>
		<th>Created At</th>
		<th>Action</th>
	</tr>

	</thead>
	<tbody class="dataTableBody">
	<?php if( isset($assignments)) { ?>
		<?php foreach ($assignments as $assignment) { ?>
			<tr>
				<td><?php echo $assignment->id; ?></td>
				<td><?php echo $assignment->name ?></td>
				<td><?php echo $assignment->class ?></td>
				<td><?php echo $assignment->subject ?></td>
				<td><?php echo $assignment->created_at; ?></td>
				<td><button
						onclick="location.href='<?php echo site_url('assignment/generate/'.$assignment->id)?>'"
						class="dt-action-btn">
						<i class="las la-eye btn-icon"></i>
					</button>
					<button
						onclick="myFunction(<?php echo $assignment->id ?>)"
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
			"order": [[4, "desc"]],
			responsive: true,
		});
	});
</script>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('assignment/delete/') ?>' + id;
		} else {
			void (0);
		}
	}
</script>
