<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            font-family: RedhatR;
            src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
        }

        @font-face {
            font-family: Questrial-Regular;
            src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }

        @font-face {
            font-family: Nunito-Semibold;
            src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Medium;
            src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
        }


    </style>
    <style>

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav button {
            background: #F7F7F9;
            outline: none;
            font-family: Nunito-Light;
            font-size: 18px;
            margin-bottom: 15px;
            border: none;

        }

        .sidenav button:focus {
            border: none;
            outline: none;
        }

        .sidenav a {
            font-size: 18px;
            text-decoration: none;
            color: black;
        }


        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: relative;
            right: 10px;
            top: 10px;
            color: white;
            font-size: 36px;
            margin-left: 20px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
    <style type="text/css">
        #sidebaritems {
            border-bottom: 1px solid;
            border-color: #c9c9c9;
            margin-top: 5px;
        }

        .icon {
            height: 25px;
            width: 25px;
            margin-right: 20px;
            color: #363636;
            position: relative;
            bottom: 3px;
        }

    </style>
</head>
<body style="background: #fff;">


<div class="">
    <div id="mySidenav" class="sidenav" style="background:#F7F7F9; padding: 0px;">
        <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9);">

            <div class="col-xs-12" style="padding: 0px;">
                <div class="col-xs-2" align="left" style="padding: 0px;">
                    <?php if (isset($info)) { ?>
                        <?php foreach ($info as $row) {
                            $image = $row->image;
                        } ?>
                        <?php if ($image != null) { ?>
                        <img src="<?php echo base_url('assets/images/teachers/') . $row->image; ?>"
                             style="font-size: 60px; border: 1px solid; border-radius: 50%; color: white; width: 60px; position: relative;top: 7px;">
                    <?php } else { ?>
                        <i class='material-icons' style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
                    <?php } ?>
                </div>
                <div class="col-xs-8" align="center">
                    <p style="font-size: 20px; color: white; margin-top: 10px; font-family:Nunito_regular;">
                        <?php foreach ($info as $row) {echo $row->Teachername;} ?><br>Teacher</p>
                    <?php } ?>
                </div>
                <div class="col-xs-2">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                </div>
            </div>

        </div>
        <div class="col-xs-12" style=" margin-top: 20px;">
            <div class="col-xs-12" id="sidebaritems">
                <button onclick="location.href='<?php echo site_url('teacher/takeAttendance') ?>'"><img
                        src="<?php echo base_url('assets/icons/takeattend.jpeg'); ?>" class="icon">Take Attendance
                </button>
                <br>
                <button onclick="location.href='<?php echo site_url('teacher/attendance') ?>'"><img
                        src="<?php echo base_url('assets/icons/attendlist.jpeg'); ?>" class="icon">Attendance List
                </button>
                <br>

            </div>
            <div class="col-xs-12" id="sidebaritems">
                <button onclick="location.href='<?php echo site_url('teacher/conductexam') ?>'"><img
                        src="<?php echo base_url('assets/icons/conduct.jpeg'); ?>" class="icon">Conduct Exams
                </button>
                <br>
                <button onclick="location.href='<?php echo site_url('teacher/exam'); ?>'"><img
                        src="<?php echo base_url('assets/icons/examreport.jpeg'); ?>" class="icon">Exam Report
                </button>
                <br>
            </div>
            <div class="col-xs-12" id="sidebaritems">
                <button onclick="location.href='<?php echo site_url('teacher/viewstudents'); ?>'"><img
                        src="<?php echo base_url('assets/icons/viewstudent.jpeg'); ?>" class="icon">View Students
                </button>
                <br>
                <button onclick="location.href='<?php echo site_url('teacher/homework'); ?>'"><img
                        src="<?php echo base_url('assets/icons/hw.jpeg'); ?>" class="icon">Assign Homework
                </button>
                <br>
            </div>
            <div class="col-xs-12" id="sidebaritems">
                <button onclick="location.href='<?php echo site_url('teacher/settings'); ?>'"><img
                        src="<?php echo base_url('assets/icons/settings.svg'); ?>" class="icon">Settings
                </button>
                <br>
                <button onclick="location.href='<?php echo site_url('teacher/signout'); ?>'"><img
                        src="<?php echo base_url('assets/icons/logout.svg'); ?>" class="icon">LOG OUT
                </button>
                <br>
            </div>

        </div>
    </div>

    <div id="main">
        <div class="col-xs-12"
             style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7);">

            <div class="col-xs-1" align="left" style="padding:13px 0px 0px 5px;">
                <span style="font-size:30px;cursor:pointer;" onclick="  openNav()"><i class="fa fa-navicon"
                                                                                      style="font-size:24px"></i></span>
            </div>
            <div class="col-xs-10" style="padding: 0px; padding-top: 20px;" align="center">
                <p style="font-family: Nunito-Semibold; font-size: 25px;"><?php echo $this->config->item('schoolName') ?></p>

            </div>

            <div class="col-xs-1" style="padding: 13px 5px 0px 0px;" align="right">

            </div>
        </div>