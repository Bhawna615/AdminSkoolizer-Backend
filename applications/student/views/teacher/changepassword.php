<?php $this->view('layout/teacher/page_header') ?>
<div class="col-xs-12" style="margin-top: 20px;">
    <?php foreach ($password as $row) { ?>
        <div class="col-xs-12">
            <p id="headings">Email ID</p>
            <p id="values"><?php foreach ($password as $row) {
                    echo $row->Email;
                } ?></p>
            <p id="headings">PHONE NUMBER</p>
            <p id="values"><?php foreach ($password as $row) {
                    echo $row->Contact;
                } ?></p>
            <form name="password" method="POST" action="<?php echo site_url('teacher/updatepassword'); ?>">
                <input type="password" id="old" name="old" placeholder="Old Password">
                <input type="password" name="new" id="pass" placeholder="New Password">
                <input type="password" name="confirm" placeholder="Confirm Password" style="margin-bottom: 50px;">
        </div>

        <div class="col-xs-6">
            <input type="submit" value="Save"
                   style="border:none;border-radius: 5px; color: white;background: #5789D6; font-size: 16px; font-family: Rubik; padding: 5px 42px 5px 42px;"
                   name="">
        </div>
        </form>
        <div class="col-xs-6">
            <input onclick="goBack()" type="submit" value="Cancel"
                   style="color: #363636; border: 1px solid; border-color: #363636; border-radius: 5px;font-size: 16px; font-family: Rubik; padding: 4px 40px 4px 40px; background: #fff;"
                   name="">
        </div>
    <?php } ?>
</div>

</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript">
    $(function () {
        var old = $('#old').val();
        $("form[name='password']").validate({
            rules: {

                new: {
                    required: true,
                    minlength: 8,

                },
                confirm: {

                    equalTo: "#pass"
                },
                old: {
                    required: true,
                    minlength: 8,
                }
            },
            messages: {
                new: {
                    required: "Password required",
                    minlength: "Must contain minimum 8 characters"
                },
                confirm: {

                    equalTo: "Do not Match"

                },
                old: {
                    required: "Password required",
                    minlength: "Must contain minimum 8 characters"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<?php $this->view('layout/teacher/page_footer') ?>