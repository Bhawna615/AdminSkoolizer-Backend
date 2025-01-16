<?php $this->view('header') ?>
<div class="col-md-12 innerview">
    <div class="col-md-12 side-btn-bar" >
        <div class="col-md-8"></div>
        <div class="col-md-4" align="right">
            <button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('sms/schedule') ?>'  ">
                <p>
                    <i class="material-icons btn-icon">add</i>
                    Schedule
                </p>
            </button>
        </div>
    </div>
    <table class="table table-responsive table-bordered" id="table">
        <thead class="dataTableHead">
        <tr>
            <th>Id</th>
            <th>Scheduled For</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="dataTableBody">
        <?php if (isset($response)) { ?>
            <?php foreach ($response as $key => $value) { ?>
                <?php foreach ($value as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $row->id ?>
                        </td>
                        <td>
                            <?php echo $row->scheduledFor ?>
                        </td>
                        <td>
                            <?php echo $row->message ?>
                        </td>
                        <td>
                            <i class="las la-comment-slash btn-icon" onclick="location.href='<?php echo site_url('Sms/cancelScheduled/'.$row->id) ?>'"></i>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $('#table').DataTable({
                    "order": [[0, "asc"]],
                    responsive: true,
                });
            });
        });
    </script>
<?php $this->view('footer') ?>