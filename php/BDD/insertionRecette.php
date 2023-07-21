<?php
include ("connexionbdd.php");

$test = new MaConnexion("", "", "root", "localhost");

$inserRecette = $test->insertionRecette(
    $_POST['Nom'], $_POST['Prenom'], $_POST['Mail'],
);



// header("Location: admin.php");


?>