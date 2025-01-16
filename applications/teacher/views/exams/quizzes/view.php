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
	<div class="col-md-12 side-btn-bar">
		<div class="col-md-8"></div>
		<div class="col-md-4" align="right">
			<button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('quiz/add') ?>'  ">
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
			<th>Name</th>
			<th>Class</th>
			<th>Expiry Date</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (!empty($quizzes)) { ?>
			<?php foreach ($quizzes as $quiz) { ?>
				<tr>
					<td><?php echo $quiz->id ?></td>
					<td><?php echo $quiz->name ?></td>
					<td><?php echo $quiz->class ?></td>
					<td><?php echo $quiz->expiry_date ?></td>
					<td>
						<i
								class="las la-eye btn-icon"
								title="View"
								onclick="location.href='<?php echo site_url('quizquestion/view/') . $quiz->id ?>'"
						>
						</i>
						<i
								class="las la-trash btn-icon"
								title="Delete"
								onclick="myFunction(<?php echo $quiz->id ?>)"
						></i>
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
			"order": [[0, "asc"]],
			responsive: true,
		});
	});
</script>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('quiz/delete/') ?>' + id;
		} else {
			void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
