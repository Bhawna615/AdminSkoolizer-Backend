<?php $this->view('header') ?>
<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="col-md-12 innerview">
	<form id="postForm" method="POST" enctype="multipart/form-data" action="<?php echo site_url('post/save') ?>">
		<div class="col-md-4">

			<p class="details">
				Text
			</p>
			<textarea name="text" class="message-input-box"><?php echo set_value('name') ?></textarea>
			<?php if (form_error('text')) { ?>
				<?php echo form_error('text',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">
				File
			</p>
			<input
					type="file"
					name="file"
					id="file"
					class="form-input"
			/>
			<p class="details">
				Recipient Group
			</p>
			<select name="recipient_group" id="class" class="form-select">
				<option value="school">School</option>
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $class) { ?>
						<option><?php echo $class->Classname ?></option>
					<?php } ?>
				<?php } ?>
			</select>

			<button type="submit" class="form-submit">Create</button>
		</div>
		<div class="col-md-4">

		</div>
		<div class="col-md-4">

		</div>

	</form>
</div>

<script>
	const form = document.getElementById("postForm");
	form.addEventListener("submit", () => {
		document.querySelector(".loader").classList.remove("hidden");
		document.getElementById("loader-message").innerText = "Uploading File & Submitting Post...";
	});
</script>
<?php $this->view('footer') ?>
