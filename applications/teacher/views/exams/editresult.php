<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
	<style type="text/css">
		@font-face {
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}

		@font-face {
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}

	</style>
</head>
<body>
	<div class="col-md-12 innerview">
	    <form method="POST" action="<?php echo site_url('exam/saveMarks'); ?>">
	        <input type="hidden" name="code" value="<?php echo $id ?>" ?>
		    <table class="table table-responsive table-bordered">
			<thead class="dataTableHead">
			    		 <tr>
                    <th colspan="100%" style="text-align: center">Saraswati Paradise International Public School Sanjauli Shimla</th>
                </tr>
                <tr>
                     <th colspan="100%" style="text-align: center">Class: <?php echo $details->Class;  ?></th>
                </tr>
                <tr>
                     <th colspan="100%" style="text-align: center"><?php echo $details->Examtype." Examination"; ?></th>
                </tr>
			<tr>
				<th>Rollno</th>
				<th>Name</th>
				<th>Marks</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (isset($result)) { ?>
				<?php foreach ($result as $row) { ?>
					<tr>
						<td>
						    <input 
						        type="hidden" 
						        name="rollno[]"
						        value="<?php echo $row->Rollno; ?>" 
						    />
						    <?php echo $row->Rollno; ?>
						</td>
						
						<td>
						    <input 
						        type="hidden" 
						        name="name[]"
						        value="<?php echo $row->Name; ?>" 
						    />
						    <?php echo $row->Name; ?></td>
						<td>
						    <input 
						    type ="text" 
						    name="marks[]" 
						    value="<?php echo $row->Marksobtained; ?>" 
						    placeholder="<?php echo $row->Name; ?>"
						    />
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
		<button class="form-submit">Update
		</button>
		</form>
	</div>


</body>
</html>
