<?php $this->view('student/layouts/header') ?>
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
<div class="col-xs-12 page-content">
    <div class="col-xs-12 message-list-container">
        <?php if (empty($leaveRequests)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($leaveRequests)) { ?>
            <?php foreach ($leaveRequests as $request) { ?>
                <div class="col-xs-12 message-container">
                    <div class="col-xs-12 message">
                        <p><?php echo $request->date ?></p>
                        <p><?php echo $request->reason ?></p>
                        <p><?php if($request->status) { echo "Approved"; } else { echo "Unapproved"; } ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
    <form method="POST" action="<?php echo site_url('LeaveRequest/add'); ?>">
            <button title="Compose" class="float" style="border: none;">
                <i class="material-icons" style="font-size: 30px; position: relative; top: 3px; color: #fff;">
                    create
                </i>
            </button>
    </form>

<?php $this->view('student/layouts/footer') ?>