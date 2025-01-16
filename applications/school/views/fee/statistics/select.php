<?php $this->view('header'); ?>
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
	<div class="col-md-12 filter-bar">
		<form method="POST" action="<?php echo site_url('fee/displayStatistics') ?>" >
			<div class="col-md-4">
				<p class="headings">Period</p>
				<select name="period" class="form-select">
						<?php if (isset($periods)) { ?>
						<?php foreach ($periods as $period) { ?>
							<option value="<?php echo $period->period; ?>"><?php echo $period->period; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-12">
				<input type="submit" name="" value="Go" class="form-submit">
			</div>
		</form>
	</div>
	<div class="col-md-12 filter-bar">
		<form method="POST" action="<?php echo site_url('fee/viewPaidPaymentsByDate') ?>" >
			<div class="col-md-4">
				<p class="headings">Date</p>
				<input
								type="text"
								id="my_date_picker"
								name="date"
								placeholder="dd-mm-yyyy"
								class="form-input"
								value=""
				/>
			</div>
			<div class="col-md-12">
				<input type="submit" name="" value="Go" class="form-submit">
			</div>
		</form>
	</div>
	<div class="col-md-12 filter-bar">
		<canvas id="myChart" style="width:100%;"></canvas>
	</div>
	

</div>
<script>
        $(document).ready(function() {
          
            $(function() {
                $( "#my_date_picker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>

<script>
const xValues = <?php echo json_encode(array_keys($dateWiseData)) ?>;
const yValues = <?php echo json_encode(array_values($dateWiseData)) ?>;
const barColors = ["green","blue","orange", "#282A35", "#059862", "#2C56BB", "#83060E"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Last 7 days Fee Collection"
    }
  }
});
</script>
<?php $this->view('footer'); ?>
