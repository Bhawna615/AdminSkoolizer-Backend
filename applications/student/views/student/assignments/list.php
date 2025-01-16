<div class="col-xs-12 schedule-list-container">
    <?php if (empty($assignments)) { ?>
        <p class="assignment-page-text">No Assignments found :-)</p>
    <?php } ?>
    <?php if (isset($assignments)) { ?>
        <?php foreach ($assignments as $assignment) { ?>
            <div class="col-xs-12 schedule-container">
                <div class="col-xs-4 schedule-subject-container">
                    <p class="student-home-subject-name"><?php echo $assignment->Subjectname ?></p>
                </div>
                <div class="col-xs-8 schedule-details-container">
                    <p class="student-home-subject-time"><?php echo $assignment->Assignment ?></p>
                    <?php if (!empty($assignment->file)) { ?>
                        <a href="<?php echo $assignment->file_url ?>">View Resource</a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>