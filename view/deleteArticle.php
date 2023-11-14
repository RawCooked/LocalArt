<?php
include '../controller/articleA.php';
$clientC = new articleA();
$clientC->deleteArticle($_GET["id_art"]);
header('Location:tab.php');
