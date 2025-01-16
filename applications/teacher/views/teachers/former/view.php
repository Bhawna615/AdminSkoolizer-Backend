<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    
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

	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Name</th>
			<th>Designation</th>
			<th>Date of Birth</th>
			<th>Date of Joining</th>
		    <th>Date of Leaving</th>
			<th>Contact</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php foreach ($formerTeachers as $formerTeacher) { ?>
			<tr>
				<td><?php echo $formerTeacher->name; ?></td>
				<td><?php echo $formerTeacher->designation; ?></td>
				<td><?php echo $formerTeacher->date_of_birth; ?></td>
				<td><?php echo $formerTeacher->date_of_joining; ?></td>
				<td><?php echo $formerTeacher->date_of_leaving; ?></td>
			    <td><?php echo $formerTeacher->contact; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[2, "desc"]],
			responsive: true
		});
	});
</script>
<?php $this->view('footer'); ?>
