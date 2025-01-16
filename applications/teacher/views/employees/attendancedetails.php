<?php $this->view('header'); ?>
	<div class="col-md-12 innerview">
		<table class="table table-responsive">
			<thead class="dataTableHead">
			<tr>
				<th>Employee Id</th>
				<th>Name</th>
				<th>Mark</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (isset($employees)) { ?>
				<?php foreach ($employees as $row) { ?>
					<tr>
						<td><?php echo $row->id; ?></td>
						<td><?php echo $row->empname; ?></td>
						<td>
							<?php $mark = 'Present';
								if (isset($details)) {
									foreach ($details as $key) {
										if ($key->empid == $row->id) {
											$mark = 'Leave';
										}
									}
								}
							echo $mark; ?>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
		<button class="form-submit" id="export">Export to CSV</button>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>">
	</script>
	<script type="text/javascript">
		function download_csv(csv, filename) {
			var csvFile;
			var downloadLink;

			// CSV FILE
			csvFile = new Blob([csv], {type: "text/csv"});

			// Download link
			downloadLink = document.createElement("a");

			// File name
			downloadLink.download = filename;

			// We have to create a link to the file
			downloadLink.href = window.URL.createObjectURL(csvFile);

			// Make sure that the link is not displayed
			downloadLink.style.display = "none";

			// Add the link to your DOM
			document.body.appendChild(downloadLink);

			// Lanzamos
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

			// Download CSV
			download_csv(csv.join("\n"), filename);
		}

		document.querySelector("#export").addEventListener("click", function () {
			var html = document.querySelector("table").outerHTML;
			export_table_to_csv(html, "table.csv");
		});
	</script>
<?php $this->view('footer'); ?>
