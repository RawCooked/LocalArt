<?php
/*include "../controller/articleA.php";

$c = new articleA();
$categorie=NULL;
$tab = $c->listArticles();

?>

<center>
    <h1>List des articles</h1>
    <h2>
        <a href="addArticle.php">Ajouter Article</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id </th>
        <th>categorie</th>
        <th>titre</th>
        <th>date_creationail</th>
        <th>date_modification</th>
        <th>nom Artiste</th>
        <th>contenu</th>
    </tr>


    <?php
    foreach ($tab as $article) {
    ?>
        <tr>
            <td><?= $article['id_art']; ?></td>
            <td><?= $article['categorie']; ?></td>
            <td><?= $article['titre']; ?></td>
            <td><?= $article['date_creation']; ?></td>
            <td><?= $article['date_modification']; ?></td>
            <td><?= $article['nomprenom_artiste']; ?></td>
            <td><?= $article['contenu']; ?></td>
            <td align="center">
                <form method="POST" action="updateArticle.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="id_art">
                </form>
            </td>
            <td>
                <a href="deleteArticle.php?id=<?php echo $article['id_art']; ?>">Delete</a>
            </td>
        </tr>    
    <?php
    }
    ?>
</table>*/