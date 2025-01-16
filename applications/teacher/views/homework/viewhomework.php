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


	<div id="table-view">

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('homework/display') ?>')
	});

</script>

<script type="text/javascript">
	function myFunction(id) {
		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('homework/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer') ?>
