<?php $this->view('student/layouts/header') ?>


<!-- Internal CSS -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #F3F4F6;
    }

    .div_cont{
        background-color: #F3F4F6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: max-content;
        width: 100%;
    }
    /* Page Content Styling */
    .page-content {
        background-color: #FFFFFF;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 90%;
        height: max-content;
        margin: 20px auto;
        padding: 20px;
    }

    /* Header Styling */
    .schedule-header-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        animation: slideIn 0.8s ease-in-out;
    }

    .schedule-header-icon {
        font-size: 24px;
        color: #4A90E2;
        animation: bounce 1s infinite;
    }

    .schedule-header {
        font-size: 2rem;
        font-weight: bold;
        color: #6C63FF;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-family: Nunito-Semibold;
    }

    /* Card Container */
    .schedule-list-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Card Styling */
    .schedule-container {
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

    .schedule-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Event Name Styling */
    .schedule-subject-container {
        width: 35%;
        text-align: center;
        background-color:  #6C63FF;
        padding: 10px;
    }

    .student-home-subject-name {
        font-size: 16px;
        color: #fff;
        font-family: Nunito-Semibold;
    }

    /* Details Section */
    .schedule-details-container {
        width: 60%;
    }

    .student-home-subject-time {
        font-size: 14px;
        color: #4D4D4D;
        margin: 5px 0;
        font-family: Nunito-Semibold;
        text-transform: capitalize;
    }

    /* Empty Message Styling */
    .empty-message {
        font-size: 16px;
        color: #6C757D;
        text-align: center;
        margin: 20px 0;
    }

    /* Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
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

    .schedule-container {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


</style>

<div class="div_cont">

    <div class="page-content">

        <!-- Header with Icon -->
        <div class="schedule-header-container">
            <i class="schedule-header-icon">&#x1F4C5;</i> <!-- Calendar Icon -->
            <h2 class="schedule-header">Upcoming Events</h2>
        </div>

        <!-- Cards -->
        <div class="schedule-list-container">
            <?php if (empty($events)) { ?>
                <p class="empty-message">No Events Found 😊</p>
            <?php } ?>

            <?php if (isset($events)) { ?>
                <?php foreach ($events as $event) { ?>
                    <div class="schedule-container">
                        <!-- Event Name -->
                        <div class="schedule-subject-container">
                            <p class="student-home-subject-name">
                                <?php echo htmlspecialchars($event->name); ?>
                            </p>
                        </div>

                        <!-- Event Details -->
                        <div class="schedule-details-container">
                            <p class="student-home-subject-time">
                                <?php echo htmlspecialchars($event->description); ?>
                            </p>
                            <p class="student-home-subject-time">
                                <?php echo "Date: " . htmlspecialchars($event->date); ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->view('student/layouts/footer') ?>