<?php error_reporting(0); ?>
<html lang="en">
<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="<?php echo base_url('assets/css/report_card.css') ?>" rel="stylesheet"/>
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

        .table-headings {
            text-align: center;
            vertical-align: center;
        }

        th {
            text-align: center;
        }
        td {
            text-align: center;
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
        <p class="school-address"><b><?php echo $this->config->item('schoolAddress') ?></b></p>
    </div>
    <div class="col-xs-12 info-container">
        <p class="page-title" style="font-size: 18px; text-align:center">ANNUAL EXAMINATION</p>
        <p class="report-card-title-sm" style="display: inline-block">CBSE Affiliation Code: 630180</p>
        <p class="report-card-title-sm" style="display: inline-block; float: right;">School No: 43169</p>
        <?php if (isset($student)) { ?>
        <p class="page-title" style="font-size: 16px; text-align:center">Class <?php echo $student->Class ?> (2023-2024)</p>
        <?php } ?>
    </div>
    <div class="col-xs-12 info-container">
        <?php if (isset($student)) { ?>
            <div class="col-xs-12">
                <p style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 16px">STUDENT PROFILE</p>
                <div class="col-xs-6" style="padding:0px !important">
                    <div class="col-xs-6" style="padding:0px !important">
                         <p>STUDENT NAME:  </p>
                         <p>FATHER NAME: </p>
                         <p> MOTHER NAME:</p>
                    </div>
                     <div class="col-xs-6" style="padding:0px !important">
                         <p><?php echo $student->Name; ?></p>
                         <p><?php echo $student->Fname ?></p>
                         <p><?php echo $student->Mname ?></p>
                    </div>
                    
                    
                </div>
                <div class="col-xs-6" style="padding:0px !important">
                    <div class="col-xs-6" style="padding:0px !important">
                        <p>DATE OF BIRTH:</p>
                        <p>ROLL NO:</p>
                        <p>AADHAAR NO:</p>
                    </div>
                    <div class="col-xs-6" style="padding-left:0px !important">
                        <p><?php echo date('d-m-Y', strtotime($student->Dob)) ?></p>
                        <p><?php echo $student->Rollno ?></p>
                        <p><?php echo $student->Aadharno ?></p>
                    </div>
                </div>

                <p style="text-align: center"></p>
                <?php if (isset($exams)) { ?>
                <?php } ?>
                
                <!--<div class="col-xs-4">-->
                <!--    <?php if ($student->image != null) { ?>-->
                <!--        <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"-->
                <!--             class="student-img" alt="">-->
                <!--    <?php } else { ?>-->
                <!--        <img src="<?php echo base_url('assets/icons/user.svg'); ?>"-->
                <!--             style="height: 150px; width: 150px;" alt="">-->
                <!--    <?php } ?>-->
                <!--</div>-->
            </div>
        <?php } ?>
    </div>

    <table class="table table-responsive">
        <thead class="report-card-table-head">
        <!-- <tr>
            <th>Subjects</th>
                <?php foreach($exams as $key => $examination) { ?>
                        <th>
                            <?php echo $examination->Examtype ?>
                        </th>
                <?php } ?>
            <th>Total</th>
            <th>Maxmimum Marks</th>
        </tr> -->
        <tr>
            <th rowspan="2" class="table-headings">Subject</th>
            <th colspan="2" class="table-headings">Theory</th>
            <th colspan="2" class="table-headings">I.A/Prac./ASL</th>
            <th rowspan="2" class="table-headings">Grand Total</th>
            <th rowspan="2" class="table-headings">GRADE</th>
        </tr>
        <tr>
            <th  class="table-headings">MAXIMUM MARKS</th>
            <th  class="table-headings">MARKS OBTAINED</th>
            <th  class="table-headings">MAXIMUM MARKS</th>
            <th  class="table-headings">MARKS OBTAINED</th>
        </tr>
        </thead>
        <tbody class="report-card-table-body">
        <?php if (isset($subjects)) { ?>
            <?php if(isset($subjectsOrder)) { ?>
                <?php foreach( $subjectsOrder as $key => $value ) { ?>
                    <?php foreach ($subjects as $subject) { ?>
                        <?php if( $value == $subject->Subject ) { ?>
                            <tr>
                                <?php $totalOfRow = 0; $maxMarksOfSubject = 0; ?>
                          <td>
                                    <?php
                                    switch($subject->Subject) {
                                        case 'English':
                                            echo "ENGLISH CORE (301)";
                                            break;
                                        case 'Chemistry':
                                            echo "CHEMISTRY (043)";
                                            break;
                                        case 'Physics':
                                            echo "PHYSICS (042)";
                                            break;
                                        case 'Maths':
                                            echo "MATHEMATICS (041)";
                                            break;
                                        case 'P.Ed':
                                            echo "PHYSICAL EDUCATION (048)";
                                            break;
                                        case 'Economics':
                                            echo "ECONOMICS (030)";
                                            break;
                                        case 'Biology':
                                            echo "BIOLOGY (044)";
                                            break;
                                        case 'Political Science':
                                            echo "POLITICAL SCIENCE (028)";
                                            break;
                                        case 'Accounts':
                                            echo "ACCOUNTANCY (055)";
                                            break;
                                        case 'Business Studies':
                                            echo "BUSINESS STUDIES (054)";
                                            break;
                                        case 'History':
                                            echo "HISTORY (027)";
                                            break;
                                        case 'I.P':
                                            echo "INFORMATICS PRACTICES (065)";
                                            break;
                                        case 'Legal Studies':
                                            echo "LEGAL STUDIES (074)";
                                            break;
                                        case 'Geography':
                                            echo "GEOGRAPHY (029)";
                                            break;
                                            
                                    }
                                    
                                     ?>
                                </td>
                                <?php if (isset($exams)) { $totalOfTermOne = 0; $totalOfTermTwo = 0;  $grade = 'C'; ?>
                                    <?php foreach ($exams as $key => $examination) {  ?>
                                        <td>
                                            <?php  if (isset($marks)) { ?>
                                                <?php foreach ($marks as $mark) { ?>
                                                    <?php if ($mark['examType'] == $examination->Examtype
                                                         && $mark['subject'] == $subject->Subject) {
                                                         if (isset($combinedArray)) {
                                                             foreach ($combinedArray as $key => $value) {
                                                                 if (!empty($value)) {
                                                    
                                                                     if ($mark['examType'] == $key) {
                                                                         if (is_numeric($mark['maxMarks'])) {
                                                                             $convertedObtainedMarks = number_format((($mark['marksObtained'] / $mark['maxMarks']) * $value), 1);
                                                                             echo $convertedObtainedMarks;
                                                                             $totalOfRow = $totalOfRow + $convertedObtainedMarks;
                                                                             $maxMarksOfSubject = $maxMarksOfSubject + $value;
                                                                             
                                                                             if($mark['examType'] == "Unit-1" || $mark['examType'] == "Term-1") {
                                                                                $totalOfTermOne = $totalOfTermOne + $convertedObtainedMarks;
                                                                    
                                                                             } 
    
                                                                             if($mark['examType'] == "Unit-2" || $mark['examType'] == "Term-2") {
                                                                                $totalOfTermTwo = $totalOfTermTwo + $convertedObtainedMarks;
                                                                  
                                                                             } 

                                                                         } else { ?>
                                                                        
                                                                         <input type="text" class="report-card-input" value="<?php echo $mark['marksObtained']; ?>" />
                                                                         <?php
                                                                            //  echo $mark['marksObtained'];
                                                                             
                                                                             if($mark['examType'] == "Unit-1" || $mark['examType'] == "Term-1") {
                                                                                   if($grade >= $mark['marksObtained']) {
                                                                                       $totalOfTermOne = $mark['marksObtained'];
                                                                                       $grade = $mark['marksObtained'];
                                                                                   }
                                                                             } 
    
                                                                            if($mark['examType'] == "Unit-2" || $mark['examType'] == "Term-2") {
                                                                                 if($grade >= $mark['marksObtained']) {
                                                                                       $totalOfTermTwo = $mark['marksObtained'];
                                                                                       $grade = $mark['marksObtained'];
                                                                                   }
                                                                  
                                                                             }
                                                                         }

                                                                     
                                                                     }
                                                                 } else { ?>
                                                                 
                                                                
                                                                  <input type="text" class="report-card-input" value="<?php echo $mark['maxMarks']; ?>" />
                                                                  </td><td>
                                                                     
                                                                 <input type="text" class="report-card-input" value="<?php echo $mark['marksObtained']; ?>" />
                                                                  
                                                                 </td>
                                                                 <?php
                                                                    // echo $mark['marksObtained'];
                                                                     if (is_numeric($mark['marksObtained'])) {
                                                                         $totalOfRow = $totalOfRow + $mark['marksObtained'];
                                                                         $maxMarksOfSubject = $maxMarksOfSubject + $mark['maxMarks'];

                                                                         if($mark['examType'] == "Unit-1" || $mark['examType'] == "Term-1") {
                                                                            $totalOfTermOne = $totalOfTermOne + $mark['marksObtained'];
                                                                   
                                                                         } 
    
                                                                         if($mark['examType'] == "Unit-2" || $mark['examType'] == "Term-2") {
                                                                            $totalOfTermTwo = $totalOfTermTwo + $mark['marksObtained'];
                                                                   
                                                                         } 
                                                                     } else {
                                                                           if($mark['examType'] == "Unit-1" || $mark['examType'] == "Term-1") {
                                                                                   if($grade >= $mark['marksObtained']) {
                                                                                       $totalOfTermOne = $mark['marksObtained'];
                                                                                       $grade = $mark['marksObtained'];
                                                                                   }
                                                                             } 
    
                                                                             if($mark['examType'] == "Unit-2" || $mark['examType'] == "Term-2") {
                                                                                 if($grade >= $mark['marksObtained']) {
                                                                                       $totalOfTermTwo = $mark['marksObtained'];
                                                                                       $grade = $mark['marksObtained'];
                                                                                   }
                                                                  
                                                                             }
                                                                     }
                                                                     break;
                                                                 }
                                                            }
                                                        }

                                                
                                                    }
                                                } ?>
                                            <?php } ?>
                                            <input type="text" class="report-card-input" />
                                        </td>
                                <?php } ?>


                                
                                    <?php } ?>
                                    <td>
                                        <?php if($totalOfRow == 0) { echo "<td><input type='text' class='report-card-input' /></td><td><input type='text' class='report-card-input' /></td><td><input type='text' class='report-card-input' /></td>"; continue; } else { ?>
                                        
                                         <b><input type='text' class='report-card-input' value="<?php echo $totalOfRow ?>"/></b>
                                         <?php } ?>
                                    </td>
                               
                                <td><?php 
                                    if($totalOfRow >= 91 && $totalOfRow <= 100) {
                                        echo "<input type='text' class='report-card-input' value='A1'/>";
                                    }
                                    if($totalOfRow >= 81 && $totalOfRow <= 90.9) {
                                        echo "<input type='text' class='report-card-input' value='A2'/>";
                                    }
                                    if($totalOfRow >= 71 && $totalOfRow <= 80.9) {
                                        echo "<input type='text' class='report-card-input' value='B1'/>";
                                    }
                                    if($totalOfRow >= 61 && $totalOfRow <= 70.9) {
                                        echo "<input type='text' class='report-card-input' value='B2'/>";
                                    }
                                    if($totalOfRow >= 51 && $totalOfRow <= 60.9) {
                                        echo "<input type='text' class='report-card-input' value='C1'/>";
                                    }
                                    if($totalOfRow >= 41 && $totalOfRow <= 50.9) {
                                        echo "<input type='text' class='report-card-input' value='C2'/>";
                                    }
                                    if($totalOfRow <= 40.9) {
                                        echo "<input type='text' class='report-card-input' value='D'/>";
                                    }
                                    
                                    if(!is_numeric($totalOfRow)) {
                                        echo "<input type='text' class='report-card-input' value='".$totalOfRow."'/>";
                                    }




                                // echo $maxMarksOfSubject 
                                
                                ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
            <?php 
                $totalMaxMarks = 0;
                $totalMarksObtained = 0 ;
                $convertedMaxMarks = 0;
                foreach ($subjects as $subject) { ?>
                    <?php if (isset($exams)) { ?>
                        <?php foreach ($exams as $key => $examination) { ?>
                            <?php if (isset($marks)) { ?>
                                <?php foreach ($marks as $mark) { ?>
                                    <?php if ($mark['examType'] == $examination->Examtype
                                        && $mark['subject'] == $subject->Subject) {
                                        if (isset($combinedArray)) {
                                            foreach ($combinedArray as $key => $value) {
                                                if (!empty($value)) {
                                                    if ($mark['examType'] == $key) {
                                                        if (is_numeric($mark['maxMarks'])) {
                                                            $convertedMaxMarks = $convertedMaxMarks + $value;
                                                        } else {
                                                            continue;
                                                        }
                                                    }
                                                } else {
                                                    if (is_numeric($mark['maxMarks'])) {
                                                        $convertedMaxMarks = $convertedMaxMarks + $mark['maxMarks'];
                                                    }
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    
                    <?php foreach ($exams as $key => $examination) { ?>
                        <?php if (isset($marks)) { ?>
                            <?php foreach ($marks as $mark) { ?>
                                <?php if ($mark['examType'] == $examination->Examtype
                                    && $mark['subject'] == $subject->Subject) {
                                    if (isset($combinedArray)) {
                                        foreach ($combinedArray as $key => $value) {
                                            if (!empty($value)) {
                                                if ($mark['examType'] == $key) {
                                                    if (is_numeric($mark['maxMarks'])) {
                                                        $convertedObtainedMarks = ($mark['marksObtained'] / $mark['maxMarks']) * $value;
                                                        $totalMarksObtained = $totalMarksObtained + $convertedObtainedMarks;
                                                    } else {
                                                        continue;
                                                    }
                                                }
                                            } else {
                                                if (is_numeric($mark['marksObtained'])) {
                                                    $totalMarksObtained = $totalMarksObtained + $mark['marksObtained'];
                                                }
                                                break;
                                        }
                                    }
                                }
                            } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            
        </tbody>
    </table>

    <p style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 16px"><b>Co Scholastic Areas</b></p>
    <div class="col-xs-12 metrics-box">
        <?php if (isset($metrics)) { ?>
            <table class="table table-responsive" style="margin-bottom: 0px !important">
                <thead class="report-card-table-head">
                <tr>
                    <th class="table-data">Activities</th>
                    <th>Grade</th>
                </tr>
                </thead>
                <tbody class="report-card-table-body">
                <?php foreach ($metrics as $metric) { ?>
                    <tr>
                        <td class="table-data"><b><?php echo $metric->metric_name ?></b></td>
                        <td><b><?php echo $metric->mark ?></b></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    
    <table class="table table-bordered" style="margin-bottom: 0px !important">
        <thead class="report-card-table-head">
            <tr>
                <th>Total Marks:  <input type="text" class="report-card-input" value="<?php echo $convertedMaxMarks; ?>" /></th>
                <th>Marks Obtained: <input type="text" class="report-card-input" value="<?php echo number_format($totalMarksObtained, 1); ?>"/></th>
                <th>Percentage:  <input type="text" class="report-card-input" value="<?php $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100;
                            echo number_format($percentage, 1)."%";
                        ?>" />
                </th>
                <th>Grade: 
                   <?php 
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 91 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 100) {
                                        echo "<input type='text' class='report-card-input' value='A1'/>";
                                    }
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 81 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 90.9) {
                                        echo "<input type='text' class='report-card-input' value='A2'/>";
                                    }
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 71 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 80.9) {
                                        echo "<input type='text' class='report-card-input' value='B1'/>";
                                    }
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 61 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 70.9) {
                                        echo "<input type='text' class='report-card-input' value='B2'/>";
                                    }
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 51 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 60.9) {
                                        echo "<input type='text' class='report-card-input' value='C1'/>";
                                    }
                                    if( $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 >= 41 &&  $percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 50.9) {
                                        echo "<input type='text' class='report-card-input' value='C2'/>";
                                    }
                                    if($percentage = ($totalMarksObtained/$convertedMaxMarks) * 100 <= 40.9) {
                                        echo "<input type='text' class='report-card-input' value='D'/>";
                                    }
                    ?> 
                </th>
            </tr>
        </thead>
    </table>
    
    <p class="teacher-remark-box" style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 16px; margin-bottom:0px !important"><b>Class Teacher's Remark:  </b></p>
    <p class="teacher-remark-box" style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 16px; margin-bottom:0px !important"><b>Promoted to:  </b></p>
    <div class="col-xs-12 signature-container">
        <div class="col-xs-3" style="text-align: center">
            <p class="signature-container-names" ><b>Class Incharge</b></p>
        </div>
           <div class="col-xs-3" style="text-align: center">
            <p class="signature-container-names" ><b>Coordinator </b></p>
        </div>
        <div class="col-xs-3" style="text-align: center">
            <p class="signature-container-names" ><b>Examination Incharge</b></p>
        </div>
        <div class="col-xs-3" style="text-align: right">
            <p class="signature-container-names"><b>Principal</b></p>
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
