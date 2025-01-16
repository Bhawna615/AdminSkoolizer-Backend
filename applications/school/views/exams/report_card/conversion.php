<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    <form method="POST" action="<?php echo site_url('exam/reportCard') ?>">
        <input type="hidden" name="studentId" value="<?php if (isset($studentId)) { echo $studentId; } ?>">
        <div class="col-md-4">
            <p class="headings">Add Weightage</p>
            <?php if (isset($exams)) { ?>
                <?php foreach ($exams as $key => $value) { ?>
                    <p>
                        <?php echo $value ?>
                    </p>
                    <input type="hidden" name="exams[]" value="<?php echo $value ?>" />
                    <input type="text" name="weight[]"  placeholder="Weight" >
                <?php } ?>
            <?php } ?>
        </div>
        <div class="col-md-12">
            <input type="submit" name="" value="Go" class="form-submit">
        </div>
    </form>
</div>

<?php $this->view('footer'); ?>
