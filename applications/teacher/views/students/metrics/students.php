<?php $this->view('header') ?>

<style>
	#table-view {
		height: max-content;
		width: 100%;

	}

	/* Styled Table as Cards */
	.table-container {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		justify-content: center;
		gap: 20px;
		height: max-content;
		width: 100%;
		box-sizing: border-box;
	}

	.table-card {
		background: white;
		border-radius: 10px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		padding: 20px;
		width: 90%;
		
		transition: all 0.3s ease-in-out;
	}

	/* Hover Effect */
	.table-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
	}

	/* Table Styling Inside Card */
	.dataTableFull {
		width: 100%;
		border-collapse: collapse;
	}

	.dataTableHead th {
		background-color: #b3e5fc;
		color: #333;
		padding: 10px;
		
		
	}

	.dataTableBody td {
		padding: 10px;
		border-bottom: 1px solid #ddd;
	}

	/* Filter Bar */
	.filter-bar {
		background: #f7f7f7;
		padding: 10px;
		border-radius: 5px;
		margin-bottom: 20px;
	}

	/* Button Styling */
	.form-submits{
		background: #0288d1;
		color: white;
		border: none;
		padding: 10px 15px;
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	.form-submit:hover {
		background: #0277bd;
	}

	/* Responsive */
	@media (max-width: 768px) {
		.table-card {

			width: 100%;


			padding: 15px;
		}

		.dataTableHead th,
		.dataTableBody td {
			font-size: 0.9rem !important;
			padding: 8px;
		}
		.filter-bar {
		
		
			width: 100%;
			height: max-content;
			padding: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
	}
</style>
<div style="display: flex; justify-content: center;
align-items: center; flex-wrap: wrap; gap: 20px; height: max-content; width: 100%; box-sizing: border-box;">
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

	<div class="col-md-12 filter-bar">

		<div class="col-md-4">

		</div>
		<div class="col-md-4"></div>
		<div class="col-md-12">
			<button onclick="location.href='<?php echo site_url('metrics/view') ?>'" class="form-submits">
				View Metrics
			</button>
		</div>
	</div>
	<div id="table-view">

	</div>
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
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('metrics/display') ?>')
	});

	$('.filter').on('change', function () {
		if ($('#filter-check').is(':checked')) {
			$('#table-view').load('<?php echo site_url('metrics/filter/') ?>' + $('#class').val())
		}
	});

	$('#filter-check').on('change', function () {
		if (this.checked) {
			$('#table-view').load('<?php echo site_url('metrics/filter/') ?>' + $('#class').val())
		} else {
			$('#table-view').load('<?php echo site_url('metrics/display') ?>')
		}
	});
</script>
<?php $this->view('footer') ?>