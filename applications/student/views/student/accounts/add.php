<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="message">

    </div>
    <div class="col-md-12">
        <form method="POST" action="<?php echo site_url('student/auth') ?>">
            <input type="text" placeholder="Admission Number" name="admission_number" class="form-input"/>
            <input type="password" name="password" placeholder="Password" class="form-input" />
            <button class="form-btn-2">Add Account</button>
        </form>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>