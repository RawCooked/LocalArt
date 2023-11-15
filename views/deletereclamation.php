<?php
include '../Controller/reclamationc.php';

$reclamationC = new reclamationC();

// Check if "id_rec" is set in the URL or in POST data
$id_rec = $_REQUEST["id_rec"] ?? null;

if ($id_rec !== null) {
    $reclamationC->deletereclamation($id_rec);
    header('Location:listreclamation.php');
} else {
    echo "Error: Missing 'id_rec' parameter.";
    // You can also redirect the user to an error page or another location.
}
?>


