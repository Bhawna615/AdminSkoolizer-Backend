<?php $this->view('layout/teacher/page_header') ?>
<div class="col-xs-12" align="center" style="padding-top: 30px;">
    <?php foreach ($settings as $row) {
        $image = $row->image;
    } ?>
    <?php if ($image != null) { ?>
        <img src="<?php echo base_url('assets/images/teachers/') . $row->image; ?>"
             style="font-size: 60px;  border-radius: 50%; color: white; width: 150px; height: 150px; position: relative;top: 7px;">
    <?php } else { ?>
        <i class='material-icons'
           style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
    <?php } ?>
    <br>
    <button onclick="location.href='<?php echo site_url('teacher/changeimage') ?>'"
            style="border: 2px solid white; background: transparent; outline: none; color: white; border-radius: 5px; font-family: Nunito_regular; padding: 5px; width: 50%; margin-top: 20px; font-size: 18px;">
        Edit
    </button>
</div>
</div>
<div class="col-xs-12" style="margin-top:20px;">
    <div class="col-xs-12" style="padding: 0 2px 0 2px;">
        <form>
            <?php foreach ($settings

            as $row) { ?>
            <p id="headings">FULL NAME</p>
            <input type="text" name="Fname" value="<?php echo $row->Teachername; ?> ">
            <p id="headings" style="margin-top: 40px;">CLASSTEACHER OF</p>
            <p id="values"><?php echo "Class " . $row->Classteacher; ?></p>

            <input type="submit" name="" value="Submit"
                   style="font-size: 22px; width: 100%; margin-top: 50px; background: #5789D6; border: 0px; border-radius: 3px; color: white; font-family: Nunito-Light; ">
        </form>
        <p id="headings" style="margin-top: 50px">PHONE NUMBER</p>
        <p id="values"><?php echo $row->Contact; ?></p>
        <p id="headings" style="margin-top: 30px">Email ID</p>
        <p id="values"><?php echo $row->Email; ?></p>
        <?php } ?>
    </div>
</div>
<div class="col-xs-12"
     style="border-top: 1px solid; border-bottom: 1px solid; margin-top: 20px; margin-bottom: 20px; border-color: #A1A1A1;">
    <a href="<?php echo site_url('teacher/changepassword'); ?>" style="color:#875FD4; "><p
                style="font-size: 16px; padding-top: 0px; margin-bottom: 0px; color:#875FD4; font-family:Nunito_regular; padding:5px 0 5px 0 ; background: #f1f1f1; ">
            Change Password</p></a>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php $this->view('layout/teacher/page_footer') ?>