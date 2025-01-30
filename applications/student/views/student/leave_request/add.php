<?php $this->view('student/layouts/header') ?>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
</script>


<style>
    /* Styling for the page */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #F4F4F9;
        margin: 0;
        padding: 0;

    }

    /* Centering the page content */
    .page-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 20px;

    }

    .page-content {
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        text-align: center;
        animation: fadeIn 0.8s ease;
        width: 100%;
        max-width: 500px;
    }

    /* Professional heading styling with animation */
    .page-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #6C63FF;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 30px;
        position: relative;
        animation: fadeSlideIn 1s ease forwards;
        opacity: 0;
        font-family: Nunito-Semibold;
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
  

    /* Styling form inputs */
    .form-input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-input:focus {
        border-color: #6C63FF;
        outline: none;
    }

    /* Submit button styling */
    .form-btn-2 {
        background-color: #6C63FF;
        color: #fff;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 1.4rem;
        border: none;
        cursor: pointer;
        font-family: Nunito-Semibold;
        transition: background-color 0.3s ease;
    }

    .form-btn-2:hover {
        background-color: #403D9F;
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
</style>

<div class="page-wrapper">
    <div class="col-xs-12 page-content">

        <!-- Page heading with animation -->
        <div class="page-heading">
            <i class="las la-file-alt"></i> leave Details
        </div>


        <form method="POST" action="<?php echo site_url('LeaveRequest/create') ?>">

            <p class="profile-input-heading">DATE</p>
            <input type="text" name="request_date" placeholder="dd/mm/yyyy" id="date" class="profile-input">
            <p class="profile-input-heading">REASON</p>
            <textarea name="request_reason" class="profile-input"></textarea>
            <div class="col-xs-12 btn-container">
                <button type="submit" class="form-btn-2">SUBMIT</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(function () {
            $("#date").datepicker({ dateFormat: 'dd-mm-yy' });
        });
    })
</script>
<?php $this->view('student/layouts/footer') ?>