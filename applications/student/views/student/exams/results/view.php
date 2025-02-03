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
    .result-card {
        width: 250px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .result-card:hover {
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
    .result-details {
        padding: 15px;
    }

    .result-text {
        font-size: 15px;
        color: #343A40;
        /* Neutral dark */
        margin-bottom: 10px;
        line-height: 1.4;
        font-family: Nunito-Semibold;
        text-transform: lowercase;
    }

    .result-text::first-letter {
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
    .no-result {
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

    .result-card {
        animation: fadeInUp 0.4s ease-in-out;
    }




    @media (max-width: 768px) {


        /* Card Styling */
        .result-card {
            width: 200px;
        }

    }
</style>







<div class="card-container">
    <?php if (empty($exams)) { ?>
        <p class="no-result">No Result found 😊</p>
    <?php } ?>
    <?php if (isset($exams)) { ?>
        <?php foreach ($exams as $exam) { ?>
            <div class="result-card">
                <div class="subject-header">
                    <p class="student-home-subject-name"><?php echo $exam->Examtype ?></p>
                </div>
                <div class="result-details">
                    <p class="result-text"><?php echo date("d F,Y", strtotime($exam->Date)) ?></p>
                    <p class="result-text">Marks Obtained: <?php if (isset($marks)) {
                        foreach ($marks as $key => $value) {
                            if ($key == $exam->id) {
                                echo $value;
                            }
                        }
                    } ?></p>
                    <p class="result-text"><?php echo "Maximum marks: " . $exam->Maxmarks ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>