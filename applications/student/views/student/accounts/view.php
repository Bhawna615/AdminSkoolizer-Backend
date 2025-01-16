<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
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
    </div>
    <?php if(isset($accounts)) { ?>
        <?php foreach($accounts as $account) {?>
            <div class="col-md-12 card">
                <p class="card-title"><?php echo $account->Name ?> Class: <?php echo $account->Class ?></p> 
                    <a href="<?php echo site_url('student/switchAccount/').$account->other_student_id ?>" class="form-btn">Switch</a>
                    <a href="<?php echo site_url('student/removeAccount/').$account->other_student_id ?>" class="form-btn">Remove</a>
                
            </div>
        <?php } ?>
    <?php } ?>

    <form method="POST" action="<?php echo site_url('student/addAccount'); ?>">
            <button title="Compose" class="float" style="border: none;">
                <i class="material-icons" style="font-size: 30px; position: relative; top: 3px; color: #fff;">
                    add
                </i>
            </button>
    </form>
</div>
<?php $this->view('student/layouts/footer') ?>