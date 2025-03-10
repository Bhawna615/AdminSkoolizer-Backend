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
        color: #4F6476;
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

    .message-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #F7F9FC;
        gap: 20px;
        border: 1px solid #e3e3e3;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .message-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .message-container p {
        font-size: 1.2rem;
        font-family: Nunito-Semibold;
        color: #333;
    }

    .form-btn {
        background-color: #DC3545;
        color: #fff;
        padding: 15px 20px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        font-size: 1.3rem;
    }

    .form-btn:hover {
        background-color: #403D9F;
        text-decoration: none;
    }

    .form-btn1 {
        background-color: rgb(79, 165, 214);
        color: #fff;
        border: 2px solid #fff;
        padding: 15px 20px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        font-size: 1.3rem;
    }

    .form-btn1:hover {
        background-color: rgb(61, 123, 159);
        text-decoration: none;
    }

    .total-pending-fee {
        font-size: 1.2rem;
        font-family: Nunito-Semibold;
        color: #333;
    }


    .fee-table tr {
        color: black;
    }


    .alert {
        display: flex;
        justify-content: center;
        align-items: center;

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




    /* my accounts */


    /* Centering the page content */


    /* Professional heading styling with animation */

    .accpage-content {
        display: flex;
        flex-direction: column;
        padding: 20px;
        width: 90%;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        text-align: center;
        animation: fadeIn 0.8s ease;
    }

    .acccard {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: max-content;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 5px;
    }

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
        flex-direction: column;
        justify-content: center;
        gap: 5px;
        /* margin-top: 15px; */

    }


    .accform-btn {
        background-color: #6C63FF;
        color: #fff;
        padding: 2px;

        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        /* font-size: 0.5rem; */
        font-family: Nunito-Semibold;
    }

    .accform-btn:hover {
        background-color: #403D9F;
        text-decoration: none;
    }

    /* Bootstrap card styling */
    .card {
        display: flex;
        height: max-content;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
        padding: 20px;
        background: none;
        margin: 0;
        cursor: pointer;

    }

    .card a {
        font-size: 1rem;
    }

    .card-title {
        font-size: 1rem;
        color: #333;
        text-transform: capitalize;
        font-family: Nunito-Semibold;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
    }

    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* margin-bottom: 20px; */
    }

    .profile-wrapper {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        padding: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* background: linear-gradient(45deg, #feda75, #fa7e1e, #d62976, #962fbf, #4f5bd5); */
    }


    /* Floating button styling */
    /* .float {
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
    } */

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

    /* .active {

        border: 4px solid rgb(156, 193, 247);
        position: static;



    } */
    .active {
        border: 4px solid rgb(117, 166, 240);
        padding: 2px;
    }

    /* my accounts */
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




    <div class="page-wrapper">


        <!-- <h3>ACCOUNTS</h3> -->
        <div class="acccard">
            <?php if (isset($accounts) && !empty($accounts)) { ?>
                <?php foreach ($accounts as $index => $account) { ?>
                    <div class="card ">

                        <div class="profile-wrapper <?php echo ($account->id == $this->session->userdata('id')) ? 'active' : ''; ?>"
                            onclick="switchAccount('<?php echo $account->id; ?>')">
                            <img src="<?php echo base_url('assets/images/students/') . $account->image; ?>"
                                class="profile-image" alt="Profile Image">
                        </div>

                        <p class="card-title">
                            <?php echo $account->Name ?> <br> Class: <?php echo $account->Class ?>
                        </p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-muted">No accounts to display. Add a new one using the button below!</p>
            <?php } ?>
        </div>


        <!-- Add account button -->
        <!-- <form method="POST" action="<?php echo site_url('student/addAccount'); ?>">
            <button title="Add Account" class="float" style="border: none;">
                <i class="material-icons" style="font-size: 30px; position: relative; top: 3px; color: #fff;">
                    add
                </i>
            </button>
         </form> -->

    </div>

    <div class="col-xs-12 page-content">
        <div class="animated-heading">
            <i class="las la-wallet"></i> Payment Details
        </div>

        <!-- Calculate Total Pending Fee before the loop -->
        <?php
        $total_pending_fee = 0; // Initialize total fee variable
        if (isset($payments)) {
            foreach ($payments as $payment) {
                // Initialize late fee variable
                $lateFee = 0;

                // If the payment is unpaid, calculate late fee
                if ($payment->status == 0 || $payment->status == null) {
                    if (date_create(date("Y-m-d")) > date_create($payment->lastdate)) {
                        $days = date_diff(date_create($payment->lastdate), date_create(date("Y-m-d")));
                        $lateFee = $days->format("%R%a") * 10; // 10 is the late fee per day
                    }
                } else {
                    // If already paid, use the late fee paid
                    $lateFee = $payment->late_fee_paid;
                }

                // Add the amount to total pending fee if unpaid
                if ($payment->status == 0 || $payment->status == null) {
                    $total_pending_fee += (intval($payment->amount) + $lateFee);
                }
            }
        }
        ?>

        <!-- Display Total Pending Fee -->
        <div class="total-pending-fee">
            <p style="font-weight: bold; text-transform: capitalize; font-size: 1.2rem; color: #124E66">Total
                Pending
                Fee (including late fees): <?php echo number_format($total_pending_fee, 2); ?></p>
        </div>

        <?php
        // Sort payments array to show pending payments first
        usort($payments, function ($a, $b) {
            // If payment a is unpaid (status == 0) and b is paid (status == 1), a should come first
            if ($a->status == 0 && $b->status == 1) {
                return -1; // a comes before b
            } elseif ($a->status == 1 && $b->status == 0) {
                return 1; // b comes before a
            } else {
                return 0; // no change in order if both are unpaid or both are paid
            }
        });
        ?>

        <div class="col-xs-12 message-list-container">
            <?php if (empty($payments)) { ?>
                <p>Empty here :-)</p>
            <?php } ?>

            <?php if (isset($payments)) { ?>
                <?php foreach ($payments as $payment) {
                    // Initialize late fee variable
                    $lateFee = 0;

                    // If payment is unpaid, calculate late fee
                    if ($payment->status == 0 || $payment->status == null) {
                        if (date_create(date("Y-m-d")) > date_create($payment->lastdate)) {
                            $days = date_diff(date_create($payment->lastdate), date_create(date("Y-m-d")));
                            $lateFee = $days->format("%R%a") * 10; // 10 is the late fee per day
                        }
                    } else {
                        // If paid, use the late fee paid
                        $lateFee = $payment->late_fee_paid;
                    }
                    ?>

                    <div class="col-xs-12 message-container"
                        style="background-color: <?php echo ($payment->status == 1) ? '#BEE3F8' : '#F8D7DA'; ?>; padding: 15px; border-radius: 10px;">
                        <div class="col-xs-12 payment">
                            <form method="POST" action="<?php echo site_url('fee/pay') ?>">
                                <input type="hidden" name="fee_id" value="<?php echo $payment->feeid ?>" />
                                <input type="hidden" name="student_id" value="<?php echo $payment->student_id ?>" />

                                <table class="fee-table" border="1" cellspacing="0" cellpadding="10"
                                    style="width: 100%; text-align: left; border-collapse: collapse;">
                                    <tr style="border:none;">
                                        <th
                                            style="padding: 10px; font-weight:bold; font-size:1.5rem; color: #124E66; background-color: #fff;">
                                            Period
                                        </th>
                                        <td
                                            style="padding: 10px; font-weight:bold; font-size:1.5rem; color: #124E66; text-transform:capitalize; background-color: #fff">
                                            <?php echo $payment->period; ?>
                                        </td>
                                    </tr>
                                    <tr style="border:none;">
                                        <th style="padding: 10px; font-size:1.1rem;">Last Date</th>
                                        <td style="padding: 10px; font-size:1.1rem;">
                                            <?php if ($payment->lastdate != null) {
                                                echo date("d-m-Y", strtotime($payment->lastdate));
                                            } ?>
                                        </td>
                                    </tr>
                                    <!-- <tr style="border:none;">
                                        <th style="padding: 10px; font-size:1.1rem;">Late Fee</th>
                                        <td style="padding: 10px; font-size:1.1rem;">
                                            <?php
                                            if ($payment->status == 0 || $payment->status == null) {
                                                if (date_create(date("Y-m-d")) > date_create($payment->lastdate)) {
                                                    $days = date_diff(date_create($payment->lastdate), date_create(date("Y-m-d")));
                                                    $lateFee = $days->format("%R%a") * 10;
                                                    echo $lateFee;
                                                } else {
                                                    $lateFee = 0;
                                                    echo $lateFee;
                                                }
                                            } else {
                                                echo $payment->late_fee_paid;
                                                $lateFee = $payment->late_fee_paid;
                                            }
                                            ?>
                                        </td>
                                    </tr> -->
                                    <!-- <tr style="border:none;">
                                        <th style="padding: 10px; font-size:1.1rem;">Amount</th>
                                        <td style="padding: 10px; font-size:1.1rem;"><?php $amount = intval($payment->amount) + $lateFee;
                                        echo $amount; ?></td>
                                    </tr> -->


                                    <tr style="border:none;">
                                        <th style="padding: 10px; font-size:1.1rem;">Fee</th>
                                        <td style="padding: 10px; font-size:0.9rem;">Tuition Fee:
                                            <?php echo $payment->tuition_fee; ?><br /><br/>
                                            Transport Fee: <?php echo $payment->transport_fee; ?><br /><br/>
                                            Annual Fee: <?php echo $payment->annual_fee; ?><br /><br/>
                                            Addmission Fee: <?php echo $payment->admission_fee; ?><br /><br/>
                                            <!-- Amount: <?php echo $payment->amount; ?><br /><br/> -->
                                            Late Fee: <?php echo $lateFee; ?><br /><br/>
                                            <strong>Total Amount: <?php echo $payment->amount_paid; ?></strong>

                                            <!-- 


                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;">Tuition Fee</th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><?php echo $payment->tuition_fee; ?></td>
                                               
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;">Transport Fee</th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><?php echo $payment->transport_fee; ?></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;">Annual Fee</th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><?php echo $payment->annual_fee; ?></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;"><strong>Addmission Fee</strong></th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><strong><?php echo $payment->admission_fee; ?></strong></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;"><strong>Amount</strong></th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><strong><?php echo $payment->amount; ?></strong></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;">Late Fee</th>
                                                    <td style="padding: 10px; font-size:0.8rem;"><?php echo $payment->late_fee_paid; ?></td>
                                                </tr>
                                                <tr style="border:none;">
                                                    <th style="padding: 10px; font-size:0.8rem;">Total Amount</th>
                                                    <td style="padding: 10px; font-size:1.1rem; color:red;"><?php echo $payment->amount_paid; ?></td>
                                                </tr> -->

                                        </td>
                                    </tr>












                                    <tr style="border:none;">
                                        <th style="padding: 10px; font-size:1.1rem;">Status</th>
                                        <td style="padding: 10px; font-size:1.1rem;">
                                            <?php echo $payment->status ? "Paid" : "Unpaid"; ?>
                                        </td>
                                    </tr>
                                </table>

                                <input type="hidden" name="late_fee" value="<?php echo $lateFee ?>">

                        </div>

                        <div class="mesg_btn">

                            <?php if (!($payment->status)) { ?>
                                <button type="submit" class="form-btn">Pay</button>
                            <?php } ?>
                            </form>

                            <?php if ($payment->status) { ?>
                                <form method="POST" action="<?php echo site_url('fee/receipt') ?>">
                                    <input type="hidden" value="<?php echo $payment->feeid ?>" name="feeId" />
                                    <button class="form-btn1">Download Receipt</button>
                                </form>
                            <?php } ?>

                        </div>

                    </div>

                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function switchAccount(accountId) {
        $.ajax({
            url: '<?php echo site_url('fee/switchAccount'); ?>/' + accountId,
            type: 'POST',
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Error switching account:', error);
            }
        });
    }
</script>

<?php $this->view('student/layouts/footer') ?>