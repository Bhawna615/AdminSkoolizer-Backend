<?php $this->view('header') ?>
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
	<div class="col-md-12 side-btn-bar" >
		<div class="col-md-8"></div>
		<div class="col-md-4" align="right">
			<button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('metrics/create') ?>'  ">
				<p>
					<i class="material-icons btn-icon">add</i>
					Create
				</p>
			</button>
		</div>
	</div>
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Id</th>
			<th>Metric</th>
			<th>Ability</th>
			<th>Class</th>
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
					<td><?php echo $metric->metric_class ?></td>
					<td>
						<button
							class="dt-action-btn"
							title="Change"
							onclick="location.href='<?php echo site_url('metrics/edit/'.$metric->metric_id) ?>'"
							target="_blank"
						>
							<i class="las la-pen btn-icon"></i>
						</button>
						<button
								class="dt-action-btn"
								title="Delete"
								onclick="myFunction(<?php echo $metric->metric_id ?>)"
						>
							<i class="las la-trash btn-icon"></i>
						</button>
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
	<script type="text/javascript">
		function myFunction(id) {

			var r = confirm("Are you sure ?");
			if (r == true) {
				location.href = '<?php echo site_url('metrics/delete/') ?>' + id;
			} else {
				javascript:void (0);
			}
		}
	</script>

</div>
<?php $this->view('footer') ?>
