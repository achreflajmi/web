<?php
include '../../Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->supprimerreponse($_GET["id"]);
header('Location:gestionreclamation.php');
?>