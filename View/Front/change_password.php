
<?php
include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';

session_start();

// Retrieve the email from the query parameter
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';

$userTemp = new UserC();
$User  =  $userTemp->getUserByEmail($email);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['change-pswd'])) {

        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userTemp->updateUser($User['id_user'], $User['nom'], $email, $hashedPassword, $User['state']);

        $_SESSION['id_user']=$User['id_user'];

        header('Location: index.php');
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




            <!-- Display form to check code -->
            <div >Enter new password.</div>
            <div class="change-pswd">
                <form method="POST" action="">
                    <label>
                        <input placeholder="New Password" name="password" class="user-email" type="text" required/>
                    </label>
                    <button type="submit" name="change-pswd" style="margin-top: 15px">Change </button>
                </form>
            </div>

    </div>
</div>

</body>
</html>
