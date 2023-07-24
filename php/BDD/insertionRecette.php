<?php
include ("connexionbdd.php");

$test = new MaConnexion("", "", "root", "localhost");

$inserRecette = $test->insertionRecette();



// header("Location: admin.php");


?>