<?php
include '../controller/articleA.php';
include '../model/article.php';
$error = "";

// create client
$article = null;
// create an instance of the controller
$articleA = new articleA();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['upt'])) {
        // Handle signup form submission
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
            $categorie = $_POST['categorie'];
            $titre = $_POST['titre'];
            $nomprenom_artiste = $_POST['nomprenom_artiste'];
            $contenu = $_POST['contenu'];
            $article= new articleA;
            $articleA->updateArticle($article, $_POST['id_art']);
            header('location:tab.php');
        
        }
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

    

    <?php
   if (isset($_POST['id_art'])) {
        /*$article = $articleA->showArticle($_POST['id_art']);*/
        
        $article=$articleA->showArticle($_POST['id_art']);}
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
                    <input type="submit" name="upt" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    
    ?>
</body>

</html>