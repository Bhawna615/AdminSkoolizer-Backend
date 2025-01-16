<?php $this->view('layout/teacher/page_header') ?>
<form action="<?php echo site_url('teacher/submitattendence'); ?>">
    <div class="col-xs-12" style=" font-size: 20px;  margin-top: 20px;">
        <div class="col-xs-12" align="center">
            <div class="col-xs-12"
                 style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 50px; padding-bottom: 20px;">

                <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px;">
                    ABSENTEES
                </p>
                <?php foreach ($absent as $key => $value) {
                    ?>

                    <p style="font-family: malgunsl; font-size: 20px; color: #363636; text-transform: uppercase;"><?php echo $key . ". " . $value; ?></p>
                    <?php
                }
                if ($absent != null) {
                    ?>
                    <a style="font-family: CarroisCaps; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px;"
                       href="<?php echo site_url('teacher/remark/absent'); ?>">Remark</a>
                <?php } ?>
            </div>
            <div class="col-xs-12"
                 style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 50px; padding-bottom: 20px;">

                <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px;">
                    ON LEAVE
                </p>
                <?php foreach ($leave as $key => $value) {
                    ?>

                    <p style="font-family: malgunsl; font-size: 20px; color: #363636; text-transform: uppercase;"><?php echo $key . ". " . $value; ?></p>
                    <?php
                }
                if ($leave != null) {
                    ?>
                    <a style="font-family: CarroisCaps; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px;"
                       href="<?php echo site_url('teacher/remark/leave'); ?>">Remark</a>
                <?php } ?>
            </div>
            <div class="col-xs-12"
                 style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 20px; padding-bottom: 20px;">

                <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px;">
                    PRESENTEES
                </p>
                <?php foreach ($present as $key => $value) {
                    ?>

                    <p style="font-family: malgunsl; font-size: 20px; color: #363636; text-transform: uppercase;"><?php echo $key . ". " . $value; ?></p>
                    <?php
                }

                if ($present != null) {
                    ?>
                    <a style="font-family: CarroisCaps; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px;"
                       href="<?php echo site_url('teacher/remark/present'); ?>">Remark</a>
                <?php } ?>
            </div>
            <input type="submit" name="" value="SUBMIT"
                   style="font-family: sofia; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px; border: 0px;">
        </div>
    </div>

    <br>


</form>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php $this->view('layout/teacher/page_footer'); ?>