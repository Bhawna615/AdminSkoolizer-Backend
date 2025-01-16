<html lang="en">
<head>
    <title>ID Generate</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/id-card.css'); ?>">
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
</head>
<body>
<div class="col-md-12">
    <?php if (isset($data)) { ?>
    <?php foreach ($data as $datum) { ?>
    <div class="col-xs-4 id-card-container">
        <div class="col-xs-12 school-info">
            <div class="col-xs-4 school-info-logo">
                <img
                        src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                        class="id-card-school-logo"
                        alt="School Logo"
                />
            </div>
            <div class="col-xs-8 school-info-text">
                <p class="id-card-school-name">
                    <?php echo $this->config->item('schoolName') ?><br/>
                </p>
                <p class="id-card-school-address">
                    <?php echo $this->config->item('schoolAddress') ?>
                </p>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <img src="<?php echo base_url('assets/images/students/') . $datum->image; ?>" class="student-image">
            </div>
            <div class="col-xs-6">
                <img src="<?php echo base_url('assets/images/students/qrcode/') . $datum->qrcode . ".png"; ?>" class="qrcode">
            </div>
        </div>
        <div class="col-xs-12 student-info">
            <p class="student-name">Name : <?php echo $datum->Name; ?></p>
            <p class="father-name">Father's Name : <?php echo $datum->Fname; ?></p>
            <p class="student-class">Class : <?php echo $datum->Class; ?></p>
            <p class="student-address">Address : <?php echo $datum->Address; ?></p>
            <p class="student-contact">Contact : <?php echo $datum->Contact; ?></p>
        </div>
        <div class="school-info">



        </div>
        <div class="images">
            <div class="student-image">
            </div>
            <div class="qrcode">

            </div>
        </div>
        <div class="student-info">

        </div>
    </div>
    <?php } ?>
    <?php } ?>
</div>
</body>
</html>