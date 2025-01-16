<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
<?php $maxMarks = 0; $marksObtained = 0; $totalMaxMarks = 0;  ?>
<div class="col-md-12 innerview">
      <table class="table table-responsive table-bordered">
        <thead class="dataTableHead">
            <tr>
                <th colspan="100%" style="text-align: center">Saraswati Paradise International Public School Sanjauli Shimla</th>
            </tr>
            <tr>
                 <th colspan="100%" style="text-align: center">Class: <?php echo $class ?></th>
            </tr>
            <tr>
                 <th colspan="100%" style="text-align: center"><?php echo $exam." Examination"; ?></th>
            </tr>
            <tr>
                <th>Roll No.</th>
                <th>Name</th>
                <?php foreach($exams as $exam) { ?>
                     <?php 
                            $maxMarks = intval($exam->Maxmarks);
                            if(is_int($maxMarks)) {
                                 $totalMaxMarks = $totalMaxMarks + $maxMarks;
                        } ?>
                 <?php } ?>
                <?php foreach($subjectsOrder as $key => $value) { ?>
                    <?php foreach($exams as $exam) { ?>
                        <?php if($value == $exam->Subject) { ?>
                            <th><?php echo $exam->Subject ?>(<?php echo $exam->Maxmarks ?>)</th>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <th>Grand Total (<?php echo $totalMaxMarks ?>)</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody class="dataTableBody">
    <?php
    $totalStudents = 0;
    foreach($students as $student) { 
        $totalStudents = $totalStudents + 1;
        $sujectMarks = array();  ?>
    <?php $totalMarksObtained = 0;
    $totalMarksOfSubject = 0;
    $maxMarksOfStudent = 0;
    $marksToReduce = 0; ?>
        <tr>
            <td><?php echo $student->Rollno ?></td>
            <td><?php echo $student->Name ?></td>
            <?php foreach($exams as $exam) {  ?>
            
                <?php foreach($results as $result)  {?>
                    <?php if($exam->id == $result->Examcode && $result->Rollno == $student->Rollno) { ?>
                    <?php $marksObtained = intval($result->Marksobtained);
                    if(is_int($marksObtained)) {
                        $totalMarksObtained = $totalMarksObtained + $marksObtained;
                            if(is_numeric($exam->Maxmarks)) {
                                $maxMarksOfStudent = $maxMarksOfStudent + $exam->Maxmarks;
                            }
                    } ?>
                    
                    <?php if($result->Marksobtained == 'op' && is_numeric($exam->Maxmarks)) {                                  // Get maximum marks of a student for optional subjects 
                        $marksToReduce = $marksToReduce + $exam->Maxmarks;
                     } ?>
                    
                    <?php  $subjectMarks[$exam->Subject] =  $result->Marksobtained;  ?>
                     <?php } ?>
                <?php } ?>
            <?php } ?>
            
            <?php foreach($subjectsOrder as $key => $value) { ?>
                <?php foreach($subjectMarks as $key2 => $value2) { ?>
                    <?php if($value == $key2) { ?>
                        <td><?php echo $value2; ?></td>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <td>
                <?php 
                    echo $totalMarksObtained.' ('.($maxMarksOfStudent-$marksToReduce).')' 
                ?>
            </td>
            <td>
                <?php 
                    if($totalMaxMarks - $marksToReduce > 0) {
                        $percentage = ($totalMarksObtained/($totalMaxMarks-$marksToReduce))*100; 
                    } else {
                        $percentage = 0;
                    }
                    echo number_format($percentage, 1); 
                ?>

            </td>
        </tr>
    <?php } ?>
    <?php $totalMarksOfClass = 0; ?>
            <tr>
                <th></th>
                <th>Total</th>
                <?php foreach($subjectsOrder as $key => $value) { ?>
                    <?php foreach($subjectTotalMarks as $key2 => $value2) { ?>
                        <?php if($value == $key2) { ?>
                          <?php $totalMarksOfClass = $totalMarksOfClass + $value2 ?>
                            <th><?php echo $value2 ?></th>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <th><?php echo $totalMarksOfClass ?></th>
                <th><?php echo number_format($totalMarksOfClass/($totalMaxMarks*$totalStudents)*100, 1) ?></th>
            </tr>
            <tr>
                <th></th>
                <th>Average</th>
                <?php foreach($subjectsOrder as $key => $value) { ?>
                    <?php foreach($subjectTotalMarks as $key2 => $value2) { ?>
                        <?php if($value == $key2) { ?>
                            <th><?php echo number_format(($value2/$totalStudents), 1) ?></th>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <th><?php echo number_format(($totalMarksOfClass/$totalStudents), 1) ?></th>
            </tr>
    </tbody>
    </table>
</div>
        <button style="background: #f95555; color: white; border: none; font-family: Nunito_regular;padding: 5px 25px 5px 25px;"
    			id="export">Export to CSV
    	</button>

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>">
    </script>
    <script type="text/javascript">
        function download_csv(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV FILE
            csvFile = new Blob([csv], {type: "text/csv"});

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // We have to create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Make sure that the link is not displayed
            downloadLink.style.display = "none";

            // Add the link to your DOM
            document.body.appendChild(downloadLink);

            // Lanzamos
            downloadLink.click();
        }

        function export_table_to_csv(html, filename) {
            var csv = [];
            var rows = document.querySelectorAll("table tr");

            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++)
                    row.push(cols[j].innerText);

                csv.push(row.join(","));
            }

            // Download CSV
            download_csv(csv.join("\n"), filename);
        }

        document.querySelector("#export").addEventListener("click", function () {
            var html = document.querySelector("table").outerHTML;
            export_table_to_csv(html, "table.csv");
        });
    </script>
</body>
</html>
