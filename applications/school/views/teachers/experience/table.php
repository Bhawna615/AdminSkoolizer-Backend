<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Date of Birth</th>
		<th>Date of Joining</th>
		<th>From Date</th>
		<th>To Date</th>
		<th>Classes Taught</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($experienceCertificates)) { ?>
	<?php foreach ($experienceCertificates as $certificate) { ?>
		<tr>
			<td><?php echo $certificate->id; ?></td>
			<td><?php echo $certificate->name; ?></td>
			<td><?php echo $certificate->designation; ?></td>
			<td><?php echo $certificate->date_of_birth; ?></td>
			<td><?php echo $certificate->date_of_joining; ?></td>
			<td><?php echo $certificate->from_date; ?></td>
			<td><?php echo $certificate->to_date; ?></td>
			<td><?php echo $certificate->classes_taught ?></td>
			<td>
			    <form class="dt-action-form" method="POST" action="<?php echo site_url('teacher/openExperienceCertificate'); ?>">
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
