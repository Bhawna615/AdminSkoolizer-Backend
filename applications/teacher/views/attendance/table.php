<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Date</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($attendance)) { ?>
		<?php foreach ($attendance as $row) { ?>
			<tr>
				<td><?php echo $row->Date; ?></td>
				<td>
					<form method="POST" action="<?php echo site_url('attendance/details') ?>" target="_blank">
						<input type="hidden" name="class" value="<?php echo $row->Class; ?>">
						<input type="hidden" name="date" value="<?php echo $row->Date; ?>">
						<button class="dt-action-btn" type="submit">
							<i class="las la-eye btn-icon"></i>
						</button>
					</form>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[0, "desc"]],
			responsive: true,
		});
	});
</script>

<style>
	/* Table Styling */
	#table {
		width: 100%;
		border-collapse: collapse;
		background: linear-gradient(to right, #d1f0ff, #e6ffe6); /* Light blue to light green gradient */
		border-radius: 10px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		overflow: hidden;
		animation: fadeInUp 0.5s ease-in-out;
	}

	#table thead {
		background:  #4F6476; /* Light Sky Blue */
		color: #fff;
		font-size: 16px;
		text-align: left;
	}

	#table th, #table td {
		padding: 12px 15px;
		border-bottom: 1px solid #ddd;
	}

	/* Row Hover Effect */
	#table tbody tr:hover {
		background: rgba(135, 206, 235, 0.3); /* Light blue hover */
		transition: background 0.3s ease-in-out;
	}

	/* Button Styling */
	.dt-action-btn {
		background:rgb(205, 219, 243); /* Lime Green */
		color: white;
		border: none;
		padding: 8px 12px;
		border-radius: 6px;
		cursor: pointer;
		box-shadow: 0 4px 6px rgba(50, 205, 50, 0.2);
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}

	.dt-action-btn:hover {
		background: #228B22; /* Darker Green */
		transform: scale(1.1);
		box-shadow: 0 6px 12px rgba(34, 139, 34, 0.3);
	}

	/* Button Icon */
	.btn-icon {
		font-size: 18px;
	}

	/* Fade-in Animation */
	@keyframes fadeInUp {
		from {
			opacity: 0;
			transform: translateY(10px);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}
</style>
