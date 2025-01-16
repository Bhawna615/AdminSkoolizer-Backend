<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('employee/insert') ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">Name</p>
				<input
						type="text"
						name="name"
						class="form-input"
						value="<?php echo set_value("name") ?>"
				/>
				<?php if (form_error('name')) { ?>
					<?php echo form_error('name',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">Post</p>
				<input
						type="text"
						name="post"
						class="form-input"
						value="<?php echo set_value("post") ?>"
				/>
				<?php if (form_error('post')) { ?>
					<?php echo form_error('post',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-4">

			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="form-submit">Add</button>
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
