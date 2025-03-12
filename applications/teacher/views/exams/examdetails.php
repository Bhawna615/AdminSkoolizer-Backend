<!-- <div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="col-md-12 innerview">
	<div class="col-md-12">
		<form id="loading" method="POST" action="<?php echo site_url('exam/submit'); ?>">
			<div class="col-md-4">
				<input
						type="hidden"
						name="class"
						class="form-input"
						value="<?php echo $class; ?>"
				/>

				<p class="details">Subject</p>
				<select name="subject" class="form-select">
					<?php if (isset($subjects)) { ?>
						<?php foreach ($subjects as $row) { ?>
							<option><?php echo $row->Subjectname; ?></option>
						<?php } ?>
					<?php } ?>
				</select>

				<p class="details">Exam Type</p>
				<select name="type" class="form-select">
					<option>Daily Revision Test</option>
					<option>Monthly Examination</option>
					<option>Class Test</option>
					<option>Unit-1</option>
					<option>Term-1</option>
					<option>Unit-2</option>
					<option>Term-2</option>
					<option>Annual Examination-Theory</option>
					<option>Annual Examination-Practical</option>
					<option>Pre-Boards</option>
				</select>

				<p class="details">Maximum Marks</p>
				<input
						type="number"
						name="marks"
						class="form-input"
				/>
				<?php if (form_error('marks')) { ?>
					<?php echo form_error(
						'marks',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>'
					)
						?>
				<?php } ?>

				<p class="details">Date</p>
				<input
						type="date"
						id="datepicker"
						name="date"
						class="form-input"
						value="<?php echo date('Y-m-d'); ?>"
				/>
				<?php if (form_error('date')) { ?>
					<?php echo form_error(
						'date',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>'
					)
						?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">Topic</p>
				<textarea name="topic" class="message-input-box"></textarea>
				<?php if (form_error('topic')) { ?>
					<?php echo form_error(
						'topic',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>'
					)
						?>
				<?php } ?>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-12">
				<input type="submit" name="" value="Add" class="form-submit">
			</div>
		</form>
	</div>
</div>
<script>
	document.getElementById('loading').onsubmit = function () {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating New Exam..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";
		loaderMessage.innerText = "Sending Notifications..."
	}
</script> -->

















<?php $this->view('header') ?>
<style>
	body {
		background: #f4f4f9;
		font-family: Arial, sans-serif;
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: max-content;
	}

	.exam-card {
		background: rgba(255, 255, 255, 0.9);
		backdrop-filter: blur(10px);
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(255, 255, 255, 0.3);
		border-radius: 12px;
		padding: 20px;
		width: 90%;
		max-width: 600px;
		opacity: 0;
		transform: translateY(30px);
		animation: fadeIn 0.6s ease-out forwards;
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

	.details {
		font-weight: bold;
		margin-top: 10px;
	}

	.form-input,
	.form-select,
	.message-input-box {
		width: 100%;
		padding: 5px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 8px;
	}

	.form-submit {
		background: #007bff;
		color: white;
		border: none;
		padding: 10px;
		border-radius: 8px;
		cursor: pointer;
		width: 100%;
		transition: 0.3s;
	}

	.form-submit:hover {
		background: #0056b3;
	}

	.
	/* Animated Heading */
	/* .animated-heading {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Nunito-Semibold;
		text-transform: capitalize;
		color: #4F6476;
		font-size: 20px;
		margin-bottom: 20px;
		animation: slideDown 1s ease-in-out;
	}

	.animated-heading i {
		font-size: 24px;
		color: #6C63FF;
		margin-right: 8px;
		animation: bounce 1.5s infinite ease-in-out;
	} */
</style>
<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="container">
	<!-- <div class="animated-heading">
		<i class="las la-calendar-alt"></i> 
		Create New Exam
	</div> -->
	<div class="exam-card">
		<form id="loading" method="POST" action="<?php echo site_url('exam/submit'); ?>">
			<p class="details">Subject</p>
			<select name="subject" class="form-select">
				<?php if (isset($subjects)) { ?>
					<?php foreach ($subjects as $row) { ?>
						<option><?php echo $row->Subjectname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>

			<p class="details">Exam Type</p>
			<select name="type" class="form-select">
				<option>Daily Revision Test</option>
				<option>Monthly Examination</option>
				<option>Class Test</option>
				<option>Unit-1</option>
				<option>Term-1</option>
				<option>Unit-2</option>
				<option>Term-2</option>
				<option>Annual Examination-Theory</option>
				<option>Annual Examination-Practical</option>
				<option>Pre-Boards</option>
			</select>

			<p class="details">Maximum Marks</p>
			<input type="number" name="marks" class="form-input" />

			<p class="details">Date</p>
			<input type="date" name="date" class="form-input" value="<?php echo date('Y-m-d'); ?>" />

			<p class="details">Topic</p>
			<textarea name="topic" class="message-input-box"></textarea>

			<input type="submit" value="Add" class="form-submit">
		</form>
	</div>
</div>


<script>
	document.getElementById('loading').onsubmit = function () {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating New Exam..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";
		loaderMessage.innerText = "Sending Notifications..."
	}
</script>

<?php $this->view('footer'); ?>