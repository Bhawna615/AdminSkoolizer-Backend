<!DOCTYPE html>
<html lang="en">
<head>
    <title>List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
</head>
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

    th {
        background: #EBEBEC;
        font-family: Nunito-Semibold;
        text-transform: uppercase;
        color: black;
        border-right: 1px solid;
        border-color: #C5C5C5;
        text-align: center;

    }

    td {
        border: 1px solid;
        border-color: #C5C5C5;
        font-family: Nunito;

    }

    .details {
        font-family: Questrial-Regular;
        font-size: 20px;
    }
</style>
<body>
    <div class="col-md-12" style="padding: 30px;">
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
            <div class="col-md-12" style="margin-top: 150px;">
                
                
                
                <?php if(isset($students)) { ?>
                    <?php foreach($students as $arrayIndex => $arrayValue) { ?>
                   
                         <table class="table table-responsive table-bordered">
                                    <thead class="dataTableHead">
                                    <tr>
                                        <?php if(isset($field_roll_no)) { ?>
                                            <th>Roll No.</th>
                                        <?php } ?>
                                        
                                        <?php if(isset($field_admission_date)) { ?>
                                            <th>Admission Date</th>
                                        <?php } ?>
                                        
                                          <?php if(isset($field_admno)) { ?>
                                            <th>Admission No.</th>
                                        <?php } ?>
                                        
                                         
                                          <?php if(isset($field_dob)) { ?>
                                            <th>Date of Birth (dd-mm-yyyy)</th>
                                        <?php } ?>
                                        
                                        <th>Name</th>
                                        
                                        <?php if(isset($field_fname)) { ?>
                                            <th>Father's Name </th>
                                        <?php } ?>
                                         
                                        <?php if(isset($field_mname)) { ?>
                                            <th>Mother's Name</th>
                                        <?php } ?>
                                        
                                               <?php if(isset($field_gender)) { ?>
                                            <th>M/F</th>
                                        <?php } ?>
                                         
                                        <?php if(isset($field_contact)) { ?>
                                            <th>Contact</th>
                                        <?php } ?>
                                         
                                      
                                        <?php if(isset($field_aadhar)) { ?>
                                            <th>Aadhar No.</th>
                                        <?php } ?>
                                         
                                       
                                         
                                        <?php if(isset($field_qrcode)) { ?>
                                            <th>Qr Code</th>
                                        <?php } ?>
                                        
                                        <?php if(isset($field_image)) { ?>
                                            <th>Image</th>
                                        <?php } ?>
                                        
                                        
                                    </tr>
                                    </thead>
                                        <tbody class="dataTableBody">
                                            <p style="font-family: Nunito_regular; font-size: 18px; color: black;">
                                                <?php echo $arrayIndex; ?>
                                            </p>
                                            
                                    <?php foreach($arrayValue as $row) { ?>
                                     
                                
                                        <?php if(isset($classes)) { ?>
                                            <?php foreach($classes as $key) { ?>
                                            <?php if($key->Classname == $row->Class) { ?>
                                                    <tr>
                                                     <?php if(isset($field_roll_no)) { ?>
                                                        <td><?php echo $row->Rollno; ?></td>
                                                    <?php } ?>
                                                    
                                                    <?php if(isset($field_admission_date)) { ?>
                                                        <td>
                                                           <?php if($row->admission_date != null) { ?>
                                                            <?php echo date('d-m-Y', strtotime($row->admission_date)); ?>
                                                            <?php } ?>
                                                        </td>
                                                   <?php } ?>
                                                   
                                                      <?php if(isset($field_admno)) { ?>
                                                        <td><?php echo $row->Admno; ?></td>
                                                    <?php } ?>
                                                    
                                                    
                                                    <?php if(isset($field_dob)) { ?>
                                                        <td><?php echo date('d-m-Y', strtotime($row->Dob)); ?></td>
                                                    <?php } ?>
                                                    
                                                    <td><?php echo $row->Name; ?></td>
                                                    
                                                     <?php if(isset($field_fname)) { ?>
                                                        <td><?php echo $row->Fname; ?></td>
                                                    <?php } ?>
                                                    
                                                     <?php if(isset($field_mname)) { ?>
                                                        <td><?php echo $row->Mname; ?></td>
                                                    <?php } ?>
                                                    
                                                         <?php if(isset($field_gender)) { ?>
                                                        <td><?php echo $row->gender; ?></td>
                                                    <?php } ?>
                                                    
                                                     <?php if(isset($field_contact)) { ?>
                                                        <td><?php echo $row->Contact; ?></td>
                                                    <?php } ?>
                                                    
                                                 
                                                    
                                                     <?php if(isset($field_aadhar)) { ?>
                                                        <td><?php echo $row->Aadharno; ?></td>
                                                    <?php } ?>
                                                    
                                                    
                                                    
                                                     <?php if(isset($field_qrcode)) { ?>
                                                        <td>
                                                            <img src="<?php echo base_url('assets/images/students/qrcode/') . $row->qrcode. ".png"; ?>" class="icon">
                                                        </td>
                                                    <?php } ?>
                                                    
                                                    
                                                    <?php if(isset($field_image)) { ?>
                                                        <td>
                                                            <img src="<?php echo base_url('assets/images/students/') . $row->image; ?>" class="icon" style="width: 100px;">
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
                <?php } ?>
                
                
                
            
                    </div>
            </div>
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
    <script>
        window.onload = function () {
            window.print();
        }
    </script>
    </div>
</body>
</html>
