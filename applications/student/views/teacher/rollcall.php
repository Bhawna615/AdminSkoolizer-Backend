<?php $this->view('layout/teacher/page_header') ?>
    <div class="col-xs-12">
        <p style="text-align: right; font-family: Nunito-Semibold; color: #4F6476; margin: 0px; margin-top: 10px;">
            DATE</p>
        <p style="text-align: right; font-size: 16px; color: black; font-family: Questrial-Regular; "><?php echo date('d F,Y'); ?></p>
    </div>
    <br>

    <div class="col-xs-12" style="margin-bottom: 20px;">
        <form class="form" action="<?php echo site_url('teacher/mark'); ?>" method="POST">
            <div id="content" align="center">

            </div>

    </div>


    <ul id="nav" align="center" style="padding: 0px;">
        <?php
        $arr = array("Present", "Absent", "Leave");
        foreach ($arr as $key => $value) {

            ?>
            <button type="submit" id="<?php echo $value; ?>"
                    style="padding: 3px 20px 3px 20px; width: 30%; font-size: 18px;"><?php echo $value; ?></button>
            <br>
            <br>
            <?php
        }
        ?>
    </ul>

    </form>

<?php
foreach ($count as $row) {
    $total = $row['count(Rollno)'];
}
?>

    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#content").load('<?php echo site_url('teacher/studentappear/' . $class . '/') ?>' + 0);
            var offset = 0;
            $('ul#nav button').click(function () {
                var mark = $(this).attr('id');
                var roll1 = $("input#roll").val();

                $.ajax({ //make ajax request to cart_process.php
                    url: "<?php echo base_url(); ?>" + "student.php/teacher/mark",
                    type: "POST",
                    dataType: 'json',
                    data: {roll: roll1, mark: mark}

                })

                var total = '<?php echo $total; ?>';
                if (offset + 1 < total) {
                    offset = offset + 1;
                } else {
                    location.replace("<?php echo site_url('teacher/mark'); ?>");
                }
                $("#content").load('<?php echo site_url('teacher/studentappear/' . $class . '/') ?>' + offset);
                return false;
            });
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

<?php $this->view('layout/teacher/page_footer') ?>