<?php $this->view('header'); ?>
<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="col-md-12" style="padding: 30px;">
	<form id="msgForm" method="POST" action="<?php echo site_url('message/send'); ?>" enctype="multipart/form-data">
		<div class="col-md-4">
			<p class="details">Message</p>
			<textarea name="message" rows="5" placeholder="Write here..." class="message-input-box"></textarea>
			<?php if (form_error('message')) { ?>
				<?php echo form_error('message',
						'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
						'</div>')
				?>
			<?php } ?>

			<p class="details">Attach File (Optional)</p>
			<input type="file" name="file" id="file" class="form-input">
		</div>

		<div class="col-md-12" style="margin-top: 30px;">
			<p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select
				Recipients</p>
			<p style="font-family: Nunito_regular; font-size: 18px; color: black;"><input type="checkbox" name="" id="selectall" value="">
				Select All</p>
				<div class="col-md-12" style="margin-bottom: 30px;">
					<div class="col-md-12">
						<table class="table table-responsive table-bordered">
							<thead class="dataTableHead">
								<tr>
									<th>Select</th>
									<th>Roll No.</th>
									<th>Name</th>
								</tr>
							</thead>
							<tbody class="dataTableBody">
							<?php foreach ($recipients as $row) { ?>
									<tr>
										<td>
											<input type="checkbox" name="id[]" class="<?php echo $row->Class; ?>"
												   value="<?php echo $row->id; ?>">
											<?php if (form_error('id[]')) { ?>
												<?php echo form_error('id[]',
														'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
														'</div>')
												?>
											<?php } ?>
										</td>
										<td><?php echo $row->Rollno; ?></td>
										<td><?php echo $row->Name; ?></td>
									</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">send</i></button>
	</form>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<?php foreach ($classes as $row) { ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#<?php echo $row->Classname; ?>").click(function () {
				if (this.checked) {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', true);
					})
				} else {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', false);
					})
				}
			});
		});

	</script>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#selectall").click(function () {
			if (this.checked) {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', true);
				})
			} else {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', false);
				})
			}
		});
	});
</script>
<script>
  const form = document.getElementById("msgForm");
  form.addEventListener("submit", () => {
    document.querySelector(".loader").classList.remove("hidden");
    document.getElementById("loader-message").innerText = "Uploading File & Submitting Message...";
  });
</script>
<?php $this->view('footer'); ?>
