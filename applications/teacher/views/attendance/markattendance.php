<!-- <div class="col-md-12 innerview">
	<p class="headings"><?php echo date('d F,Y'); ?></p>
	<form method="POST" action="<?php echo site_url('attendance/getrollcall') ?>">
		<div class="col-md-4">
			<p class="headings">Select a Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<button type="submit" class="form-submit">Mark</button>
		</div>
	</form>
</div> -->



<?php $this->view('header'); ?>

<style>
    body {
        background:#fff; /* Light Blue Background */
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        min-height: 100vh;
		text-align: center;
    }

    .exam-card {
        background: rgba(240, 255, 240, 0.9); /* Light Green Glass Effect */
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 20px;
        width: 90%;
        max-width: 500px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeIn 0.6s ease-out forwards;
		height: max-content;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .headings {
        font-weight: bold;
        margin-top: 10px;
    }

    .form-select {
        width: 100%;
        padding: 4px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .form-submit {
        background: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        transition: 0.3s;
    }

    .form-submit:hover {
        background: #388E3C;
    }
</style>

<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
</script>
<div class="container">
	<div class="exam-card">
		<div class="message col-md-12">
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
		<form method="POST" action="<?php echo site_url('attendance/getrollcall') ?>">
			<div class="col-md-4">
				<p class="headings">Select a Date</p>
				<input type="text" id="my_date_picker" name="date" placeholder="dd-mm-yyyy" class="form-input"
					value="<?php echo date('d-m-Y'); ?>" />
				<!-- <p class="headings">Select a Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select> -->
			</div>
			<div class="col-md-12" style="margin-top: 40px;">
				<button type="submit" class="form-submit">Mark</button>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {

		$(function () {
			$("#my_date_picker").datepicker({ dateFormat: 'dd-mm-yy' });
		});
	})
</script>
<?php $this->view('footer'); ?>