<?php $this->view('header'); ?>
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
	<form method="POST" action="<?php echo site_url('exam/view') ?>" >
		<div class="col-md-4">
			<p class="headings">Class</p>
			<select name="class" class="form-select">
				<?php if (isset($classes)) { ?>
					<?php foreach ($classes as $row) { ?>
						<option value="<?php echo $row->Classname; ?>"><?php echo "Class " . $row->Classname; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			
			<p class="headings">Exam Type</p>
			<select name="exam" class="form-select">
					<?php if (isset($examTypes)) { ?>
					<?php foreach ($examTypes as $examType) { ?>
						<option value="<?php echo $examType->Examtype; ?>"><?php echo $examType->Examtype; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Go" class="form-submit">
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
