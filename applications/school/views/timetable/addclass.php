<?php $this->view('header'); ?>

<div class="col-md-12 innerview">
	<div class="col-md-12">
		<form method="POST" action="<?php echo site_url('classs/insert'); ?>">
			<div class="col-md-4">
				<p class="details">
					Name
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
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-12">
				<button type="submit" class="form-submit">Add</button>
			</div>
		</form>
	</div>
</div>

<?php $this->view('footer'); ?>
