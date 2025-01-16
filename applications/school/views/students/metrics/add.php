<?php $this->view('header') ?>
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
	<form method="POST" action="<?php echo site_url('Metrics/mark') ?>">
	<?php if (isset($student)) { ?>
		<p>Name: <?php echo $student->Name ?></p>
		<p>Class: <?php echo $student->Class ?></p>
		<p>Roll No: <?php echo $student->Rollno ?></p>
		<table class="table table-responsive table-bordered dataTableFull" id="table">
			<thead class="dataTableHead">
			<tr>
				<th>Id</th>
				<th>Metric</th>
				<th>Ability</th>
				<th>Mark</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (isset($metrics)) { ?>
				<?php foreach ($metrics as $metric) { ?>
					<tr>
						<td><?php echo $metric->metric_id; ?></td>
						<td><?php echo $metric->metric_name; ?></td>
						<td><?php echo $metric->ability; ?></td>
						<td>
							<?php if (isset($studentMetric)) {
								foreach ($studentMetric as $row) {
									if ($row->metric_id == $metric->metric_id) { ?>
									    <input type = "text" name="mark[]"	 value = "<?php echo $row->mark; ?>" />
									    <input type="hidden" name="metrics[]" value="<?php echo $metric->metric_id ?>" />
								    <?php 	} 
								} 
							} ?>
							<?php if(count($studentMetric) == 0) { ?>
									 <input type = "text" name="mark[]" />
									 <input type="hidden" name="metrics[]" value="<?php echo $metric->metric_id ?>" />

							<?php } ?>
						</td>
						<td>
							<input type="hidden" name="studentId" value="<?php echo $student->id ?>" />
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
			
			</tbody>
		</table>
	<?php } ?>
	<button type="submit">Submit</button>
	</form>
</div>
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
<?php $this->view('footer') ?>
