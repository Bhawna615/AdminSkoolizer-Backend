<div class="col-xs-12 page-content">
    <div class="col-xs-12 schedule-list-container">
        <?php if (empty($exams)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($exams)) { ?>
            <?php foreach ($exams as $exam) { ?>
                <div class="col-xs-12 schedule-container">
                    <div class="col-xs-4 schedule-subject-container">
                        <p class="student-home-subject-name"><?php echo $exam->Examtype ?></p>
                    </div>
                    <div class="col-xs-8 schedule-details-container">
                        <p class="student-home-subject-time"><?php echo date("d F,Y", strtotime($exam->Date))  ?></p>
                        <p class="student-home-subject-time">Marks Obtained: <?php if (isset($marks)) {
                                foreach ($marks as $key => $value) {
                                    if ($key == $exam->id) {
                                        echo $value;
                                    }
                        } } ?></p>
                        <p class="student-home-subject-time"><?php echo "Maximum marks: ".$exam->Maxmarks ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>