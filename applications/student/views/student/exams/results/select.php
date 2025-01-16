<?php $this->view('student/layouts/header'); ?>
    <div class="col-md-12"
         style="margin-top: 20px; border-bottom: 1px solid; border-color: #B3B9BE; padding-bottom: 10px;">
        <p style="margin-bottom: 0px; font-family: Nunito-Semibold; color: #4F6476; font-size: 13px;   ">SUBJECT</p>
        <select id="code">
            <option>Select</option>
            <?php if (isset($exams)) { ?>
                <?php foreach ($exams as $exam) { ?>
                    <option value="<?php echo $exam->Subject; ?>">
                        <?php echo $exam->Subject; ?>
                    </option>
                <?php } ?>
            <?php } ?>
        </select>
        <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
    </div>
    <div id="content">
        <p>Select a Subject </p>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript">
        $('#code').on('change', function () {
            var subjectname = $('#code option:selected').val();
            $("#content").load('<?php echo site_url('exam/displayResult/'); ?>' + subjectname);
        });

    </script>
<?php $this->view('student/layouts/footer'); ?>