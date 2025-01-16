<?php $this->view('student/layouts/header'); ?>
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
        <div class="col-xs-1" style="padding: 0px;">
            <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
        </div>
        <div class="col-xs-11" style="padding: 0px;">
            <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Results</p>
        </div>
    </div>
    <div class="col-xs-12"
         style="margin-top: 20px; border-bottom: 1px solid; border-color: #B3B9BE; padding-bottom: 10px;">
        <p style="margin-bottom: 0px; font-family: Nunito-Semibold; color: #4F6476; font-size: 13px;   ">SUBJECT</p>
        <select id="code">
            <option>Select</option>
            <?php if (isset($exams)) { ?>
                <?php foreach ($exams as $row) { ?>
                    <option name="<?php echo $row->Date; ?>" id="<?php echo $row->Maxmarks; ?>"
                            value="<?php echo $row->Subject; ?>"><?php echo $row->Subject; ?></option>
                <?php } ?>
            <?php } ?>

        </select><img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
    </div>
    <div id="content">

    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript">
        $('#code').on('change', function () {
            var cls = '<?php echo $class; ?>';
            var rollno = '<?php echo $rollno; ?>'
            var subjectname = $('#code option:selected').val();
            var max = $('#code option:selected').attr('id');
            var date = $('#code option:selected').attr('name');
            var ename = $('#code option:selected').text();
            $("#content").load('<?php echo site_url('student/displayresult/'); ?>' + subjectname + '/' + cls + '/' + rollno);
            $('p#max').html("Max Marks: " + max);
            $('p#ename').html(ename);
            $('p#date').html("on " + date);
        });

    </script>
<?php $this->view('student/layouts/footer'); ?>