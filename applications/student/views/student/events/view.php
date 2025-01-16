<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="col-xs-12 schedule-list-container">
        <?php if (empty($events)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($events)) { ?>
            <?php foreach ($events as $event) { ?>
                <div class="col-xs-12 schedule-container">
                    <div class="col-xs-4 schedule-subject-container">
                        <p class="student-home-subject-name"><?php echo $event->name ?></p>
                    </div>
                    <div class="col-xs-8 schedule-details-container">
                        <p class="student-home-subject-time"><?php echo $event->description ?></p>
                        <p class="student-home-subject-time"><?php echo "Date: ".$event->date ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
