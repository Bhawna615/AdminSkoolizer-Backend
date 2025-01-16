<?php $this->view('layout/teacher/page_header') ?>
    <div class="col-xs-12" align="center"
         style="padding-top: 150px; padding-bottom: 150px; border: 5px dashed #2995bf; border-radius: 5px; margin-top: 20px; ">
        <form method="POST" action="<?php echo site_url('teacher/uploadimage') ?>" enctype="multipart/form-data">
            <label class="file-upload"><img src="<?php echo base_url('assets/icons/plus.svg') ?>" class="icon"><input
                        type="file" name="img"> Choose Image</label><br>
            <button type="submit"
                    style="border: 2px solid #2995bf; background: transparent; outline: none; color: #2995bf; border-radius: 5px; font-family: Nunito_regular; padding: 5px; width: 50%; margin-top: 20px; font-size: 18px;">
                UPLOAD
            </button>
        </form>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
<?php $this->view('layout/teacher/page_footer') ?>