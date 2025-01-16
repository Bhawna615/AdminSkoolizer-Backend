<?php $this->view('layout/teacher/page_header') ?>
    <div class="col-xs-12" style="padding-top: 30px;">
        <?php if ($result != null) { ?>
            <p style="font-family: Nunito-Semibold; color: black; font-size: 18px; text-align: center; text-transform: uppercase;"><?php foreach ($result as $row) {
                    $topic = $row->Examname;
                    $max = $row->Maxmarks;
                }
                echo $topic; ?></p>

            <table class="table table-responsive" style="margin-top: 20px;">
                <tr>
                    <th>ROLL NO.</th>
                    <th>STUDENT NAME</th>
                    <th>MARKS (Max: <?php echo $max; ?>)</th>
                </tr>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row->Rollno; ?></td>
                        <td><?php echo $row->Name; ?></td>
                        <td><?php echo $row->Marksobtained; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p style="text-align: center; font-family: Questrial-Regular; font-size: 18px; margin-top: 40px;">Not Yet
                Uploaded<br>Check back Later.</p>
        <?php } ?>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
<?php $this->view('layout/teacher/page_footer') ?>