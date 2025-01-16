<?php $this->view('layout/teacher/header') ?>
    <div class="col-xs-12" style="padding-top: 30px;">
        <div class="col-xs-12"
             style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; font-family: Questrial-Regular; font-size: 16px; margin-bottom: 20px;">
            <p style="text-align: center; font-family: Rubik-Medium; font-size: 20px; margin-bottom: 30px;">CLASSES
                TODAY</p>
            <p>Date<span style="float: right;"><?php echo date('d F Y'); ?></span></p>
            <p>Day<span style="float: right;"><?php echo date('l'); ?></span></p>
        </div>
        <?php foreach ($timetable as $row) { ?>
            <div class="col-xs-12"
                 style="background: #5789D6; border: 1px solid; border-radius: 4px; border-color: #B3B9BE; padding: 0px; margin-bottom: 30px;">
                <div class="col-xs-4"
                     style="color: white; font-family: Nunito-Semibold; font-size: 15px; text-transform: uppercase; padding-top: 30px;"
                     align="center">
                    <p><?php echo $row->Subjectname; ?></p>
                </div>
                <div class="col-xs-8"
                     style="background: #ffffff; font-family: Questrial-Regular; font-size: 15px; color: black; padding: 10px;"
                     align="center">
                    <p style="font-family: Rubik-Medium;"><?php $stime = date('g:i A', strtotime($row->Stime));
                        $etime = date('g:i A', strtotime($row->Etime));
                        echo $stime . " - " . $etime; ?></p>
                    <p style="text-align: center;">Class <?php echo $row->Class; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php $this->view('layout/teacher/footer') ?>