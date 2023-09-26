<?php
include ("connexionbdd.php");
 
 $modifRecette = new MaConnexion ("cookery_island","","root","localhost");
$modifRecette->maj_Commentaire($_POST['ID_Utilisateur'],$_POST['ID_Recette'],$_POST['Commentaire'],$_POST['ID_Commentaire']);

header("Location: ../blog.php");

?>