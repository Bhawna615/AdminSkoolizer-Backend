<?php $this->view('header') ?>

<style>
	body {
		background: #f4f4f9;
		font-family: Arial, sans-serif;
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: max-content;
	}

	.exam-card {
		background: rgba(255, 255, 255, 0.9);
		backdrop-filter: blur(10px);
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(255, 255, 255, 0.3);
		border-radius: 12px;
		padding: 20px;
		width: 90%;
		max-width: 600px;
		opacity: 0;
		transform: translateY(30px);
		animation: fadeIn 0.6s ease-out forwards;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(30px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.details {
		font-weight: bold;
		margin-top: 10px;
	}

	.form-input,
	.form-select,
	.message-input-box {
		width: 100%;
		padding: 5px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 8px;
	}

	.form-submit {
		background: #007bff;
		color: white;
		border: none;
		padding: 10px;
		border-radius: 8px;
		cursor: pointer;
		width: 100%;
		transition: 0.3s;
	}

	.form-submit:hover {
		background: #0056b3;
	}

	.
	/* Animated Heading */
	/* .animated-heading {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Nunito-Semibold;
		text-transform: capitalize;
		color: #4F6476;
		font-size: 20px;
		margin-bottom: 20px;
		animation: slideDown 1s ease-in-out;
	}

	.animated-heading i {
		font-size: 24px;
		color: #6C63FF;
		margin-right: 8px;
		animation: bounce 1.5s infinite ease-in-out;
	} */
</style>

<div class="container">
	<div class="exam-card">
		<form method="POST" action="<?php echo site_url('metrics/insert') ?>">
			<div class="col-md-4">
				<p class="details">
					Metric
				</p>
				<input type="text" name="name" class="form-input" value="<?php echo set_value('name') ?>" />
				<?php if (form_error('name')) { ?>
					<?php echo form_error(
						'name',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>'
					)
						?>
				<?php } ?>

				<p class="details">
					Ability
				</p>
				<textarea name="ability" class="message-input-box"><?php echo set_value('ability') ?></textarea>
				<?php if (form_error('ability')) { ?>
					<?php echo form_error(
						'ability',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>'
					)
						?>
				<?php } ?>

				<button type="submit" class="form-submit">Create</button>
			</div>
		</form>
	</div>
</div>
<?php $this->view('footer') ?>