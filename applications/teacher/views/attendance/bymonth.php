<?php $this->view('header'); ?>

<style>
    /* Styling for the page */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #EDE8F5;
        margin: 0;
        padding: 0;

    }

    /* Main Container */
    .attendance-container {
        background: #fff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 20px auto;
        text-align: center;
        animation: fadeIn 1s ease-in-out;
        height: max-content;
    }

    /* Animated Heading */
    .animated-heading {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Nunito-Semibold;
        text-transform: capitalize;
        color: #4F6476;
        font-size: 20px;
        margin-bottom: 20px;
        animation: slideDown 1s ease-in-out;
    }

    .animated-heading i {
        font-size: 24px;
        color: #6C63FF;
        margin-right: 8px;
        animation: bounce 1.5s infinite ease-in-out;
    }

    /* Date Picker Styling */
    .month-picker-container {
        margin: 20px 0;
    }

    .attendance-date-picker {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        background-color: #f9f9f9;
        color: #4F6476;
        text-align: center;
    }

    .attendance-date-picker:focus {
        border-color: #6C63FF;
        outline: none;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
    }

    /* Content Section */
    .form-submit {
        font-family: Nunito-Semibold;
        color: #4F6476;
        font-size: 14px;
        margin: 20px auto;
        padding: 10px;
        background: #F4F7FA;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 50px;
        width: 80%;
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

    @media (max-width: 768px) {
        .attendance-container {
            margin: 20px;
        }
    }
</style>

<div class="attendance-container">
    <div class="animated-heading">
        <i class="las la-calendar-alt"></i> <!-- Icon from Font Awesome -->
        Select a Month
    </div>
    <!-- Date Picker -->
    <div class="month-picker-container">

        <form method="POST" action="<?php echo site_url('attendance/getbymonth'); ?>">
            <p class="details">Month</p>
            <select name="month" class="form-select">
                <option value="1">January</option>
                <option value="2">Februry</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <br>
            <input type="submit" name="" value="View" class="form-submit">
        </form>
    </div>



</div>
<?php $this->view('footer'); ?>