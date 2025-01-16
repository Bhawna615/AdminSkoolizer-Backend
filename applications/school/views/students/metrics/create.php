<?php $this->view('header') ?>
<div class="innerview">
	<form method="POST" action="<?php echo site_url('metrics/insert') ?>">
		<div class="col-md-4">
			<p class="details">
				Metric
			</p>
			<input
					type="text"
					name="name"
					class="form-input"
					value="<?php echo set_value('name') ?>"
			/>
			<?php if (form_error('name')) { ?>
				<?php echo form_error('name',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">
				Ability
			</p>
			<textarea name="ability" class="message-input-box"><?php echo set_value('ability') ?></textarea>
			<?php if (form_error('ability')) { ?>
				<?php echo form_error('ability',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">
				Class
			</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $class) { ?>
						<option><?php echo $class->Classname ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<button type="submit" class="form-submit">Create</button>
		</div>
	</form>
</div>
<?php $this->view('footer') ?>
