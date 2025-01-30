<?php $this->view('student/layouts/header') ?>


<style>

/* Centering the page content */
.page-wrapper {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: max-content;
        width: 100%;
        background-color: #EDE8F5;
    }

    .page-content {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: max-content;
        width: 90%;
        background-color: #ffffff;
        margin: 20px auto;
        border-radius: 10px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        text-align: center;
        animation: fadeIn 0.8s ease;

    }

    /* Animated Heading */
    .animated-heading {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Nunito-Semibold;
        text-transform: capitalize;
        color:#6C63FF;
        font-size: 28px;
        margin-bottom: 25px;
        animation: slideDown 1s ease-in-out;
    }

    .animated-heading i {
        font-size: 30px;
        color: #6C63FF;
        margin-right: 12px;
        animation: bounce 1.5s infinite ease-in-out;
    }


    .message-container{
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background: #F7F9FC;
        border: 1px solid #e3e3e3;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .message-container:hover{
        transform: translateY(-5px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .message-container p{
        font-size: 1.4rem;
        font-family: Nunito-Semibold;
        color: #333;
        letter-spacing: 1px;
    }











    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

</style>








<div class="page-wrapper">
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
    <div class="col-xs-12 page-content">

     <!-- Heading Section -->

     <div class="animated-heading">
     <i class="las la-clipboard"></i>leave Requests

        </div>

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
                            <p><?php if ($request->status) {
                                echo "Approved";
                            } else {
                                echo "Unapproved";
                            } ?></p>
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

</div>

<?php $this->view('student/layouts/footer') ?>