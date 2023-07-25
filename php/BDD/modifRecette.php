<?php
include ("connexionbdd.php");

$createRecette = new MaConnexion ("cookery_island","","root","localhost");
$createRecette->maj_Recette($_POST['nomRecette'],$_POST['categorie'],$_POST['tempsPrepa'], $_POST['difficulte'],$_POST['texte_un'],$_POST['texte_deux'],$_POST['image_un'],$_POST['image_deux'],$_POST['logoCategorie'],$_POST['ID_Recette']);

header("Location: ../admin.php");
?>