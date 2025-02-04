<html lang="en">
<head>
    <title><?php if(isset($student)){ echo $student->Class."-".$student->Name."-".$student->Rollno; } ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link media="print" href="<?php echo base_url('assets/css/report_card.css') ?>" rel="stylesheet"/>
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
            font-size: 12px !important;
            padding: 3px;
            border: 1px solid #000 !important;
        }
        td {
            text-align: center;
            font-size: 12px;
            padding: 3px !important;
            border: 1px solid;
        }
        
    .school-logo {
	    width: 75%;
	}
	
	.student-img {
	    width: 75%;
	}
	
	.student-detail {
	    height: 25px;
	    font-size: 12px;
	    text-align:left !important;
	    text-transform:uppercase;
	}
	
	.top-details {
	    margin:0 !important;
	}
	
	.report-card-input {
	    border: none;
	    outline: none;
	    width: 75px;
	}
	
	.star{
	    font-size:12px;
	    color: #ED4045;
	}
	
	.teacher-remark-box{
	    text-transform:uppercase;
	}
	<?php if($student->Class == "Nursery" || $student->Class == "LKG" || $student->Class == "UKG" ) {
	    echo " @media print{ body { border: none !important; } }";
	}
	?>
    </style>
</head>
<body>
    <div class="col-xs-12" style="padding:0">
        <div class="col-xs-12" style="padding:0">
            
            <?php if(isset($student))  { 
                if($student->Class == "PLAY-SCHOOL" || $student->Class == "PRE-NURSERY" || $student->Class == "Nursery" || $student->Class == "UKG-A" || $student->Class == "UKG-B" ) {
            ?>
           <div class="col-xs-12" style="padding: 0px;">
                 <img
                        src="<?php echo base_url('assets/images/report-card/header.png') ?>"
                        alt="School Logo"
                />
           
            </div>
            
            <div class="col-xs-12" style="margin-top: 20px">
       
                     <div class="col-xs-10" style="padding: 0px">
                                 <table class="table table-responsive table-bordered" style="margin-bottom: 0px !important">
                                    <tbody class="report-card-table-body">
                                        <tr>
                                            <td class="student-detail">Student's Name: <?php echo $student->Name; ?></td>
                                            <td class="student-detail">Class: 
                                            <?php
                                                if($student->Class == "UKG-A" || $student->Class == "UKG-B" ){ echo substr($student->Class, 0, 3); } else { echo $student->Class; }
                                            ?>
                                            </td>
                                            <td class="student-detail">Section: 
                                            <?php
                                                if($student->Class == "UKG-A" || $student->Class == "UKG-B" ){ echo substr($student->Class, 4); } 
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="student-detail">Father's Name: <?php echo $student->Fname ?></td>
                                            <td class="student-detail">Mother's Name: <?php echo $student->Mname ?></td>
                                            <td class="student-detail">Roll No: <?php echo $student->Rollno ?></td>
                                        </tr>
                                        <tr>
                                            <td class="student-detail">Adm. No: <?php echo $student->Admno?></td>
                                            <td class="student-detail">D.O.B.: <?php echo date('d-m-Y', strtotime($student->Dob)) ?></td>
                                            <td class="student-detail">Gender: 
                                                <?php if ($student->gender === 'm') {
                                                    echo "Male";
                                                } else {
                                                    echo "Female";
                                                }
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td class="student-detail">
                                                Height: <?php echo $student->height." cm";?>
                                            </td>
                                            <td class="student-detail">Weight: <?php echo $student->weight." Kg"; ?></td>
                                            <td class="student-detail">B. Gr.: <?php echo $student->blood_group ?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                    <div class="col-xs-2" style="padding: 0px; text-align: right;">
                            <?php if ($student->image != null) { ?>
                            <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"
                                 class="student-img" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                                 style="height: 100px; width: 100px;" alt="">
                        <?php } ?>
                    </div>
            
            </div>
    

    
        <div class="col-xs-12 info-container" style="margin-top: 20px;">
            <div class="col-xs-12" style="background: #D8D4A7; border-radius: 10px; margin-bottom: 15px; text-align: center;">
                        <p class="paragraph" style="padding: 15px; "><span style=" width:100%; display: block; font-weight: 900">You Can</span>
                    You can do it. I know you can,
                    I trust and believe in your plan.<br/>
                    It's clear that you have what it takes, 
                    You simply won't need any breaks.<br/>
                    You can do it, I know you can,
                    I'm your biggest fan.<br/>
                    Enjoy the journey - I Pray.</p>
            </div>
        
  
        </div>
    



    <?php //table ?>

        <div class="col-xs-12" >
            <?php if (isset($metrics)) { ?>
                        <?php foreach($metricsName as $key => $value){ ?>
                        <div class="col-xs-12 card" style="background: #D8D4A7; margin-bottom: 12px; border-radius: 15px; padding: 10px; <?php if($value == "Social Skills" && $student->id == 38){echo "margin-top: 0px";} else if($value == 'Social Skills'){ echo 'margin-top: 30px;'; } if($value == 'Numbers'){ echo 'margin-top: 75px;'; }  ?>">
                            <p style="text-align: center; text-transform: uppercase; font-size:12px; font-weight: 900"><?php echo $value ?></p>
                            <?php foreach ($metrics as $metric) { 
                                if($value == $metric->metric_name) { ?>
                                <div class="col-xs-12">
                                    <div class="col-xs-9" style="border: 1px solid #000; padding: 2px; font-size: 12px;  ">
                                        <?php echo $metric->ability ?>
                                    </div>
                                    <div class="col-xs-3"  style="border: 1px solid #000; padding: 2px; font-size: 12px; text-align: center">
                                        <?php
                                                for($i=0; $i < $metric->mark; $i++)
                                                {
                                                    echo "<span class='star'>&#9733</span>";
                                                }
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                           
                          
                            <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            
            <div class="col-xs-12 remarks" style="background:#D8D4A7; padding: 10px; border-radius: 15px; ">
                <div class="col-xs-12" style="font-size: 15px; text-align: center; text-transform: uppercase; font-weight: 900">
                    Special Comments
                </div>
                <div class="col-xs-12" style="text-align: center; padding: 2px; font-size: 14px;">
                 <?php  if($student->Class == "Nursery" && $student->id == 38){ echo "All the best for your future. May god bless you."; }
                          else if($student->Class == "PRE-NURSERY" && $student->id == 16){ echo "Can do better if he is regular to school. ";}
                 else if($student->Class == "PRE-NURSERY" && $student->id == 546){ echo "Needs to practice his speech. ";}
                 else if($student->Class == "PRE-NURSERY"){ echo "Is an enthusiastic learner who seems to enjoy school, has a great attitude towards learning. ";}
                    else if($student->Class == "Nursery" && $student->id == 38) { echo "All the best for your future. May god bless you.";}
                 else if($student->Class == "Nursery") {   echo "You are confident, positive and a valuable part of my class. God bless you.";}
              
                 else if($student->Class == "PLAY-SCHOOL") { echo "All the best for your future. May god bless you.";}
                 else{ echo "Strive to be better than yesterday and you'll find the true essence of life. May God bless you."; } ?>
                </div>
                <div class="col-xs-12">
                    <p style="text-align: center; font-weight: 900; font-size: 14px;">Promoted to Class <?php if($student->Class == "Nursery"){ echo "KG";}else if($student->Class == "PRE-NURSERY") { echo "LKG"; } else if($student->Class == "UKG-A" || $student->Class == "UKG-B"){ echo " 1"; } else if($student->Class == "PLAY-SCHOOL") { echo "Nursery";} ?></p>
                </div>
                <div class="col-xs-12" style="padding-top: 30px">
                       <div class="col-xs-6">
                            Teacher's Sign
                        </div>
                        <div class="col-xs-6" style="text-align: right;">
                            Vice Principal's Sign
                        </div>
                </div>
             
                           
            </div>
        </div>
    
    </div>
 </div>
    
    

    
    <?php } else if($student->Class == "1-A" || $student->Class == "1-B" || $student->Class == "2-A") { ?>
    <div class="col-xs-12" >
        <div class="col-xs-12" style="">
             <div class="col-xs-12">
                            <div class="col-xs-3">
                    
                                <img
                                        src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                                        class="school-logo"
                                        alt="School Logo"
                                />
                    
                            </div>
                    
                            <div class="col-xs-6" style="text-align: center;">
                                <p class="top-details" style="font-size: 24px; font-family: Nunito-semibold; font-weight: 900; text-transform: uppercase;"><?php echo $this->config->item('schoolName') ?></p>
                                <p class="top-details"><?php echo $this->config->item('schoolAddress') ?></p>
                                <p class="top-details">Website: www.kkblossomschool.org/</p>
                                <p class="top-details">Recognition Number: 16/2022-27</p>
                                <p class="top-details">UDISE No: 02090112903</p>
                            </div>
                   
                </div>
    
 
              <table class="table table-bordered" style="margin-bottom: 0px !important">
                    <thead class="report-card-table-head">
                        <tr>
                            <th>
                                Report Card: Academic Session 2024-25
                            </th>
                        </tr>
                    </thead>
                </table>
    
                <div class="col-xs-12 info-container" >
     
                    <div class="col-xs-10" style="padding: 0px">
                                 <table class="table table-responsive table-bordered" style="margin-bottom: 0px !important">
                                    <tbody class="report-card-table-body">
                                        <tr>
                                            <td class="student-detail">Student's Name: <?php echo $student->Name; ?></td>
                                            <td class="student-detail">Class: <?php echo substr($student->Class, 0, 1)?></td>
                                            <td class="student-detail">Section: <?php echo substr($student->Class, 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="student-detail">Father's Name: <?php echo $student->Fname ?></td>
                                            <td class="student-detail">Mother's Name: <?php echo $student->Mname ?></td>
                                            <td class="student-detail">Roll No: <?php echo $student->Rollno ?></td>
                                        </tr>
                                        <tr>
                                            <td class="student-detail">Adm. No.: <?php echo $student->Admno?></td>
                                            <td class="student-detail">D.O.B: <?php echo date('d-m-Y', strtotime($student->Dob)) ?></td>
                                            <td class="student-detail">Gender: <?php echo $student->gender; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="student-detail">
                                                Height: <?php echo $student->height." cm";?>
                                            </td>
                                            <td class="student-detail">Weight: <?php echo $student->weight." Kg"; ?></td>
                                            <td class="student-detail">B.Gr.: <?php echo $student->blood_group ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    <div class="col-xs-2" style="padding: 0px; text-align: right;">
                            <?php if ($student->image != null) { ?>
                            <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"
                                 class="student-img" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                                 style="height: 150px; width: 150px;" alt="">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 25px; padding: 0">
              <table class="table">
                <thead class="report-card-table-head">
                    <tr>
                        <th colspan="12">Scholastic Result</th>
                    </tr>
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
                    <th  rowspan="2" class="table-headings">Subjects</th>
                    <th class="table-headings">WSA-I</th>
                    <th class="table-headings">CA-I</th>
                    <th class="table-headings">NB-I</th>
                    <th class="table-headings">SEA-I</th>
                    <th class="table-headings">Total</th>
                    <th class="table-headings">WSA-II</th>
                    <th class="table-headings">CA-II</th>
                    <th class="table-headings">NB-II</th>
                    <th class="table-headings">SEA-II</th>
                    <th class="table-headings">Total</th>
                     <th rowspan="2">Total (Term 1  + Term 2)</th>
                </tr>
                <!--<tr>-->
                <!--    <th>Total-30</th>-->
                <!--    <th>Total-10</th>-->
                <!--    <th>Total-5</th>-->
                <!--    <th>Total-5</th>-->
                <!--    <th>Total-50</th>-->
                <!--    <th>Total-30</th>-->
                <!--    <th>Total-10</th>-->
                <!--    <th>Total-5</th>-->
                <!--    <th>Total-5</th>-->
                <!--    <th>Total-50</th>-->
                   
                <!--</tr>-->
                </thead>
                <tbody class="report-card-table-body">
                <?php if (isset($subjects)) { $grandTotal = 0; $totalMaxMarks=0; ?>
                    <?php if(isset($subjectsOrder)) { ?>
                        <?php foreach( $subjectsOrder as $key => $value ) { ?>
                            <?php foreach ($subjects as $subject) { ?>
                                <?php if( $value == $subject->Subject ) { ?>
                                    <tr>
                                        <?php $totalOfRow = 0; $maxMarksOfSubject = 0; ?>
                                        <td>
                                            <?php echo $subject->Subject ?>
                                        </td>
                                        <?php if (isset($exams)) { $totalOfTermOne = 0; $totalOfTermTwo = 0; $totalOfRow = 0;  ?>
                                            <?php foreach ($exams as $key => $examination) {    ?>
                                                    <?php if (isset($marks)) { ?>
                                                        <?php foreach ($marks as $mark) { ?>
                                                            <?php if ($mark['examType'] == $examination->Examtype
                                                                 && $mark['subject'] == $subject->Subject) { ?>
                                                                 
                                                                <?php if($mark['examType'] == "WSA-II"){ 
                                                                        if($totalOfTermOne <= 50 && $totalOfTermOne >= 46){
                                                                            $gradeTermOne = "A1";
                                                                        }
                                                                        if($totalOfTermOne < 46 && $totalOfTermOne >= 41){
                                                                            $gradeTermOne = "A2";
                                                                        } 
                                                                        if($totalOfTermOne < 41 && $totalOfTermOne >= 36){
                                                                            $gradeTermOne = "B1";
                                                                        } 
                                                                        if($totalOfTermOne < 36 && $totalOfTermOne >= 31){
                                                                            $gradeTermOne = "B2";
                                                                        } 
                                                                        if($totalOfTermOne < 31 && $totalOfTermOne >= 26){
                                                                            $gradeTermOne = "C1";
                                                                        } 
                                                                        if($totalOfTermOne < 26 && $totalOfTermOne >= 21){
                                                                            $gradeTermOne = "C2";
                                                                        } 
                                                                        if($totalOfTermOne < 20  && $totalOfTermOne >= 17){
                                                                            $gradeTermOne = "D";
                                                                        } 
                                                                        if($totalOfTermOne < 17 && $totalOfTermOne >= 0){
                                                                            $gradeTermOne = "E";
                                                                        }
                                                                    echo "<td>".$gradeTermOne."</td>";
                                                                 
                                                                 }?>
                                                                 
                                                                 <td>
                                                                    <?php 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] <=30 && $mark['marksObtained'] >= 27.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 27.5 && $mark['marksObtained'] >= 24.5){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 24.5 && $mark['marksObtained'] >= 21.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 21.5 && $mark['marksObtained'] >= 18.5){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 18.5 && $mark['marksObtained'] >= 15.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 15.5 && $mark['marksObtained'] >= 12.5){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 12.5  && $mark['marksObtained'] >= 10){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-I" && $mark['marksObtained'] < 10 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] <=30 && $mark['marksObtained'] >= 27.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 27.5 && $mark['marksObtained'] >= 24.5){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 24.5 && $mark['marksObtained'] >= 21.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 21.5 && $mark['marksObtained'] >= 18.5){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 18.5 && $mark['marksObtained'] >= 15.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 15.5 && $mark['marksObtained'] >= 12.5){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 12.5  && $mark['marksObtained'] >= 10){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "WSA-II" && $mark['marksObtained'] < 10 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] <= 10 && $mark['marksObtained'] >= 9.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 9.5 && $mark['marksObtained'] >= 8.5){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 8.5 && $mark['marksObtained'] >= 7.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 7.5 && $mark['marksObtained'] >= 6.5){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 6.5 && $mark['marksObtained'] >= 5.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 5.5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 4.5  && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "CA-I" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] <= 10 && $mark['marksObtained'] >= 9.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 9.5 && $mark['marksObtained'] >= 8.5){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 8.5 && $mark['marksObtained'] >= 7.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 7.5 && $mark['marksObtained'] >= 6.5){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 6.5 && $mark['marksObtained'] >= 5.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 5.5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 4.5  && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "CA-II" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] <= 5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 4.5 && $mark['marksObtained'] >= 4){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 4 && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 3){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 3 && $mark['marksObtained'] >= 2.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 2.5 && $mark['marksObtained'] > 2){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] == 2){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "NB-I" && $mark['marksObtained'] < 2 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] <= 5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 4.5 && $mark['marksObtained'] >= 4){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 4 && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 3){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 3 && $mark['marksObtained'] >= 2.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 2.5 && $mark['marksObtained'] > 2){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] == 2){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "NB-II" && $mark['marksObtained'] < 2 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] <= 5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 4.5 && $mark['marksObtained'] >= 4){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 4 && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 3){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 3 && $mark['marksObtained'] >= 2.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 2.5 && $mark['marksObtained'] > 2){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] == 2){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-I" && $mark['marksObtained'] < 2 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] <= 5 && $mark['marksObtained'] >= 4.5){
                                                                            $grade = "A1";
                                                                        }
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 4.5 && $mark['marksObtained'] >= 4){
                                                                            $grade = "A2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 4 && $mark['marksObtained'] >= 3.5){
                                                                            $grade = "B1";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 3.5 && $mark['marksObtained'] >= 3){
                                                                            $grade = "B2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 3 && $mark['marksObtained'] >= 2.5){
                                                                            $grade = "C1";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 2.5 && $mark['marksObtained'] > 2){
                                                                            $grade = "C2";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] == 2){
                                                                            $grade = "D";
                                                                        } 
                                                                        if($mark['examType'] == "SEA-II" && $mark['marksObtained'] < 2 && $mark['marksObtained'] >= 0){
                                                                            $grade = "E";
                                                                        }
                                                                        
                                                                        
                                                                        echo $grade; ;
                                                                    ?>
                                                                     <?php 
                                            
                                                                        $totalOfRow = $totalOfRow + $mark['marksObtained'];
                                                                        $grandTotal = $grandTotal+ $mark['marksObtained'];
                                                                        $totalMaxMarks = $totalMaxMarks + $mark['maxMarks'];
                                                                        if($mark['examType'] == "WSA-I" || $mark['examType'] == "CA-I" || $mark['examType'] == "NB-I" || $mark['examType'] == "SEA-I") {
                                                                            $totalOfTermOne = $totalOfTermOne +  $mark['marksObtained'];  
                                                                        } 
                                                                        
                                                                         if($mark['examType'] == "WSA-II" || $mark['examType'] == "CA-II" || $mark['examType'] == "NB-II" || $mark['examType'] == "SEA-II") {
                                                                            $totalOfTermTwo = $totalOfTermTwo +  $mark['marksObtained'];  
                                                                        } 
                                                                     ?>
                                                                 </td>
                                                                 
                                                                     <?php if($mark['examType'] == "SEA-II"){ 
                                                                        if($totalOfTermTwo <= 50 && $totalOfTermTwo >= 46){
                                                                            $gradeTermTwo = "A1";
                                                                        }
                                                                        if($totalOfTermTwo < 46 && $totalOfTermTwo >= 41){
                                                                            $gradeTermTwo = "A2";
                                                                        } 
                                                                        if($totalOfTermTwo < 41 && $totalOfTermTwo >= 36){
                                                                            $gradeTermTwo = "B1";
                                                                        } 
                                                                        if($totalOfTermTwo < 36 && $totalOfTermTwo >= 31){
                                                                            $gradeTermTwo = "B2";
                                                                        } 
                                                                        if($totalOfTermTwo < 31 && $totalOfTermTwo >= 26){
                                                                            $gradeTermTwo = "C1";
                                                                        } 
                                                                        if($totalOfTermTwo < 26 && $totalOfTermTwo >= 21){
                                                                            $gradeTermTwo = "C2";
                                                                        } 
                                                                        if($totalOfTermTwo < 20  && $totalOfTermTwo >= 17){
                                                                            $gradeTermTwo = "D";
                                                                        } 
                                                                        if($totalOfTermTwo < 17 && $totalOfTermTwo >= 0){
                                                                            $gradeTermTwo = "E";
                                                                        }
                                                                    echo "<td>".$gradeTermTwo."</td>";
                                                                         }?>
                                                                 
                                                            <?php }
                                                        } ?>
                                                    <?php } ?>
                                                  
                                                <?php } ?>
                                                <td>
                                                    <?php 
                                                       
                                                        $totalOfTermOneAndTwo = ($totalOfTermOne) + ($totalOfTermTwo);
                                                            if($totalOfTermOneAndTwo <= 100 && $totalOfTermOneAndTwo >= 91){
                                                                            $gradeTermOneAndTwo = "A1";
                                                                        }
                                                                        if($totalOfTermOneAndTwo < 91 && $totalOfTermOneAndTwo >= 81){
                                                                            $gradeTermOneAndTwo = "A2";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 81 && $totalOfTermOneAndTwo >= 71){
                                                                            $gradeTermOneAndTwo = "B1";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 71 && $totalOfTermOneAndTwo >= 61){
                                                                            $gradeTermOneAndTwo = "B2";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 61 && $totalOfTermOneAndTwo >= 51){
                                                                            $gradeTermOneAndTwo = "C1";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 51 && $totalOfTermOneAndTwo >= 41){
                                                                            $gradeTermOneAndTwo = "C2";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 41  && $totalOfTermOneAndTwo >= 33){
                                                                            $gradeTermOneAndTwo = "D";
                                                                        } 
                                                                        if($totalOfTermOneAndTwo < 33 && $totalOfTermOneAndTwo >= 0){
                                                                            $gradeTermOneAndTwo = "E";
                                                                        }
                                                        echo $gradeTermOneAndTwo;
                                                    ?>
                                                </td>
                                            <?php } ?>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
            
                <table class="table table-bordered" style="margin-bottom: 0px !important">
                <thead class="report-card-table-head">
                    <!--<tr>-->
                    <!--    <th>Grand Total:  <input type="text" class="report-card-input" value="<?php echo ($grandTotal)."/".($totalMaxMarks)  ?>" /></th>-->
                    <!--    <th>-->
                            <?php 
                                // $percentage = ($grandTotal/$totalMaxMarks) * 100;
                                // $percentage = number_format($percentage, 1)."%";
                            ?>
                        <!--    Percentage:  <input type="text" class="report-card-input" value="<?php echo $percentage ?>" />-->
                        <!--</th>-->
                        <th>Overall Grade: 
                           <?php //echo "(".$grandTotal."/".$totalMaxMarks.")";
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 91 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 100) {
                                                echo "<input type='text' class='report-card-input' value='A1'/>";
                                            }
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 81 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 90.9) {
                                                echo "<input type='text' class='report-card-input' value='A2'/>";
                                            }
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 71 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 80.9) {
                                                echo "<input type='text' class='report-card-input' value='B1'/>";
                                            }
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 61 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 70.9) {
                                                echo "<input type='text' class='report-card-input' value='B2'/>";
                                            }
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 51 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 60.9) {
                                                echo "<input type='text' class='report-card-input' value='C1'/>";
                                            }
                                            if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 41 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 50.9) {
                                                echo "<input type='text' class='report-card-input' value='C2'/>";
                                            }
                                            if($percentage = ($grandTotal/$totalMaxMarks) * 100 <= 40.9) {
                                                echo "<input type='text' class='report-card-input' value='D'/>";
                                            }
                            ?> 
                        </th>
                    </tr>
                </thead>
            </table>
            
            <table class="table table-responsive" style="margin-top: 25px">
                    <thead class="report-card-table-head">
                    <tr>
                        <th colspan="9">Grading Scale</th>
                    </tr>
                    </thead>
                        <tbody class="report-card-table-body">
                            <tr>
                                <td>Mark Range</td>
                                <td>100 - 91</td>
                                <td>90 - 81</td>
                                <td>80 - 71</td> 
                                <td>70 - 61</td>
                                <td>60 - 51</td>
                                <td>50 - 41</td>
                                <td>40 - 33</td>
                                <td>32 - 0</td>
                            </tr>
                            <tr>
                                <td>Grades</td>
                                <td>A1</td>
                                <td>A2</td>
                                <td>B1</td>
                                <td>B2</td>
                                <td>C1</td>
                                <td>C2</td>
                                <td>D</td>
                                <td>E</td>
                                
                            </tr>
                        </tbody>
            </table>
            
                    <div class="col-xs-12 metrics-box" style="padding: 0">
                        <?php if (isset($metrics)) { ?>
                            <table class="table table-responsive" style="margin-bottom: 0px !important">
                                <thead class="report-card-table-head">
                                <tr>
                                    <th colspan="3">Co Scholastic Result</th>
                                </tr>
                                <tr>
                                    <th class="table-data">Activities</th>
                                    <th>Term-1</th>
                                    <th>Term-2</th>
                                </tr>
                                </thead>
                                <tbody class="report-card-table-body">
                                    <tr>
                                        <td>Art/Music</td>
                                         <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                        <?php } ?>
                                       
                                    </tr>
                                    <tr>
                                        <td>Health & Physical Education</td>
                                            <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                            <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                                <?php } ?>
                    </div>
            </div>
            
            <div class="col-md-12" style="padding: 0; margin-top: 25px;">
            <table class="table table-bordered" style="text-transform:uppercase;">
                <thead class="report-card-table-head">
                    <tr>
                        <th colspan="3">Attendance</th>
                             <?php if (isset($metrics)) { ?>
                                <?php foreach ($metrics as $metric) {?> 
                                    <?php if($metric->metric_name == "Attendance" && $metric->ability == "Present") { ?>
                                        <?php $present = $metric->mark; ?>
                                    <?php } ?>
                                    
                                     <?php if($metric->metric_name == "Attendance" && $metric->ability == "Total Days") { ?>
                                        <?php $totalDays = $metric->mark; ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                    </tr>
                    <tr>
                        <th>Present: 
                        <input 
                            type="text" 
                            value="<?php if(isset($present)){ echo $present; } ?>"
                            class="report-card-input"
                        />
                    </th>
                        <th>Total Days <input type="text" value="<?php if(isset($totalDays)){ echo $totalDays; } ?>" class="report-card-input"/>
                        </th>
                        <th>Percentage: <input type="text" value="<?php if(isset($totalDays) && isset($present)){ echo number_format(($present/$totalDays)*100, 1).'%'; } ?>" class="report-card-input"/>
                        </th>
                    </tr>
                </thead>
            </table>
            </div>
        
            
            
            <p class="" style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 14px; margin-bottom:0px !important">
                <b>Remarks:  
                <?php if(isset($remarks)) {echo $remarks;} ?>
         
                </b>
            </p>
            <p class="signature-container-names" style="">
                <b>Result:
                 <?php if(isset($result)) {echo $result;} ?>
                </b>
            </p>
            <div class="col-xs-12 signature-container" style="padding-top: 60px;">
                <div class="col-xs-6" style="text-align: left">
                    <p class="signature-container-names" ><b>Teacher's Signature</b></p>
                </div>
                <div class="col-xs-6" style="text-align: right">
                    <p class="signature-container-names"><b>Principal's Signature</b></p>
                </div>
            </div>
         </div>
         
    </div>
    
    
    
    
    <?php } else if($student->Class == "3-A" || $student->Class == "3-B" || $student->Class == "4-A" || $student->Class == "4-B" || $student->Class == "5-A" || $student->Class == "5-B") {?>
    <div class="col-xs-12" style="">
        <div class="col-xs-12" style="padding: 0">
            
        
        <div class="col-xs-12" style="">
            <div class="col-xs-3">
    
                <img
                        src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                        class="school-logo"
                        alt="School Logo"
                />
    
            </div>
            
            <div class="col-xs-6" style="text-align: center;">
                <p class="top-details" style="font-size: 24px; font-family: Nunito-semibold; font-weight: 900; text-transform: uppercase;"><?php echo $this->config->item('schoolName') ?></p>
                <p class="top-details"><?php echo $this->config->item('schoolAddress') ?></p>
                <p class="top-details">Website: www.kkblossomschool.org/</p>
                <p class="top-details">Recognition Number: 16/2022-27</p>
                 <p class="top-details">UDISE No: 02090112903</p>
                
            </div>
           
        </div>
        
 
  <table class="table table-bordered table-responsive" style="margin-bottom: 0px !important">
        <thead class="report-card-table-head">
            <tr>
                <th>
                    Report Card: Academic Session 2024-25
                </th>
            </tr>
        </thead>
    </table>
    
    <div class="col-xs-12 info-container" style="">
 
            <div class="col-xs-10" style="padding: 0px">
                         <table class="table table-responsive" style="margin-bottom: 0px !important">
                            <tbody class="report-card-table-body">
                                <tr>
                                    <td class="student-detail">Student's Name: <?php echo $student->Name; ?></td>
                                    <td class="student-detail">Class: <?php echo substr($student->Class, 0, 1)?></td>
                                    <td class="student-detail">Section: <?php echo substr($student->Class, 2) ?></td>
                                </tr>
                                <tr>
                                    <td class="student-detail">Father's Name: <?php echo $student->Fname ?></td>
                                    <td class="student-detail">Mother's Name: <?php echo $student->Mname ?></td>
                                    <td class="student-detail">Roll No: <?php echo $student->Rollno ?></td>
                                </tr>
                                <tr>
                                    <td class="student-detail">Adm. No: <?php echo $student->Admno?></td>
                                    <td class="student-detail">D.O.B: <?php echo date('d-m-Y', strtotime($student->Dob)) ?></td>
                                    <td class="student-detail">Gender: <?php echo $student->gender; ?></td>
                                </tr>
                                      <tr>
                                            <td class="student-detail">
                                                Height: <?php echo $student->height." cm";?>
                                            </td>
                                            <td class="student-detail">Weight: <?php echo $student->weight." Kg"; ?></td>
                                            <td class="student-detail">B.Gr: <?php echo $student->blood_group ?></td>
                                        </tr>
                            </tbody>
                        </table>
                </div>
                <div class="col-xs-2" style="padding: 0px; text-align: right;">
                        <?php if ($student->image != null) { ?>
                        <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"
                             class="student-img" alt="">
                    <?php } else { ?>
                        <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                             style="height: 150px; width: 150px;" alt="">
                    <?php } ?>
                </div>
                
                

         
                <?php if (isset($exams)) { ?>
                <?php } ?>
                
                <!--<div class="col-xs-4">-->
             
                <!--</div>-->
            </div>
    <div class="col-xs-12" style="padding: 0">
   <div class="col-xs-12" style="margin-top: 5px; padding: 0">
      <table class="table table-responsive">
        <thead class="report-card-table-head">
            <tr>
                <th colspan="12">Scholastic Result</th>
            </tr>
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
            <th  rowspan="2" class="table-headings">Subjects</th>
            <th class="table-headings">Work Sheet-I</th>
            <th class="table-headings">Project-I</th>
            <th class="table-headings">NB & SEA-I</th>
            <th class="table-headings">Class Test-I</th>
            <th class="table-headings">Total</th>
            <th class="table-headings">Work Sheet-II</th>
            <th class="table-headings">Project-II</th>
            <th class="table-headings">NB & SEA-II</th>
            <th class="table-headings">Class Test-II</th>
            <th class="table-headings">Total</th>
               <th rowspan="3">Total Term 1 (50%) + Term 2 (50%)</th>
        </tr>
        <tr>
            <th>Total-50</th>
            <th>Total-10</th>
            <th>Total-20</th>
            <th>Total-20</th>
            <th>Total-100</th>
            <th>Total-50</th>
            <th>Total-10</th>
            <th>Total-20</th>
            <th>Total-20</th>
            <th>Total-100</th>
         
        </tr>
        </thead>
        <tbody class="report-card-table-body">
        <?php if (isset($subjects)) { $grandTotal = 0; $totalMaxMarks=0; ?>
            <?php if(isset($subjectsOrder)) { ?>
                <?php foreach( $subjectsOrder as $key => $value ) { ?>
                    <?php foreach ($subjects as $subject) { ?>
                        <?php if( $value == $subject->Subject ) { ?>
                            <tr>
                                <?php $totalOfRow = 0; $maxMarksOfSubject = 0; ?>
                                <td>
                                    <?php echo $subject->Subject ?>
                                </td>
                                <?php if (isset($exams)) { $totalOfTermOne = 0; $totalOfTermTwo = 0; $totalOfRow = 0;  ?>
                                    <?php foreach ($exams as $key => $examination) {    ?>
                                            <?php if (isset($marks)) { ?>
                                                <?php foreach ($marks as $mark) { ?>
                                                    <?php if ($mark['examType'] == $examination->Examtype
                                                         && $mark['subject'] == $subject->Subject) { ?>
                                                         
                                                        <?php if($mark['examType'] == "Worksheet-II"){ 
                                                            echo "<td>".$totalOfTermOne."</td>";
                                                         
                                                         }?>
                                                         
                                                         <td>
                                                             <?php echo $mark['marksObtained']; ?>
                                                             <?php 
                                    
                                                                $totalOfRow = $totalOfRow + $mark['marksObtained'];
                                                                $grandTotal = $grandTotal+ $mark['marksObtained'];
                                                                $totalMaxMarks = $totalMaxMarks + $mark['maxMarks'];
                                                                if($mark['examType'] == "Worksheet-I" || $mark['examType'] == "Project-I" || $mark['examType'] == "NB & SEA-I" || $mark['examType'] == "Class Test-I") {
                                                                    $totalOfTermOne = $totalOfTermOne +  $mark['marksObtained'];  
                                                                } 
                                                                
                                                                 if($mark['examType'] == "Worksheet-II" || $mark['examType'] == "Project-II" || $mark['examType'] == "NB & SEA-II" || $mark['examType'] == "Class Test-II") {
                                                                    $totalOfTermTwo = $totalOfTermTwo +  $mark['marksObtained'];  
                                                                } 
                                                             ?>
                                                         </td>
                                                         
                                                             <?php if($mark['examType'] == "Class Test-II"){ 
                                                                    echo "<td>".$totalOfTermTwo."</td>";
                                                                 }?>
                                                         
                                                    <?php }
                                                } ?>
                                            <?php } ?>
                                          
                                        <?php } ?>
                                        <td>
                                            <?php 
                                               
                                                $totalOfTermOneAndTwo = (0.5 * $totalOfTermOne) + (0.5 * $totalOfTermTwo); 
                                                echo $totalOfTermOneAndTwo;
                                            ?>
                                        </td>
                                    <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
    
        <table class="table table-bordered" style="margin-bottom: 0px !important">
        <thead class="report-card-table-head">
            <tr>
                <th>Grand Total:  <input type="text" class="report-card-input" value="<?php echo ($grandTotal/2)."/".($totalMaxMarks/2)  ?>" /></th>
                <th>Percentage:  
                <?php 
                    $percentage = ($grandTotal/$totalMaxMarks) * 100;
                    $percentage = number_format($percentage, 1)."%";
                ?>
                <input type="text" class="report-card-input" 
                value="<?php echo $percentage; ?>" />
                </th>
                <th>Overall Grade: 
                   <?php 
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 91 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 100) {
                                        echo "<input type='text' class='report-card-input' value='A1'/>";
                                    }
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 81 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 90.9) {
                                        echo "<input type='text' class='report-card-input' value='A2'/>";
                                    }
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 71 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 80.9) {
                                        echo "<input type='text' class='report-card-input' value='B1'/>";
                                    }
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 61 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 70.9) {
                                        echo "<input type='text' class='report-card-input' value='B2'/>";
                                    }
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 51 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 60.9) {
                                        echo "<input type='text' class='report-card-input' value='C1'/>";
                                    }
                                    if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 41 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 50.9) {
                                        echo "<input type='text' class='report-card-input' value='C2'/>";
                                    }
                                    if($percentage = ($grandTotal/$totalMaxMarks) * 100 <= 40.9) {
                                        echo "<input type='text' class='report-card-input' value='D'/>";
                                    }
                    ?> 
                </th>
            </tr>
        </thead>
    </table>
    
    <table class="table table-responsive" style="margin-top: 25px">
            <thead class="report-card-table-head">
            <tr>
                <th colspan="9">Grading Scale</th>
            </tr>
            </thead>
                <tbody class="report-card-table-body">
                    <tr>
                        <td>Mark Range</td>
                        <td>100 - 91</td>
                        <td>90 - 81</td>
                        <td>80 - 71</td> 
                        <td>70 - 61</td>
                        <td>60 - 51</td>
                        <td>50 - 41</td>
                        <td>40 - 33</td>
                        <td>32 - 0</td>
                    </tr>
                    <tr>
                        <td>Grades</td>
                        <td>A1</td>
                        <td>A2</td>
                        <td>B1</td>
                        <td>B2</td>
                        <td>C1</td>
                        <td>C2</td>
                        <td>D</td>
                        <td>E</td>
                        
                    </tr>
                </tbody>
    </table>
    
    <div class="col-xs-12 metrics-box" style="padding: 0">
        <?php if (isset($metrics)) { ?>
            <table class="table table-responsive" style="margin-bottom: 0px !important">
                <thead class="report-card-table-head">
                <tr>
                    <th colspan="3">Co Scholastic Result</th>
                </tr>
                <tr>
                    <th class="table-data">Activities</th>
                    <th>Term-1</th>
                    <th>Term-2</th>
                </tr>
                </thead>
                <tbody class="report-card-table-body">
                    <tr>
                                        <td>Art/Music</td>
                                         <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                        <?php } ?>
                                       
                                    </tr>
                                    <tr>
                                        <td>Health & Physical Education</td>
                                            <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                            <?php } ?>
                        </tr>
                </tbody>
            </table>
                <?php } ?>
            </div>
    </div>
    
            <div class="col-md-12" style="padding: 0; margin-top: 25px;">
            <table class="table table-bordered" style="">
                <thead class="report-card-table-head">
                    <tr>
                        <th colspan="3">Attendance</th>
                             <?php if (isset($metrics)) { ?>
                                <?php foreach ($metrics as $metric) {?> 
                                    <?php if($metric->metric_name == "Attendance" && $metric->ability == "Present") { ?>
                                        <?php $present = $metric->mark; ?>
                                    <?php } ?>
                                    
                                     <?php if($metric->metric_name == "Attendance" && $metric->ability == "Total Days") { ?>
                                        <?php $totalDays = $metric->mark; ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                    </tr>
                    <tr>
                        <th>Present: 
                        <input 
                            type="text" 
                            value="<?php if(isset($present)){ echo $present; } ?>"
                            class="report-card-input"
                        />
                    </th>
                        <th>Total Days <input type="text" value="<?php if(isset($totalDays)){ echo $totalDays; } ?>" class="report-card-input"/>
                        </th>
                        <th>Percentage: <input type="text" value="<?php if(isset($totalDays) && isset($present)){ echo number_format(($present/$totalDays)*100, 1).'%'; } ?>" class="report-card-input"/>
                        </th>
                    </tr>
                </thead>
            </table>
            </div>
        
            
            
            <p class="" style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 14px; margin-bottom:0px !important">
                <b>Remarks:
                 <?php if(isset($remarks)) {echo $remarks;} ?>
          
                </b>
            </p>
            <p class="signature-container-names" style="">
                <b>Result:
                    <?php if(isset($result)) {echo $result;} ?>
                </b>
            </p>
            
    <div class="col-xs-12 signature-container" style="padding-top:30px">
        <div class="col-xs-6" style="text-align: left">
            <p class="signature-container-names" ><b>Teacher's Signature</b></p>
        </div>
        <div class="col-xs-6" style="text-align: right">
            <p class="signature-container-names"><b>Principal's Signature</b></p>
        </div>
    </div>
    </div>
    </div>
    
    
   <?php } else if($student->Class == "6-A" || $student->Class == "6-B" || $student->Class == "7-A" || $student->Class == "7-B" || $student->Class == "8-A") { ?>
<div class="col-xs-12">
 <div class="col-xs-12" style="padding: 0">
   <div class="col-xs-12" style="padding: 0">
        <div class="col-xs-3">

            <img
                    src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                    class="school-logo"
                    alt="School Logo"
            />

        </div>
        
        <div class="col-xs-6" style="text-align: center;">
            <p class="top-details" style="font-size: 24px; font-family: Nunito-semibold; font-weight: 900; text-transform: uppercase;"><?php echo $this->config->item('schoolName') ?></p>
            <p class="top-details"><?php echo $this->config->item('schoolAddress') ?></p>
            <p class="top-details">Website: www.kkblossomschool.org/</p>
            <p class="top-details">Recognition Number: 16/2022-27</p>
            <p class="top-details">UDISE No: 02090112903</p>
        </div>
       
    </div>
    
 
  <table class="table table-bordered" style="margin-bottom: 0px !important">
        <thead class="report-card-table-head">
            <tr>
                <th>
                    Report Card: Academic Session 2024-25
                </th>
            </tr>
        </thead>
    </table>
    
    <div class="col-xs-12 info-container">
 
            <div class="col-xs-10" style="padding: 0px">
                         <table class="table table-responsive" style="margin-bottom: 0px !important">
                            <tbody class="report-card-table-body">
                                <tr>
                                    <td class="student-detail">Student's Name: <?php echo $student->Name; ?></td>
                                    <td class="student-detail">Class: <?php echo substr($student->Class, 0, 1)?></td>
                                    <td class="student-detail">Section: <?php echo substr($student->Class, 2) ?></td>
                                </tr>
                                <tr>
                                    <td class="student-detail">Father's Name: <?php echo $student->Fname ?></td>
                                    <td class="student-detail">Mother's Name: <?php echo $student->Mname ?></td>
                                    <td class="student-detail">Roll No: <?php echo $student->Rollno ?></td>
                                </tr>
                                <tr>
                                    <td class="student-detail">Adm. No.: <?php echo $student->Admno?></td>
                                    <td class="student-detail">D.O.B: <?php echo date('d-m-Y', strtotime($student->Dob)) ?></td>
                                    <td class="student-detail">Gender: <?php echo $student->gender; ?></td>
                                </tr>
                                      <tr>
                                            <td class="student-detail">
                                                Height: <?php echo $student->height." cm";?>
                                            </td>
                                            <td class="student-detail">Weight: <?php echo $student->weight." Kg"; ?></td>
                                            <td class="student-detail">B. Gr: <?php echo $student->blood_group ?></td>
                                        </tr>
                            </tbody>
                        </table>
                </div>
                <div class="col-xs-2" style="padding: 0px; text-align: right">
                        <?php if ($student->image != null) { ?>
                        <img src="<?php echo base_url('assets/images/students/') . $student->image; ?>"
                             class="student-img" alt="">
                    <?php } else { ?>
                        <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                             style="height: 150px; width: 150px;" alt="">
                    <?php } ?>
                </div>
                
                

         
                <?php if (isset($exams)) { ?>
                <?php } ?>
                
                <!--<div class="col-xs-4">-->
             
                <!--</div>-->
        </div>
    <div class="col-xs-12" style="padding: 0">
        <div class="col-xs-12" style="margin-top: 5px; padding: 0; ">
          <table class="table table-responsive" style="margin-bottom: 5px">
            <thead class="report-card-table-head">
                <tr>
                    <th colspan="12">Scholastic Result</th>
                </tr>
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
                <th  rowspan="2" class="table-headings">Subjects</th>
                <th class="table-headings">Periodic Test-I</th>
                <th class="table-headings">NB-I</th>
                <th class="table-headings">SEA-I</th>
                <th class="table-headings">Half-Yearly</th>
                <th class="table-headings">Total</th>
                <th class="table-headings">Periodic Test-II</th>
                <th class="table-headings">NB-II</th>
                <th class="table-headings">SEA-II</th>
                <th class="table-headings">Yearly Exam</th>
                <th class="table-headings">Total</th>
                <th rowspan="3">Total Term 1 (50%) + Term 2 (50%)</th>
            </tr>
            <tr>
                <th>Total-10</th>
                <th>Total-5</th>
                <th>Total-5</th>
                <th>Total-80</th>
                <th>Total-100</th>
                <th>Total-10</th>
                <th>Total-5</th>
                <th>Total-5</th>
                <th>Total-80</th>
                <th>Total-100</th>
            </tr>
            </thead>
            <tbody class="report-card-table-body">
            <?php if (isset($subjects)) { $grandTotal = 0; $totalMaxMarks=0; ?>
                <?php if(isset($subjectsOrder)) { ?>
                    <?php foreach( $subjectsOrder as $key => $value ) { ?>
                        <?php foreach ($subjects as $subject) { ?>
                            <?php if( $value == $subject->Subject ) { ?>
                                <tr>
                                    <?php $totalOfRow = 0; $maxMarksOfSubject = 0; ?>
                                    <td>
                                        <?php if($subject->Subject == "Social Science") { echo "Social Sc.";}else {echo $subject->Subject;}?>
                                    </td>
                                    <?php if (isset($exams)) { $totalOfTermOne = 0; $totalOfTermTwo = 0; $totalOfRow = 0;  ?>
                                        <?php foreach ($exams as $key => $examination) {    ?>
                                                <?php if (isset($marks)) { ?>
                                                    <?php foreach ($marks as $mark) { ?>
                                                        <?php if ($mark['examType'] == $examination->Examtype
                                                             && $mark['subject'] == $subject->Subject) { ?>
                                                             
                                                            <?php if($mark['examType'] == "Periodic Test-II"){ 
                                                                echo "<td>".$totalOfTermOne."</td>";
                                                             
                                                             }?>
                                                             
                                                             <td>
                                                                <?php
                                                                    if($mark['examType'] == "Periodic Test-I"){
                                                                      $convertedMarks = number_format(($mark['marksObtained']/$mark['maxMarks']) * 10, 1);
                                                                      $mark['maxMarks'] = 10;
                                                                         $mark['marksObtained'] = $convertedMarks;
                                                                        echo $convertedMarks;
                                        // echo "(".$mark['maxMarks'].")";  
                                                                    } else if($mark['examType'] == "Periodic Test-II"){
                                                                        $convertedMarks = number_format(($mark['marksObtained']/$mark['maxMarks']) * 10, 1);
                                                                        
                                                                        $mark['maxMarks'] = 10;
                                                                        
                                                                        $mark['marksObtained'] = $convertedMarks;
                                                                        echo $convertedMarks;
                                            // echo "(".$mark['maxMarks'].")";  
                                                                    }
                                                                    else {
                                                                        echo $mark['marksObtained'];
                                        // echo "(".$mark['maxMarks'].")";   
                                                                    }
                                                                ?>
                                                                 <?php 
                                        
                                                                    $totalOfRow = $totalOfRow + $mark['marksObtained'];
                                                                    $grandTotal = $grandTotal+ $mark['marksObtained'];
                                                                    $totalMaxMarks = $totalMaxMarks + $mark['maxMarks'];
                                                                    if($mark['examType'] == "Periodic Test-I" || $mark['examType'] == "NB-I" || $mark['examType'] == "SEA-I" || $mark['examType'] == "Half Yearly") {
                                                                        $totalOfTermOne = $totalOfTermOne +  $mark['marksObtained'];  
                                                                    } 
                                                                    
                                                                     if($mark['examType'] == "Periodic Test-II" || $mark['examType'] == "NB-II" || $mark['examType'] == "SEA-II" || $mark['examType'] == "Yearly Exam") {
                                                                        $totalOfTermTwo = $totalOfTermTwo +  $mark['marksObtained'];  
                                                                    } 
                                                                 ?>
                                                             </td>
                                                             
                                                                 <?php if($mark['examType'] == "Yearly Exam"){ 
                                                                        echo "<td>".$totalOfTermTwo."</td>";
                                                                     }?>
                                                             
                                                        <?php }
                                                    } ?>
                                                <?php } ?>
                                              
                                            <?php } ?>
                                            <td>
                                                <?php 
                                                   
                                                    $totalOfTermOneAndTwo = (0.5 * $totalOfTermOne) + (0.5 * $totalOfTermTwo); 
                                                    echo $totalOfTermOneAndTwo;
                                                ?>
                                            </td>
                                        <?php } ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        
            <table class="table table-bordered" style="margin-bottom: 0px !important">
            <thead class="report-card-table-head">
                <tr>
                    <th>Grand Total:  <input type="text" class="report-card-input" value="<?php echo ($grandTotal/2)."/".($totalMaxMarks/2)  ?>" /></th>
                    <th>Percentage: 
                    
                    <?php 
                        $percentage = ($grandTotal/$totalMaxMarks) * 100;
                        $percentage = number_format($percentage, 1)."%";
                    ?>
                    
                    <input type="text" class="report-card-input" 
                    value="<?php echo $percentage ?>" />
                    </th>
                    <th>Overall Grade: 
                       <?php 
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 91 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 100) {
                                            echo "<input type='text' class='report-card-input' value='A1'/>";
                                        }
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 81 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 90.9) {
                                            echo "<input type='text' class='report-card-input' value='A2'/>";
                                        }
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 71 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 80.9) {
                                            echo "<input type='text' class='report-card-input' value='B1'/>";
                                        }
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 61 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 70.9) {
                                            echo "<input type='text' class='report-card-input' value='B2'/>";
                                        }
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 51 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 60.9) {
                                            echo "<input type='text' class='report-card-input' value='C1'/>";
                                        }
                                        if( $percentage = ($grandTotal/$totalMaxMarks) * 100 >= 41 &&  $percentage = ($grandTotal/$totalMaxMarks) * 100 <= 50.9) {
                                            echo "<input type='text' class='report-card-input' value='C2'/>";
                                        }
                                        if($percentage = ($grandTotal/$totalMaxMarks) * 100 <= 40.9) {
                                            echo "<input type='text' class='report-card-input' value='D'/>";
                                        }
                        ?> 
                    </th>
                </tr>
            </thead>
        </table>
        
        <table class="table table-responsive" style="margin-top: 5px; margin-bottom: 5px">
                <thead class="report-card-table-head">
                <tr>
                    <th colspan="9">Grading Scale</th>
                </tr>
                </thead>
                    <tbody class="report-card-table-body">
                        <tr>
                            <td>Mark Range</td>
                            <td>100 - 91</td>
                            <td>90 - 81</td>
                            <td>80 - 71</td> 
                            <td>70 - 61</td>
                            <td>60 - 51</td>
                            <td>50 - 41</td>
                            <td>40 - 33</td>
                            <td>32 - 0</td>
                        </tr>
                        <tr>
                            <td>Grades</td>
                            <td>A1</td>
                            <td>A2</td>
                            <td>B1</td>
                            <td>B2</td>
                            <td>C1</td>
                            <td>C2</td>
                            <td>D</td>
                            <td>E</td>
                            
                        </tr>
                    </tbody>
        </table>
        
            <div class="col-xs-12 metrics-box" style="padding: 0">
                <?php if (isset($metrics)) { ?>
                    <table class="table table-responsive" style="margin-bottom: 0px !important">
                        <thead class="report-card-table-head">
                        <tr>
                            <th colspan="3">Co Scholastic Result</th>
                        </tr>
                        <tr>
                            <th class="table-data">Activities</th>
                            <th>Term-1</th>
                            <th>Term-2</th>
                        </tr>
                        </thead>
                        <tbody class="report-card-table-body">
                         <tr>
                                        <td>Art/Music</td>
                                         <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Art/Music") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                        <?php } ?>
                                       
                                    </tr>
                                    <tr>
                                        <td>Health & Physical Education</td>
                                            <?php foreach ($metrics as $metric) {?>
                                                <?php if($metric->metric_name == "Term-1" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                                <?php if($metric->metric_name == "Term-2" && $metric->ability == "Health & Physical Education") { ?>
                                                    <td><?php echo $metric->mark ?></td>
                                                <?php } ?>
                                            <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                        <?php } ?>
            </div>
        </div>
    
                   <div class="col-md-12" style="padding: 0; margin-top: 5px;">
            <table class="table table-bordered" style="">
                <thead class="report-card-table-head">
                    <tr>
                        <th colspan="3">Attendance</th>
                             <?php if (isset($metrics)) { ?>
                                <?php foreach ($metrics as $metric) {?> 
                                    <?php if($metric->metric_name == "Attendance" && $metric->ability == "Present") { ?>
                                        <?php $present = $metric->mark; ?>
                                    <?php } ?>
                                    
                                     <?php if($metric->metric_name == "Attendance" && $metric->ability == "Total Days") { ?>
                                        <?php $totalDays = $metric->mark; ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                    </tr>
                    <tr>
                        <th>Present: 
                        <input 
                            type="text" 
                            value="<?php if(isset($present)){ echo $present; } ?>"
                            class="report-card-input"
                        />
                    </th>
                        <th>Total Days <input type="text" value="<?php if(isset($totalDays)){ echo $totalDays; } ?>" class="report-card-input"/>
                        </th>
                        <th>Percentage: 
                        <?php if(isset($totalDays) && isset($present)){ $attendance = number_format(($present/$totalDays)*100, 1).'%'; } ?>
                        <input 
                            type="text" 
                            value="<?php echo $attendance ?>" 
                            class="report-card-input"
                        />
                        </th>
                    </tr>
                </thead>
            </table>
            </div>
        
            
            
            <p class="" style="font-family: Nunito-Semibold, serif; font-weight: 900; font-size: 14px; margin-bottom:0px !important">
                <b>Remarks:   
                 <?php if(isset($remarks)) {echo $remarks;} ?>

                </b>
            </p>
            <p class="signature-container-names" style="">
                <b>Result:
                    <?php if(isset($result)) {echo $result;} ?>
                </b>
            </p>
            <div class="col-xs-12 signature-container" style="padding-top: 40px;">
                <div class="col-xs-6" style="text-align: left">
                    <p class="signature-container-names" ><b>Teacher's Signature</b></p>
                </div>
                <div class="col-xs-6" style="text-align: right">
                    <p class="signature-container-names"><b>Principal's Signature</b></p>
                </div>
            </div>
   
        <?php }} ?>
    </div>
<script>
    //window.onload = function () {
    //    window.print();
   // }

</script>
</body>
</html>
