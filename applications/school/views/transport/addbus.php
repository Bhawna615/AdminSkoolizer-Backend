<?php $this->view('header'); ?>
	<div class="col-md-12 innerview">
		<form method="POST" action="<?php echo site_url('bus/insert') ?>">
			<div class="col-md-12">
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

					<p class="details">
						Model
					</p>
					<input
							type="text"
							name="model"
							class="form-input"
							value="<?php echo set_value('model') ?>"
					/>
					<?php if (form_error('model')) { ?>
						<?php echo form_error('model',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Registration No.
					</p>
					<input
							type="text"
							name="regno"
							class="form-input"
							value="<?php echo set_value('regno') ?>"
					/>
					<?php if (form_error('regno')) { ?>
						<?php echo form_error('regno',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
				</div>
				<div class="col-md-4">
					<p class="details">
						No. of seats
					</p>
					<input
							type="text"
							name="seats"
							class="form-input"
							value="<?php echo set_value('seats') ?>"
					/>
					<?php if (form_error('seats')) { ?>
						<?php echo form_error('seats',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Fuel Tank Capcity
					</p>
					<input
							type="text"
							name="capacity"
							class="form-input"
							value="<?php echo set_value('capacity') ?>"
					/>
					<?php if (form_error('capacity')) { ?>
						<?php echo form_error('capacity',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
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
