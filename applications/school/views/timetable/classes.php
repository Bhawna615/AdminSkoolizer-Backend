<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<div class="col-md-12">
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
	<form method="POST" action="<?php echo site_url('classs/add'); ?>">
		<button title="Add Class" class="float" style="border: none;"><i class="material-icons" style="font-size: 40px;"
																		 type="submit">add</i></button>
	</form>
	<?php if (!empty($classes)) { ?>
	<?php foreach ($classes as $row) { ?>
		<div class="col-md-3"
			 style="background: #2C56BB; color: white; border-radius: 5px; margin-right: 20px; margin-top: 20px; padding: 20px;">

			<div class="col-md-12" style="padding: 0px;">
				<div class="col-md-8" style="padding: 0px;">
					<a href="<?php echo site_url('student/viewbyclass/') . $row->Classname; ?>" style="color: white;">
						<p style=" font-family: Nunito-Semibold; font-size: 18px; "><?php echo "Class " . $row->Classname; ?></p>
					</a>
				</div>
				<div class="col-md-4">
					<div class="dropdown" align="right">
						<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
						   style="cursor: pointer; ">more_vert</i>
						<ul class="dropdown-menu">
							<li><a onclick="myFunction(<?php echo $row->id; ?>)">Delete</a></li>
						</ul>
					</div>
				</div>
			</div>

			<p style="font-family: Questrial-Regular; font-size: 16px;">Strength:
				<?php if (isset($classStrength)) { ?>
					<?php foreach ($classStrength as $class => $strength) { ?>
						<?php if (strcmp($class, $row->Classname) === 0) { echo $strength; } ?>
					<?php } ?>
				<?php } ?>
			</p>
		</div>
	<?php } ?>
	<?php } ?>
</div>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('classs/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
