<?php
include '../../Controller/AdherentC.php';
$adherentC = new AdherentC();
$adherentC->supprimeradherent($_GET["id"]);
header('Location:gestionreclamation.php');
?>