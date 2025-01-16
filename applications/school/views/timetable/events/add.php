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
		<form method="POST" action="<?php echo site_url('event/insert') ?>">
			<div class="col-md-4">
				<p class="details">Name</p>
				<input
					type="text"
					class="form-input"
					name="name"
					value="<?php echo set_value('name') ?>"
				/>
				<?php if (form_error('name')) { ?>
					<?php echo form_error('name',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>
				<p class="details">Description</p>
				<textarea name="description" class="form-ta" rows="6"><?php echo set_value('description') ?></textarea>
				<?php if (form_error('description')) { ?>
					<?php echo form_error('description',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">Date</p>
				<input
					type="date"
					class="form-input"
					name="date"
				/>
				<?php if (form_error('date')) { ?>
					<?php echo form_error('date',
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
<?php $this->view('footer') ?>
