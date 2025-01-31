<?php $this->view('student/layouts/header') ?>

<style>
    .sidebar-menu-item.notification-pending {
        background-color: lightcoral; /* Light red background for unread notification */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Box shadow to highlight */
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        border-radius: 8px; /* Slightly rounded corners for better look */
    }
    .notification-count {
        position: absolute;
        top: 5px;
        right: 10px;
        background-color: red;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 50%;
    }
</style>
<div class="col-xs-12 col-sm-12 page-content">
    <!-- Icon links below the navbar (3 columns, 4 rows) -->
    <div class="icon-links-container">
        <div class="sidebar-menu-item ">
            <a href="https://kkblossomschool.org">
                <img src="<?php echo base_url('assets/icons/website.png'); ?>" alt="Home Icon">
                <p>School Website</p>
            </a>
        </div>
        <div class="sidebar-menu-item <?php echo ($recentAssignments > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('assignment') ?>">
                <img src="<?php echo base_url('assets/icons/qa.png'); ?>" alt="Assignment Icon">
                <p>Homework</p>
                <?php if ($recentAssignments > 0) { echo "<span class='notification-count'>{$recentAssignments}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item <?php echo ($recentExams > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('exam') ?>">
                <img src="<?php echo base_url('assets/icons/exam.png'); ?>" alt="Exams Icon">
                <p>Exams</p>
                <?php if ($recentExams > 0) { echo "<span class='notification-count'>{$recentExams}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background <?php echo ($recentSchoolPosts > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('post/mySchool') ?>">
                <img src="<?php echo base_url('assets/icons/school.png'); ?>" alt="Exams Icon">
                <p>My School</p>
                <?php if ($recentSchoolPosts > 0) { echo "<span class='notification-count'>{$recentSchoolPosts}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item blue-background <?php echo ($recentClassPosts > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('post/myClass') ?>">
                <img src="<?php echo base_url('assets/icons/teacher.png'); ?>" alt="Exams Icon">
                <p>My Class</p>
                <?php if ($recentClassPosts > 0) { echo "<span class='notification-count'>{$recentClassPosts}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('exam/results') ?>">
                <img src="<?php echo base_url('assets/icons/evaluation.png'); ?>" alt="Exams Icon">
                <p>Results</p>
            </a>
        </div>
        <div class="sidebar-menu-item blue-background <?php echo ($recentEvents > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('event') ?>">
                <img src="<?php echo base_url('assets/icons/banner.png'); ?>" alt="Exams Icon">
                <p>Events</p>
                <?php if ($recentEvents > 0) { echo "<span class='notification-count'>{$recentEvents}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background">
            <a href="<?php echo site_url('student/profile') ?>">
                <img src="<?php echo base_url('assets/icons/professional-portfolio.png'); ?>" alt="Exams Icon">
                <p>Portfolio</p>
            </a>
        </div>
        <div class="sidebar-menu-item blue-background <?php echo ($recentPayments > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('fee') ?>">
                <img src="<?php echo base_url('assets/icons/fees.png'); ?>" alt="Exams Icon">
                <p>Fee</p>
                <?php if ($recentPayments > 0) { echo "<span class='notification-count'>{$recentPayments}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background <?php echo ($recentMessages > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('message') ?>">
                <img src="<?php echo base_url('assets/icons/comments.png'); ?>" alt="Exams Icon">
                <p>Messages</p>
                <?php if ($recentMessages > 0) { echo "<span class='notification-count'>{$recentMessages}</span>"; } ?>
            </a>
        </div>
        <div class="sidebar-menu-item blue-background ">
            <a href="<?php echo site_url('LeaveRequest'); ?>">
                <img src="<?php echo base_url('assets/icons/leave.png'); ?>" alt="Exams Icon">
                <p>Leave Requests</p>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('student/accounts'); ?>">
                <img src="<?php echo base_url('assets/icons/user.png'); ?>" alt="Exams Icon">
                <p>My Accounts</p>
            </a>
        </div>
    </div>
</div>
</div>







<script>
    document.querySelectorAll('.sidebar-menu-item').forEach(item => {
        item.addEventListener('click', function() {
            if (this.classList.contains('notification-pending')) {
                this.classList.remove('notification-pending');
                let countBadge = this.querySelector('.notification-count');
                if (countBadge) countBadge.remove();
                
                let notificationType = this.querySelector('p').innerText;
                markNotificationAsRead(notificationType);
            }
        });
    });

    function markNotificationAsRead(notificationType) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?php echo site_url('student/markNotification'); ?>", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("notificationType=" + notificationType);
    }
</script>



<?php $this->view('student/layouts/footer') ?>