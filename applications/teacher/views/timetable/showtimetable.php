<?php $this->view('header'); ?>

<style>
	/* Improved Timetable Card Styles */
	.crdimg {
		background: linear-gradient(135deg, #b3e5fc, #e1f5fe);;
		/* Light Green & Light Blue Gradient */
		border-radius: 10px;
		color: #333;
		padding: 20px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		transition: all 0.3s ease-in-out;
		width: 100%;
		font-family: Nunito_regular;
		
	}

	.crd_style {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: max-content;
		background-color: #fff;
		
	}

	/* Hover Effect */
	.crdimg:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
	}

	/* Text Styling */
	.crdimg p {
		font-family: Nunito_regular;
		margin: 5px 0;
	}

	/* Container */
	.col-md-3 {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		text-align: center;
	}

	/* Smooth Fade-in Animation */
	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: scale(0.9);
		}

		to {
			opacity: 1;
			transform: scale(1);
		}
	}

	.crdimg {
		animation: fadeIn 0.5s ease-in-out;
	}
</style>
<div class="col-md-12 crd_style">
	<?php if ($timetable == NULL) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">Not yet Added.
			Click New Time period in the Timetable section in Menu.</p>
	<?php } ?>


	<?php foreach ($timetable as $row) { ?>
		<div class="col-md-3 crdimg" style=" margin-top: 20px;  border-radius: 5px; color: #124E66; ">
			<div class="col-md-12" style="padding: 0px; font-weight: bold;">
				<div class="col-md-8" style="padding: 0px;">
					<p style="font-family: Nunito-Semibold; font-size: 22px;"><?php echo $row->Subjectname; ?></p>
				</div>
				<div class="col-md-4">
					<!--<div class="dropdown" align="right">-->
					<!--                     <i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown" style="cursor: pointer;">more_vert</i>-->
					<!--                     <ul class="dropdown-menu">-->
					<!--                       <li><a onclick="myFunction(<?php echo $row->timetableid; ?>)" >Delete</a></li>-->
					<!--                     </ul>-->
					<!--               </div>-->
				</div>
			</div>

			<p style="font-family: RedhatR; font-size: 14px;">From:
				<?php $stime = date('g:i A', strtotime($row->Stime));
				echo $stime; ?></p>
			<p style="font-family: RedhatR; font-size: 14px;">To:
				<?php $etime = date('g:i A', strtotime($row->Etime));
				echo $etime; ?></p>
			<p style="font-family: Questrial-Regular; font-size: 13px;"><?php echo $row->Teachername; ?></p>
		</div>
	<?php } ?>
</div>


<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('timetable/delete/') ?>' + id;
		} else {
			javascript: void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>