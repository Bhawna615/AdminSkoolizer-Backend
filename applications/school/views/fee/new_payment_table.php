<?php
// filepath: c:\wamp64\www\kkblossom\applications\teacher\views\fee\new_payment_table.php

// Sort the students array by class
usort($students, function($a, $b) {
    return strcmp($a->Class, $b->Class);
});
?>



<form id="loading" method="POST" action="<?php echo site_url('fee/insertpayment'); ?>">
	<div class="col-md-12" align="center">
		<div class="col-md-6">
			<p class="headings">Payment Period</p>
			<input class="square-input" type="text" name="period">
			
			<p class="headings">Session</p>
			<input class="square-input" type="text" name="session" value="<?php echo date("Y") . "-" . (date("Y") + 1); ?>">
		</div>
		<div class="col-md-6">
			<p class="headings">Last Date</p>
			<input class="square-input" type="date" name="lastdate">
			<?php if (form_error('lastdate')) { ?>
				<?php echo form_error('lastdate',
					'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
					'</div>')
				?>
			<?php } ?>
		</div>
	</div>

	<div class="col-md-12">
		<table class="table table-responsive table-bordered dataTableFull" id="table">
			<thead class="dataTableHead">
			<tr>
				<th><input type="checkbox" id="selectall" checked/> Select All</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Class</th>
				<!--<th><input type="checkbox" id="selectall-sibling-discount" checked/> Sibling Discount</th>-->
				<th> Tuition Fee</th>
				<th> Transport Fee</th>
				<th>Total Fee</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (!empty($students)) { ?>
				<?php foreach ($students as $row) { ?>
					<?php if (($row->tuition_fee + $row->transport_fee) > 0) { ?>  <!-- Yaha condition add ki -->
						<tr>  <!-- New condition for highlighting -->
						<td>
							<input
								type="checkbox"
								name="id[]"
								class="student-id-<?php echo $row->id?>"
								value="<?php echo $row->id; ?>" checked
							/>
							<?php if (form_error('id[]')) { ?>
								<?php echo form_error('id[]',
									'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
									'</div>')
								?>
							<?php } ?>
						</td>
						<td><?php echo $row->Admno; ?></td>
						<td><?php echo $row->Name; ?></td>
						<td><?php echo $row->Class; ?></td>
			 
						<td>
						    <?php echo $row->tuition_fee ?>
						</td>
						<td>
						    <?php echo $row->transport_fee ?>
						</td>
						<td>
						    <?php echo $row->tuition_fee + $row->transport_fee; ?>
						</td>
					
					</tr>
					<?php } ?>  <!-- Condition yaha close ki -->
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<button class="float" title="Add" style="border: none;" type="submit">
		<i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
			send
		</i></button>
</form>

<script>
	document.getElementById('loading').onsubmit = function() {
		const loaderMessage = document.getElementById('loader-message')
		loaderMessage.innerText = "Creating Payments..."
		const loader = document.querySelector(".loader");
		loader.className = "loader";
		loaderMessage.innerText = "Sending Notifications..."
	}
</script>
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

<script type="text/javascript">
	$(document).ready(function () {
		$("#selectall-admission-fee").click(function () {
			if (this.checked) {
				$('.admission-fee').each(function () {
					$(this).prop('checked', true);
				})
			} else {
				$('.admission-fee').each(function () {
					$(this).prop('checked', false);
				})
			}
		});
		
			$("#selectall-annual-charges").click(function () {
			if (this.checked) {
				$('.annual-fee').each(function () {
					$(this).prop('checked', true);
				})
			} else {
				$('.annual-fee').each(function () {
					$(this).prop('checked', false);
				})
			}
		});
		
			$("#selectall-sibling-discount").click(function () {
			if (this.checked) {
				$('.sibling-discount').each(function () {
					$(this).prop('checked', true);
				})
			} else {
				$('.sibling-discount').each(function () {
					$(this).prop('checked', false);
				})
			}
		});
		
			$("#selectall-tuition-fee").click(function () {
			if (this.checked) {
				$('.tuition-fee').each(function () {
					$(this).prop('checked', true);
				})
			} else {
				$('.tuition-fee').each(function () {
					$(this).prop('checked', false);
				})
			}
		});
		
		
	});
</script>

<?php if (!empty($students)) { ?>
	<?php foreach ($students as $row) { ?>
        <script type="text/javascript">
            	$(document).ready(function () {
            		$(".student-id-<?php echo $row->id?>").click(function () {
            			if (this.checked) {
            				$('.id-<?php echo $row->id ?>').each(function () {
            					$(this).prop('checked', true);
            					$(this).removeAttr("disabled");
            				})
            			} else {
            				$('.id-<?php echo $row->id ?>').each(function () {
            					$(this).prop('checked', false);
            					$(this).prop('disabled', "disabled");
            				})
            			}
            		});
            		
            		
            		//get values of fee
            		admissionFee = $(".admission-fee-textbox-id-<?php echo $row->id ?>").val();
            		annualFee = $(".annual-fee-textbox-id-<?php echo $row->id ?>").val();
            		tuitionFee = $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val();
            		
            		
            		//set value of total
            		totalFee = parseInt(admissionFee) + parseInt(annualFee) + parseInt(tuitionFee);
            		$("#total-id-<?php echo $row->id ?>").val(totalFee);
            		
            		
		            //on changing admission fee textbox set same value to checkbox
		
            		$(".admission-fee-textbox-id-<?php echo $row->id ?>").on("change", function(){
            		    textBoxValue = $(this).val();
            		    $(".admission-fee-checkbox-student-id-<?php echo $row->id?>").val(textBoxValue);
            		})
		
		
		            //on changing annual fee textbox set same value to checkbox
		
        			$(".annual-fee-textbox-id-<?php echo $row->id ?>").on("change", function(){
            		    textBoxValue = $(this).val();
            		    $(".annual-fee-checkbox-student-id-<?php echo $row->id?>").val(textBoxValue);
        		    })
        		    
        		    
		
	
		               //on changing tuition fee textbox set same to checkbox
        			 $(".tuition-fee-textbox-id-<?php echo $row->id ?>").on("change", function(){
            		    textBoxValue = $(this).val();
            		    $(".tuition-fee-checkbox-student-id-<?php echo $row->id?>").val(textBoxValue);
        		     })
        		     
        		     
        		     
		            //on changing the admission fee discount deduct the value from admission fee textbox
            		$('#discount-admission-fee-id-<?php echo $row->id ?>').on("input", function(){
            		    $(".admission-fee-textbox-id-<?php echo $row->id ?>").val(<?php echo $row->admission_fee ?>);
            		    admissionFee = $(".admission-fee-textbox-id-<?php echo $row->id ?>").val() - $(this).val();
            		    $(".admission-fee-textbox-id-<?php echo $row->id ?>").val(admissionFee);
            		    $(".admission-fee-checkbox-student-id-<?php echo $row->id?>").val(admissionFee);
            		});
            		
            		
		            //on changing the admission fee discount deduct the value from total value if the admission fee checkbox is checked
		            $('#discount-admission-fee-id-<?php echo $row->id ?>').on("input", function(){
		        	    $("#total-id-<?php echo $row->id ?>").val(totalFee)
		        	    discount = $(this).val();
            		    
            		    if($(".admission-fee-checkbox-student-id-<?php echo $row->id?>").is(':checked')) {
            		        newTotalFee = $("#total-id-<?php echo $row->id ?>").val();
            		        newTotalFee = newTotalFee - discount;
            		        $("#total-id-<?php echo $row->id ?>").val(newTotalFee);
            		    } else {
            		        
            		    }
            		    
            		})
            // 		$('#discount-admission-fee-id-<?php echo $row->id ?>').on("input", function(){
            		    
            // 		    if($(".admission-fee-checkbox-student-id-<?php echo $row->id?>").is(':checked')) {
            // 		        admissionFee = $(".admission-fee-textbox-id-<?php echo $row->id ?>").val();
            //     		    annualFee = $(".annual-fee-textbox-id-<?php echo $row->id ?>").val();
            //     		    tuitionFee = $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val();
            // 		        totalFee = parseInt(admissionFee) + parseInt(annualFee) + parseInt(tuitionFee);
            // 		        $("#total-id-<?php echo $row->id ?>").val(totalFee);
            // 		    } else {
            		        
            // 		    }
            		    
            // 		})
            		
            		
		            //on changing the annual fee discount deduct the value from annual fee textbox
            			$('#discount-annual-fee-id-<?php echo $row->id ?>').on("input", function(){
                		    $(".annual-fee-textbox-id-<?php echo $row->id ?>").val(<?php echo $row->annual_fee ?>);
                		    annualFee = $(".annual-fee-textbox-id-<?php echo $row->id ?>").val() - $(this).val();
                		    $(".annual-fee-textbox-id-<?php echo $row->id ?>").val(annualFee);
                		    $(".annual-fee-checkbox-student-id-<?php echo $row->id?>").val(annualFee);
            		    });
		
		
		            //on changing the annual fee discount deduct the value from total fee 
		            
		        	$('#discount-annual-fee-id-<?php echo $row->id ?>').on("input", function(){
		        	    $("#total-id-<?php echo $row->id ?>").val(totalFee)
		        	    discount = $(this).val();
            		    
            		    if($(".annual-fee-checkbox-student-id-<?php echo $row->id?>").is(':checked')) {
            		        newTotalFee = $("#total-id-<?php echo $row->id ?>").val();
            		        newTotalFee = newTotalFee - discount;
            		        $("#total-id-<?php echo $row->id ?>").val(newTotalFee);
            		    } else {
            		        
            		    }
            		    
            		})    

		
		$('#discount-tuition-fee-id-<?php echo $row->id ?>').on("input", function(){
		    $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val(<?php echo $row->tuition_fee ?>);
		    tuitionFee = $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val() - $(this).val();
		    $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val(tuitionFee);
		    $(".tuition-fee-checkbox-student-id-<?php echo $row->id?>").val(tuitionFee);
		});
		
		$('#discount-tuition-fee-id-<?php echo $row->id ?>').on("input", function(){
		    admissionFee = $(".admission-fee-textbox-id-<?php echo $row->id ?>").val();
		annualFee = $(".annual-fee-textbox-id-<?php echo $row->id ?>").val();
		tuitionFee = $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val();
		
		totalFee = parseInt(admissionFee) + parseInt(annualFee) + parseInt(tuitionFee);
		
		$("#total-id-<?php echo $row->id ?>").val(totalFee);
		})
		

		
		
		admissionFee = $(".admission-fee-textbox-id-<?php echo $row->id ?>").val();
		annualFee = $(".annual-fee-textbox-id-<?php echo $row->id ?>").val();
		tuitionFee = $(".tuition-fee-textbox-id-<?php echo $row->id ?>").val();
		
		totalFee = parseInt(admissionFee) + parseInt(annualFee) + parseInt(tuitionFee);
		
		$("#total-id-<?php echo $row->id ?>").val(totalFee);
		
		
			
			$(".annual-fee-checkbox-student-id-<?php echo $row->id?>").click(function () {
			if (this.checked) {
			    totalFee =  parseInt(totalFee) +  parseInt(annualFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			} else {
			    totalFee =  parseInt(totalFee) -  parseInt(annualFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			}
			});
			
				$(".admission-fee-checkbox-student-id-<?php echo $row->id?>").click(function () {
			if (this.checked) {
			    totalFee =  parseInt(totalFee) +  parseInt(admissionFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			} else {
			    totalFee =  parseInt(totalFee) -  parseInt(admissionFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			}
			});
			
			
			$(".tuition-fee-checkbox-student-id-<?php echo $row->id?>").click(function () {
			if (this.checked) {
			    totalFee =  parseInt(totalFee) +  parseInt(tuitionFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			} else {
			    totalFee =  parseInt(totalFee) -  parseInt(tuitionFee);
			    $("#total-id-<?php echo $row->id ?>").val(totalFee);
			}
			});
	});
        </script>
    <?php } ?>
<?php } ?>


