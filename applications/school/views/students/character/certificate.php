<!DOCTYPE html>
<head>
	<title>Experience Certificate</title>
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
			<p class="document-attribute-title experience-text">
                
                <?php if(isset($characterCertificate)) { ?>
                
                This is to certify that <?php echo $characterCertificate->name;  ?>, son/daughter of <?php echo $characterCertificate->father_name;  ?>, was a student at <?php echo $this->config->item('schoolName') ?>
                from <?php echo $characterCertificate->admission_date; ?> to <?php echo $characterCertificate->graduation_date;  ?>. During this period, he/she displayed good behavior and conduct.<br/><br/>
                He/She was an active participant in school activities and has contributed significantly to the school community. He/She has maintained excellent attendance and punctuality throughout his/her academic
                career at our school.<br/><br/>
                We certify that he/she has never been involved in any disciplinary action and has been an exemplary student in terms of academic performance as well as conduct. He/She was a respectful and courteous
                student who demonstrated a high level of maturity and responsibility.<br/><br/>
                We recommend him/her for any academic or employment opportunities that he/she may pursue in the future.
                
                <?php } ?>
                <br/><br/>
                Sincerely,<br/><br/><br/>
                [Principal’s Name and Signature]<br/>
                [School Name]
			 </p>
    </div>
</div>

</div>
</body>
</html>
