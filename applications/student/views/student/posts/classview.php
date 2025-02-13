<?php $this->view('student/layouts/header') ?>




<style>
    /* Main Wrapper Centering */
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: max-content;
        width: 100%;
       
    }

    /* Message Container */
    .message-container-wrapper {

        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);

        width: 100%;
        height: max-content;
        animation: fadeIn 1s ease-in-out;
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

    /* Messages Section */
    .message-list-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .message-container {
        background: #F7F9FC;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .message-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .message p {
        font-family: Nunito-Semibold;
        text-transform: lowercase;
        color: #4F6476;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .message p::first-letter {
        text-transform: uppercase;
    }

    .student-resource-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #6C63FF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-family: Nunito-Semibold;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .student-resource-btn:hover {
        background-color: #574FFF;
    }

    .message p:last-of-type {
        font-size: 12px;
        color: #9E9E9E;
        margin-top: 10px;
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .message-container-wrapper {
            margin: 20px;
        }

        .animated-heading {
            font-size: 22px;
        }

        .wrapper {
            
            border-radius: 10px;
        }
    }
</style>

<div class="wrapper">
    <div class="message-container-wrapper">
        <!-- Animated Heading -->
        <div class="animated-heading">
            <i class="las la-envelope"></i> <!-- Font Awesome Icon -->
           Class Posts
        </div>

        <!-- Messages Section -->
        <div class="message-list-container">
            <?php if (empty($posts)) { ?>
                <p style="text-align: center; font-family: Nunito; color: #9E9E9E; font-size: 16px;">
                    No messages found. 😊
                </p>
            <?php } ?>
            <?php if (isset($posts)) { ?>
                <?php foreach ($posts as $post) { ?>
                    <div class="message-container">
                        <div class="message">
                            <p><?php echo $post->text ?></p>
                            <?php if (isset($post->file)) { ?>
                                <a href="<?php echo $post->url ?>" target="_blank" class="student-resource-btn">View Resource</a>
                            <?php } ?>
                            <p><?php echo $post->created_at ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->view('student/layouts/footer') ?>