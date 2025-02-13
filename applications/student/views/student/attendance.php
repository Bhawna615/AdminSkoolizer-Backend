<?php $this->load->view('student/layouts/header'); ?>



<!-- Internal CSS -->
<style>
    /* Profile Card Styling */

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: max-content;
        width: 100%;
    }

    .profile-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        width: 100%;
        height: max-content;
        animation: fadeIn 1sease-in-
    }

    /* Profile Image Styling */
    .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 5px solid #124E66;
        transition: transform 0.3s ease;
    }

    .profile-img:hover {
        transform: scale(1.1);
        /* Zoom effect on hover */
    }

    /* Attendance Details Card Styling */
    .attendance-details-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #F7F9FC;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Animations for Fade-In Effects */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated {
        animation: fadeInUp 1s ease-out;
    }

    /* Font Sizes */
    .text-primary {
        font-size: 1.5rem;
        color: black;
        font-family: Nunito-Semibold;
        text-transform: lowercase;
    }

    .text-primary::first-letter {
        text-transform: uppercase;
    }


    .card-body {
        padding: 15px;
    }





    .text-info {
        color: #17a2b8;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .display-4 {
        font-size: 2.5rem;
    }

    /* List Group Styling */
    .list-group-item i {
        margin-left: 10px;
    }





    /* callender */

    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        padding: 10px;
        text-align: center;
    }

    .calendars {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        padding: 10px;
        text-align: center;
    }

    .calendar-day {
        padding: 10px;
        border-radius: 5px;
    }



    .disabled {
        color: grey;
        pointer-events: none;
    }


    .calendar-container {
        background-color: #e3f2fd;
        padding: 20px;
        border-radius: 10px;
    }

    .calendar td {
        width: 14.28%;
        height: 80px;
        text-align: center;
        vertical-align: middle;
    }

    .calendars td {
        width: 14.28%;
        height: 80px;
        text-align: center;
        vertical-align: middle;
    }

    .absent {
        background-color: rgb(249, 189, 189) !important;
    }

    .present {
        background-color: rgb(56, 249, 185) !important;
    }

    .normal {
        background-color: #e3f2fd;
    }


    .legend-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 10px;

    }

    .absentees {
        display: flex;
        justify-content: center;
        gap: 10px;

        padding: 5px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
    }

    .legend-box {
        width: 15px;
        height: 15px;
        display: inline-block;
        border-radius: 3px;
        margin-right: 5px;

    }

    @keyframes bounceEffect {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .performance-box {
        display: inline-block;
        padding: 20px;
        border-radius: 12px;
        background: #ffffff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        animation: bounceEffect 1.5s infinite ease-in-out;
    }

    .performance-indicator {
        text-align: center;
    }


    /* callender */

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-img {
            width: 100px;
            height: 100px;
        }

        .card-body {
            padding: 15px;
        }

        .text-primary {
            font-size: 1.5rem;
            color: black
        }

        .text-info {
            font-size: 1.5rem;
        }

        .font-weight-bold {
            font-size: 1.2rem;
        }

        .display-4 {
            font-size: 2rem;
        }

        .text {
            text-align: center;
        }
    }
</style>
<div class="container">
    <?php if (isset($info)) { ?>


        <!-- Profile Card with Box Shadow -->
        <div class="profile-card ">
            <!-- Image Section -->
            <div class="card-header text-center bg-light">
                <div class="profile-image-container">
                    <?php if ($info->image != NULL) { ?>
                        <img src="<?php echo base_url('assets/images/students/') . $info->image; ?>"
                            class="img-fluid rounded-circle profile-img">
                    <?php } else { ?>
                        <img src="<?php echo base_url('assets/icons/user.svg'); ?>"
                            class="img-fluid rounded-circle profile-img">
                    <?php } ?>
                </div>
            </div>

            <!-- Student Details Section -->
            <div class="card-body text">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h2 class="text-primary font-weight-bold animated fadeInUp"><?php echo $info->Name; ?></h2>
                        <p class="text-primary">Class: <?php echo $info->Class; ?></p>
                        <p class="text-primary">Roll No: <?php echo $info->Rollno; ?></p>
                    </div>
                </div>
            </div>

            <!-- Attendance Details Table -->
            <div class="card-body attendance-details-card">
                <p class="text-center display-4 text-uppercase font-weight-bold animated fadeInUp text-primary"
                    style="text-transform:uppercase;">Statistics</p>
                <table class="table table-bordered text-primary">
                    <tbody>
                        <tr>
                            <td class="text-primary"><strong>Total Days</strong></td>
                            <td class="text-primary"><strong><?php echo $attendance[0]; ?></strong></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><strong>Present Days</strong></td>
                            <td class="text-primary"><?php echo $attendance[1]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><strong>Attendance Percentage</strong></td>
                            <?php
                            $percent = ($attendance[0] != 0) ? ($attendance[1] / $attendance[0] * 100) : 0;
                            $color = ($percent >= 85) ? 'green' : (($percent >= 60) ? '#3498db' : 'red');
                            $status = ($percent >= 85) ? "Outstanding! 🏆" : (($percent >= 60) ? "keep Going! 🔄" : "Needs Improvement! ⚠️");
                            $icon = ($percent >= 85) ? "fas fa-smile-beam" : (($percent >= 60) ? "fas fa-meh" : "fas fa-frown");
                            ?>
                            <td class="text-primary" style="color: <?php echo $color; ?>;">
                                <strong><?php echo intval($percent) . "%"; ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Performance Indicator -->
                <div class="performance-box">
                    <div class="performance-indicator">
                        <i class="<?php echo $icon; ?>" style="font-size: 3rem; color: <?php echo $color; ?>;"></i>
                        <p class="font-weight-bold mt-2" style="color: <?php echo $color; ?>; font-size: 1.6rem;">
                            <?php echo $status; ?>
                        </p>
                    </div>
                </div>

            </div>







            <!-- Absent Dates Section -->
            <!-- Absent Dates Calendar Section -->
            <div class="card-body">
                <div class="container mt-4">
                    <div class="calendar-container">
                        <h3 class="text-center text-primary" style="font-size:2.1rem; text-transform:capitalize;">
                            <strong>Attendance Calendar</strong>
                        </h3>
                        <div id="calendar"></div>
                        <div class="legend-container text-center">
                            <div class="absentees">
                                <span class="legend-box absent"></span> Absent
                            </div>
                            <div class="absentees">
                                <span class="legend-box present"></span> Present
                            </div>
                        </div>
                    </div>



                </div>


            </div>


        <?php } ?>
    </div>

    <?php $this->view('student/layouts/footer'); ?>

    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendar = document.getElementById("calendar");
            const monthDropdown = document.createElement("select");
            const today = new Date();
            let currentYear = today.getFullYear();
            let currentMonth = today.getMonth();

            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const absentDates = <?php echo json_encode(array_map(function ($date) {
                return date('Y-m-d', strtotime($date->Date));
            }, $attendance[2])); ?>;
            const workingDays = <?php echo json_encode(array_map(function ($date) {
                return date('Y-m-d', strtotime($date->Date));
            }, $attendance[3])); ?>;


            // Create dropdown for months
            monthDropdown.id = "monthDropdown";
            monthDropdown.classList.add("form-control", "mb-3");
            months.forEach((month, index) => {
                let option = document.createElement("option");
                option.value = index;
                option.textContent = month;
                if (index === currentMonth) option.selected = true;
                monthDropdown.appendChild(option);
            });

            calendar.parentElement.insertBefore(monthDropdown, calendar);

            function generateCalendar(year, month) {
                calendar.innerHTML = "";
                const firstDay = new Date(year, month, 1).getDay();
                const lastDate = new Date(year, month + 1, 0).getDate();
                let days = "<div class='calendar'>";

                // Empty slots for days before the 1st of the month
                for (let i = 0; i < firstDay; i++) {
                    days += "<div></div>";
                }

                for (let date = 1; date <= lastDate; date++) {
                    let fullDate = `${year}-${(month + 1).toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`;
                    let className = "calendar-day";
                    let dayDate = new Date(year, month, date);

                    if (dayDate > today) {
                        className += " future"; // Future dates normal
                    } else if (absentDates.includes(fullDate)) {
                        className += " absent"; // Absent dates red
                    } else if (workingDays.includes(fullDate)) {
                        className += " present"; // Present dates green
                    }

                    days += `<div class='${className}'>${date}</div>`;
                }
                days += "</div>";
                calendar.innerHTML = days;
            }

            monthDropdown.addEventListener("change", function () {
                currentMonth = parseInt(this.value);
                generateCalendar(currentYear, currentMonth);
            });

            generateCalendar(currentYear, currentMonth);
        });

    </script>