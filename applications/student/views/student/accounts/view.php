<?php $this->view('student/layouts/header') ?>

<style>
    /* Styling for the page */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #EDE8F5;
        margin: 0;
        padding: 0;

    }

    /* Centering the page content */
    .page-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: max-content;
    }

    .page-content {
        padding: 20px;
        max-width: 600px;
        margin: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        text-align: center;
        animation: fadeIn 0.8s ease;
    }

    /* Professional heading styling with animation */
    .page-heading {
        font-size: 2rem;
        font-weight: bold;
        font-family: Nunito-Semibold;
        color: #6C63FF;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 30px;
        position: relative;
        animation: fadeSlideIn 1s ease forwards;
        opacity: 0;
    }

    .page-heading:after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: #6C63FF;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* Buttons aligned center */
    .card-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 15px;
     
    }

    .form-btn {
        background-color: #6C63FF;
        color: #fff;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        font-size: 0.9rem;
        font-family: Nunito-Semibold;
    }

    .form-btn:hover {
        background-color: #403D9F;
        text-decoration: none;
    }

    /* Bootstrap card styling */
    .card {
        border: 1px solid #ddd;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        background: #F7F9FC;
    }

    .card-title {
        font-size: 1.2rem;
        color: #333;
        text-transform: capitalize;
        font-family: Nunito-Semibold;
    }

    /* Floating button styling */
    .float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #6C63FF;
        color: white;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .float:hover {
        transform: scale(1.1);
    }

    /* Fade-in animation for content */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Fade-in and slide animation for heading */
    @keyframes fadeSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .alert {
        display: flex;
        justify-content: center;
        align-items: center;

    }
   
   
</style>

<div class="page-wrapper">
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="las la-exclamation-triangle me-2"></i>
                        <div><?php echo $this->session->flashdata('error'); ?></div>
                    </div>
                    <?php $this->session->unset_userdata('error'); ?>
                <?php } ?>

                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="las la-check-square me-2"></i>
                        <div><?php echo $this->session->flashdata('success'); ?></div>
                    </div>
                    <?php $this->session->unset_userdata('success'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 page-content">
        <!-- Page heading with animation -->
        <h2 class="page-heading">📚 Manage Accounts</h2>

        <!-- Account cards -->
        <?php if (isset($accounts)) { ?>
            <?php foreach ($accounts as $account) { ?>
                <div class="card">
                    <p class="card-title">
                        <?php echo $account->Name ?> | Class: <?php echo $account->Class ?>
                    </p>
                    <div class="card-buttons">
                        <a href="<?php echo site_url('student/switchAccount/') . $account->other_student_id ?>"
                            class="form-btn">
                            Switch
                        </a>
                        <a href="<?php echo site_url('student/removeAccount/') . $account->other_student_id ?>"
                            class="form-btn">
                            Remove
                        </a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="text-muted">No accounts to display. Add a new one using the button below!</p>
        <?php } ?>

        <!-- Add account button -->
        <form method="POST" action="<?php echo site_url('student/addAccount'); ?>">
            <button title="Add Account" class="float" style="border: none;">
                <i class="material-icons" style="font-size: 30px; position: relative; top: 3px; color: #fff;">
                    add
                </i>
            </button>
        </form>
    </div>
</div>

<?php $this->view('student/layouts/footer') ?>