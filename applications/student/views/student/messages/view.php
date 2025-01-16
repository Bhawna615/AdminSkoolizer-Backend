<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="col-xs-12 message-list-container">
        <?php if (empty($messages)) { ?>
            <p>Empty here :-)</p>
        <?php } ?>
        <?php if (isset($messages)) { ?>
            <?php foreach ($messages as $message) { ?>
                <div class="col-xs-12 message-container">
                    <div class="col-xs-12 message">
                        <p><?php echo $message->message ?></p>
                        <?php if (isset($message->message_file)) { ?>
                            <a href="<?php echo $message->message_file_url ?>" target="_blank">View Resource</a>
                        <?php } ?>
                        <p><?php echo $message->sent_at ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php $this->view('student/layouts/footer') ?>
