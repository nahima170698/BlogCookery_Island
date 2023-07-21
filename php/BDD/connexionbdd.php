<?php
class MaConnexion{
    // étape 1 : ici on met les proprietées
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote){
        
        $this -> nomBaseDeDonnees = $nomBaseDeDonnees;
        $this -> motDePasse = $motDePasse;
        $this -> nomUtilisateur = $nomUtilisateur;
        $this -> hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage();
        }        
    }

    //fonction pour selectionner des elements dans la bdd
    public function selectRecette($table){
        try {
            $requete = "SELECT * from $table /*where identifiant = :identifiant and mot_de_passe = :mdp*/";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            /*  
                $requete_preparee->bindParam(":identifiant", $identifiant,PDO::PARAM_STR);
                $requete_preparee->bindParam(":mdp", $password,PDO::PARAM_STR);
            */
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

    public function insertionRecette($nomRecette,$categorie,$tempsPrepa,$difficulte){
        try {
            $requete = " INSERT INTO recette(Nom_Recette, Categorie, Temps_Preparation,Difficulte)
                VALUES (:Nom_Recette, :Categorie, :Temps_Preparation,:Difficulte)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom_Recette',$nomRecette,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Categorie',$categorie,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Temps_Preparation',$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Difficulte',$difficulte,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function insertionIngredient($ingredient_un,$ingredient_deux,$ingredient_trois,$ingredient_quatre,$ingredient_cinq,$ingredient_six,$ingredient_sept,$ingredient_huit,$ingredient_neuf,$ingredient_dix){
        try {
            $requete = " INSERT INTO client(Ingredient_1,Ingredient_2,Ingredient_3,Ingredient_4,Ingredient_5,Ingredient_6,Ingredient_7,Ingredient_8,Ingredient_9,Ingredient_10)
                VALUES (:Ingredient_1,:Ingredient_2,:Ingredient_3,:Ingredient_4,:Ingredient_5,:Ingredient_6,:Ingredient_7,:Ingredient_8,:Ingredient_9,:Ingredient_10)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Ingredient_1',$ingredient_un,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Ingredient_2',$ingredient_deux,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Ingredient_3',$ingredient_trois,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_4',$ingredient_quatre,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_5',$ingredient_cinq,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_6',$ingredient_six,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_7',$ingredient_sept,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_8',$ingredient_huit,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_9',$ingredient_neuf,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Ingredient_10',$ingredient_dix,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function insertionUtilisateur($nom,$prenom,$identifiant,$mdp,$id){
        try {
            $requete = " INSERT INTO utilisateur(Nom, Prenom, Identifiant,Mot_De_Passe,ID_Role)
                VALUES (:Nom, :Prenom, :Identifiant, :Mot_De_Passe,:ID_Role)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Categorie',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Identifiant',$identifiant,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Mot_De_Passe',$mdp,PDO::PARAM_STR);
            $requete_preparee->bindParam(':ID_Role',$id,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // Fonction de mis à jour du statut de la salle dans la table Salle 
    public function maj_Recette($nomRecette,$categorie,$tempsPrepa,$difficulte){
        try {

            $requete = "UPDATE recette SET Nom_Recette = ?, Categorie = ?,Temps_Preparation = ?, Difficulte = ?
                WHERE ID_Recette = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,':Nom_Recette',$nomRecette,PDO::PARAM_STR,30);
            $requete_preparee->bindValue(2,':Categorie',$categorie,PDO::PARAM_STR,50);
            $requete_preparee->bindValue(3,':Temps_Preparation',$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,':Difficulte',$difficulte,PDO::PARAM_STR);

            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteRecette($nomSalle){
        try{
            $requete = "UPDATE salle SET Statut_Salle = 'LIB'
            WHERE Nom_salle = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindvalue(1,$nomSalle,PDO::PARAM_STR);
            $requete_preparee->execute();
            echo 'modification reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

/*
$test = new MaConnexion("reservsalle", "", "root", "localhost");

$inser = $test->insertionRecette("doe","john","mail@mail.co");
var_dump($inser);
$sallee = $test->maj_Statut("Salle Madrid");
var_dump($sallee);
*/

?>
