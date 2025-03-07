<style>
	/* Page Styling */
	body {
		background: #f4f7fc;
		/* Light Grayish Background */
		color: #333;
		font-family: 'Arial', sans-serif;
	}

	.containers {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		width: 100%;
		height: max-content;
		gap: 30px;
		background-color: #fff;
		padding: 30px;
	}

	/* Custom Card Styling */
	.custom-card {
		width: 100%;
		background: white;
		border-radius: 12px;
		box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
		margin-bottom: 30px;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		animation: fadeInUp 0.6s ease-in-out;
	
	}

	.custom-card:hover {
		transform: scale(1.02);
		box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
	}

	.card-header {
		background: #2DAA9E ;
		/* Purple to Blue */
		color: white;
		font-size: 18px;
		padding: 15px;
		border-top-left-radius: 12px;
		border-top-right-radius: 12px;
		text-align: center;
	}

	.card-body {
		
		padding-top: 10px;
		background: #fff;
		border-bottom-left-radius: 12px;
		border-bottom-right-radius: 12px;
		
	}

	/* Table Styling */
	.table {
		width: 100%;
		background: #f9f9f9;
		/* Light background */
		border-radius: 0px;
		overflow: hidden;
		border-bottom-left-radius: 12px;
		border-bottom-right-radius: 12px;
	}

	.table thead {
		background: #80CBC4;
		color:white;
		font-size: 16px;
		font-weight: bold;
	}

	.table th,
	.table td {
		padding: 12px;
		border-bottom: 1px solid #ddd;
		text-align: center;
	}

	.table tbody tr:hover {
		background: rgba(106, 17, 203, 0.1);
		transition: background 0.3s ease;
	}

	/* Button Styling */
	.form-submit {
		display: block;
		margin: 15px auto;
		background: #2DAA9E !important;
		color: white;
		border: none;
		padding: 10px 15px;
		border-radius: 8px;
		cursor: pointer;
		box-shadow: 0 4px 6px rgba(37, 117, 252, 0.2);
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}

	.form-submit:hover {
		background: #1a5cd8;
		transform: scale(1.05);
		box-shadow: 0 6px 12px rgba(26, 92, 216, 0.3);
	}

	/* Animation */
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

	/* Responsive Design */
	@media (max-width: 768px) {
		/* .card {
			margin-bottom: 20px;
		} */

		.card-header {
			
			padding: 4px;
		}
		.card-header h4{
			font-size: 1rem;
		}
		.card-header i {
			font-size: 1.2rem;
		}

		.table th,
		.table td {
			padding: 8px;
			font-size: 7px;
		}
		.form-submit{
			font-size: 10px !important;
		}
		
	}
</style>





<?php $this->view('header'); ?>



<div class="containers">

	<!-- Student Attendance Table -->
	
		<div class=" custom-card">
			<div class="card-header">
				<h4><i class="las la-user"></i> Student Attendance</h4>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead class="dataTableHead">
						<tr>
							<th>Roll No</th>
							<th>Name</th>
							<th>Mark</th>
						</tr>
					</thead>
						<tbody class="dataTableBody">
			<?php if (isset($students)) { ?>
				<?php foreach ($students as $row) { ?>
					<tr>
						<td><?php echo $row->Rollno; ?></td>
						<td><?php echo $row->Name; ?></td>
						<td><?php $mark = 'Present';
							if (isset($details)) {
								foreach ($details as $key) {
									if ($key->Rollno == $row->Rollno) {
										if ($key->onLeave == false) {
											$mark = 'Absent';
										} else {
											if ($key->onLeave == true) {
												$mark = 'On Leave';
											}
										}
									}
								}
							}
							echo $mark;
							?></td>
					</tr>
					<?php
				}
			} ?>
			</tbody>
				</table>
				<button class="form-submit" id="export">Export to CSV</button>
			</div>
		</div>
	

	<!-- Class Attendance Summary Table -->
	
		<div class="custom-card">
			<div class="card-header">
				<h4><i class="las la-calendar"></i> <?php echo date('d F, Y'); ?></h4>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
					<thead class="dataTableHead">
						<tr>
							<th>Class</th>
							<th>Absent</th>
							<th>On Leave</th>
							<th>Present</th>
							<th>TT</th>
						</tr>
					</thead>
					<tbody class="dataTableBody">
						<?php
						$current_date = date('Y-m-d'); // Current Date
						if (isset($attendance_details)) { ?>
							<?php foreach ($attendance_details as $att) {
								if ($att->Date == $current_date) { // Filter only today's attendance ?>

									<tr>
										<td><?php echo $att->Class; ?></td>
										<td><?php echo $att->Absent; ?></td>
										<td><?php echo $att->onLeave; ?></td>
										<td><?php echo $att->Present; ?></td>
										<td><?php echo $att->Strength; ?></td>
									</tr>
									<?php
								}
							}
						} ?>
					</tbody>
				</table>
			</div>
		</div>


</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script type="text/javascript">
	// Export CSV Function
	function download_csv(csv, filename) {
		var csvFile = new Blob([csv], { type: "text/csv" });
		var downloadLink = document.createElement("a");
		downloadLink.download = filename;
		downloadLink.href = window.URL.createObjectURL(csvFile);
		downloadLink.style.display = "none";
		document.body.appendChild(downloadLink);
		downloadLink.click();
	}

	function export_table_to_csv(html, filename) {
		var csv = [];
		var rows = document.querySelectorAll("table tr");

		for (var i = 0; i < rows.length; i++) {
			var row = [], cols = rows[i].querySelectorAll("td, th");
			for (var j = 0; j < cols.length; j++)
				row.push(cols[j].innerText);
			csv.push(row.join(","));
		}

		download_csv(csv.join("\n"), filename);
	}

	document.querySelector("#export").addEventListener("click", function () {
		var html = document.querySelector("table").outerHTML;
		export_table_to_csv(html, "table.csv");
	});
</script>



<?php $this->view('footer'); ?>