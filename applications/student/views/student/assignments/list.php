<style>
    /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #F8F9FA;
    }

    .card-container {
        display: flex;
        padding: 20px;
        flex-direction: column;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        align-items: center;
        margin: 0 auto;

    }

    /* Card Styling */
    .assignment-card {
        width: 250px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .assignment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Subject Section */
    .subject-header {
        background-color: #6C63FF;
        /* Cool blue tone */
        padding: 10px 15px;
        text-align: center;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-transform: capitalize;
        font-family: Nunito-Semibold;
    }

    /* Assignment Details */
    .assignment-details {
        padding: 15px;
    }

    .assignment-text {
        font-size: 15px;
        color: #343A40;
        /* Neutral dark */
        margin-bottom: 10px;
        line-height: 1.4;
        font-family: Nunito-Semibold;
        text-transform: lowercase;
    }

    .assignment-text::first-letter {
        text-transform: uppercase;
    }

    /* Button Styling */
    .view-resource-btn {
        display: inline-block;
        background-color: #4A90E2;
        color: #fff;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .view-resource-btn:hover {
        background-color: #357ABD;
        /* Slightly darker blue */
    }

    /* Empty State */
    .no-assignments {
        font-size: 18px;
        color: #6C757D;
        /* Neutral gray */
        text-align: center;
        margin-top: 20px;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .assignment-card {
        animation: fadeInUp 0.4s ease-in-out;
    }




    @media (max-width: 768px) {


        /* Card Styling */
        .assignment-card {
            width: 200px;
        }

    }
</style>



<div class="card-container">
    <?php if (empty($assignments)) { ?>
        <p class="no-assignments">No Assignments found 😊</p>
    <?php } ?>

    <?php if (isset($assignments)) { ?>
        <?php foreach ($assignments as $assignment) { ?>
            <div class="assignment-card">
                <!-- Subject Name -->
                <div class="subject-header">
                    <?php echo htmlspecialchars($assignment->Subjectname); ?>
                </div>

                <!-- Assignment Details -->
                <div class="assignment-details">
                    <p class="assignment-text">
                        <?php echo htmlspecialchars($assignment->Assignment); ?>
                    </p>
                    <?php if (!empty($assignment->file)) { ?>
                        <a href="<?php echo htmlspecialchars($assignment->file_url); ?>" class="view-resource-btn" target="_blank">
                            View Resource
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>