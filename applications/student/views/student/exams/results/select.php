<?php $this->view('student/layouts/header'); ?>

<style>
    /* Main Container */
    .subject-container {
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

    /* Dropdown Styling */
    select {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-family: Nunito-Semibold;
        text-transform: capitalize;
        font-size: 1.3rem;
        margin: 10px 0;
        appearance: none;
        background-color: #f9f9f9;
        background-image: url('<?php echo base_url('assets/icons/down-arrow.svg'); ?>');
        background-position: right 10px center;
        background-repeat: no-repeat;
        background-size: 20px;
    }

    select:focus {
        border-color: #6C63FF;
        outline: none;
        box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
    }

    /* Content Section */
    #content {
        font-family: Nunito-Semibold;
        text-transform: lowercase;
        color: #4F6476;
        font-size: 14px;
        margin-top: 20px;
        padding: 10px;
        background: #F4F7FA;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        display: inline-block;
    }

    #content::first-letter {
        text-transform: uppercase;
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


        /* Message container styling */
        .subject-container {
            margin: 20px;

        }

    }
</style>

<div class="subject-container">
    <!-- Animated Heading -->
    <div class="animated-heading">
        <i class="las la-book"></i> <!-- Icon from Font Awesome -->
        Select a Subject
    </div>

    <!-- Dropdown -->
    <select id="code">
        <option>Select</option>
        <?php if (isset($exams)) { ?>
            <?php foreach ($exams as $exam) { ?>
                <option value="<?php echo $exam->Subject; ?>">
                    <?php echo $exam->Subject; ?>
                </option>
            <?php } ?>
        <?php } ?>
    </select>

    <!-- Content Section -->
    <div id="content">
        <p>Marks will be displayed here</p>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
    $('#code').on('change', function () {
        var subjectname = $('#code option:selected').val();
        $("#content").load('<?php echo site_url('exam/displayResult/'); ?>' + subjectname);
    });
</script>

<?php $this->view('student/layouts/footer'); ?>