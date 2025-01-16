<?php $this->view('header'); ?>
<div class="innerview">
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
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Class</th>
			<th>Roll No</th>
			<th>Submission Time</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (!empty($participants)) { ?>
			<?php foreach ($participants as $participant) { ?>
				<tr>
					<td><?php echo $participant->participant_id  ?></td>
					<td>
						<a href="<?php echo site_url('student/view/'.$participant->participant_student_id)?>">
							<?php echo $participant->participant_name  ?>
						</a>
					</td>
					<td><?php echo $participant->participant_class  ?></td>
					<td><?php echo $participant->participant_roll_no ?></td>
					<td><?php echo $participant->created_at ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[0, "asc"]],
			responsive: true,
		});
	});
</script>
<?php $this->view('footer'); ?>
