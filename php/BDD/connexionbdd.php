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

    public function insertionRecette($nomRecette,$categorie,$tempsPrepa,$difficulte,$texte_un,$texte_deux,$image_un,$image_deux){
        try {
            $requete = " INSERT INTO recette(Nom_Recette, Categorie, Temps_Preparation,Difficulte,Texte_un, Texte_deux, Image_un,Image_deux)
                VALUES (:Nom_Recette, :Categorie, :Temps_Preparation,:Difficulte,:Texte_un, :Texte_deux, :Image_un,:Image_deux)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom_Recette',$nomRecette,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Categorie',$categorie,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Temps_Preparation',$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Difficulte',$difficulte,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Texte_un',$texte_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Texte_deux',$texte_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Image_un',$image_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Image_deux',$image_deux,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertionIngredient($idrecette,$ingredient_un,$ingredient_deux,$ingredient_trois,$ingredient_quatre,$ingredient_cinq,$ingredient_six,$ingredient_sept,$ingredient_huit,$ingredient_neuf,$ingredient_dix,$ingredient_onze,$ingredient_douze,$ingredient_treize,$ingredient_quatorze,$ingredient_quinz){

        try {
            $requete = " INSERT INTO ingredient(ID_Recette,Ingredient_1,Ingredient_2, Ingredient_3,Ingredient_4,Ingredient_5, Ingredient_6, Ingredient_7,Ingredient_8,Ingredient_9,Ingredient_10,Ingredient_11,Ingredient_12,Ingredient_13,Ingredient_14,Ingredient_15)
            VALUES (:ID_Recette,:Ingredient_1,:Ingredient_2, :Ingredient_3,:Ingredient_4,:Ingredient_5, :Ingredient_6, :Ingredient_7,:Ingredient_8,:Ingredient_9,:Ingredient_10,:Ingredient_11,:Ingredient_12,:Ingredient_13,:Ingredient_14,:Ingredient_15)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(':ID_Recette',$idrecette,PDO::PARAM_STR,30);
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
            $requete_preparee->bindParam(':Ingredient_11',$ingredient_onze,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Ingredient_12',$ingredient_douze,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Ingredient_13',$ingredient_treize,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Ingredient_14',$ingredient_quatorze,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Ingredient_15',$ingredient_quinz,PDO::PARAM_STR,30);


            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }


    public function insertionUtilisateur($nom,$prenom,$pseudo,$mdp,$id){
        try {
            $requete = " INSERT INTO utilisateur(Nom, Prenom,Pseudo,Mot_De_Passe,ID_Role)
                VALUES (:Nom, :Prenom, :Pseudo, :Mot_De_Passe,:ID_Role)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Pseudo',$pseudo,PDO::PARAM_STR);
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
    public function maj_Recette($nomRecette,$categorie,$tempsPrepa,$difficulte,$texte_un,$texte_deux,$image_un,$image_deux){
        try {

            $requete = "UPDATE recette SET Nom_Recette = ?, Categorie = ?,Temps_Preparation = ?, Difficulte = ?,
                Texte_un = ?,Texte_deux = ?,Image_un = ?,Image_deux = ?
                WHERE ID_Recette = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,':Nom_Recette',$nomRecette,PDO::PARAM_STR,30);
            $requete_preparee->bindValue(2,':Categorie',$categorie,PDO::PARAM_STR,50);
            $requete_preparee->bindValue(3,':Temps_Preparation',$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,':Difficulte',$difficulte,PDO::PARAM_STR);
            $requete_preparee->bindValue(5,':Texte_un',$texte_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(6,':Texte_deux',$texte_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(7,':Image_un',$image_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(8,':Image_deux',$image_deux,PDO::PARAM_STR);


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



$test = new MaConnexion("cookery_island", "", "root", "localhost");

//$inser = $test->insertionRecette("carry zebre","plat","15 min","Facile","text random","texte random encore", "img","img2");
//var_dump($inser);
$inserting = $test->insertionIngredient(1,"ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré","ingré");
var_dump($inserting);
// $maj = $test->maj_Recette("");
// $insertuti = $test->insertionUtilisateur("jon","snow","king of the north","lovemyaunt",1);
// var_dump($insertuti);


?>
