<?php $this->view('header'); ?>
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
	<form method="POST" action="<?php echo site_url('question/view'); ?>">
		<button title="Create Question" class="float" style="border: none;">
			<i class="material-icons"
			   style="font-size: 30px; position: relative; top: 3px; color: #fff;"
			>create
			</i>
		</button>
	</form>

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
			<p class="filter-title"><i class="las la-filter"></i> Subject</p>
			<select name="subject" id="subject" class="filter">
			</select>
		</div>
		<div class="col-md-4">

		</div>
	</div>
	<div class="form-errors">
		<?php if (form_error('name')) { ?>
			<?php echo form_error('name',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
			?>
		<?php } ?>

		<?php if (form_error('subject')) { ?>
			<?php echo form_error('subject',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
			?>
		<?php } ?>

		<?php if (form_error('questions[]')) { ?>
			<?php echo form_error('questions[]',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
			?>
		<?php } ?>
	</div>
	<div id="table-view">

	</div>
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
<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('assignment/displayQuestions') ?>')
	});

	$('.filter').on('change', function () {
		if ($('#filter-check').is(':checked')) {
			$('#table-view').load('<?php echo site_url('assignment/filterquestions/') ?>' + $('#class').val() + '/' + $('#subject').val())
		}
	});
	$('#filter-check').on('change', function () {
		if(this.checked) {
			$('#table-view').load('<?php echo site_url('assignment/filterquestions/') ?>' + $('#class').val() + '/' + $('#subject').val())
		} else {
			$('#table-view').load('<?php echo site_url('assignment/displayquestions') ?>')
		}
	});
</script>
<?php $this->view('footer'); ?>
