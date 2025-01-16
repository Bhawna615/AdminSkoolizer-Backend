<?php $this->view('student/layouts/header') ?>
<div class="col-xs-12 col-sm-12 page-content">
    <div class="col-xs-12 info-box">
        <p>Notifications</p>
        <?php if(isset($recentMessages)){
            if($recentMessages != 0){
                ?>
                <p> You have <?php echo $recentMessages ?> unread message(s).</p>
                <?php 
            }
        
        } ?>
        
        <?php if(isset($recentPayments)){
            if($recentPayments != 0){
                ?>
                <p> You have <?php echo $recentPayments ?> unviewed payment(s).</p>
                <?php 
            }
        
        } ?>
        
         <?php if(isset($recentEvents)){
            if($recentEvents != 0){
                ?>
                <p> You have <?php echo $recentEvents ?> unviewed event(s).</p>
                <?php 
            }
        
        } ?>
        
         <?php if(isset($recentClassPosts)){
            if($recentClassPosts != 0){
                ?>
                <p> You have <?php echo $recentClassPosts ?> unviewed Class Post(s).</p>
                <?php 
            }
        
        } ?>
        
            <?php if(isset($recentSchoolPosts)){
            if($recentSchoolPosts != 0){
                ?>
                <p> You have <?php echo $recentSchoolPosts ?> unviewed School Post(s).</p>
                <?php 
            }
        
        } ?>
        
        <?php if(isset($recentExams)){
            if($recentExams != 0){
                ?>
                <p> You have <?php echo $recentExams ?> unviewed Exam(s).</p>
                <?php 
            }
        
        } ?>
        
        <?php if(isset($recentAssignments)){
            if($recentAssignments != 0){
                ?>
                <p> You have <?php echo $recentAssignments ?> unviewed Assignments(s).</p>
                <?php 
            }
        
        } ?>
        
    </div>
    <div class="col-xs-12 info-box">
        <p class="student-home-heading">Classes Today</p>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <p class="student-home-info-title">Date</p>
            <p class="student-home-info-title">Day</p>
            <!--<p class="student-home-info-title">Last Movement</p>-->
        </div>
        <div class="col-xs-6 col-sm-6">
            <p class="student-home-info-value"><?php echo date("d F Y") ?></p>
            <p class="student-home-info-value"><?php echo date("l") ?></p>
        </div>
        <!--<p>-->
        <!--    <?php if (isset($mostRecentMovement)) echo $mostRecentMovement->movement . " " . $mostRecentMovement->timestamp ?>-->
        <!--</p>-->
    </div>
    <div class="col-xs-12 schedule-list-container">
        <?php if (isset($scheduleList)) { ?>
            <?php foreach ($scheduleList as $schedule) { ?>
                <div class="col-xs-12 schedule-container">
                    <div class="col-xs-4 schedule-subject-container">
                        <p class="student-home-subject-name"><?php echo $schedule->Subjectname ?></p>
                    </div>
                    <div class="col-xs-8 schedule-details-container">
                        <p class="student-home-subject-time"><?php echo $schedule->Stime ?> to <?php echo $schedule->Etime ?></p>
                        <p class="student-home-subject-teacher">Teacher: <?php echo $schedule->Teachername ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php if(empty($scheduleList)) { ?>
             <div class="col-xs-12 no-classes-container">
                <p class="no-classes">No Classes Added for today ;-)</p>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    function loadDoc() {
        setInterval(function(){
              var xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                document.getElementById("noti-number").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "<?php echo site_url('student/notification'); ?>", true);
          xhttp.send();
                }, 1000)
    }

    loadDoc();
</script>
<?php $this->view('student/layouts/footer') ?>
