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
    	    <p class="document-title">SCHOOL LEAVING CERTIFICATE</p>
        </div>
    </div>


<div class="col-xs-12 document-counter">
	
</div>

<div class="col-xs-12 tc-style">
    <div class="col-xs-12 document-body-container">
	<?php if (isset($student)) { ?>
		<?php foreach ($student as $row) { ?>
			<p class="document-attribute-title">1. Name of the Pupil: <b><?php echo $row->name; ?></b></p>
			<p class="document-attribute-title">2. Father's/Guardian's Name: <b><?php echo $row->father_name; ?></b></p>
			<p class="document-attribute-title">3. Mother's Name: <b><?php echo $row->mother_name; ?></b></p>
			<p class="document-attribute-title">4. Nationality: <b><?php echo $row->nationality; ?></b></p>
			<p class="document-attribute-title">5. Category: <b><?php echo $row->category; ?></b></p>
			<p class="document-attribute-title">6. Date of first Admission in the school with the class: <b><?php echo $row->date_of_admission; ?> (<?php echo $row->class_of_admission; ?>)</b></p>
			<p class="document-attribute-title">7. Admission No: <b><?php echo $row->admission_number; ?></b></p>
			<div class="document-attribute-title" style="margin-bottom: 10px;">8. Date of Birth (in Christian era) according to Admission Register: <b><?php echo date("d-m-Y", strtotime($row->date_of_birth)); ?></b>
    			<b style="font-size:6px !important;">(<input type="hidden" class="dateValue" value="<?php echo date("d", strtotime($row->date_of_birth)); ?>"/>
    			<div id="date" class="document-attribute-title"></div> 
    			<div id="month" class="document-attribute-title"><?php echo date("F", strtotime($row->date_of_birth)); ?></div>
    			<input type="hidden" class="yearValue" value="<?php echo date("Y", strtotime($row->date_of_birth)); ?>"/>
    			<div id="year" class="document-attribute-title"></div> )</b>
			</div>
			<p class="document-attribute-title">9. Class in which the pupil last studied (in figures): <b><?php echo $row->last_class; ?></b></p>
			<p class="document-attribute-title">10. School/board Annual examination last taken with result: <b><?php echo $row->last_school; ?></b></p>
			<p class="document-attribute-title">11. Whether failed, if so once/twice in the same class: <b><?php echo $row->failed_mark; ?></b></p>
			<p class="document-attribute-title">12. Subjects Studied:  <b><?php echo $row->subjects_studied; ?></b></p>
			<p class="document-attribute-title">13. Whether qualified for promotion to higher class: <b><?php echo $row->qualified_mark; ?></b></p>
			<p class="document-attribute-title">14. Date up to which school dues have been paid: <b><?php echo $row->dues_date ?></b></p>
			<p class="document-attribute-title">15. Any fee concession availed of: if so the nature of such concession: <b><?php echo $row->fee_concession ?></b></p>
			<p class="document-attribute-title">16. Total no. of working days: <b><?php echo $row->working_days ?></b></p>
			<p class="document-attribute-title">17. Total no. of working days present: <b><?php echo $row->present_days ?></b></p>
			<p class="document-attribute-title">18. Whether NCC cader/Boy Scout/Girl Guide (Details may be given): <b><?php echo $row->ncc ?></b></p>
			<p class="document-attribute-title">19. Games played or extra curricular activities in which the pupil usually took part(mention achievement level there in): <b><?php echo $row->games_played ?></b></p>
			<p class="document-attribute-title">20. General Conduct: <b><?php echo $row->general_conduct ?></b></p>
			<p class="document-attribute-title">21. Date of Application for Transfer Certificate: <b><?php echo $row->application_date ?></b></p>
			<p class="document-attribute-title">22. Date of issue of Transfer Certificate: <b><?php echo $row->issue_date ?></b></p>
			<p class="document-attribute-title">23. Reason for leaving the school: <b><?php echo $row->reason ?></b></p>
			<p class="document-attribute-title">24. Any other remarks: <b><?php echo $row->remarks ?></b></p>
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
<script>
	window.onload = function () {
	    convertDate();
	    convertYear();
		window.print();
	}
	
	function convertDate (){
    let numberInput = document.querySelector('.dateValue').value ;
    let myDiv = document.querySelector('#date');

    let oneToTwenty = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ',
    'eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    let tenth = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    if(numberInput.toString().length > 7) return myDiv.innerHTML = 'overlimit' ;
    console.log(numberInput);
    //let num = ('0000000000'+ numberInput).slice(-10).match(/^(\d{1})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
  let num = ('0000000'+ numberInput).slice(-7).match(/^(\d{1})(\d{1})(\d{2})(\d{1})(\d{2})$/);
    console.log(num);
    if(!num) return;

    let outputText = num[1] != 0 ? (oneToTwenty[Number(num[1])] || `${tenth[num[1][0]]} ${oneToTwenty[num[1][1]]}` )+' million ' : ''; 
  
    outputText +=num[2] != 0 ? (oneToTwenty[Number(num[2])] || `${tenth[num[2][0]]} ${oneToTwenty[num[2][1]]}` )+'hundred ' : ''; 
    outputText +=num[3] != 0 ? (oneToTwenty[Number(num[3])] || `${tenth[num[3][0]]} ${oneToTwenty[num[3][1]]}`)+' thousand ' : ''; 
    outputText +=num[4] != 0 ? (oneToTwenty[Number(num[4])] || `${tenth[num[4][0]]} ${oneToTwenty[num[4][1]]}`) +'hundred ': ''; 
    outputText +=num[5] != 0 ? (oneToTwenty[Number(num[5])] || `${tenth[num[5][0]]} ${oneToTwenty[num[5][1]]} `) : ''; 

    myDiv.innerHTML = outputText;
}

	function convertYear (){
    let numberInput = document.querySelector('.yearValue').value ;
    let myDiv = document.querySelector('#year');

    let oneToTwenty = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ',
    'eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    let tenth = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    if(numberInput.toString().length > 7) return myDiv.innerHTML = 'overlimit' ;
    console.log(numberInput);
    //let num = ('0000000000'+ numberInput).slice(-10).match(/^(\d{1})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
  let num = ('0000000'+ numberInput).slice(-7).match(/^(\d{1})(\d{1})(\d{2})(\d{1})(\d{2})$/);
    console.log(num);
    if(!num) return;

    let outputText = num[1] != 0 ? (oneToTwenty[Number(num[1])] || `${tenth[num[1][0]]} ${oneToTwenty[num[1][1]]}` )+' million ' : ''; 
  
    outputText +=num[2] != 0 ? (oneToTwenty[Number(num[2])] || `${tenth[num[2][0]]} ${oneToTwenty[num[2][1]]}` )+'hundred ' : ''; 
    outputText +=num[3] != 0 ? (oneToTwenty[Number(num[3])] || `${tenth[num[3][0]]} ${oneToTwenty[num[3][1]]}`)+' thousand ' : ''; 
    outputText +=num[4] != 0 ? (oneToTwenty[Number(num[4])] || `${tenth[num[4][0]]} ${oneToTwenty[num[4][1]]}`) +'hundred ': ''; 
    outputText +=num[5] != 0 ? (oneToTwenty[Number(num[5])] || `${tenth[num[5][0]]} ${oneToTwenty[num[5][1]]} `) : ''; 

    myDiv.innerHTML = outputText;
}
</script>
</body>
</html>
