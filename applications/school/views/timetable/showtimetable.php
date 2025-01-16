<?php $this->view('header'); ?>
<div class="col-md-12">
	 <?php if ($timetable==NULL) { ?>
    <p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">Not yet Added. Click New Time period in the Timetable section in Menu.</p>
  <?php } ?>
		

	<?php foreach($timetable as $row) { ?>
		<div class="col-md-3" style="background: #f95555; margin-top: 20px; margin-right: 20px; border-radius: 5px; color: white; padding: 20px;">
			<div class="col-md-12" style="padding: 0px;">
				<div class="col-md-8" style="padding: 0px;">
					<p style="font-family: Nunito-Semibold; font-size: 25px;"><?php echo $row->Subjectname; ?></p>
				</div>
				<div class="col-md-4">
					<div class="dropdown" align="right">
  <i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown" style="cursor: pointer;">more_vert</i>
  <ul class="dropdown-menu">
    <li><a onclick="myFunction(<?php echo $row->timetableid; ?>)" >Delete</a></li>
  </ul>
</div>
				</div>
			</div>
	
	<p style="font-family: RedhatR; font-size: 18px;">From: <?php $stime=date('g:i A',strtotime($row->Stime)); echo $stime; ?></p> 
	<p style="font-family: RedhatR; font-size: 18px;">To: <?php $etime=date('g:i A',strtotime($row->Etime)); echo $etime; ?></p>
	<p style="font-family: Questrial-Regular; font-size: 16px;"><?php echo $row->Teachername; ?></p>
		</div>
<?php } ?>
</div>


<script type="text/javascript">
	function myFunction(id) {
  
  var r = confirm("Are you sure ?");
  if (r == true) {
    location.href='<?php echo site_url('timetable/delete/') ?>'+id;
  } else {
    javascript:void(0);
  }
}
</script>
<?php $this->view('footer'); ?>
