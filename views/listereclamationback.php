<?php
include "../controller/reclamationc.php";

$c = new reclamationC();
// Remplacez 123 par l'ID de l'utilisateur que vous souhaitez récupérer
$tab = $c->listreclamation();


?>
            <center>

    <h1>voici la liste des reclamation</h1>
    
    <h2>
        <a href="addreclamation.php">Add reclamation</a>
    </h2>

</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id reclamation</th>
        <th>nom</th>
        <th>sujet</th>
        <th>texte</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($tab as $reclamation) {
    ?>
        <tr>
            <td><?= $reclamation['id_rec']; ?></td>
            <td><?= $reclamation['nom']; ?></td>
            <td><?= $reclamation['sujet']; ?></td>
            <td><?= $reclamation['texte']; ?></td>
           
            <td align="center">
                <form method="POST" action="updatereclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['id_rec']; ?> name="id_rec">
                </form>
            </td>
            <td>
            <a href="deletereclamation.php?id_rec=<?php echo $reclamation['id_rec']; ?>">Delete</a>

                
            </td>
        </tr>
    <?php
    }
    ?>
</table>





