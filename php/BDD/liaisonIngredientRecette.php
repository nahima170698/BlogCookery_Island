<?php
include ("connexionbdd.php");

$liaisonRecette = new MaConnexion ("cookery_island","","root","localhost");
$liaisonRecette->insertionIngredientRecette($_POST['ID_Recette'],$_POST['ID_Ingredient'],$_POST['quantité']);

header("Location: ../admin.php");

?>