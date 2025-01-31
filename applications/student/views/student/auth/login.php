<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Skoolizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/student/styles.css') ?>" rel="stylesheet" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/student.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico" />

    <!-- fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
        integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style type="text/css">
    @font-face {
        font-family: Nunito_regular;
        src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
    }

    @font-face {
        font-family: Nunito-Light;
        src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
    }

    @font-face {
        font-family: Nunito-Semibold;
        src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
    }

    @font-face {
        font-family: Questrial-Regular;
        src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
    }

    @font-face {
        font-family: RedhatR;
        src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
    }

    @font-face {
        font-family: Rubik-Medium;
        src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }

    @font-face {
        font-family: Montserrat-Medium;
        src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
    }

    @font-face {
        font-family: Rubik-Regular;
        src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
    }
</style>

    <style>
        body {
            background: #fff; /* Professional gradient for body */
            font-family: 'Bebas Neue', sans-serif;
            padding-top: 50px;
        }

        .card-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background: #124E66;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card-container:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transform: translateY(-10px);
        }

        .login-page-logo-container img {
            width: 160px;
            animation: logoAnimation 1s ease-out;
        }

        @keyframes logoAnimation {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .login-page-school-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
            letter-spacing: 1px;
            white-space: nowrap;
            /* Prevents text from wrapping */
        }

        .login-form-container {
            background:#fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Regular input field */
        .login-input {
            border-radius: 7px;
            border: 2px solid #ddd;
            background-color: #A5BFCC; !important;
            /* Force white background */
            padding: 12px;
            width: 100%;
            font-size: 0.9rem;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Autofill specific styles */
        input:-webkit-autofill {
            background-color: #A5BFCC !important;
            /* Force background to white */
            color: #333 !important;
            /* Optional: set text color to black */
            transition: background-color 5000s ease-in-out 0s;
            /* Prevent override */
        }

        /* For Firefox autofill */
        input:-moz-placeholder {
            background-color: #A5BFCC !important;
        }

        /* Ensure the background remains white even when focused */
        .login-input:focus {
            border-color: #2C56BB;
            background-color: #A5BFCC !important;
            /* Force white background on focus */
            outline: none;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1), 0 0 8px rgba(44, 86, 187, 0.5);
        }

        /* Autofill focused styles */
        input:-webkit-autofill:focus {
            background-color: #A5BFCC !important;
            /* Keep white background on focus */
        }


        .login-page-button {
            background-color: #124E66;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 1.2rem;
            border-radius: 7px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .login-page-button:hover {
            background-color: #1d4287;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-page-brand {
            font-size: 1rem;
            color: #2C56BB;
            text-align: center;
            margin-top: 20px;
        }

        .form-label {
            font-size: 1rem;
            color: #333;
        }

        .login-page-logo-container {
            text-align: center;
        }

        @media (max-width: 768px) {
            .card-container {
                margin: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="card-container">
        <div class="login-page-logo-container">
            <img src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                class="login-page-logo" />
        </div>

        <div class="login-page-school-name-container">
            <p class="login-page-school-name"><?php echo $this->config->item('schoolName') ?></p>
        </div>

        <div class="login-form-container">
            <form method="POST" action="<?php echo site_url('auth/signIn') ?>">
                <div class="form-group">
                    <label for="admission_number" class="form-label">Admission No.</label>
                    <input type="text" class="login-input" name="admission_number" placeholder="Enter Admission No."
                        required />
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="login-input" name="password" placeholder="Enter Password" required />
                </div>
                <button type="submit" class="login-page-button">Sign In</button>
            </form>

            <p class="login-page-brand">By Skoolizer</p>
        </div>
    </div>

</body>

</html>