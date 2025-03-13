<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/student.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
	/* Styling the table container */

	body {
        font-family: 'Nunito', sans-serif;
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
    }

    .innerview {
        margin: 20px;
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: 0.3s ease-in-out;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: max-content;
    }
	
#table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    animation: fadeIn 0.5s ease-in-out;
}

#table-view{
	width: 100%;
	height: max-content;
}

/* Table header styling */
.dataTableHead {
    background: #87CEFA; /* Light Blue */
    color: white;
    font-size: 16px;
    text-transform: uppercase;
    font-weight: bold;
}

/* Table row styling */
.dataTableBody tr {
    transition: all 0.3s ease-in-out;
}

/* Alternating row colors */
.dataTableBody tr:nth-child(even) {
    background: #f8f9fa;
}

.dataTableBody tr:nth-child(odd) {
    background: #ffffff;
}

/* Hover effect */
.dataTableBody tr:hover {
    background: #d1ecff;
    transform: scale(1.02);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Table cells styling */
th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Styling the file link */
td a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
    transition: color 0.3s;
}

td a:hover {
    color: #0056b3;
    text-decoration: underline;
}

/* Animation for fade-in effect */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>
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
	<form method="POST" action="<?php echo site_url('message/create'); ?>">
		<button title="Compose" class="float" style="border: none;"><i class="material-icons"
																	   style="font-size: 30px; position: relative; top: 3px; color: #fff;">create</i>
		</button>
	</form>

	<div id="table-view">

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#table-view').load('<?php echo site_url('message/display') ?>')
	});

	$('.filter').on('change', function () {
		if ($('#filter-check').is(':checked')) {
			$('#table-view').load('<?php echo site_url('message/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
		}
	});
	$('#filter-check').on('change', function () {
		if(this.checked) {
			$('#table-view').load('<?php echo site_url('message/filter/') ?>' + $('#year').val() + '/' + $('#month').val() + '/' + $('#class').val())
		} else {
			$('#table-view').load('<?php echo site_url('message/display') ?>')
		}
	});
</script>
<?php $this->view('footer'); ?>
