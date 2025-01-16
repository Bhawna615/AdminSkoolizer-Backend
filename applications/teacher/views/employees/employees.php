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

	<div class="col-md-12 side-btn-bar">
		<div class="col-md-8"></div>
		<div class="col-md-4" align="right">
			<button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('employee/add') ?>'  ">
				<p>
					<i class="material-icons btn-icon">add</i>
					Add Employee
				</p>
			</button>
		</div>
	</div>

	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Name</th>
			<th>Designation</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (isset($employees)) { ?>
			<?php foreach ($employees as $row) { ?>
				<tr>
					<td><?php echo $row->empname; ?></td>
					<td><?php echo $row->Post; ?></td>
					<td>
						<button
								onclick="myFunction(<?php echo $row->id; ?>)"
								class="dt-action-btn"
								title="Delete">
							<i class="las la-trash btn-icon"></i>
						</button>
					</td>
				</tr>
			<?php } ?>
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

<script type="text/javascript">
	function myFunction(id) {
		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('employee/delete/') ?>' + id;
		} else {
			void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
