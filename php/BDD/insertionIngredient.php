<?php
include ("connexionbdd.php");

$insertionIngredient = new MaConnexion ("cookery_island","","root","localhost");
$insertionIngredient->insertionIngredient($_POST['Nom_Ingredient']);

header("Location: ../admin.php");

?>