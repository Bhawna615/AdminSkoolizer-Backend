<?php $this->view('header'); ?>

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
		
		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}
</style>



<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..." />
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div id="loading-spinner">
	<!-- <img src="https://cdn-icons-png.flaticon.com/128/189/189792.png" alt="Loading..." width="50"
							height="50"> -->
	<div class="spinner"></div>
</div>
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


	<div class="col-md-12 filter-bar">
		<p class="filter-enable"><input type="checkbox" class="custom-checkbox" id="filter-check"> Enable Filter</p>
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
		<div class="col-md-4">

		</div>
		<div class="col-md-4">

		</div>
	</div>
	<?php if (form_error('period')) { ?>
		<?php echo form_error(
			'period',
			'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
			'</div>'
		)
			?>
	<?php } ?>
	<?php if (form_error('lastdate')) { ?>
		<?php echo form_error(
			'lastdate',
			'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
			'</div>'
		)
			?>
	<?php } ?>
	<div id="table-view">

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('fee/displayStudent') ?>')
	});

	$('.filter').on('change', function () {
		if ($('#filter-check').is(':checked')) {
			$('#table-view').load('<?php echo site_url('fee/filterStudent/') ?>' + $('#class').val())
		}
	});
	$('#filter-check').on('change', function () {
		if (this.checked) {
			$('#table-view').load('<?php echo site_url('fee/filterStudent/') ?>' + $('#class').val())
		} else {
			$('#table-view').load('<?php echo site_url('fee/displayStudent') ?>')
		}
	});
</script>

<script type="text/javascript">
	$(document).ready(function () {
		// Show the loading spinner initially
		$('#loading-spinner').show();
		$('.innerview').hide(); // Hide page content

		// Load table content
		$('#table-view').load('<?php echo site_url('fee/displayStudent') ?>', function () {
			// When the table content is completely loaded, hide the spinner and show the content
			$('#loading-spinner').hide();
			$('.innerview').fadeIn();
		});

		// Handle filter change event
		$('.filter').on('change', function () {
			if ($('#filter-check').is(':checked')) {
				$('#loading-spinner').show();
				$('#table-view').load('<?php echo site_url('fee/filterStudent/') ?>' + $('#class').val(), function () {
					$('#loading-spinner').hide();
				});
			}
		});

		// Handle filter checkbox change
		$('#filter-check').on('change', function () {
			$('#loading-spinner').show();
			if (this.checked) {
				$('#table-view').load('<?php echo site_url('fee/filterStudent/') ?>' + $('#class').val(), function () {
					$('#loading-spinner').hide();
				});
			} else {
				$('#table-view').load('<?php echo site_url('fee/displayStudent') ?>', function () {
					$('#loading-spinner').hide();
				});
			}
		});
	});
</script>

<?php $this->view('footer'); ?>