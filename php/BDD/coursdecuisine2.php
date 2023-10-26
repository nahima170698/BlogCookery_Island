<?php
class MaConnexion
{
    // étape 1 : ici on met les proprietées
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote)
    {

        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage();
        }
    }

    public function select($table)
    {
        try {
            $requete = "SELECT * from $table";
            $resultat = $this->connexionPDO->query($requete);

            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    //fonction pour selectionner des elements dans la bdd
    public function selectUtilisateur($identifiant, $mdp)
    {
        try {
            $requete = "SELECT * from utilisateur where Pseudo = :identifiant and Mot_De_Passe = :mdp";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
            $requete_preparee->bindParam(":mdp", $mdp, PDO::PARAM_STR);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
}

//Fonction qui selectionne tous les elements d'une table

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../style.css"></script>
    <title></title>
</head>

<body>
    <form>
        <label for="date"></label>
        <input type="date" id="date" name="date">
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>