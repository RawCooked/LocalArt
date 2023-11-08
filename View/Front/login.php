<?php
include 'C:/xampp/htdocs/LocalArt/Model/user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Handle signup form submission
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        
        

        // You should validate and process the signup data using your user class here.
        // For now, you can simply display the received data:
        echo "<h1>Signup data received: Username = $username, Email = $email, Password = $password";
    } elseif (isset($_POST['login'])) {
        // Handle login form submission
        $loginEmail = $_POST['login-email'];
        $loginPassword = $_POST['login-pswd'];


        $user1= new user(0,"0","0","0","0");
      $users = $user1->Getuser();
      var_dump($users);


        // You should validate and process the login data using your user class here.
        // For now, you can simply display the received data:
        echo "Login data received: Email = $loginEmail, Password = $loginPassword";
    }
    
}

$user1= new user(0,"username","email","password","0");
    $user1->Adduser(0,"username","email","password","0");

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
      <div id="signup-error" class="fgp"></div>
    </form>
  </div>
  <div class="login">
    <form>
      <label for="chk" aria-hidden="true">Login</label>
      <input type="email" id="login-email" placeholder="Email">
      <input type="password" id="login-pswd" placeholder="Password">
      <a href="forgot-password.html" class="fgp">forget password</a>
      <button id="login-button" onclick="return validateLoginForm()">Login</button>
      <div id="login-error" class="fgp"></div>
    </form>
  </div>
</div>
</body>
</html>
<!-- partial -->
</body>
</html>
