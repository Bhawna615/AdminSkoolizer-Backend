<form id="loading" method="POST" action="<?php echo site_url('SportParticipant/insert'); ?>">
    <input type="hidden" name="eventId" value="<?php if (isset($sportEventId)) { echo $sportEventId; } ?>">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered dataTableFull" id="table">
            <thead class="dataTableHead">
            <tr>
                <th></th>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Class</th>
            </tr>
            </thead>
            <tbody class="dataTableBody">
            <?php if (!empty($students)) { ?>
                <?php foreach ($students as $row) { ?>
                    <tr>
                        <td>
                            <input
                                type="checkbox"
                                name="id[]"
                                class="<?php echo $row->Class; ?>"
                                value="<?php echo $row->id; ?>" checked
                            />
                            <?php if (form_error('id[]')) { ?>
                                <?php echo form_error('id[]',
                                    '<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
                                    '</div>')
                                ?>
                            <?php } ?>
                        </td>
                        <td><?php echo $row->Rollno; ?></td>
                        <td><?php echo $row->Name; ?></td>
                        '
                        <td><?php echo $row->Class ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <button class="float" title="Add" style="border: none;" type="submit">
        <i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
            send
        </i></button>
</form>
