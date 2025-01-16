<?php $this->view('header'); ?>
<style>
	input[type = file] {
		border: 1px solid;
		border-color: #A1A1A1;
		font-family: Questrial-Regular;
		outline: none;
		width: 90%;
		margin-bottom: 10px;
	}
</style>
	<div class="col-md-12" style="padding: 30px;">
		<form method="POST" action="<?php echo site_url('transportstaff/insert') ?>" enctype="multipart/form-data">
			<div class="col-md-12">
				<div class="col-md-4">
					<p class="details">
						Name
					</p>
					<input
							type="text"
							name="name"
							class="form-input"
							value="<?php echo set_value('name')?>"
					/>
					<?php if (form_error('name')) { ?>
						<?php echo form_error('name',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">Contact</p>
					<input
							type="number"
							name="contact"
							class="form-input"
							value="<?php echo set_value('contact')?>"
					/>
					<?php if (form_error('contact')) { ?>
						<?php echo form_error('contact',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">Post</p>
					<input
							type="text"
							name="post"
							class="form-input"
							value="<?php echo set_value('post')?>"
					/>
					<?php if (form_error('post')) { ?>
						<?php echo form_error('post',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

				</div>
				<div class="col-md-4">
					<p class="details">
						Address
					</p>
					<input
							type="text"
							name="address"
							class="form-input"
							value="<?php echo set_value('address')?>"
					/>
					<?php if (form_error('address')) { ?>
						<?php echo form_error('address',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<p class="details">
						Image
					</p>
					<input
							type="file"
							name="image"
					/>

					<p class="details">
						Email
					</p>
					<input
							type="text"
							name="email"
							class="form-input"
							value="<?php echo set_value('email')?>"
					/>
					<?php if (form_error('email')) { ?>
						<?php echo form_error('email',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>
				</div>
				<div class="col-md-4">

				</div>
			</div>
			<div class="col-md-12" style="padding: 20px">
				<button type="submit" class="form-submit">Add</button>
			</div>
	

	
</form>
	</div>

<?php $this->view('footer'); ?>
