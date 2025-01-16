<?php $this->view('student/layouts/header') ?>

<div class="col-md-12 col-xs-12">
    <div>
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
    <div class="col-md-12 col-xs-12">
        <img src="" />
    </div>
    <div class="col-md-12 col-xs-12">
        <?php if (isset($student)) { ?>
        <a href="<?php echo site_url('student/changePassword') ?>">Change Password </a>
            <p class="profile-page-heading">BIO DATA</p>
            <p class="profile-input-heading">NAME</p>
            <input type="text" value="<?php echo $student->Name ?>" class="profile-input">
            <p class="profile-input-heading">CLASS</p>
            <input type="text" value="<?php echo $student->Class ?>" class="profile-input">
            <p class="profile-input-heading">ROLL NO.</p>
            <input type="text" value="<?php echo $student->Rollno ?>" class="profile-input">
            <p class="profile-input-heading">FATHER'S NAME</p>
            <input type="text" value="<?php echo $student->Fname ?>" class="profile-input">
            <p class="profile-input-heading">MOTHER'S NAME</p>
            <input type="text" value="<?php echo $student->Mname ?>" class="profile-input">
            <p class="profile-input-heading">EMAIL</p>
            <input type="text" value="<?php echo $student->Email ?>" class="profile-input">
            <p class="profile-input-heading">ADDRESS</p>
            <input type="text" value="<?php echo $student->Address ?>" class="profile-input">
            <p class="profile-input-heading">CONTACT NUMBER</p>
            <input type="text" value="<?php echo $student->Contact ?>" class="profile-input">
            <p class="profile-input-heading">SMS NUMBER</p>
            <input type="text" value="<?php echo $student->Smsno ?>" class="profile-input">
            <p class="profile-input-heading">DATE OF BIRTH</p>
            <input type="text" value="<?php echo $student->Dob ?>" class="profile-input">
            <p class="profile-input-heading">ADMISSION NUMBER</p>
            <input type="text" value="<?php echo $student->Admno ?>" class="profile-input">
            <p class="profile-input-heading">TRANSPORT FACILITY</p>
            <input type="text" value="" class="profile-input">
            <p class="profile-input-heading">HOUSE</p>
            <input type="text" value="<?php echo $student->House ?>" class="profile-input">
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
