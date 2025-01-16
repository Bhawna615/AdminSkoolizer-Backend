<?php $this->view('header') ?>
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
	<form method="POST" action="<?php echo site_url('quizQuestion/update') ?>">
		<?php if (!empty($question)) { ?>
		<div class="col-md-4">
			<p class="details">Question</p>
			<textarea name="question" class="form-ta"><?php echo $question->question ?></textarea>
			<?php if (form_error('question')) { ?>
				<?php echo form_error('question',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
				?>
			<?php } ?>
			<p class="details">Options</p>
			<textarea name="options" class="form-ta" rows="5"><?php echo $question->options ?></textarea>
			<?php if (form_error('options')) { ?>
				<?php echo form_error('options',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
				?>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<p class="details">Correct Option</p>
			<input
				type="number"
				class="form-input"
				name="correct"
				value="<?php echo $question->correct_option ?>"
				min="1"
			/>
			<?php if (form_error('correct')) { ?>
				<?php echo form_error('correct',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
				?>
			<?php } ?>
		</div>
		<div class="col-md-4">
				<input
					type="hidden"
					name="quizId"
					value="<?php echo $question->quiz_id ?>"
				/>
			<input
				type="hidden"
				name="questionId"
				value="<?php echo $question->id ?>"
			/>
		</div>
		<div class="col-md-12">
			<button type="submit" class="form-submit">Save</button>
		</div>
		<?php } ?>
	</form>
</div>
<?php $this->view('footer') ?>

