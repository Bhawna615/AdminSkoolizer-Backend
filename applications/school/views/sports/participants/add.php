<?php $this->view('header'); ?>
<div class="loader hidden">
    <img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
    <span class="loader-message" id="loader-message">Loading...</span>
</div>
<div class="col-md-12 innerview">
    <div class="message">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="col-md-12 error-bar">
                <i class="las la-exclamation-triangle"></i>
                <?php echo $this->session->flashdata('error') ?>
                <?php $this->session->unset_userdata('error') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="col-md-12 col-lg-12 success-bar">
                <i class="las la-check-square"></i>
                <?php echo $this->session->flashdata('success') ?>
                <?php $this->session->unset_userdata('success') ?>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-12 filter-bar">
        <p class="filter-enable"><input type="checkbox" class="custom-checkbox" id="filter-check"> Enable Filter</p>
        <div class="col-md-4">
            <p class="filter-title"><i class="las la-filter"></i> Class</p>
            <select name="class" id="class" class="filter">
                <?php if (isset($classes)) { ?>
                    <?php foreach ($classes as $class) { ?>
                        <option><?php echo $class->Classname ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div id="table-view">

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table-view').load('<?php if (isset($sportEventId)) { echo site_url('SportParticipant/displayStudent/'.$sportEventId); } ?>')
    });

    $('.filter').on('change', function () {
        if ($('#filter-check').is(':checked')) {
            $('#table-view').load('<?php echo site_url('SportParticipant/filterStudent/') ?>'  + $('#class').val() + '/' + '<?php echo $sportEventId ?>')
        }
    });
    $('#filter-check').on('change', function () {
        if(this.checked) {
            $('#table-view').load('<?php echo site_url('SportParticipant/filterStudent/') ?>' + $('#class').val() + '/' + '<?php echo $sportEventId ?>')
        } else {
            $('#table-view').load('<?php echo site_url('SportParticipant/displayStudent/'.$sportEventId) ?>')
        }
    });
</script>
<?php $this->view('footer'); ?>
