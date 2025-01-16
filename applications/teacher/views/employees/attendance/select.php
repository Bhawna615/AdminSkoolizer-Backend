<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
    <div class="col-md-4">
        <form method="POST" action="<?php echo site_url('employee/viewByMonth'); ?>">
            <p class="details">Month</p>
            <select name="month" class="form-select">
                <option value="1">January</option>
                <option value="2">Februry</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <br>
            <input type="submit" name="" value="View" class="form-submit">
        </form>
    </div>
</div>
<?php $this->view('footer'); ?>
