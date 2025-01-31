<?php $this->view('student/layouts/header') ?>


    <style>
        /* Body styling */
        body {
            font-family:  'Arial', sans-serif;
            background-color: #EDE8F5;
            margin: 0;
            padding: 0;
        }

        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: max-content;
            margin: 0 auto;
            padding: 20px 0;
            gap: 10px;
        }

        /* Heading styling */
        .page-heading {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #6C63FF;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            animation: fadeIn 1s ease-in-out;
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

        /* Empty message styling */
        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin-top: 20px;
            animation: bounceIn 0.6s;
        }

        /* Message container styling */
        .message-container {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px auto;
            width: 100%;
            max-width: 600px;
            text-align: left;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .message-container:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .message {
            font-size: 1.2rem;
            color: #333;
        }

        .message-text {
            margin-bottom: 10px;
            font-size: 1.7rem;
            font-weight: 500;
            color: #124E66;
            font-family: Nunito-Semibold;
            text-transform: capitalize;
        }

        /* Message link styling */
        .message-link {
            display: inline-block;
            margin: 10px 0;
            font-size: 1.2rem;
            color: #6C63FF;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        .message-link:hover {
            color: #403D9F;
            text-decoration: underline;
        }

        .message-date {
            font-size: 1.2rem;
            color: #777;
            margin-top: 5px;
            font-style: italic;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }


            /* Responsive Design */
    @media (max-width: 768px) {


          /* Message container styling */
          .message-container{
            width: 90%;

          }

    }









    </style>

<div class="col-xs-12 page-content">

    <h2 class="page-heading">📩 Messages</h2> <!-- Stylish Heading -->

    <?php if (empty($messages)) { ?>
        <p class="empty-message">No messages here 😊</p>
    <?php } else { ?>
        <?php foreach ($messages as $message) { ?>
            <div class="message-container">
                <div class="message">
                    <p class="message-text"><?php echo $message->message ?></p>
                    <?php if (isset($message->message_file)) { ?>
                        <a class="message-link" href="<?php echo $message->message_file_url ?>" target="_blank">
                            <i class="fas fa-file-alt"></i> View Resource
                        </a>
                    <?php } ?>
                    <p class="message-date"><?php echo $message->sent_at ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<?php $this->view('student/layouts/footer') ?>
