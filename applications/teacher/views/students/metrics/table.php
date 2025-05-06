<div class="table-container">
    <div class="table-card">
        <table class="table table-responsive table-bordered dataTableFull" id="table">
            <thead class="dataTableHead" >
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Roll No</th>
                <th>Metrics</th>
            </tr>
            </thead>
            <tbody class="dataTableBody">
            <?php if (isset($students)) { ?>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?php echo $student->id; ?></td>
                    <td><?php echo $student->Name; ?></td>
                    <td><?php echo $student->Class; ?></td>
                    <td><?php echo $student->Rollno; ?></td>
                    <td>
                        <button
                            class="dt-action-btn"
                            title="Change"
                            onclick="window.open('<?php echo site_url('metrics/add/'.$student->id) ?>')"
                            target="_blank"
                        >
                            <i class="las la-pen btn-icon" style="font-size:25px"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#table').DataTable({
                "ordering": false // Disable sorting on the table,,
                responsive: true,
            });
        });
    });
</script>
