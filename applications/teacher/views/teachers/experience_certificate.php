<!DOCTYPE html>
<head>
	<title>Transfer Certificate</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		  rel="stylesheet">
	<link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
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
		#date,#year,#month {
		    display:inline;
		    text-transform: uppercase;
		    font-size:8px;
		}
	</style>
</head>
<body>
    <div class="col-xs-12 tc-style tc-top-bar">
        <div class="col-xs-12 school-name-container ">
        	<div class="school-logo-container">
        		<img
        				src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
        				class="school-logo"
        				alt="School Logo"
        		/>
        	</div>
    	<p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
    	<p class="school-address"><?php echo $this->config->item('schoolAddress')."(H.P)" ?>
    	<br/>C.B.S.E India, Affiliation No. 630180, School No. 43169</p>
        </div>
    </div>
    <div class="col-xs-12 tc-style">
        <p class="tc-float-left">Phone No. 0177-2844840</p>
        <p class="tc-float-right">Email: spips03@gmail.com</p>
        <div class="col-xs-12 document-title-container">
    	    <p class="document-title">TO WHOMSOEVER IT MAY CONCERN</p>
        </div>
    </div>


<div class="col-xs-12 document-counter">
	
</div>

<div class="col-xs-12 tc-style">
    <div class="col-xs-12 document-body-container">
	<?php if (isset($teacher)) { ?>
		<?php foreach ($teacher as $row) { ?>
			<p class="document-attribute-title">

                I hereby verify that [] served as an [] teacher at [] from [] to []. During her tenure, she adeptly taught [],
                showcasing exceptional skills in creating comprehensive lesson plans, evaluating students’ performances, and meticulously grading tests, classwork, and homework assignments.

                Mrs Sharma exhibited unwavering dedication to her students, demonstrating a deep commitment to their academic growth and fostering a positive learning environment. Her approach was
                characterized by professionalism, excellent communication, strong interpersonal skills, and effective time management.

                Her decision to leave our institution was entirely voluntary, and we extend our best wishes to her for all her future endeavours. [] departure is a loss for our school,
                and we have no doubt she will excel in her future pursuits.

                For any further inquiries or additional information, please do not hesitate to contact me during business hours.
                
                Sincerely,
                
                [Signature]
                Jolene Parker (printed)
                Principal
                Mimi Elementary School
                [School’s Seal]
			   </b>
			 </p>
		<?php } ?>
	<?php } ?>
</div>
</div>
<div class="col-xs-12 tc-style">
    <div class="col-xs-12 document-signature-container">
	<div class="col-xs-4">
		<b><p class="signature-title-one">Signature of<br/>Class Teacher</p></b>

	</div>
	<div class="col-xs-4 ">
		<b><p class="signature-title-two">Accountant Signature<br/>With Seal</p></b>
	</div>
	<div class="col-xs-4">
		<b><p class="signature-title-three">Principal Signature <br/>With Seal</p></b>

	</div>
</div>
</div>
</body>
</html>
