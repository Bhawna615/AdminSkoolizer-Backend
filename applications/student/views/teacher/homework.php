<?php $this->view('layout/teacher/page_header') ?>

<div class="col-xs-12" style="padding-top: 30px;">
    <?php foreach ($homework as $row) { ?>
        <div class="col-xs-12"
             style="background: #5789D6; border: 1px solid; border-radius: 4px; border-color: #B3B9BE; padding: 0px; margin-bottom: 30px;">
            <div class="col-xs-4"
                 style="color: white; font-family: Nunito-Semibold; font-size: 15px; text-transform: uppercase; padding-top: 50px;"
                 align="center">
                <p><?php echo "Class " . $row->Class; ?></p>
            </div>
            <div class="col-xs-8"
                 style="background: #ffffff; font-family: Questrial-Regular; font-size: 15px; color: black; padding: 10px;"
                 align="center">
                <p style="font-family: Rubik-Medium; font-size: 16px;"><?php echo $row->Subjectname; ?></</p>
                <p style="text-align: left;">Date <span style="float: right;"><?php $date = date('d F,Y',
                            strtotime($row->Date));
                        echo $date; ?></span></p>
                <p style="text-align: left;">Topic <span style="float: right;"><?php echo $row->Assignment; ?></span>
                </p>

            </div>
        </div>
    <?php } ?>
</div>
<a href="<?php echo site_url('teacher/assignhw'); ?>" class="float">
    <i class="material-icons" style="font-size: 30px; color: white; position: relative;top: 16px;">
        add
    </i>
</a>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php $this->view('layout/teacher/page_footer') ?>
