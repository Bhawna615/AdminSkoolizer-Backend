<?php $this->view('student/layouts/header') ?>
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" >
    </script>
      
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
<div class="col-xs-12 page-content">
    <form method="POST" action="<?php echo site_url('LeaveRequest/create') ?>">
            <p class="profile-page-heading">LEAVE DETAILS</p>
            <p class="profile-input-heading">DATE</p>
            <input type="text" name="request_date" placeholder="dd/mm/yyyy" id="date" class="profile-input">
            <p class="profile-input-heading">REASON</p>
            <textarea name="request_reason" class="profile-input"></textarea>
            <div class="col-xs-12 btn-container">
                <button type="submit" class="form-btn-2">SUBMIT</button>
            </div>
    </form>
</div>

<script>
        $(document).ready(function() {
          
            $(function() {
                $( "#date" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        })
    </script>
<?php $this->view('student/layouts/footer') ?>