<?php $this->view('header') ?>
<div class="col-md-12" style="padding: 20px;">
        <?php if($this->session->userdata('usertype')->usertype == "normal_admin") { ?>
                <?php $this->view('dashboard/normal_admin'); ?>
        <?php } elseif($this->session->userdata('usertype')->usertype == "basic_admin") { ?>
                <?php $this->view('dashboard/basic_admin'); ?>
         <?php } elseif($this->session->userdata('usertype')->usertype == "account_admin") { ?>
                <?php $this->view('dashboard/account_admin'); ?>
        <?php } else {?>
                <?php $this->view('dashboard'); ?>
        <?php } ?>
         <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <?php $this->view('footer') ?>
</div>

