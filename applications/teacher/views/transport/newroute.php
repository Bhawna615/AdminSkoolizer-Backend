<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('route/insert') ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Route Name
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
			<button type="sumbit"
					class="form-submit">
				Add Route
			</button>
		</div>
	</form>
</div>

<?php $this->view('footer'); ?>
