  <?php $this->view('student/layouts/header') ?>
    <div class="col-md-12 col-xs-12">
        <form method="POST" action="<?php echo site_url('student/updatePassword') ?>">
            <input type="hidden" name="id" value="<?php echo $studentId ?>" />
            <p class="profile-input-heading">Current Password</p>
            <input type="password" name="current_password" class="profile-input">
            <p class="profile-input-heading">New Password</p>
            <input type="password" name="new_password" class="profile-input">
            <p class="profile-input-heading">Confirm New Password</p>
            <input type="password" name="confirm_new_password" class="profile-input">
            <div class=col-md-12>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
    <?php $this->view('student/layouts/footer') ?>
