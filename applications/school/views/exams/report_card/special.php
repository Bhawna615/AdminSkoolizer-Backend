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
            
            <?php if(isset($student))  { ?> 
           <div class="col-xs-12" style="padding: 0px;">
                 <img
                        src="<?php echo base_url('assets/images/report-card/header.png') ?>"
                        alt="School Logo"
                />
           
            </div>
            
            <div class="col-xs-12" style="margin-top: 5px">
       
                     <div class="col-xs-10" style="padding: 0px">
                                 <table class="table table-responsive table-bordered" style="margin-bottom: 0px !important">
                                    <tbody class="report-card-table-body">
                                        <tr>
                                            <td class="student-detail">Student's Name: <?php echo $student->Name; ?></td>
                                            <td class="student-detail">Class: 
                                            <?php
                                                if($student->Class == "test"){      echo "Nursery"; 
                                                    
                                                } 
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
    

    
        <div class="col-xs-12 info-container" style="margin-top: 5px;">
            <div class="col-xs-12" style="background: #D8D4A7; border-radius: 10px; margin-bottom: 5px; text-align: center;">
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
                        <div class="col-xs-12 card" style="background: #D8D4A7; margin-bottom: 12px; border-radius: 15px; padding: 10px; <?php if($value == 'Social Skills'){ echo 'margin-top: 0px;'; } if($value == 'Numbers'){ echo 'margin-top: 75px;'; }  ?>">
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
                 <?php    echo "All the best for your future. May God bless you.";  ?>
                </div>
                <div class="col-xs-12">
                    <p style="text-align: center; font-weight: 900; font-size: 14px;">Promoted to Class KG under provisions of RTE Act 2009 (Criteria based upon child s improvement in skills)</p>
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
    <?php } ?>
    </div>
 </div>
<script>
    //window.onload = function () {
    //    window.print();
   // }

</script>
</body>
</html>
