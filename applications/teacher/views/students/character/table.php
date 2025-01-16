<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Student ID</th>
		<th>Name</th>
		<th>Class</th>
		<th>Roll No</th>
		<th>Father's Name</th>
		<th>Mother's Name</th>
		<th>Admission No</th>
		<th>Admission Date</th>
		<th>Graduation Date</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($characterCertificates)) { ?>
	<?php foreach ($characterCertificates as $certificate) { ?>
		<tr>
			<td><?php echo $certificate->id; ?></td>
			<td><?php echo $certificate->student_id; ?></td>
			<td><?php echo $certificate->name; ?></td>
			<td><?php echo $certificate->class; ?></td>
			<td><?php echo $certificate->roll_no; ?></td>
			<td><?php echo $certificate->father_name; ?></td>
			<td><?php echo $certificate->mother_name; ?></td>
		    <td><?php echo $certificate->admission_no; ?></td>
		    <td><?php echo $certificate->admission_date; ?></td>
		    <td><?php echo $certificate->graduation_date; ?></td>
			<td>
			    <form class="dt-action-form" method="POST" action="<?php echo site_url('student/openCharacterCertificate'); ?>">
							<input type="hidden" name="id" value="<?php echo $certificate->id; ?>">
							<button type="submit" class="dt-action-btn" title="View SLC">
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
	$(document).ready(function () {
		$(function () {
			$('#table').DataTable({
				"order": [[0, "asc"]],
				responsive: true,
			});
		});
	});
</script>
