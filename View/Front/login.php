<?php
include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';
include 'login_head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LocalArt</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script src='assets/js/login_head.js' ></script>
</head>
<body>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
        <form onsubmit="return validateSignupForm()" method="POST" action="">
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" id="txt" name="nom" placeholder="User name">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="pswd" name="password" placeholder="Password">
            <button type="submit" name="signup">Sign up</button>
            <div id="signup-error" class="fgp"></div>
        </form>
    </div>
    <div class="login">
        <form method="POST" action="">
            <label for="chk" style="padding-top:20px; margin-top:50px;" aria-hidden="true">Login</label>
            <input type="email" id="login-email" name="log-email" placeholder="Email">
            <input type="password" id="login-pswd" name="log-pswd" placeholder="Password">
            <a href="forgot_password.php" class="fgp">Forget Password ?</a>
            
            <button id="login-button"  name="login_button" onclick="return validateLoginForm()">Login</button>
            <div id="login-error" name="login" class="fgp"><?php echo isset($loginError) ? $loginError : ''; ?></div>
        </form>
    </div>
</div>
</body>
</html>