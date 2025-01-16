<?php $this->view('layout/teacher/page_header') ?>

<div class="col-xs-12" style="padding-top: 20px; padding-bottom: 5px; border-bottom: 1px solid #B3B9BE;">
    <div class="col-xs-4">
        <p id="headings">CLASS</p>
        <form method="POST" name="hw" action="<?php echo site_url('teacher/submithw') ?>">
            <select id="class" name="class">
                <option value="Select Class">Select Class</option>
                <?php foreach ($classes as $row) { ?>
                    <option value="<?php echo $row->Class; ?>"><?php echo "Class " . $row->Class; ?></option>
                <?php } ?>
            </select><img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>"
                          style="height: 10px; width: 10px;">


    </div>
    <div class="col-xs-4">
        <p id="headings">SUBJECT</p>
        <select id="subject" name="subject">
            <option value="Select Subject"></option>
        </select>
        <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
    </div>

</div>

<div class="col-xs-12" align="center" style="padding-top: 30px; padding-bottom: 30px;">
    <textarea id="topic" name="topic"
              style="background: white; font-family: Questrial-Regular; font-size: 16px; border-radius: 5px; border: none; width: 90%; outline: none; padding: 10px;"
              rows="5" placeholder="Write here..."></textarea>
    <button type="submit" id="btn"
            style="background: #5789D6; font-family: Rubik; font-size: 16px; border: none; outline: none; border-radius: 4px; color: white; padding: 10px; width: 90%; margin-top: 30px;">
        Submit
    </button>
    </form>

</div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#class").on("change", function () {
            var cls = $(this).val();
            if (cls) {
                $.ajax({
                    url: "<?php echo site_url('teacher/selection'); ?>",
                    type: "POST",
                    data: "class=" + cls,
                    success: function (html) {
                        $("#subject").html(html);
                    }
                });
            }
        });

        $("#btn").click(function (e) {
            var cls = $("#class option:selected").val();
            if (cls == 'Select Class') {
                alert("Select a Class First");
                e.preventDefault();
            }
            var subject = $("#subject option:selected").val();
            if (subject == 'Select Subject') {
                alert("Select a Subject First");
                e.preventDefault();
            }
            var topic = $("#topic").val();
            if (topic.length < 1) {
                alert("Homework is required");
                e.preventDefault();
            } else {
                $("#hw").submit();
            }
        });

    });
</script>
<?php $this->view('layout/teacher/page_footer') ?>
