<?php $this->view('student/layouts/header') ?>

<div class="form-container">
    <form method="POST" action="<?php echo site_url('student/updatePassword') ?>">
        <input type="hidden" name="id" value="<?php echo $studentId ?>" />

        <h2 class="form-heading">Change Password</h2>

        <div class="form-group">
            <label class="form-label" for="current_password">Current Password</label>
            <input type="password" name="current_password" class="form-input" id="current_password" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-input" id="new_password" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="confirm_new_password">Confirm New Password</label>
            <input type="password" name="confirm_new_password" class="form-input" id="confirm_new_password" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?php $this->view('student/layouts/footer') ?>

<style>
    /* General Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #EDE8F5;
        margin: 0;
        padding: 0;
    }

    /* Form Container Styling */
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 40px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    /* Form Heading */
    .form-heading {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 14px;
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    /* Input Fields */
    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        color: #555;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .form-input:focus {
        border-color: #124E66;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    /* Submit Button */
    .btn-primary {
        padding: 10px 20px;
        background-color:#124E66;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
            margin: 20px;
        }

        .form-heading {
            font-size: 20px;
        }

    }
</style>
