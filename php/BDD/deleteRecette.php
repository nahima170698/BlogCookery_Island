<?php
include ("connexionbdd.php");

$modifRecette = new MaConnexion ("cookery_island","","root","localhost");
$modifRecette->deleteRecette($_POST['ID_Recette']);

header("Location: ../admin.php");
?>