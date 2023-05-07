<?php
include '../../Controller/projet.php';
$userC=new userC();
$userC->DeleteUser($_GET["id"]);
header('Location:affruser.php');
?>


