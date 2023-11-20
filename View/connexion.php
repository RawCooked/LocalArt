<?php
require '../config.php';
session_start();
$db = config::getConnexion();
if (isset($_POST['valider'])){
    if (!empty($_POST['name'])){
        $recupUser=$db->prepare('SELECT * FROM users where name = ?');
        $recupUser->execute(array($_POST['name']));
        if ($recupUser->rowCount()>0){
            $_SESSION['name']=$_POST['name'];
            $_SESSION['id']=$recupUser->fetch()['idu'];
            header("Location: index.php");
        }else
        {
            echo "aucun utilisateur trouvé";
        }
    }
    else
    {
        echo "veuiller entrer votre pseudo";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Espace de connexion</title>
        <meta charset="utf-8">
    </head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="name">
        <br/>
         <input type="submit" name="valider">
    </form>
</body>
</html>