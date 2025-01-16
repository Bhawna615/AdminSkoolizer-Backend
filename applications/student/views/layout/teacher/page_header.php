<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        @font-face{
            font-family: Nunito_regular;
            src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
        }
        @font-face{
            font-family: Nunito-Light;
            src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }
        @font-face{
            font-family: RedhatR;
            src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
        }
        @font-face{
            font-family: Nunito-Semibold;
            src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
        }
        @font-face{
            font-family: Questrial-Regular;
            src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }
        @font-face{
            font-family: Rubik-Medium;
            src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
        }
        @font-face{
            font-family: Rubik;
            src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
        }

        .icon
        {
            height: 20px;
            width: 20px;
            padding-top: 5px;
        }
        button#Present{
            font-size: 25px;
            background: #228B22;
            border: 1px solid #666666;
            border-radius: 5px;
            color: white;
            font-family: Nunito_regular;

        }
        button#Absent{
            font-size: 25px;
            background: #FF0000;
            border: 1px solid #666666;
            border-radius: 5px;
            color: white;

            font-family: Nunito_regular;
        }
        button#Leave{
            font-size: 25px;
            background: black;
            border: 1px solid #666666;
            border-radius: 5px;
            color: white;

            font-family: Nunito_regular;


        }
    </style>
    <style type="text/css">
        *{padding:0;margin:0;}
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#0099FF;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:22px;
        }

        #headings{
            font-family: Nunito-Semibold;
            font-size: 13px;
            color: #4F6476;
            margin: 0px;
            margin-left: 2px;
        }
        th
        {
            font-family: Nunito-Semibold;
            font-size: 14px;
            border: 1px  solid #EAEAEC;
            text-align: center;
            color: black;
        }
        td
        {
            font-family: Nunito_regular;
            font-size: 14px;
            border: 1px  solid #EAEAEC;
            text-align: center;
            color: black;
        }
        table {
            border: 1px solid #B3B9BE;
        }
        select
        {
            background: transparent;
            color: black;
            border: none;
            font-family: Nunito_regular;
            font-size: 16px;
            width: 80%;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        select:focus
        {
            outline: none;
        }
        input[type=text]
        {
            border: 0px;
            border-bottom: 1px solid;
            border-color: #666666;
            background: #fff;
            width: 100%;
            font-size: 16px;
            font-family: Rubik;
        }
        input:focus
        {
            outline: none;
        }
        #values
        {
            border: 0px;
            border-bottom: 1px solid;
            border-color: #666666;
            background: #fff;
            width: 100%;
            font-size: 18px;
            font-family: Questrial-Regular;
        }
    </style>
</head>
<body style="background: white;">
<div class="">
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
        <div class="col-xs-1" style="padding: 0px;">
            <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
        </div>
        <div class="col-xs-11" style="padding: 0px;">
            <p style="color: white; font-size:20px; font-family: Nunito-Light; ">
                <?php if (isset($title)) { echo $title; } ?>
            </p>
        </div>
    </div>

