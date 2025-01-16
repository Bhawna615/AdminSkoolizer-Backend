<!DOCTYPE html>
<head>
    <title><?php if (isset($title)) echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/transport.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/student.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
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
<div class="col-xs-12 col-sm-12 top-level-container">
    <div class="col-xs-12 col-sm-12 top-bar">
        <div class="col-xs-2 top-bar-icon-container">
            <i class="las la-bars nav-icon" onclick="openNav()"></i>
        </div>
        <div class="col-xs-8">
            <p class="page-title"><?php if (isset($page)) echo $page ?></p>
        </div>
        <div class="col-xs-2 top-bar-icon-container">
            <i class="las la-door-open nav-icon" onclick="location.href='<?php echo site_url('auth/logout')?>'"></i>
        </div>
        <div id="mySidebar" class="sidebar">
            <div class="col-md-12 sidebar-student-detail-container">
                <img src="<?php echo base_url('assets/images/students/').$this->session->userdata('image') ?>" class="sidebar-student-image" />
                <p class="sidebar-student-detail"><?php echo $this->session->userdata('name') ?></p>
                <p class="sidebar-student-detail">Roll No - <?php echo $this->session->userdata('class') ?></p>
                <p class="sidebar-student-detail">Class - <?php echo $this->session->userdata('rollNo') ?></p>
            </div>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="<?php echo site_url('student')?>" class="sidebar-menu-item"><i class="las la-home sidebar-menu-item-icon"></i> Home</a>
            <a href="<?php echo site_url('assignment') ?>" class="sidebar-menu-item"><i class="las la-list-alt sidebar-menu-item-icon"></i> Assignments</a>
            <a href="<?php echo site_url('exam') ?>" class="sidebar-menu-item"><i class="las la-flag-checkered sidebar-menu-item-icon"></i> Exams</a>
            <a href="<?php echo site_url('post/mySchool') ?>" class="sidebar-menu-item"><i class="las la-school sidebar-menu-item-icon"></i> My School</a>
            <a href="<?php echo site_url('post/myClass') ?>" class="sidebar-menu-item"><i class="las la-users sidebar-menu-item-icon"></i> My Class</a>
            <a href="<?php echo site_url('exam/results') ?>" class="sidebar-menu-item"><i class="las la-chart-pie sidebar-menu-item-icon"></i> Results</a>
            <a href="<?php echo site_url('event') ?>" class="sidebar-menu-item"><i class="las la-calendar-check sidebar-menu-item-icon"></i> Events</a>
            <a href="<?php echo site_url('student/profile') ?>" class="sidebar-menu-item"><i class="las la-address-card sidebar-menu-item-icon"></i> Portfolio</a>
            <a href="<?php echo site_url('fee') ?>" class="sidebar-menu-item"><i class="las la-rupee-sign sidebar-menu-item-icon"></i> Fee</a>
            <a href="<?php echo site_url('message') ?>" class="sidebar-menu-item"><i class="las la-envelope sidebar-menu-item-icon"></i> Messages</a>
            <a href="<?php echo site_url('transport'); ?>" class="sidebar-menu-item"><i class="las la-bus sidebar-menu-item-icon"></i> My Transport</a>
        </div>
    </div>


