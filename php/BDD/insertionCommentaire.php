<?php
include ("connexionbdd.php");

$modifRecette = new MaConnexion ("cookery_island","","root","localhost");
$modifRecette->insertionCommentaire($_POST['ID_Recette'],$_POST['ID_Utilisateur'],$_POST['Commentaire']);

header("Location: ../blog.php");

?>