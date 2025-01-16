<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Class</th>
		<th>Exam Type</th>
		<th>Subject</th>
		<th>Syllabus</th>
		<th>Max Marks</th>
		<th>Date</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($exams)) { ?>
	<?php foreach ($exams as $row) { ?>
		<tr>
			<td><?php echo $row->Class; ?></td>
			<td><?php echo $row->Examtype; ?></td>
			<td><?php echo $row->Subjectname; ?></td>
			<td><?php echo $row->Examname; ?></td>
			<td><?php echo $row->Maxmarks; ?></td>
			<td><?php echo date('d F,Y', strtotime($row->Date)); ?></td>
			<td>
				<?php if ($row->Result == false) { ?>
					<div class="col-md-3">
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/uploadresult'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<input type="hidden" name="class" value="<?php echo $row->Class; ?>">
							<input type="hidden" name="code" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Upload Results">
								<i class="las la-file-upload btn-icon"></i>
							</button>
						</form>
					</div>
				<?php } elseif($row->saved == false)
				{ ?>
				<div class="col-md-3">
				    <form class="dt-action-form" method="POST" action="<?php echo site_url('exam/viewresult'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="View Results">
								<i class="las la-eye btn-icon"></i>
							</button>
						</form>
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/editresult'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Edit Results">
								<i class="las la-pen btn-icon"></i>
							</button>
						</form>
				    	<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/saveresult'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Save Result">
								<i class="las la-save btn-icon"></i>
							</button>
						</form>
				</div>
			 <?php	}
				else { ?>
					<div class="col-md-3">
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/viewresult'); ?>">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="View Results">
								<i class="las la-eye btn-icon"></i>
							</button>
						</form>
					</div>
				<?php } ?>
				<div class="col-md-2">
					<button class="dt-action-btn" onclick="myFunction(<?php echo $row->id; ?>)" title="Delete">
						<i class="las la-trash btn-icon"></i>
					</button>
				</div>
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
