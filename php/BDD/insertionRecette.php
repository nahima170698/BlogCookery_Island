<?php
include ("connexionbdd.php");

$modifRecette = new MaConnexion ("cookery_island","","root","localhost");
$modifRecette->insertionRecette($_POST['nomRecette'],$_POST['categorie'],$_POST['tempsPrepa'], $_POST['difficulte'],$_POST['texte_un'],$_POST['texte_deux'],$_POST['image_un'],$_POST['image_deux'],$_POST['logoCategorie']);

header("Location: ../admin.php");
?>