<?php
session_start(); // Start the session

include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/LocalArt/vendor/autoload.php';

// Function to check if the entered code is correct
function isCodeCorrect($enteredCode, $authCode) {
    return $enteredCode == $authCode;
}

// Function to send authentication code via email
function sendAuthenticationCode($email, $authCode) {
    $smtpHost = 'smtp.gmail.com';
    $smtpUsername = 'pcg6647@gmail.com';
    $smtpPassword = 'gcel ubmw tbsc yboo';
    $smtpPort = 465;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = $smtpPort;

        $mail->setFrom($smtpUsername, 'Your Name');
        $mail->addAddress($email);

        $mail->Subject = 'Authentication Code';
        $mail->Body = 'Your authentication code is: ' . $authCode;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$authCode = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sendCode'])) {
        $email = $_POST['email'];

        $authCode = rand(100000, 999999);

        $_SESSION['authCode'] = $authCode;
        $_SESSION['email'] = $email;

        sendAuthenticationCode($email, $authCode);

        // Add success message or redirection here
    } elseif (isset($_POST['checkCode'])) {
        $enteredCode = $_POST['enteredCode'];

        $storedAuthCode = isset($_SESSION['authCode']) ? $_SESSION['authCode'] : null;
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

        if (isCodeCorrect($enteredCode, $storedAuthCode)) {
            // Code is correct, redirect to change_password.php with email as a query parameter
            header('Location: change_password.php?email=' . urlencode($email));
            exit();
        } else {
            echo "Incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodePen - CSS only frosted glass effect</title>
    <link rel="stylesheet" href="assets/css/fgp_style.css">
</head>
<body>

<div class="blurred-box">
    <div class="user-login-box">
        <img src="assets/img/LocalArtlogo.png" style="height: 100px; width:100px;" alt="">

        <?php if (!$authCode) { ?>
            <!-- Display form to send code -->
            <form method="POST" action="">
                <label>
                    <input placeholder="Email" name="email" class="user-email" type="email" required/>
                </label>
                <button type="submit" name="sendCode" style="margin-top: 15px">Send Code</button>
            </form>
        <?php } else { ?>
            <!-- Display form to check code -->
            <div class="user-name">Enter the code.</div>
            <div class="check-mail">
                <form method="POST" action="">
                    <label>
                        <input placeholder="Code" name="enteredCode" class="user-email" type="text" required/>
                    </label>
                    <button type="submit" name="checkCode" style="margin-top: 15px">Check</button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
