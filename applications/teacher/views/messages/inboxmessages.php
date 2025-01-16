<?php $this->view('header'); ?>
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
	<form method="POST" action="<?php echo site_url('sms/reason'); ?>">
		<button title="Compose" class="float" style="border: none;"><i class="material-icons"
																	   style="font-size: 30px; position: relative; top: 3px; color: #fff;">create</i>
		</button>
	</form>
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Number</th>
			<th>Message</th>
			<th>Date/Time</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php
		if (isset($response)) {
		$obj = json_decode(json_encode($response), true);
		echo "<br>";
		foreach ($obj['messages'] as $value) { ?>
			<tr>
				<td><?php echo $value['number']; ?></td>
				<td><?php echo $value['content']; ?></td>
				<td><?php echo $value['datetime']; ?></td>
				<td><?php echo $value['status']; ?></td>
			</tr>
		<?php } ?>
		<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[2, "desc"]],
			responsive: true,
		});
	});
</script>
<?php $this->view('footer'); ?>
