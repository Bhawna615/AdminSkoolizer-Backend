<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('station/insert') ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Station Name
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
					Morning time
				</p>
				<input
						type="time"
						name="stime"
						class="form-input"
						value="<?php echo set_value('stime') ?>"
				/>
				<?php if (form_error('stime')) { ?>
					<?php echo form_error('stime',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Evening time
				</p>
				<input
						type="time"
						name="etime"
						class="form-input"
						value="<?php echo set_value('etime') ?>"
				/>
				<?php if (form_error('etime')) { ?>
					<?php echo form_error('etime',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<input
						type="hidden"
						name="routeid"
						value="<?php echo $routeid; ?>"
				/>

				<p class="details">
					Total Passengers
				</p>
				<input
						type="number"
						name="total"
						class="form-input"
						value="<?php echo set_value('total') ?>"
				/>
				<?php if (form_error('total')) { ?>
					<?php echo form_error('total',
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
			<input
					type="submit"
					value="Add Station"
					class="form-submit"
			/>
		</div>
	</form>
</div>

<?php $this->view('footer'); ?>
