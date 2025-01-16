<?php $this->view('header') ?>
<div class="col-md-12 innerview">
    <div class="col-md-12 filter-bar">
        <p class="details">
        Select Classes
    </p>
    <form method="POST" action="<?php echo site_url('student/listCreate') ?>">
        <p style="font-family: Nunito_regular; font-size: 18px; color: black;">
            <input type="checkbox" name="" id="selectall" value="">
            Select All
		</p>
        <?php if (isset($classes)) { ?>
         <?php foreach ($classes as $class) { ?>
                        <input type="checkbox" name="classes[]" id="class" value ="<?php echo $class->Classname ?>"/> <?php echo $class->Classname ?>
        <?php } ?>
        <?php } ?>
    </div>
    <div class="col-md-12 filter-bar">
         <p class="details">Select Columns</p>
        <p>Name is by default</p>
        <input type="checkbox" name="field_roll_no" class="" value="field_roll_no" /> Roll No.
        <input type="checkbox" name="field_fname" class="" value="field_fname"  /> Father's Name
        <input type="checkbox" name="field_mname" class="" value="field_mname"  /> Mother's Name
        <input type="checkbox" name="field_contact" class="" value="field_contact"  /> Contact
        <input type="checkbox" name="field_admno" class=""  value="field_admno" /> Admission Number
        <input type="checkbox" name="field_aadhar" class="" value="field_aadhar"  /> Aadhar Number
        <input type="checkbox" name="field_dob" class="" value="field_dob"  /> Date of Birth
        <input type="checkbox" name="field_qrcode" class="" value="field_qrcode"  /> Qr Code
        <input type="checkbox" name="field_admission_date" class="" value="field_admission_date"  /> Admission Date
        <input type="checkbox" name="field_gender" class="" value="field_gender"  /> Gender
        <input type="checkbox" name="field_image" class="" value="field_image"  /> Image
    </div>
    
    
    <div class="col-md-12 filter-bar">
          <p class="details">Admission Number Range</p>
        <input type="text" class="form-input" name="admno_start" placeholder="From" />
        <input type="text" class="form-input" name="admno_end" placeholder="To" />
    </div>
        <!--<select name="list" id="class" class="form-select">-->
        <!--    <option value="school">School</option>-->
        <!--    <?php if (isset($classes)) { ?>-->
        <!--        <?php foreach ($classes as $class) { ?>-->
        <!--            <option value="<?php echo $class->Classname ?>"><?php echo $class->Classname ?></option>-->
        <!--        <?php } ?>-->
        <!--    <?php } ?>-->
        <!--</select>-->
       
      
        <button type="submit" class="form-submit">Create</button>
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
<?php $this->view('footer') ?>
