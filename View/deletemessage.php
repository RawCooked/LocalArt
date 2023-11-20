<?php
include '../Controller/messageC.php';
$mesc = new messageC();
$mesc->deletemessage($_GET["idm"]); 
header('Location:BackConver.php');
?>