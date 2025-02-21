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
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico" />
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

	<style>
		#loading-spinner {
			text-align: center;
			background-color: #2C56BB;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

		.spinner{
			border: 16px solid #f3f3f3; /* Light grey */
			border-top: 16px solid #3498db; /* Blue */
			border-radius: 50%;
			width: 80px;
			height: 80px;
			animation: spin 0.8s linear infinite;
		}
		

		#table-view {
			display: none;
			/* Pehle hidden hoga */
		}

		/* img {
			animation: spin 1s linear infinite;
		} */

		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}
	</style>
</head>

<body>
	<div class="col-md-12 top-level-container">
		<div class="col-md-12" style="padding: 0px;">
			<div class="col-md-12" style="padding: 0px;">

				<div class="col-md-12 innerview">
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

					<?php
					$currentYear = date('Y');
					$currentSession = $currentYear . '-' . ($currentYear + 1);
					$sessions = [];
					for ($i = 0; $i < 8; $i++) {
						$startYear = $currentYear - $i;
						$endYear = $startYear + 1;
						$sessions[] = $startYear . '-' . $endYear;
					}

					// Get the session from the query parameter
					$selectedSession = isset($_GET['session']) ? $_GET['session'] : $currentSession;
					?>

					<div id="loading-spinner">
						<!-- <img src="https://cdn-icons-png.flaticon.com/128/189/189792.png" alt="Loading..." width="50"
							height="50"> -->
							<div class="spinner"></div>
					</div>

					<div class="col-md-12 filter-bar">
						<p class="filter-enable"><input type="checkbox" class="custom-checkbox" id="filter-check">
							Enable Filter</p>
						<div class="col-md-4">
							<p class="filter-title"><i class="las la-filter"></i> Year</p>
							<select name="year" id="year" class="filter">
								<option><?php echo date("Y") ?></option>
								<option><?php echo date("Y", strtotime("-1 year")) ?></option>
								<option><?php echo date("Y", strtotime("-2 years")) ?></option>
							</select>
						</div>
						<div class="col-md-4">
							<p class="filter-title"><i class="las la-filter"></i> Month</p>
							<select name="month" id="month" class="filter">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="col-md-4">
							<p class="filter-title"><i class="las la-filter"></i> Class</p>
							<select name="class" id="class" class="filter">
								<?php if (isset($classes)) { ?>
									<?php foreach ($classes as $class) { ?>
										<option><?php echo $class->Classname ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
					</div>


					<div id="table-view">
						<!-- The payments table will be loaded here -->
					</div>

					<script type="text/javascript">
						$(document).ready(function () {
							// Show loader on ajax start
							$(document).ajaxStart(function () {
								$("#loading-spinner").show();
								$("#table-view").hide();
							});

							// Hide loader on ajax stop
							$(document).ajaxStop(function () {
								$("#loading-spinner").hide();
								$("#table-view").show();
							});

							// Load payments for the selected session on page load
							loadPayments();

							// Load payments based on the selected session and class
							function loadPayments() {
								var session = '<?php echo $selectedSession; ?>'; // Use the selected session from the query parameter
								var className = $('#class').val();
								$.ajax({
									url: '<?php echo site_url('fee/filterBySessionAndClass'); ?>',
									type: 'POST',
									data: { session: session, class: className },
									success: function (response) {
										$('#table-view').html(response);
									},
									error: function (xhr, status, error) {
										console.error('Error fetching payments:', error);
									}
								});
							}

							// Existing filter logic
							$('.filter').on('change', function () {
								if ($('#filter-check').is(':checked')) {
									$('#table-view').load('<?php echo site_url('fee/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
								}
							});
							$('#filter-check').on('change', function () {
								if (this.checked) {
									$('#table-view').load('<?php echo site_url('fee/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
								} else {
									$('#table-view').load('<?php echo site_url('fee/display') ?>')
								}
							});
						});
					</script>

					<button
						style="background: #f95555; color: white; border: none; font-family: Nunito_regular;padding: 5px 25px 5px 25px;"
						id="export">Export to CSV
					</button>

					<script type="text/javascript">
						function download_csv(csv, filename) {
							var csvFile;
							var downloadLink;

							// CSV FILE
							csvFile = new Blob([csv], { type: "text/csv" });

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
</body>

</html>