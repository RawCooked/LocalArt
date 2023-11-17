<?php
include "../controller/articleA.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = new articleA();

    if (isset($_POST['deleteArticleId'])) {
        $articleId = $_POST['deleteArticleId'];
        $article->deleteArticle($articleId);

    } elseif (isset($_POST['updateArticleId'])) {
        $articleId = $_POST['id_art'];
        $categorie = $_POST['categorie'];
        $titre = $_POST['titre'];
        $nomprenom_artiste = $_POST['nomprenom_artiste'];
        $contenu = $_POST['contenu'];
        $article->updateArticle($articleId,$categorie,$titre,$nomprenom_artiste,$contenu);
        
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
}

$c = new articleA();
$categorie = NULL;
$tab = $c->listArticles();
?>

<center>
    <h1>Liste des articles</h1>
    <h2><a href="addArticle.php">Ajouter un article</a></h2>
</center>

<table border="1" align="center" width="70%">
    <tr>
        <th>Id</th>
        <th>Categorie</th>
        <th>Titre</th>
        <th>Nom Artiste</th>
        <th>Contenu</th>
        <th>Action</th>
    </tr>

    <?php
    foreach ($tab as $article) {
    ?>
        <tr>
            <td><?= $article['id_art']; ?></td>
            <td><?= $article['categorie']; ?></td>
            <td><?= $article['titre']; ?></td>
            <td><?= $article['nomprenom_artiste']; ?></td>
            <td><?= $article['contenu']; ?></td>
            <td align="center">
                <button onclick="openUpdateForm(<?php echo $article['id_art']; ?>)">Update</button>
                <form method="POST" action="">
                    <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="deleteArticleId">
                    <button name="delete_button" type="submit">Delete</button>
                </form>
            </td>
        </tr>

        <!-- Hidden update form for each article -->
        <tr id="updateForm<?php echo $article['id_art']; ?>" style="display: none;">
            <td colspan="6">
                <form method="POST" action="">
                    <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="id_art">
                    <label>Categorie:</label>
                    <input type="text" name="categorie" value="<?php echo $article['categorie']; ?>"><br>
                    <label>Titre:</label>
                    <input type="text" name="titre" value="<?php echo $article['titre']; ?>"><br>
                
                    <label>Nom complet de l'artiste:</label>
                    <input type="text" name="nomprenom_artiste" value="<?php echo $article['nomprenom_artiste']; ?>"><br>
                    <label>Contenu:</label>
                    <textarea name="contenu"><?php echo $article['contenu']; ?></textarea><br>
                    <input type="submit" name="updateArticleId" value="Update">
                </form>
            </td>
        </tr>
    <?php
    }
    ?>

</table>

<script>
    function openUpdateForm(articleId) {
        // Hide all update forms
        document.querySelectorAll('[id^="updateForm"]').forEach(function (form) {
            form.style.display = 'none';
        });

        // Show the selected update form
        document.getElementById('updateForm' + articleId).style.display = 'table-row';
    }
</script>
