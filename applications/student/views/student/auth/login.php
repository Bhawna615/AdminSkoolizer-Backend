<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Skoolizer</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/css/student/styles.css') ?>" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
        integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
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

        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #reader {
            width: 600px;
        }

        #result {
            text-align: center;
            font-size: 1.5rem;
        }

        .login-form-input {
            border: 2px solid;
            color: white;
            background: transparent;
            padding: 5px 10px 5px 10px;
            margin-top: 20px;
            font-family: Nunito_regular;
            outline: none;
            text-align: center;
        }

        input::placeholder {
            color: white;
        }

        .login-page-button {
            background: white;
            color: #2C56BB;
            border: none;
            margin-top: 20px;
        }
    </style>

</head>

<body class="login-page-body">
    <main>
        <div id="reader"></div>
        <div id="result"></div>
    </main>
    <div class="col-md-12 col-xs-12 col-sm-12 login-page-logo-container">
        <img src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
            class="login-page-logo" />
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12 login-page-school-name-container">
        <p class="login-page-school-name"><?php echo $this->config->item('schoolName') ?></p>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12 login-page-button-container">
        <form method="POST" action="<?php echo site_url('auth/signIn') ?>">
            <div class="col-md-12">
                <input type="text" class="login-form-input" name="admission_number" placeholder="Admission No." />
            </div>
            <div class="col-md-12">
                <input type="password" class="login-form-input" name="password" placeholder="Password" />
            </div>
            <button class="login-page-button" id="scanner-btn">SIGN IN</button>
        </form>

        <p class="login-page-brand">By Skoolizer</p>
    </div>
    <script>
        // var scannerBtn = document.getElementById('scanner-btn');
        // scannerBtn.onclick = function(){
        //     const scanner = new Html5QrcodeScanner('reader', {
        //         qrbox: {
        //             width: 250,
        //             height: 250,
        //         },
        //         fps: 20,
        //     });
        //     scanner.render(success, error);

        //     function success(result) {
        //         scanner.clear();
        //         document.getElementById('reader').remove();
        //         location.href = '<?php echo site_url('auth/verify/') ?>' + result;
        //     }

        //     function error(err) {
        //         console.error(err);
        //     }
        // }

    </script>

</body>

</html>