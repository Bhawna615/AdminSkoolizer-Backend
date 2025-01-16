<?php $this->view('header.php'); ?>
<div class="col-md-12 innerview">
	<div class="col-md-6">
		<div id="scan-status">

		</div>
		<form method="POST" action="<?php echo site_url('movement/store') ?>" id="movement-form">
			<?php if (isset($movement)) { ?>
				<input
						type="hidden"
						name="movement"
						value="<?php echo $movement ?>"
				/>
			<?php } ?>
			<?php if (form_error('qrcode')) { ?>
				<?php echo form_error('qrcode',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>
			<input
					type="text"
					name="qrcode"
					id="qrcode"
					class="qrcode-input"
					onended="submit()"
					style="background: url(<?php echo base_url('assets/gif/scan.gif') ?>)"
					onfocusout="toggleStatus(0)"
					onfocusin="toggleStatus(1)"
					autocomplete="off"
			/>

			<div class="scan-result">
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

		</form>
	</div>

	<div class="col-md-6">
		<?php if (!empty($mostRecentMovement)) { ?>
			<div class="col-md-4">
				<img
						src="<?php echo base_url('assets/images/students/') . $mostRecentMovement->image ?>"
						class="icon"/>
			</div>
			<div class="col-md-8">
				<p class="profile-heading">Name</p>
				<p class="profile-info"><?php echo $mostRecentMovement->name ?></p>
				<p class="profile-heading">Class</p>
				<p class="profile-info"><?php echo $mostRecentMovement->class; ?></p>
				<p class="profile-heading">Roll No.</p>
				<p class="profile-info"><?php echo $mostRecentMovement->roll_no; ?></p>
				<p class="profile-heading">Movement.</p>
				<p class="profile-info"><?php echo $mostRecentMovement->movement; ?></p>
				<p class="profile-heading">Date/Time</p>
				<p class="profile-info"><?php echo $mostRecentMovement->timestamp; ?></p>
			</div>
		<?php } ?>
	</div>
</div>
<audio id="valid-sound" src="<?php echo base_url('assets/audio/valid.mp3') ?>"></audio>
<audio id="invalid-sound" src="<?php echo base_url('assets/audio/invalid.mp3') ?>"></audio>

<script type="text/javascript">
	document.getElementById("qrcode").focus();

	function submit() {
		document.getElementById("movement-form").submit();
	}

	function toggleStatus(scanning) {
		if (scanning) {
			$('#scan-status').html("<p class='scan-status-true'><i class='las la-check-circle'></i> Scanning</p>")
		} else {
			$('#scan-status').html("<p class='scan-status-false'><i class='las la-exclamation-triangle'></i> Not Scanning</p>")
		}

	}
</script>
<script>
	document.getElementById('qrcode').click();
	<?php if ($this->session->flashdata('capture') == 'success') { ?>
	var soundEffect = document.getElementById('valid-sound');
	soundEffect.play();
	<?php } else { ?>
	var soundEffect = document.getElementById('invalid-sound');
	soundEffect.play();
	<?php } ?>

</script>

<?php $this->view('footer.php'); ?>

