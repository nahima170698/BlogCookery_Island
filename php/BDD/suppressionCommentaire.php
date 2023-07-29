<?php
include ("connexionbdd.php");

$suppCommentaire = new MaConnexion ("cookery_island","","root","localhost");
$suppCommentaire->deleteCommentaire($_POST['ID_Commentaire']);

header("Location: ../blog.php");
?>