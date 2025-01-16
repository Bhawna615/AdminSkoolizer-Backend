<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<div class="message">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="col-md-12 error-bar">
                <i class="las la-exclamation-triangle"></i>
                <?php echo $this->session->flashdata('error') ?>
                <?php $this->session->unset_userdata('error') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="col-md-12 col-lg-12 success-bar">
                <i class="las la-check-square"></i>
                <?php echo $this->session->flashdata('success') ?>
                <?php $this->session->unset_userdata('success') ?>
            </div>
        <?php } ?>
	</div>
	<div id="table-view">
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
			<td><?php echo $row->Subject; ?></td>
			<td><?php echo $row->Examname; ?></td>
			<td><?php echo $row->Maxmarks; ?></td>
			<td><?php echo date('d F,Y', strtotime($row->Date)); ?></td>
			<td>
				<?php if ($row->Result == false) { ?>
					<div class="col-md-3">
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/uploadresult'); ?>" target="_blank">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<input type="hidden" name="class" value="<?php echo $row->Class; ?>">
							<input type="hidden" name="code" value="<?php echo $row->id; ?>">
							<input type="hidden" name="examType" value="<?php echo $row->Examtype ?>" />
							<button type="submit" class="dt-action-btn" title="Upload Results">
								<i class="las la-file-upload btn-icon"></i>
							</button>
						</form>
					</div>
				<?php } elseif($row->saved == false)
				{ ?>
				<div class="col-md-3">
				    <form class="dt-action-form" method="POST" action="<?php echo site_url('exam/viewresult'); ?>" target="_blank">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="View Results">
								<i class="las la-eye btn-icon"></i>
							</button>
						</form>
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/editresult'); ?>" target="_blank">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Edit Results">
								<i class="las la-pen btn-icon"></i>
							</button>
						</form>
				    	<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/saveresult'); ?>" target="_blank">
							<input type="hidden" name="id" value="<?php echo $row->id; ?>">
							<button type="submit" class="dt-action-btn" title="Save Result">
								<i class="las la-save btn-icon"></i>
							</button>
						</form>
				</div>
			 <?php	}
				else { ?>
					<div class="col-md-3">
						<form class="dt-action-form" method="POST" action="<?php echo site_url('exam/viewresult'); ?>" target="_blank">
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

	</div>
</div>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ? All results of this exams will be deleted!");
		if (r == true) {
			location.href = '<?php echo site_url('exam/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>


<?php $this->view('footer'); ?>
