<!DOCTYPE html>
<html lang="en">
<head>
	<title>Attendance by Month</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
</head>
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

	th {
		background: #EBEBEC;
		font-family: Nunito-Semibold;
		text-transform: uppercase;
		color: black;
		border-right: 1px solid;
		border-color: #C5C5C5;
		text-align: center;

	}

	td {
		border: 1px solid;
		border-color: #C5C5C5;
		font-family: Nunito;

	}

	.details {
		font-family: Questrial-Regular;
		font-size: 20px;
	}
</style>
<body>
<div class="col-md-12" style="padding: 30px;">
	<div class="col-xs-12 school-name-container">
		<div class="school-logo-container">
			<img
					src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
					class="school-logo"
					alt="School Logo"
			/>
		</div>
		<p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
		<p class="school-address"><?php echo $this->config->item('schoolAddress') ?></p>
	</div>
	<p align="center" style="font-family: Nunito-Semibold; font-size: 25px;">ATTENDANCE SHEET</p>
	<p class="details">Class: <?php echo $class; ?></p>
	<p class="details">Month: <?php $date = "0000" . "-" . $month . "-" . "26";
		$mname = date('F', strtotime($date));
		echo $mname; ?></p>
	<p class="details">YEAR: <?php echo date("Y"); ?></p>
	<table class="table table-responsive">
		<tr>
			<th>Rollno</th>
			<th>Name</th>
			<?php $days = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
			for ($i = 1; $i <= $days; $i++) { ?>
				<th><?php echo $i;
					echo " ";
					$day = date('Y') . "-" . $month . "-" . $i;
					echo date('D', strtotime($day)); ?></th>
			<?php } ?>
		</tr>
		<?php foreach ($students as $key) { ?>
			<tr>
				<td><?php echo $key->Rollno; ?></td>
				<td><?php echo $key->Name; ?></td>

				<?php for ($i = 1;
				$i <= $days;
				$i++) { ?>
				<td>


					<?php foreach ($absents as $row) {
						$date = date('j', strtotime($row->Date));
						if ($date == $i) {
							if ($key->Rollno == $row->Rollno) {
								if ($row->onLeave == true) {
									echo "L";
									$mark = 1;
									break;
								} elseif ($row->onLeave == false) {
									echo "A";
									$mark = 1;
									break;
								}

							}

						}
					}


					foreach ($attendance as $value) {
						$date1 = date('j', strtotime($value->Date));
						if ($date1 == $i) {
							if (!isset($mark)) {
								echo "P";
							}

							break;
						}

					}
					unset($mark);

					} ?>
			</tr>
		<?php } ?>
	</table>

<!--	<button style="background: #f95555; color: white; border: none; font-family: Nunito_regular;padding: 5px 25px 5px 25px;"-->
<!--			id="export">Export to CSV-->
<!--	</button>-->

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
        <script>
            window.onload = function () {
                window.print();
            }
        </script>
    </div>
    </body>
    </html>
