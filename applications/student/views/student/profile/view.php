<?php $this->view('student/layouts/header') ?>

<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #EDE8F5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px; 
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center content inside container */
    }

    /* Success and Error Bars */
    .message-bar {
        display: none;
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .success-bar {
        background-color: #e9f9ed;
        color: #34a853;
    }

    .error-bar {
        background-color: #fdecea;
        color: #d93025;
    }

    .message-bar i {
        margin-right: 10px;
        font-size: 18px;
    }

/* Profile Image Professional Styling */
.profile-image {
    width: 120px; /* Adjusted for a slightly larger look */
    height: 120px; /* Adjusted for consistency */
    border-radius: 50%;
    border: 3px solid #ffffff; /* White border for better contrast */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Subtle shadow to give depth */
    padding: 3px; /* Padding around the image */
    object-fit: cover; /* Ensures the image fits within the circle */
    margin-bottom: 20px; /* Space below the image */
    transition: all 0.3s ease; /* Smooth transition on hover */
}

/* Hover effect for profile image */
.profile-image:hover {
    transform: scale(1.05); /* Slight zoom effect on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3); /* More prominent shadow on hover */
}


    /* Form Styling */
    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-label {
        font-size: 14px;
        font-weight: bold;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        color: #555;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #124E66;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .btn-custom {
        background-color: #124E66;
        width: 100%;
        margin-top: 20px;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    /* Profile Heading */
    .profile-heading {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
        color: #333;
        text-align: center; /* Center the heading */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
            margin: 20px;
          
        }

        .profile-heading {
            font-size: 20px;
        }

        .form-control {
            font-size: 13px;
        }

    }
</style>

<div class="container">

    <!-- Success/Error Messages -->
    <div>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="message-bar error-bar">
                <i class="las la-exclamation-triangle"></i>
                <?php echo $this->session->flashdata('error') ?>
                <?php $this->session->unset_userdata('error') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="message-bar success-bar">
                <i class="las la-check-square"></i>
                <?php echo $this->session->flashdata('success') ?>
                <?php $this->session->unset_userdata('success') ?>
            </div>
        <?php } ?>
    </div>

    <h2 class="profile-heading">Student Profile</h2>

    <!-- Profile Image Centered -->
    <div>
        <?php if (!empty($this->session->userdata('image'))) { ?>
            <img src="<?php echo base_url('assets/images/students/') . $student->image ?>" class="profile-image" />
        <?php } else { ?>
            <img src="<?php echo base_url('assets/icons/user-black.png'); ?>" class="profile-image" />
        <?php } ?>
    </div>

    <form action="" method="post">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" value="<?php echo $student->Name ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="class" class="form-label">Class</label>
            <input type="text" id="class" value="<?php echo $student->Class ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="rollno" class="form-label">Roll No.</label>
            <input type="text" id="rollno" value="<?php echo $student->Rollno ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="fname" class="form-label">Father's Name</label>
            <input type="text" id="fname" value="<?php echo $student->Fname ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="mname" class="form-label">Mother's Name</label>
            <input type="text" id="mname" value="<?php echo $student->Mname ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" value="<?php echo $student->Email ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" value="<?php echo $student->Address ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" id="contact" value="<?php echo $student->Contact ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="smsno" class="form-label">SMS Number</label>
            <input type="text" id="smsno" value="<?php echo $student->Smsno ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" id="dob" value="<?php echo $student->Dob ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="admno" class="form-label">Admission Number</label>
            <input type="text" id="admno" value="<?php echo $student->Admno ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="house" class="form-label">House</label>
            <input type="text" id="house" value="<?php echo $student->House ?>" class="form-control" readonly>
        </div>

        <button type="button" class="btn-custom" onclick="window.location.href='<?php echo site_url('student/changePassword') ?>'">Change Password</button>
    </form>

</div>

<?php $this->view('student/layouts/footer') ?>
