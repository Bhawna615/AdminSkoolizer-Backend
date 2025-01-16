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
			<?php if (isset($quizId)) {?>
				<button
					class="side-btn"
					type="button"
					onclick="location.href = '<?php echo site_url('quizQuestion/add/').$quizId ?>'  "
				>
					<p>
						<i class="material-icons btn-icon">add</i>
						Add
					</p>
				</button>
			<?php } ?>
		</div>
	</div>
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Id</th>
			<th>Question</th>
			<th>Options</th>
			<th>Correct Option</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (!empty($quizQuestions)) { ?>
			<?php foreach ($quizQuestions as $quizQuestion) { ?>
				<tr>
					<td><?php echo $quizQuestion->id ?></td>
					<td><?php echo $quizQuestion->question ?></td>
					<td><?php echo $quizQuestion->options ?></td>
					<td><?php echo $quizQuestion->correct_option ?></td>
					<td>
						<i
							class="las la-edit btn-icon"
							title="Add Questions"
							onclick="location.href='<?php echo site_url('quizQuestion/edit/') . $quizQuestion->id ?>'"
						>
						</i>
						<i
							class="las la-trash btn-icon"
							title="Delete"
							onclick="myFunction(<?php echo $quizQuestion->id ?>, <?php echo $quizQuestion->quiz_id ?>)"
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
	function myFunction(id, quizId) {

		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('quizQuestion/delete/') ?>' + id + '/' + quizId;
		} else {
			void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>

