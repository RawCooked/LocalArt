<?php
include 'C:/xampp/htdocs/LocalArt/Model/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Handle signup form submission
        $username = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user1 = new User(0, "0", "0", "0", "0");
        $user1->Adduser(0, $username, $email, $hashedPassword, "user");
        header('Location: index.php');
        exit; // Ensure to stop execution after redirection
    } elseif (isset($_POST['login_button'])) {
        // Handle login form submission
        $loginEmail = $_POST['log-email'];
        $loginPassword = $_POST['log-pswd'];
        

        // Perform form validation (you can customize this as needed)
        $loginError = '';
        if (empty($loginEmail) || empty($loginPassword)) {
            $loginError = 'Email and password are required.';
        } else {
            // Assuming your user class has a method to get all users
            $user = new User(1, "0", "0", "0", "0");
            $userList = $user->Getuser();

            $isValidLogin = false;

            foreach ($userList as $userData) {
                if ($userData['email'] == $loginEmail && password_verify($loginPassword, $userData['password'])) {
                    // Successful login
                    $isValidLogin = true;
                    header('Location: index.php');
                    exit;
                }
            }

            // Invalid email or password
            $loginError = 'Invalid email or password.';
        }
    }

    



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LocalArt</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
        /* Your CSS styles go here */
    </style>
    <script>
        function validateSignupForm() {
            var username = document.getElementById("txt").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("pswd").value;
            var signupErrorElement = document.getElementById("signup-error");

            signupErrorElement.innerHTML = ""; // Clear any previous error messages

            if (username.length === 0 || email.length === 0 || password.length === 0) {
                signupErrorElement.innerHTML = "All fields are required.";
                return false;
            }

            // Additional validation logic if needed

            return true;
        }

        function validateLoginForm() {
            var loginEmail = document.getElementById("login-email").value;
            var loginPassword = document.getElementById("login-pswd").value;
            var loginErrorElement = document.getElementById("login-error");

            loginErrorElement.innerHTML = ""; // Clear any previous error messages

            if (loginEmail.length === 0 || loginPassword.length === 0) {
                loginErrorElement.innerHTML = "Email and password are required.";
                return false;
            }

            // Additional validation logic if needed

            return true;
        }
    </script>
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
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" id="login-email" name="log-email" placeholder="Email">
            <input type="password" id="login-pswd" name="log-pswd" placeholder="Password">
            <button id="login-button" name="login_button" onclick="return validateLoginForm()">Login</button>
            <div id="login-error" name="login" class="fgp"><?php echo isset($loginError) ? $loginError : ''; ?></div>
        </form>
    </div>
</div>
</body>
</html>