<?php
include ("connexionbdd.php");

$modifRecette = new MaConnexion ("cookery_island","","root","localhost");
$modifRecette->deleteIngredient($_POST['ID_Ingredient']);

header("Location: ../admin.php");
?>