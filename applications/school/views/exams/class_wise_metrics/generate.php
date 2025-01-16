<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
      <table class="table table-responsive table-bordered">
        <thead class="dataTableHead">
            <tr>
                <th>Roll No.</th>
                <th>Name</th>
            <?php foreach($metrics as $metric)  { ?>
                <th><?php echo $metric->metric_name ?></th>
            <?php } ?>
               
            </tr>
        </thead>
        <tbody class="dataTableBody">
    <?php foreach($students as $student) { ?>
        <tr>
            <td><?php echo $student->Rollno ?></td>
            <td><?php echo $student->Name ?></td>
             <?php foreach($metrics as $metric)  { 
             ?>
              <td>
                  <?php foreach($studentMetrics as $key => $value) { 
                      foreach($value as $studentMetric) {
                          if($studentMetric->student_id == $student->id && $studentMetric->metric_id == $metric->metric_id) {  
                            echo $studentMetric->mark;
                          }
                      }
                  }
                    ?>
              </td>
             <?php } ?>
          
        </tr>
    <?php } ?>
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
<?php $this->view('footer'); ?>

