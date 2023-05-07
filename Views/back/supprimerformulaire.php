<?php
	include '../../Controller/formulaireC.php';
	$formulaireC=new formulaireC();
	$formulaireC->supprimerformulaire($_GET["id"]);
	header('Location:gestionevents.php');
?>