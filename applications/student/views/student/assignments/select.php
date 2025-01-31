<?php $this->view('student/layouts/header'); ?>

<style>


  /* Styling for the page */
  body {
        font-family: 'Arial', sans-serif;
        background-color: #EDE8F5;
        margin: 0;
        padding: 0;

    }

    /* Main Container */
    .assignment-container {
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
    .date-picker-container {
        margin: 20px 0;
    }

    .assignment-date-picker {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        background-color: #f9f9f9;
        color: #4F6476;
        text-align: center;
    }

    .assignment-date-picker:focus {
        border-color: #6C63FF;
        outline: none;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
    }

    /* Content Section */
    #content {
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
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @media (max-width: 768px) {
        .assignment-container {
            margin: 20px;
        }
    }
</style>

<div class="assignment-container ">
    <!-- Animated Heading -->
    <div class="animated-heading">
        <i class="las la-calendar-alt"></i> <!-- Icon from Font Awesome -->
        Select a Date
    </div>

    <!-- Date Picker -->
    <div class="date-picker-container">
        <input type="date" id="date-picker" value="<?php echo date('Y-m-d'); ?>" class="assignment-date-picker" />
    </div>

    <!-- Content Section -->
    <div id="content">
        <p>Assignments will be displayed here</p>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Load assignments for the current date on page load
        $('#content').load('<?php echo site_url('assignment/display/'); ?>' + $("#date-picker").val());

        // Load assignments when the date changes
        $('#date-picker').on('change', function () {
            $('#content').load('<?php echo site_url('assignment/display/'); ?>' + $(this).val());
        });
    });
</script>

<?php $this->view('student/layouts/footer'); ?>
