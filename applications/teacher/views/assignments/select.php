<form method="POST" action="<?php echo site_url('assignment/save') ?>">
	<div class="col-md-12">
		<div class="col-md-4">
			<p class="details">
				Name
			</p>
			<input
					type="text"
					name="name"
					class="form-input"
			/>
			<p class="details">
				Class
			</p>
			<select name="class" id="class-selector" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $class) { ?>
						<option><?php echo $class->Classname ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-4">
			<p class="details">
				Subject
			</p>
			<select name="subject" id="subject-selector" class="form-select">
			</select>
		</div>
		<div class="col-md-4">

		</div>
		<button type="submit" class="form-submit">Create</button>
	</div>
	<table class="table table-responsive table-bordered">
		<thead class="dataTableHead">
		<tr>
			<th>Select</th>
			<th>Id</th>
			<th>Content</th>
			<th>Weightage</th>
			<th>Class</th>
			<th>Subject</th>
			<th>Created At</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (isset($questions)) { ?>
			<?php foreach ($questions as $question) { ?>
				<tr>
					<td><input type="checkbox" name="questions[]" value="<?php echo $question->id ?>"></td>
					<td><?php echo $question->id ?></td>
					<td><?php echo $question->content ?></td>
					<td><?php echo $question->weightage ?></td>
					<td><?php echo $question->class ?></td>
					<td><?php echo $question->subject ?></td>
					<td><?php echo $question->created_at ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
		</tbody>

	</table>
</form>

<script type="text/javascript">
	$(document).ready(function () {
		$.ajax(
			{
				url: '<?php echo site_url("timetable/getsubjectsbyclass/") ?>' + $('#class-selector').val(),
				success: function (result) {
					$('#subject-selector').append(result);
				}
			}
		)
	});

	$('#class-selector').on('change', function () {
		$('#subject-selector').empty()
		$.ajax(
			{
				url: '<?php echo site_url("timetable/getsubjectsbyclass/") ?>' + $(this).val(),
				success: function (result) {
					$('#subject-selector').append(result);
				}
			}
		)
	});
</script>
