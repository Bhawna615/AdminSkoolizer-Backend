<?php $this->view('header') ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('question/save') ?>">
		<div class="col-md-4">
			<p class="details">
				Content
			</p>
			<textarea name="content" class="message-input-box"><?php echo set_value('content') ?></textarea>
			<?php if (form_error('content')) { ?>
				<?php echo form_error('content',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">
				Weightage
			</p>
			<input
					type="text"
					name="weightage"
					class="form-input"
					value="<?php echo set_value('weightage') ?>"
			/>
			<?php if (form_error('weightage')) { ?>
				<?php echo form_error('weightage',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<p class="details">
				Class
			</p>
			<select name="class" id="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $class) { ?>
						<option><?php echo $class->Classname ?></option>
					<?php } ?>
				<?php } ?>
			</select>

			<p class="details">
				Subject
			</p>
			<select name="subject" id="subject" class="form-select">
			</select>
			<?php if (form_error('subject')) { ?>
				<?php echo form_error('subject',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

		</div>
		<div class="col-md-4">

		</div>
		<div class="col-md-12">
			<button type="submit" class="form-submit">Add</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$.ajax(
				{
					url: '<?php echo site_url("timetable/getsubjectsbyclass/") ?>' + $('#class').val(),
					success: function (result) {
						$('#subject').append(result);
					}
				}

		)
	});

	$('#class').on('change', function() {
		$('#subject').empty()
		$.ajax(
				{
					url: '<?php echo site_url("timetable/getsubjectsbyclass/") ?>' + $(this).val(),
					success: function (result) {
						$('#subject').append(result);
					}
				}

		)
	});
</script>
<?php $this->view('footer') ?>
