
<?php
session_start();

include("connexionbdd.php");
$selection = new MaConnexion("cookery_island", "", "root", "localhost");
// $test = $selection->select('utilisateur');
// var_dump($test);

$select = $selection->selectUtilisateur($_POST['email'], $_POST['mdp']);
var_dump($_POST);
var_dump($select);




if (!empty($select)) {
    echo " une correspondance à été trouvée " . "et : ";
    if ($_POST['identifiant'] and $_POST['mdp'] = $select[0]["Pseudo"] and $select[0]["Mot_De_Passe"]){
        session_unset();
        $_SESSION["idUser"]=$select[0]["Pseudo"] and
        $_SESSION["Nom"]=$select[0]["Nom"] and
        $_SESSION["Prenom"]=$select[0]["Prenom"] and
        $_SESSION["ID_Utilisateur"]=$select[0]["ID_Utilisateur"] and
        $_SESSION["Role"]=$select[0]["ID_Role"];
        
        echo "its ok";
    } else{
        echo " nop en fait";
    }

    //verifier que les infirmations entrée correspondent bien a une personne
    // garder nom prenom et stocker dans la variable 
    // faire sous forme $_session["nom"] = $bddvar["nom"]/$_post["nom"];
    // reprendre les donnée de la bdd et stocker dans la session

} else {
    echo "ya r";
    // header("Location:interface.php");
}
var_dump($_SESSION);

header("Location: ../../index.php");
?>


<!--         
    switch ($select){
        case $select[0]["Pseudo"] === "client":
            echo "c'est un yencli";
            break;
        case $select[0]["role"] === "admin":
            echo "c'est un admin";
             break;
        case $select[0]["role"] === "":
            echo "il n'est pas des notre";
            break;
    } 
-->