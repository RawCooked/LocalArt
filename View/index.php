<?php
require '../config.php';
session_start();
$db = config::getConnexion();
if (!$_SESSION['name']){
    header("Location:connexion.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>conversation</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php 
            $recupUser=$db->query('SELECT * FROM users');
            while ($user = $recupUser->fetch()){
                ?>
                <a href="message.php?id=<?= $user['idu']?>"><?=$user['name']?></a> <!--b3ed rod id idcon-->
                <br>
                <?php
            }
        ?>
    </body>
</html>