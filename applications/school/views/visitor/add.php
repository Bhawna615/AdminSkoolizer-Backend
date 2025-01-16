<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    <form method="POST" action="<?php echo site_url('visitor/insert') ?>">
        <div class="col-md-12">
            <div class="col-md-4">
                <p class="details">Name</p>
                <input
                    type="text"
                    name="name"
                    class="form-input"
                    value="<?php echo set_value("name") ?>"
                />
                <?php if (form_error('name')) { ?>
                    <?php echo form_error('name',
                        '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                        '</div>')
                    ?>
                <?php } ?>

                <p class="details">Address</p>
                <input
                    type="text"
                    name="address"
                    class="form-input"
                    value="<?php echo set_value("address") ?>"
                />
                <?php if (form_error('address')) { ?>
                    <?php echo form_error('address',
                        '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                        '</div>')
                    ?>
                <?php } ?>

                <p class="details">Purpose</p>
                <input
                    type="text"
                    name="purpose"
                    class="form-input"
                    value="<?php echo set_value("purpose") ?>"
                />
                <?php if (form_error('purpose')) { ?>
                    <?php echo form_error('purpose',
                        '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                        '</div>')
                    ?>
                <?php } ?>
                
                <p class="details">Whom to Meet</p>
                <input
                    type="text"
                    name="whom_to_meet"
                    class="form-input"
                    value="<?php echo set_value("whom_to_meet") ?>"
                />
                <?php if (form_error('whom_to_meet')) { ?>
                    <?php echo form_error('whom_to_meet',
                        '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                        '</div>')
                    ?>
                <?php } ?>

                <p class="details">Phone</p>
                <input
                    type="text"
                    name="phone"
                    class="form-input"
                    value="<?php echo set_value("phone") ?>"
                />
                <?php if (form_error('phone')) { ?>
                    <?php echo form_error('phone',
                        '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                        '</div>')
                    ?>
                <?php } ?>


            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="form-submit">Add</button>
        </div>
    </form>
</div>
<?php $this->view('footer'); ?>
