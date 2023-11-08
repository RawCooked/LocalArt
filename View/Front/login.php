<?php
if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password'])) {
    // Process the sign-up data
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    
}

if (isset($_GET['login-email']) && isset($_GET['login-pswd'])) {
    $loginEmail = $_GET['login-email'];
    $loginPassword = $_GET['login-pswd'];


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
    <form onsubmit="return validateSignupForm()">
      <label for="chk" aria-hidden="true">Sign up</label>
      <input type="text" id="txt" placeholder="User name">
      <input type="email" id="email" placeholder="Email">
      <input type="password" id="pswd" placeholder="Password">
      <button>Sign up</button>
      <div id="signup-error" class="fgp" style="color: red;"></div>
    </form>
  </div>
  <div class="login">
    <form>
      <label for="chk" aria-hidden="true">Login</label>
      <input type="email" id="login-email" placeholder="Email">
      <input type="password" id="login-pswd" placeholder="Password">
      <a href="forgot-password.html" class="fgp">forget password</a>
      <button id="login-button" onclick="return validateLoginForm()">Login</button>
      <div id="login-error" class="fgp" style="color: red;"></div>
    </form>
  </div>
</div>
</body>
</html>
<!-- partial -->
</body>
</html>
