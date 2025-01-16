
<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    <div class="col-md-12"
         style="font-family: RedhatR; font-size: 16px; border: 1px solid; border-color: #f95555; border-radius: 5px; padding-top: 10px; margin-bottom: 20px;">
        <p style="color: green;">Preview</p>
        <p>Dear Parent,<br> The school fee of your ward ABC for the period of November is pending. Last date of fee
            submission is 31 Nov,2015.<br> SPIPS Desk</p>
    </div>
    <form method="POST" action="<?php echo site_url('sms/sendfeereminder'); ?>" enctype="multipart/form-data">
    <table class="table table-bordered table-responsive">
        <thead class="dataTableHead">
        <tr>
            <th>
                <label>
                    <input type="checkbox" id="selectall" />
                </label>
                Select All
            </th>
            <th>Payment Id</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Roll No.</th>
            <th>Period</th>
            <th>Last Date</th>
            <th>Phone No.</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="dataTableBody">
        <?php if (isset($students)) { ?>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td>
                        <label>
                            <input
                                    type="checkbox"
                                    name="id[]"
                                    value="<?php echo $student->id.",".$student->feeid ?>"
                            />
                        </label>
                    </td>
                    <td><?php echo $student->feeid ?></td>
                    <td><?php echo $student->studentname ?></td>
                    <td><?php echo $student->class ?></td>
                    <td><?php echo $student->rollno ?></td>
                    <td>
                        <input
                                type="hidden"
                                name="period[]"
                                value="<?php echo $student->period ?>"
                        />
                        <?php echo $student->period ?></td>
                    <td>
                        <input
                                type="hidden"
                                name="date[]"
                                value="<?php echo $student->lastdate ?>"
                        />
                        <?php echo $student->lastdate ?>
                    </td>
                    <td><?php echo $student->Smsno ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
        <button
                class="float"
                title="Send"
                style="border: none;">
                    <i class="material-icons"
                       style="font-size: 30px; position: relative; left: 3px; top: 2px;">
                        send
                    </i>
        </button>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#selectall").click(function () {
            if (this.checked) {
                $('input[type=checkbox]').each(function () {
                    $("input[type=checkbox]").prop('checked', true);
                })
            } else {
                $('input[type=checkbox]').each(function () {
                    $("input[type=checkbox]").prop('checked', false);
                })
            }
        });
    });
</script>
<?php $this->view('footer'); ?>