<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
	<style type="text/css">
		@font-face {
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}

		@font-face {
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}

	</style>
</head>
<body>
	<div class="col-md-12 innerview">
		<table class="table table-responsive table-bordered">
			<thead class="dataTableHead">
		
    			 <tr>
                    <th colspan="100%" style="text-align: center">KK Blossoms School, Solan</th>
                </tr>
                <tr>
                     <th colspan="100%" style="text-align: center">Class: <?php echo $details->Class;  ?></th>
                </tr>
                <tr>
                     <th colspan="100%" style="text-align: center"><?php echo $details->Examtype." Examination"; ?></th>
                </tr>
            
			<tr>
				<th>Examcode</th>
				<th>Rollno</th>
				<th>Name</th>
				<th>Marks</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (isset($result)) { ?>
				<?php foreach ($result as $row) { ?>
					<tr>
					    <td><?php echo $row->Examcode ?></td>
						<td><?php echo $row->Rollno; ?></td>
						<td><?php echo $row->Name; ?></td>
						<td><?php echo $row->Marksobtained; ?></td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
		<button class="form-submit" id="export">Export
			to CSV
		</button>
	</div>

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

</body>
</html>
