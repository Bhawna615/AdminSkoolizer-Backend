<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
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

    <div class="col-md-12 side-btn-bar">
        <div class="col-md-8"></div>
        <div class="col-md-4" align="right">
            <button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('visitor/add') ?>'  ">
                <p>
                    <i class="material-icons btn-icon">add</i>
                    New Visitor
                </p>
            </button>
        </div>
    </div>

    <table class="table table-responsive table-bordered dataTableFull" id="table">
        <thead class="dataTableHead">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Purpose</th>
            <th>Contact</th>
            <th>Whom to meet</th>
            <th>Entered At</th>
            <th>Exit At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="dataTableBody">
        <?php if (isset($visitors)) { ?>
            <?php foreach ($visitors as $visitor) { ?>
                <tr>
                    <td><?php echo $visitor->id; ?></td>
                    <td><?php echo $visitor->name; ?></td>
                    <td><?php echo $visitor->address; ?></td>
                    <td><?php echo $visitor->purpose; ?></td>
                    <td><?php echo $visitor->phone; ?></td>
                    <td><?php echo $visitor->whom_to_meet; ?></td>
                    <td><?php echo $visitor->created_at; ?></td>
                    <td><?php echo $visitor->exit_at; ?></td>
                    <td>
                        <?php if($visitor->exit_at == NULL) { ?>
                            <button
                                class="dt-action-btn"
                                title="Exit"
                                onclick="myFunction(<?php echo $visitor->id; ?>)">
                                <i class="las la-door-open"></i>                        
                            </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function () {
        $('#table').DataTable({
            "order": [[2, "desc"]],
            responsive: true
        });
    });
</script>

<script type="text/javascript">
    function myFunction(id) {
        var r = confirm("Are you sure ?");
        if (r === true) {
            location.href = '<?php echo site_url('visitor/exit/') ?>' + id;
        } else {
            void (0);
        }
    }
</script>
<?php $this->view('footer'); ?>
