<?php $this->view('header') ?>

<style>
    .innerview{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: max-content;
        width: 100%;
        background-color: #fff;
       

}


</style>
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
           <?php if ($this->session->flashdata('password')) { ?>
            <div class="col-md-12 col-lg-12 success-bar">
                <i class="las la-check-square"></i>
                <?php echo "Kindly note down the password: ".$this->session->flashdata('password') ?>
                <?php $this->session->unset_userdata('password') ?>
            </div>
        <?php } ?>
	</div>

	<div id="table-view">

	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#table').DataTable({
			"order": [[ 2, "desc" ]],
			responsive: true
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('student/display') ?>')
	});

</script>
<?php $this->view('footer') ?>
