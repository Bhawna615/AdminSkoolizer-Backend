<!DOCTYPE html>
<html>
<head>
    <title>Login to continue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.71)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link rel="icon" type="image/gif" href="<?php echo base_url("assets/icons/m.png") ?>"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
          integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style>
        @font-face {
            font-family: CarroisCaps;
            src: url(<?php echo base_url("assets/fonts/CarroisCaps.ttf"); ?>);
        }

        @font-face {
            font-family: Markpro;
            src: url(<?php echo base_url("assets/fonts/Markpro.otf"); ?>);

        }

        @font-face {
            font-family: Markprom;
            src: url(<?php echo base_url("assets/fonts/Markprom.otf"); ?>);

        }

        @font-face {
            font-family: Nunito-Semibold;
            src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);

        }

        @font-face {
            font-family: Questrial-Regular;
            src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);

        }
    </style>
    <style type="text/css">
        a#navbar {
            color: #363636;
            font-family: CarroisCaps;
            font-size: 20px;
            text-decoration: none;
        }

        a#navbar:focus {
            color: rgba(41, 149, 191, 0.71);
        }

        input {
            width: 100%;
            border: none;
            border-bottom: 1px solid;
            border-color: #AEAEAE;
            font-family: Markpro;
            font-size: 15px;
            color: #6B6B6B;
            height: 30px;
            background: #E8F0FE;
            padding-left: 10px;


        }

        input:focus {
            outline: none;
            background: #E8F0FE;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: 5000s ease-in-out 0s;
            background: #E8F0FE;
        }

        i {
            color: rgba(0, 0, 0, 0.7);
            padding-bottom: 40px;
        }
    </style>
    <style>

        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #2995bf;
        }

        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            top: 50%;
            left: 50%;
            animation: loader 4s infinite ease;
        }

        .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
        }

        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(180deg);
            }

            50% {
                transform: rotate(180deg);
            }

            75% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes loader-inner {
            0% {
                height: 0%;
            }

            25% {
                height: 0%;
            }

            50% {
                height: 100%;
            }

            75% {
                height: 100%;
            }

            100% {
                height: 0%;
            }
        }
    </style>
</head>


<body style="background: #E8F0FE;">

<div class="">
    <div class="col-xs-12" style="background: #2995bf; color: #fff;  padding-top: 10px;">
        <p style="font-family: Nunito-Semibold; font-size: 20px; text-align: center; margin: 0px;"><?php echo $this->config->item('schoolName') ?></p>
        <P align="center" style="font-family: Questrial-Regular;"><?php echo $this->config->item('schoolAddress') ?></P>
    </div>
    <div class="col-xs-12" style="margin-top: 50px;">
        <div class="col-xs-12"
             style="border: 1px solid; border-color: #515151; border-radius: 5px; padding: 15px 0 15px 0;">
            <ul id="nav" style="padding: 0px;">
                <div class="col-xs-4" align="center" style="border-right: 1px solid;">
                    <a href="student" id="navbar" class="active">Student</a>
                </div>
                <div class="col-xs-4" align="center" style="border-right: 1px solid;">
                    <a href="teacher" id="navbar">Teachers</a>
                </div>
                <div class="col-xs-4" align="center">
                    <a href="principal" id="navbar">Principal</a>
                </div>
            </ul>
        </div>

    </div>
    <div class="col-xs-12" style="margin-top: 20px;">
        <div id="content">


        </div>
    </div>

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#content').load('<?php echo site_url('Home/student'); ?>');
        $('ul#nav a').click(function () {
            var page = $(this).attr('href');
            $('#content').load('<?php echo site_url('Home/') ?>' + page);
            return false;
        });
    });

</script>

<script>
    $(window).on("load", function () {
        $(".loader-wrapper").fadeOut("slow");
    });
</script>
</body>
</html>