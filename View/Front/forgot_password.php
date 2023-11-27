<?php
include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';



?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS only frosted glass effect</title>
  <link rel="stylesheet" href="assets/css/fgp_style.css">

</head>
<body>


<div class="blurred-box">
  <div class="user-login-box" >
    <img src="assets/img/LocalArtlogo.png" style="height: 100px; width:100px;" alt="">

    <div class="user-name"  >Enter your Email .</div>
      <div class="check-mail">
      <form method="POST" action="forgot_password_key.php">
      <label>
          <input placeholder="john@doe.com"  name="email" class="user-email" type="text"  required/>
      </label>
      <button type="submit" name="button" style="margin-top: 15px">Check</button>
      </form>
      </div>
  </div>
  
</div>

</body>
</html>
