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
            <th class="table-headings">Periodic Test-II</th>
            <th class="table-headings">NB-II</th>
            <th class="table-headings">SEA-II</th>
            <th class="table-headings">Yearly Exam</th>
            <th class="table-headings">Total</th>
            <!--<th class="table-headings">Work Sheet-II</th>-->
            <!--<th class="table-headings">Project-II</th>-->
            <!--<th class="table-headings">NB & SEA-II</th>-->
            <!--<th class="table-headings">Class Test-II</th>-->
            <!--<th class="table-headings">Total</th>-->
        </tr>
        <tr>
            <th>Total-10</th>
            <th>Total-5</th>
            <th>Total-5</th>
            <th>Total-80</th>
            <th>Total-100</th>
            <!--<th>Total-50</th>-->
            <!--<th>Total-10</th>-->
            <!--<th>Total-20</th>-->
            <!--<th>Total-20</th>-->
            <!--<th>Total-100</th>-->
         
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
                                <?php for($i = 0; $i < 5; $i++){ ?>
                                <td style="text-align: center;"><input type="text" class="report-card-input" style="text-align: center;" value="" /></td>
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
                <th>Grand Total:  <input type="text" class="report-card-input" value="" /></th>
                <th>Percentage:  
                
                <input type="text" class="report-card-input" 
                value="" />
                </th>
                <th>Overall Grade: 
                   <input type='text' class='report-card-input' value=''/>
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
                <b>Remarks: Recognize your potential and put your best efforts to flourish in life.
          
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
    
    
  
<script>
    //window.onload = function () {
    //    window.print();
   // }

</script>
</body>
</html>