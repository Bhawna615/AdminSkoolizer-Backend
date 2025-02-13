<?php
$currentYear = date('Y'); // Current year, e.g., 2025
$currentSession = $currentYear . '-' . ($currentYear + 1); // Current session, e.g., 2025-2026

// Define the range of sessions (for the last 8 years and the next year)
$sessions = [];
for ($i = 0; $i < 8; $i++) {
    $startYear = $currentYear - $i;
    $endYear = $startYear + 1;
    $sessions[] = $startYear . '-' . $endYear;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Session</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        @font-face {
            font-family: RedhatR;
            src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Medium;
            src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
        }

        @font-face {
            font-family: Montserrat-Medium;
            src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Regular;
            src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
        }

        body {
            font-family: 'Rubik-Regular', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .session-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .session-container h1 {
            font-family: 'Rubik-Medium', sans-serif;
            margin-bottom: 20px;
        }

        .session-container select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .session-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .session-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="session-container">
    <h1>Select Session</h1>
    <select id="session" name="session">
        <?php foreach ($sessions as $session): ?>
            <option value="<?php echo $session; ?>" <?php echo ($session == $currentSession) ? 'selected' : ''; ?>>
                <?php echo $session; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button id="show-payments">Show Payments</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#show-payments').on('click', function () {
            var session = $('#session').val();
            window.location.href = '<?php echo site_url('fee/viewPayments'); ?>?session=' + session;
        });
    });
</script>
</body>
</html>
