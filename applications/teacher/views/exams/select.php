
<!-- <div class="col-md-12 innerview">
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
	<form method="POST" action="<?php echo site_url('exam/view') ?>" >
		<div class="col-md-4">
			<p class="headings">Exam Type</p>
			<select name="exam" class="form-select">
					<?php if (isset($examTypes)) { ?>
					<?php foreach ($examTypes as $examType) { ?>
						<option value="<?php echo $examType->Examtype; ?>"><?php echo $examType->Examtype; ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12">
			<input type="submit" name="" value="Go" class="form-submit">
		</div>
	</form>
</div> -->




























<?php $this->view('header'); ?>

<style>
    body {
        background:#fff; /* Light Blue Background */
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        /* align-items: center; */
        min-height: 100vh;
		text-align: center;
    }

    .exam-card {
        background: rgba(240, 255, 240, 0.9); /* Light Green Glass Effect */
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 20px;
        width: 90%;
        max-width: 500px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeIn 0.6s ease-out forwards;
		height: max-content;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .headings {
        font-weight: bold;
        margin-top: 10px;
    }

    .form-select {
        width: 100%;
        padding: 4px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .form-submit {
        background: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        transition: 0.3s;
    }

    .form-submit:hover {
        background: #388E3C;
    }
</style>

<div class="container">
    <div class="exam-card">
        <div class="message">
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="col-md-12 error-bar">
                    <i class="las la-exclamation-triangle"></i>
                    <?php echo $this->session->flashdata('error') ?>
                    <?php $this->session->unset_userdata('error') ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="col-md-12 success-bar">
                    <i class="las la-check-square"></i>
                    <?php echo $this->session->flashdata('success') ?>
                    <?php $this->session->unset_userdata('success') ?>
                </div>
            <?php } ?>
        </div>
        
        <form method="POST" action="<?php echo site_url('exam/view') ?>">
            <p class="headings">Exam Type</p>
            <select name="exam" class="form-select">
                <?php if (isset($examTypes)) { ?>
                    <?php foreach ($examTypes as $examType) { ?>
                        <option value="<?php echo $examType->Examtype; ?>">
                            <?php echo $examType->Examtype; ?>
                        </option>
                    <?php } ?>
                <?php } ?>
            </select>
            
            <input type="submit" value="Go" class="form-submit">
        </form>
    </div>
</div>

<?php $this->view('footer'); ?>

