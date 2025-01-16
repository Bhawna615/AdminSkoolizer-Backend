<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    <form method="POST" action="<?php echo site_url('exam/conversion') ?>">
        <input type="hidden" name="studentId" value="<?php if (isset($student)) { echo $student['id']; } ?>">
        <div class="col-md-4">
            <p class="headings">Select Exams</p>
            <input type="checkbox" name="exams[]" value="Unit-1" />Unit-1
            <?php if (isset($exams)) { ?>
                <?php foreach ($exams as $exam) { ?>
                    <p>
                        <input type="checkbox" name="exams[]" value="<?php echo $exam->Examtype ?>">
                        <?php echo $exam->Examtype?>
                    </p>

                <?php } ?>
            <?php } ?>
        </div>
        <div class="col-md-12">
            <input type="submit" name="" value="Go" class="form-submit">
        </div>
    </form>
</div>

<?php $this->view('footer'); ?>
