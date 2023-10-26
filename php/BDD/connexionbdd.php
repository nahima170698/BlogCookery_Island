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

    //Fonction qui selectionne tous les elements d'une table
    public function select($table){
        try {
            $requete = "SELECT * from $table";
            $resultat = $this->connexionPDO->query($requete);
                
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
            
        } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage();
        }  
    }

    //fonction pour selectionner des elements dans la bdd
    public function selectUtilisateur($email, $mdp){
        try {
            $requete = "SELECT * from utilisateur where email = :email and Mot_De_Passe = :mdp";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindParam(":email", $email,PDO::PARAM_STR);
            $requete_preparee->bindParam(":mdp", $mdp,PDO::PARAM_STR);
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

    // Fonction selection des ingredient par rapport a la recette (fonctionne)
    public function select_ingredient_Recette($idRecette){
        
        try {
            $requete = "SELECT * FROM `ingredient_recette` 
                INNER JOIN recette ON recette.ID_Recette = ingredient_recette.ID_Recette 
                INNER JOIN ingredient ON ingredient.ID_Ingredient = ingredient_recette.ID_Ingredient 
                where recette.ID_Recette = ?";
            
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $idRecette, PDO::PARAM_STR);

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

    // Fonction selection des commentaire et leurs editeurs par rapport a la recette 
    public function selectCommentaireUtilisateurRecette($idRecette){
        
        try {
            $requete = "SELECT * FROM `commentaire`  
                INNER JOIN utilisateur ON utilisateur.ID_Utilisateur = commentaire.ID_Utilisateur 
                where commentaire.ID_Recette = ?";
            
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $idRecette, PDO::PARAM_STR);

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
    
    //Fonction d'insertion d'ingredient
    public function insertionIngredient($ingredient){
        try {
            $requete = " INSERT INTO ingredient(Nom_Ingredient)
            VALUES (:Nom_Ingredient)";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindParam(':Nom_Ingredient', $ingredient, PDO::PARAM_STR);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    //Fonction qui relie un ingredient a une recette
    public function insertionIngredientRecette($ID_Recette, $ID_Ingredient, $quantite){
        try {
            $requete = " INSERT INTO `ingredient_recette`(ID_Recette, ID_Ingredient, quantite)
            VALUES (:ID_Recette, :ID_Ingredient, :quantite)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':ID_Recette', $ID_Recette, PDO::PARAM_INT);
            $requete_preparee->bindParam(':ID_Ingredient', $ID_Ingredient, PDO::PARAM_INT);
            $requete_preparee->bindParam(':quantite', $quantite, PDO::PARAM_STR);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    //Fonction d'insertion d'utilisateur (abonnement)
    public function insertionUtilisateur($nom,$prenom,$pseudo,$mail,$mdp,$id){
        try {
            $requete = " INSERT INTO utilisateur(Nom, Prenom,Pseudo,Adresse_Mail,Mot_De_Passe,ID_Role)
                VALUES (:Nom, :Prenom, :Pseudo,:Adresse_Mail, :Mot_De_Passe,:ID_Role)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Pseudo',$pseudo,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Adresse_Mail',$mail,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Mot_De_Passe',$mdp,PDO::PARAM_STR);
            $requete_preparee->bindParam(':ID_Role',$id,PDO::PARAM_INT);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    //Fonction qui relie un ingredient a une recette
    public function insertionCommentaire($ID_Recette, $ID_Utilisateur, $Commentaire){
        try {
            $requete = " INSERT INTO `commentaire`(ID_Recette, ID_Utilisateur, Commentaire)
            VALUES (:ID_Recette, :ID_Utilisateur, :Commentaire)";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(':ID_Recette', $ID_Recette, PDO::PARAM_INT);
            $requete_preparee->bindParam(':ID_Utilisateur', $ID_Utilisateur, PDO::PARAM_INT);
            $requete_preparee->bindParam(':Commentaire', $Commentaire, PDO::PARAM_STR);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";
        } catch (PDOException $e) {
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

        // Fonction de mis à jour des commentaires (fonctionne)
    public function maj_Commentaire($ID_Utilisateur,$ID_Recette,$Commentaire,$ID_Commentaire){
        try { 
            $requete = "UPDATE commentaire SET ID_Utilisateur = ?, ID_Recette = ?, Commentaire = ?
                WHERE ID_Commentaire = ?";
            
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,$ID_Utilisateur,PDO::PARAM_INT);
            $requete_preparee->bindValue(2,$ID_Recette,PDO::PARAM_INT);
            $requete_preparee->bindValue(3,$Commentaire,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,$ID_Commentaire,PDO::PARAM_INT);


            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
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
    
    //Fonction qui supprime un lien entre une recette et un ingredient
    public function deleteIngredientRecette($ID_Recette,$ID_Ingredient){
        try{
            $requete = "DELETE FROM ingredient_recette WHERE ID_Recette =  ? AND ID_Ingredient = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindvalue(1,$ID_Recette,PDO::PARAM_INT);
            $requete_preparee->bindParam(2, $ID_Ingredient, PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    
    //Fonction qui supprime un ingredient
    public function deleteIngredient($ID_Ingredient){
        try{
            $requete = "DELETE FROM ingredient WHERE ID_Ingredient = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(1, $ID_Ingredient, PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    
    //Fonction qui supprime un commentaire
    public function deleteCommentaire($ID_Commentaire){
        try{
            $requete = "DELETE FROM commentaire WHERE ID_Commentaire = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
                
            $requete_preparee->bindParam(1, $ID_Commentaire, PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;
    
        } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
        }
    }

}

$test = new MaConnexion("cookery_island", "", "root", "localhost");


// $supp = $test->maj_Commentaire(18, 2, 'test de mise a jour', 4);
// var_dump($supp);
// $supp = $test->deleteCommentaire(3);
// var_dump($supp);
//$inserting = $test->maj_Ingredient("ingréeza","ezngré","ingezré","ingzaré","ingezaé","ingezaé","inezagré","ingrezaé","inggré","ingrfré","ingré","ingré","ingré","ingré","ingré",1);
//var_dump($inserting);
// $maj = $test->maj_Recette("");
// $insertuti = $test->insertionUtilisateur("jon","snow","king of the north","lovemyaunt",1);
// var_dump($insertuti);


?>
