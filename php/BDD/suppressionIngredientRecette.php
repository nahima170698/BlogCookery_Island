<?php
include ("connexionbdd.php");

$liaisonRecette = new MaConnexion ("cookery_island","","root","localhost");
$liaisonRecette->deleteIngredientRecette($_POST['ID_Recette'],$_POST['ID_Ingredient']);

header("Location: ../admin.php");

?>