<?php $this->view('layout/teacher/page_header') ?>
    <div class="col-xs-12" style="padding-top: 20px; padding-bottom: 10px; border-bottom: 1px solid #B3B9BE;">
        <div class="col-xs-4">
            <p id="headings">CLASS</p>
            <select id="class">
                <option>Select</option>
                <?php foreach ($classes as $row) { ?>
                    <option value="<?php echo $row->Class; ?>"><?php echo "Class " . $row->Class; ?></option>
                <?php } ?>
            </select>
            <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
        </div>
        <div class="col-xs-4">
            <p id="headings">DATE</p>
            <input type="text" id="datepicker" name="">
            <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
        </div>
        <div class="col-xs-4">

        </div>
    </div>
    <div id="content">

    </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
        $('#class').on('change', function () {

            var cls = $('#class option:selected').val();
            $("#content").load('<?php echo site_url('teacher/displayattendance/'); ?>' + cls);
        });
        $('#datepicker').on('change', function () {

            var date = $('#datepicker').val();
            var cls = $('#class option:selected').val();
            $("#content").load('<?php echo site_url('teacher/getattendancebydate/'); ?>' + date + '/' + cls);
        });
    </script>


<?php $this->view('layout/teacher/page_footer') ?>