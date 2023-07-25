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
    public function selectUtilisateur($identifiant, $mdp){
        try {
            $requete = "SELECT * from utilisateur where identifiant = $identifiant and mot_de_passe = $mdp";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
    // Fonction selection des recette par categorie (fonctionne)
    public function selectRecette_Categorie($categorie){
        try {
            $requete = "SELECT * from recette where Categorie = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindValue(1,$categorie,PDO::PARAM_STR);
            
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
        // Fonction selection des article par l'id (fonctionne..)
    public function selectArticle_ID($idRecette){
        try {
            $requete = "SELECT * from recette where ID_Recette = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindValue(1,$idRecette,PDO::PARAM_STR);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }




    // Fonction d'insertion des recettes (fonctionne)
    public function insertionRecette($nomRecette,$categorie,$tempsPrepa,$difficulte,$texte_un,$texte_deux,$image_un,$image_deux,$logoCategorie){
        try {
            $requete = " INSERT INTO recette(Nom_Recette, Categorie, Temps_Preparation,Difficulte,Texte_un, Texte_deux, Image_un,Image_deux, Categorie_Logo)
                VALUES (:Nom_Recette, :Categorie, :Temps_Preparation,:Difficulte,:Texte_un, :Texte_deux, :Image_un,:Image_deux, :Categorie_Logo)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom_Recette',$nomRecette,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Categorie',$categorie,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Temps_Preparation',$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Difficulte',$difficulte,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Texte_un',$texte_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Texte_deux',$texte_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Image_un',$image_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Image_deux',$image_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Categorie_Logo',$logoCategorie,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // public function insertionIngredient($idrecette,$ingredient_un,$ingredient_deux,$ingredient_trois,$ingredient_quatre,$ingredient_cinq,$ingredient_six,$ingredient_sept,$ingredient_huit,$ingredient_neuf,$ingredient_dix,$ingredient_onze,$ingredient_douze,$ingredient_treize,$ingredient_quatorze,$ingredient_quinz){

    //     try {
    //         $requete = " INSERT INTO ingredient(ID_Recette,Ingredient_1,Ingredient_2, Ingredient_3,Ingredient_4,Ingredient_5, Ingredient_6, Ingredient_7,
    //             Ingredient_8,Ingredient_9,Ingredient_10,Ingredient_11,Ingredient_12,Ingredient_13,Ingredient_14,Ingredient_15)
    //         VALUES (:ID_Recette,:Ingredient_1,:Ingredient_2, :Ingredient_3,:Ingredient_4,:Ingredient_5, :Ingredient_6, :Ingredient_7,
    //             :Ingredient_8,:Ingredient_9,:Ingredient_10,:Ingredient_11,:Ingredient_12,:Ingredient_13,:Ingredient_14,:Ingredient_15)" ;
    //         $requete_preparee = $this->connexionPDO->prepare($requete);
            
    //         $requete_preparee->bindParam(':ID_Recette',$idrecette,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_1',$ingredient_un,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_2',$ingredient_deux,PDO::PARAM_STR,50);
    //         $requete_preparee->bindParam(':Ingredient_3',$ingredient_trois,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_4',$ingredient_quatre,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_5',$ingredient_cinq,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_6',$ingredient_six,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_7',$ingredient_sept,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_8',$ingredient_huit,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_9',$ingredient_neuf,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_10',$ingredient_dix,PDO::PARAM_STR);
    //         $requete_preparee->bindParam(':Ingredient_11',$ingredient_onze,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_12',$ingredient_douze,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_13',$ingredient_treize,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_14',$ingredient_quatorze,PDO::PARAM_STR,30);
    //         $requete_preparee->bindParam(':Ingredient_15',$ingredient_quinz,PDO::PARAM_STR,30);


    //         $requete_preparee->execute();
    //         echo ("insertion reussi");
    //         return "insertion reussi";

    //     } catch(PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }


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
    // Fonction de mis à jour des recettes (fonctionne)
    public function maj_Recette($nomRecette,$categorie,$tempsPrepa,$difficulte,$texte_un,$texte_deux,$image_un,$image_deux,$logoCategorie,$idRecette){
        try {

            $requete = "UPDATE recette SET Nom_Recette = ?, Categorie = ?,Temps_Preparation = ?, Difficulte = ?,
                Texte_un = ?,Texte_deux = ?,Image_un = ?,Image_deux = ?, Categorie_Logo = ?
                WHERE ID_Recette = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,$nomRecette,PDO::PARAM_STR);
            $requete_preparee->bindValue(2,$categorie,PDO::PARAM_STR);
            $requete_preparee->bindValue(3,$tempsPrepa,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,$difficulte,PDO::PARAM_STR);
            $requete_preparee->bindValue(5,$texte_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(6,$texte_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(7,$image_un,PDO::PARAM_STR);
            $requete_preparee->bindValue(8,$image_deux,PDO::PARAM_STR);
            $requete_preparee->bindValue(9,$logoCategorie,PDO::PARAM_STR);
            $requete_preparee->bindValue(10,$idRecette,PDO::PARAM_STR);


            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function maj_Ingredient($idrecette,$ingredient_un,$ingredient_deux,$ingredient_trois,$ingredient_quatre,$ingredient_cinq,$ingredient_six,$ingredient_sept,$ingredient_huit,$ingredient_neuf,$ingredient_dix,$ingredient_onze,$ingredient_douze,$ingredient_treize,$ingredient_quatorze,$ingredient_quinz){
        try {
            
            $requete = "UPDATE ingredient SET Ingredient_1 = ?,Ingredient_2 = ?, Ingredient_3 = ?,Ingredient_4 = ?, Ingredient_5 = ?, 
                Ingredient_6 = ?, Ingredient_7 = ?,Ingredient_8 = ?,Ingredient_9 = ?,Ingredient_10 = ?,Ingredient_11 = ?,Ingredient_12 = ?,
                Ingredient_13 = ?, Ingredient_14 = ?, Ingredient_15 = ?
            WHERE ID_Recette = ?";

        $requete_preparee = $this->connexionPDO->prepare($requete);

        
        $requete_preparee->bindValue(1,':Ingredient_1',$ingredient_un,PDO::PARAM_STR);
        $requete_preparee->bindValue(2,':Ingredient_2',$ingredient_deux,PDO::PARAM_STR);
        $requete_preparee->bindValue(3,':Ingredient_3',$ingredient_trois,PDO::PARAM_STR);
        $requete_preparee->bindValue(4,':Ingredient_4',$ingredient_quatre,PDO::PARAM_STR);
        $requete_preparee->bindValue(5,':Ingredient_5',$ingredient_cinq,PDO::PARAM_STR);
        $requete_preparee->bindValue(6,':Ingredient_6',$ingredient_six,PDO::PARAM_STR);
        $requete_preparee->bindValue(7,':Ingredient_7',$ingredient_sept,PDO::PARAM_STR);
        $requete_preparee->bindValue(8,':Ingredient_8',$ingredient_huit,PDO::PARAM_STR);
        $requete_preparee->bindValue(9,':Ingredient_9',$ingredient_neuf,PDO::PARAM_STR);
        $requete_preparee->bindValue(10,':Ingredient_10',$ingredient_dix,PDO::PARAM_STR);
        $requete_preparee->bindValue(11,':Ingredient_11',$ingredient_onze,PDO::PARAM_STR);
        $requete_preparee->bindValue(12,':Ingredient_12',$ingredient_douze,PDO::PARAM_STR);
        $requete_preparee->bindValue(13,':Ingredient_13',$ingredient_treize,PDO::PARAM_STR);
        $requete_preparee->bindValue(14,':Ingredient_14',$ingredient_quatorze,PDO::PARAM_STR);
        $requete_preparee->bindValue(15,':Ingredient_15',$ingredient_quinz,PDO::PARAM_STR);
        $requete_preparee->bindValue(16,':ID_Recette',$idrecette,PDO::PARAM_STR);
        


        $requete_preparee->execute();
        echo ("modification reussi");
        return "modification reussi";



        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    // Fonction de suppression des recettes(fonctionne)
    public function deleteRecette($idRecette){
        try{
            $requete = "DELETE FROM recette WHERE ID_Recette =  ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindvalue(1,$idRecette,PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}



$test = new MaConnexion("cookery_island", "", "root", "localhost");

//$inser = $test->maj_Recette("carry zebdezre","plaefzt","133 min","Facile","text random oué","texte random encore", "img","img2","gjjj",2);

//$supp = $test->selectArticle_ID(2);
var_dump($supp);
//$inserting = $test->maj_Ingredient("ingréeza","ezngré","ingezré","ingzaré","ingezaé","ingezaé","inezagré","ingrezaé","inggré","ingrfré","ingré","ingré","ingré","ingré","ingré",1);
//var_dump($inserting);
// $maj = $test->maj_Recette("");
// $insertuti = $test->insertionUtilisateur("jon","snow","king of the north","lovemyaunt",1);
// var_dump($insertuti);


?>
