<?php $this->view('header') ?>
<div class="loader hidden">
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
					<?php echo form_error('marks',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
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
					<?php echo form_error('date',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">Topic</p>
				<textarea name="topic" class="message-input-box"></textarea>
				<?php if (form_error('topic')) { ?>
					<?php echo form_error('topic',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
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
</script>
<?php $this->view('footer'); ?>
