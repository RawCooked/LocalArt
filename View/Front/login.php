<?php
include 'C:/xampp/htdocs/LocalArt/Model/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Handle signup form submission
        $username = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user1 = new user(0, "0", "0", "0", "0");
        $user1->Adduser(0, $username, $email, $password, "user");
      
    } elseif (isset($_POST['login'])) {
        // Handle login form submission
        $loginEmail = $_POST['login-email'];
        $loginPassword = $_POST['login-pswd'];

        // Perform form validation (you can customize this as needed)
        $loginError = '';
        if (empty($loginEmail) || empty($loginPassword)) {
            $loginError = 'Email and password are required.';
        } else {
            // You can add your user authentication logic here
            // Replace this with your actual code
            // For now, we'll just display the received data
            echo "<h1>Login data received: Email = $loginEmail, Password = $loginPassword</h1>";
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
  <script>
    function validateSignupForm() {
      var username = document.getElementById("txt").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("pswd").value;
      var signupErrorElement = document.getElementById("signup-error");

      signupErrorElement.innerHTML = ""; // Clear any previous error messages

      if (username.length === 0) {
        signupErrorElement.innerHTML = "Le champ nom est obligatoire.";
        return false;
      }

      if (email.length === 0) {
        signupErrorElement.innerHTML = "Le champ e-mail est obligatoire.";
        return false;
      }

      if (password.length === 0) {
        signupErrorElement.innerHTML = "Le champ mot de passe est obligatoire.";
        return false;
      }

      if (username.length > 20) {
        signupErrorElement.innerHTML = "Le nom ne doit pas dépasser 20 caractères.";
        return false;
      }

      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!email.match(emailPattern)) {
        signupErrorElement.innerHTML = "L'e-mail n'est pas au bon format.";
        return false;
      }

      var passwordPattern = /^(?=.*[A-Z])(?=.*\d)/;
      if (!password.match(passwordPattern)) {
        signupErrorElement.innerHTML = "Le mot de passe doit contenir au moins une lettre majuscule et au moins un chiffre.";
        return false;
      }

      return true;
    }
    
    function validateLoginForm() {
      var loginEmail = document.getElementById("login-email").value;
      var loginPassword = document.getElementById("login-pswd").value;
      var loginButton = document.getElementById("login-button");
      var loginErrorElement = document.getElementById("login-error");

      loginErrorElement.innerHTML = ""; // Clear any previous error messages

      if (loginEmail.length === 0 || loginPassword.length === 0) {
        loginErrorElement.innerHTML = "Les champs e-mail et mot de passe sont obligatoires.";
        return false;
      }

      // Add login functionality here (e.g., redirect to a login page)
      // Replace the alert with the actual login logic

      return true;
    }
  </script>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
  <title>Slide Navbar</title>
  <link rel="stylesheet" type="text/css" href="slide navbar style.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
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
      <button type="submit" name="signup" >Sign up</button>
      <div id="signup-error" class="fgp"></div>
    </form>
  </div>
  <div class="login">
    <form method="POST" action="">
      <label for="chk" aria-hidden="true">Login</label>
      <input type="email" id="login-email" placeholder="Email">
      <input type="password" id="login-pswd" placeholder="Password">
      <a href="forgot-password.html" class="fgp">forget password</a>
      <button id="login-button" onclick="return validateLoginForm()">Login</button>
      <div id="login-error" name="login" class="fgp"></div>
    </form>
  </div>
</div>
</body>
</html>
<!-- partial -->
</body>
</html>
