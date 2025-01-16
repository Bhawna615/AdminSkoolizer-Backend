<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="col-xs-12 message-list-container">
        <?php if (empty($posts)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($posts)) { ?>
            <?php foreach ($posts as $post) { ?>
                <div class="col-xs-12 message-container">
                    <div class="col-xs-12 message">
                        <p><?php echo $post->text ?></p>
                        <?php if (isset($post->file)) { ?>
                        <a href="<?php echo $post->url ?>" target="_blank" class="student-resource-btn">View Resource</a>
                        <?php } ?>
                        <p style="margin-top: 20px"><?php echo $post->created_at ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
