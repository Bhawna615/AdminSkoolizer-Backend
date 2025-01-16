<!DOCTYPE html>
<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
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
            font-family: Rubik-Regular;
            src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
        }
    </style>
</head>
<body>
<div class="col-xs-12">
    <div class="col-xs-12 school-name-container">
        <div class="school-logo-container">
            <img
                    src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                    class="school-logo"
                    alt="School Logo"
            />
        </div>
        <p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
        <p class="school-address"><?php echo $this->config->item('schoolAddress') ?></p>
    </div>
    <div class="col-xs-12">
        <p class="page-title">Examination Report</p>
    </div>
    <div class="col-xs-12 info-container">
        <?php if (isset($student)) { ?>
            <?php foreach ($student as $row) { ?>
                <div class="col-xs-12">
                    <div class="col-xs-8">
                        <p class="language">
                            This is to certify that <span class="info"><?php echo $row->Name; ?></span><br/>
                            Mother's/Father's/Guardian's Name: <span
                                    class="info"><?php echo $row->Mname . '/' . $row->Fname ?></span><br/>
                            Date of Birth: <span class="info"><?php echo $row->Dob ?></span><br/>
                    </div>
                    <div class="col-xs-4">
                        <?php if ($row->image != null) { ?>
                            <img src="<?php echo base_url('assets/images/students/') . $row->image; ?>"
                                 class="student-img">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                                 style="height: 150px; width: 150px;">
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <table class="table table-responsive">
        <thead class="report-card-table-head">
        <tr>
            <th>Date</th>
            <th>Subject</th>
            <th>Exam Type</th>
            <th>Marks Obtained</th>
            <th>Max Marks</th>
        </tr>
        </thead>
        <tbody class="report-card-table-body">
        <?php $count = 0;
        $max = 0;
        if (isset($report)) {
        foreach ($report as $row) { ?>
            <tr>
                <td><?php echo $row->Date; ?></td>
                <td><?php echo $row->Subject; ?></td>
                <td><?php echo $row->Examtype; ?></td>
                <td><?php echo $row->Marksobtained; ?></td>
                <td><?php echo $row->Maxmarks; ?></td>
            </tr>
            <?php
            
            $marksObtained = intval($row->Marksobtained);
            if(is_int($marksObtained)) {
                $count = $count  +  $marksObtained;
            } 
            $max = $max + $row->Maxmarks;
        } ?>
        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th><?php echo $count; ?></th>
            <th><?php echo $max;
                if ($max != 0) {
                    $percent = ($count / $max) * 100;
                } else {
                    $percent = 0;
                } ?></th>
        </tr>
        </tbody>
    </table>
    <p style="font-family: RedhatR; font-size: 16px;">Percentage: <?php echo intval($percent) . " %"; ?></p>
    <?php } ?>

    <div class="col-xs-12 signature-container">
        <div class="col-xs-4">
            <p class="signature-container-names">Date:</p>
            <p class="signature-container-names">Place: </p>
        </div>
        <div class="col-xs-4">
            <p class="signature-container-names">Principal</p>
        </div>
        <div class="col-xs-4">
            <p class="signature-container-names">Controller of Examinations</p>
        </div>
    </div>

</div>
<script>
    window.onload = function () {
        window.print();
    }

</script>
</body>
</html>
