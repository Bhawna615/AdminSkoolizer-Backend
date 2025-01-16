<?php $this->view('header'); ?>
<div class="innerview">
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
    <div class="col-md-12 side-btn-bar" >
        <div class="col-md-8"></div>
        <div class="col-md-4" align="right">
            <button class="side-btn" type="button" onclick="location.href = '<?php echo site_url('sport/add') ?>'  ">
                <p>
                    <i class="material-icons btn-icon">add</i>
                    Add Sport Event
                </p>
            </button>
        </div>
    </div>
    <table class="table table-responsive table-bordered dataTableFull" id="table">
        <thead class="dataTableHead">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date</th>
            <th>First</th>
            <th>Second</th>
            <th>Third</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="dataTableBody">
        <?php if (!empty($events)) { ?>
            <?php foreach ($events as $event) { ?>
                <tr>
                    <td><?php echo $event->id  ?></td>
                    <td>
                        <a href="<?php echo site_url('SportParticipant/view/'.$event->id) ?>">
                            <?php echo $event->name  ?>
                        </a>
                    </td>
                    <td><?php echo date("d F, Y", strtotime($event->date))  ?></td>
                    <td><?php echo $event->first  ?></td>
                    <td><?php echo $event->second ?></td>
                    <td><?php echo $event->third ?></td>
                    <td>
                        <i
                            class="las la-edit btn-icon"
                            title="Edit"
                            onclick="location.href='<?php echo site_url('sport/edit/').$event->id ?>'"
                        >
                        </i>
                        <i
                            class="las la-trash btn-icon"
                            title="Delete"
                            onclick="myFunction(<?php echo $event->id ?>)"
                        ></i>
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
            "order": [[0, "asc"]],
            responsive: true,
        });
    });
</script>
<script type="text/javascript">
    function myFunction(id) {

        var r = confirm("Are you sure ?");
        if (r === true) {
            location.href = '<?php echo site_url('sport/delete/') ?>' + id;
        } else {
            void (0);
        }
    }
</script>
<?php $this->view('footer'); ?>
