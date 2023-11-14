<?php
include '../controller/articleA.php';
include '../model/article.php';
$error = "";

// create client
$article = null;
// create an instance of the controller
$articleA = new articleA();
  if (
      isset($_POST["categorie"]) &&
      isset($_POST["titre"]) &&
      isset($_POST["date_creation"]) &&
      isset($_POST["date_modification"]) &&
      isset($_POST["nomprenom_artiste"])&&
      isset($_POST["contenu"])
  ) {
      if (
          !empty($_POST['categorie']) &&
          !empty($_POST["titre"]) &&
          !empty($_POST["date_creation"]) &&
          !empty($_POST["date_modification"])&&
          !empty($_POST["nomprenom_artiste"])&&
          !empty($_POST["contenu"])
      ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $article = new article(
            null,
            $_POST['categorie'],
            $_POST['titre'],
            $_POST['date_creation'],
            $_POST['date_modification'],
            $_POST['nomprenom_artiste'],
            $_POST['contenu']
        );
        var_dump($article);
        
        $joueurC->updateArticle($article, $_POST['id_art']);

        header('Location:tab.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="tab.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_art'])) {
        $joueur = $joueurC->showArticle($_POST['id_art']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">idArticle</label></td>
                    <td>
                        <input type="text" id="id-art" name="id_art" value="<?php echo $_POST['id_art'] ?>" readonly />
                        <span  ></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="categorie">categorie :</label></td>
                    <td>
                        <input type="text" id="categorie" name="categorie" value="<?php echo $article['categorie'] ?>" />
                        <span id="msg3" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">Titre :</label></td>
                    <td>
                        <input type="text" id="title" name="titre" value="<?php echo $article['titre'] ?>" />
                        <span id="msg4" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_creation">Date de creation :</label></td>
                    <td>
                        <input type="date" id="date_creation" name="date_creation" value="<?php echo $article['date_creation'] ?>" />
                        <span id="msg5" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_modification">Date de modification :</label></td>
                    <td>
                        <input type="date" id="date_modification" name="date_modification" value="<?php echo $article['date_modification'] ?>" />
                        <span id="msg6" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nomprenom_artiste">Nom complet :</label></td>
                    <td>
                        <input type="text" id="nomprenom_artiste" name="nomprenom_artiste" value="<?php echo $article['nomprenom_artiste'] ?>" />
                        <span id="msg7" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">contenu :</label></td>
                    <td>
                        <input type="text" id="contenu" name="contenu" value="<?php echo $article['contenu'] ?>" />
                        <span id="msg8" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>