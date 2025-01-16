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
            <button class="side-btn" type="button" onclick="location.href = '<?php if (isset($sportEventId)) { echo site_url('SportParticipant/add/'.$sportEventId); } ?>'  ">
                <p>
                    <i class="material-icons btn-icon">add</i>
                    Add Participants
                </p>
            </button>
        </div>
    </div>
    <table class="table table-responsive table-bordered dataTableFull" id="table">
        <thead class="dataTableHead">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Class</th>
            <th>Roll No</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="dataTableBody">
        <?php if (!empty($participants)) { ?>
            <?php foreach ($participants as $participant) { ?>
                <tr>
                    <td><?php echo $participant->id  ?></td>
                    <td>
                        <a href="<?php echo site_url('student/view/'.$participant->student_id)?>">
                            <?php echo $participant->name  ?>
                        </a>
                    </td>
                    <td><?php echo $participant->class  ?></td>
                    <td><?php echo $participant->rollno ?></td>
                    <td><?php echo $participant->created_at ?></td>
                    <td>
                        <i
                                class="las la-trash btn-icon"
                                title="Delete"
                                onclick="myFunction(<?php echo $participant->id ?>, <?php echo $participant->sport_id ?>)"
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
    function myFunction(id, sportId) {

        var r = confirm("Are you sure ?");
        if (r === true) {
            location.href = '<?php echo site_url('SportParticipant/delete/') ?>' + id + '/' + sportId;
        } else {
            void (0);
        }
    }
</script>
<?php $this->view('footer'); ?>
