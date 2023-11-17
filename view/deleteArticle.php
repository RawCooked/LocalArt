<?php
include '../controller/articleA.php';
$articleA = new articleA();
$articleA->deleteArticle($_GET["id_art"]);
header('Location:tab.php');
?>