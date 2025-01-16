<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 page-content">
    <div class="col-xs-12 date-selector">
        <label>
            <input type="date" id="date-picker" value="<?php echo date("Y-m-d") ?>" class="assignment-page-date-selector">
        </label>
    </div>
    <div class="col-xs-12 assignment-list" id="content">

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#content').load('<?php echo site_url('assignment/display/') ?>' + $("#date-picker").val())
    });

    $('#date-picker').on('change', function () {
        $('#content').load('<?php echo site_url('assignment/display/') ?>' + $(this).val())
    });
    document.getElementById("date-picker").onchange = function () {

    }
</script>
<?php $this->view('student/layouts/footer') ?>
