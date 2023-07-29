<?php
session_start();
?>
<?php include "BDD/connexionbdd.php" ?>

<?php
if (isset($_POST['ID_Recette'])) {
    $Recette = $test->select_ingredient_Recette($_POST['ID_Recette']);
} else {
    $Recette = $test->select_ingredient_Recette(1);
}

if (empty($Recette)) {
    $Recette = $test->selectArticle_ID($_POST['ID_Recette']);
} else {
    $Recette = $test->select_ingredient_Recette(1);
}

$Commentaire = $test->selectCommentaireUtilisateurRecette($_POST['ID_Recette']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.Cookery_Island.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo 'Cookery_Island ' . $Recette[0]["Nom_Recette"] . '' ?></title>
</head>

<body>

    <header>
        <?php include "../module/moduleNavBar.php"  ?>

        <?php
        echo '
        <div class="header">
            <h1>' . $Recette[0]["Nom_Recette"] . '</h1>
        </div>
    </header>
    
    <main>
        
        <!-- Partie premiere image -->
        
        <section class="articleImageRecetteContainer" id="image1">
            <img class="articleImageRecette" src="../' . $Recette[0]["Image_Un"] . '" alt="' . $Recette[0]["Nom_Recette"] . '">
        </section>
        
        <!-- Partie ingredients -->
        
        <section class="articleIngredientContainer" id="ingredient">
            <ul class="placementIngredient">';
        if (isset($Recette[0]["Nom_Ingredient"])) {
            foreach ($Recette as $uneDonnees) {
                echo   '<li>
                            <p>' . $uneDonnees["quantite"] . ' ' . $uneDonnees["Nom_Ingredient"] . '</P>
                        </li>';
            };
        } else {
            echo '<h3> Pas d ingredient disponible<h3>';
        }

        echo '</ul>
        </section>

        <!-- Partie premier champ de texte -->

        <section class="articleTextContainer" id="text1">
            <p>' . $Recette[0]["Texte_Un"] . '</p>
        </section>
        
        <!-- Partie deuxieme image -->

        <section class="articleImageRecetteContainer" id="image2">
            <img class="articleImageRecette" src="../' . $Recette[0]["Image_Deux"] . '" alt="' . $Recette[0]["Nom_Recette"] . '">
        </section>
        
        <!-- Partie deuxieme champ de texte -->
        
        <section class="articleTextContainer" id="text2">
            <p>' . $Recette[0]["Texte_Deux"] . '</p>
        </section>
  
        <section class="commentaire" id="commentaire">
            <h2>Commentaire</h2>';

        if (isset($Commentaire[0]["ID_Commentaire"])) {
            foreach ($Commentaire as $uneDonnees) {
                echo ' <div class="commentaireUnique">
                <p class="bold">' . $uneDonnees["Pseudo"] . '</p>
                <p>' . $uneDonnees["Commentaire"] . '</p>';
                
                switch (true) {
                    case empty($_SESSION["ID_Utilisateur"]):
                        
                        break;
                    case ($uneDonnees["ID_Utilisateur"] == $_SESSION["ID_Utilisateur"]):
                        echo '<input class="boutonCommentaire" type="button" data-bs-toggle="modal" data-bs-target="#modifCommentaire' . $uneDonnees["ID_Commentaire"] . '" value="Modifier" id="">
                        <input class="boutonCommentaire" type="button" data-bs-toggle="modal" data-bs-target="#deleteCommentaire' . $uneDonnees["ID_Commentaire"] . '" value="Supprimer" id="">
                        ';
                        break;
                    case ($_SESSION["Role"] == 1):
                        echo '
                        <input class="boutonCommentaire" type="button" data-bs-toggle="modal" data-bs-target="#deleteCommentaire' . $uneDonnees["ID_Commentaire"] . '" value="Supprimer" id="">
                        ';
                        break;
                    
                    default:
                        
                        break;
                }
                echo '</div>';
            }
        } else {
            echo '
           <div class="commentaireUnique">
               <h3> Pas de commentaire<h3>
           </div>
           ';
        }
      
        echo    '</div>
        </section>';


        //Modal de suppression de commentaire

        foreach ($Commentaire as $uneDonnees) {
            echo    '<form action="BDD/suppressionCommentaire.php" method="POST">
            <div class="modal fade" id="deleteCommentaire' . $uneDonnees["ID_Commentaire"] . '" tabindex="-1" aria-labelledby="deleteCommentaire' . $uneDonnees["ID_Commentaire"] . 'Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="deleteCommentaire' . $uneDonnees["ID_Commentaire"] . 'Label">Modal title</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes vous sûrs/sûres de vouloir supprimer ce commentiaire</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="ID_Commentaire" value="' . $uneDonnees['ID_Commentaire'] . '">
        </form>';
        }
        
        
        //Modal de mise a jour de commentaire
        
        foreach ($Commentaire as $uneDonnees)
  echo '<form action="BDD\modifCommentaire.php" method="POST">
            <div class="modal fade" id="modifCommentaire'.$uneDonnees["ID_Commentaire"].'" tabindex="-1" aria-labelledby="modifCommentaire'.$uneDonnees["ID_Commentaire"].'Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="modifCommentaire'.$uneDonnees["ID_Commentaire"].'Label">Modification de commentaire</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <textarea class="createCommentaire" name="Commentaire" id="" cols="30" rows="10" >'.$uneDonnees["Commentaire"].'</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-succees">Accepter les changements</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="ID_Commentaire" value="'.$uneDonnees['ID_Commentaire'].'">
            <input type="hidden" name="ID_Utilisateur" value="'.$uneDonnees['ID_Utilisateur'].'">
            <input type="hidden" name="ID_Recette" value="'.$uneDonnees['ID_Recette'].'">
        </form>';
        ?>
        
        <section class="ajoutCommentaire">
            <h3>Ajoutez un commentaire</h3>
            <?php

            switch (true) {
                case empty($_SESSION["ID_Utilisateur"]):
             echo  '<h3>Pour pouvoir commenter, inscrivez-vous gratuitement a notre blog</h3>
                    <a class="lienVersPageWith50" href="connexion.php">voir plus</a>';
                    break;
                case !empty($_SESSION["ID_Utilisateur"]):
              echo '<form action="BDD/insertionCommentaire.php" method="POST">
                    <textarea class="createCommentaire" name="Commentaire" id="" cols="30" rows="10"></textarea>
                    <input class="createCommentaireBouton" type="submit" value="Poster">
                    <input type="hidden" name="ID_Utilisateur" value="' . $_SESSION["ID_Utilisateur"] . '">
                    <input type="hidden" name="ID_Recette" value="' . $Recette[0]["ID_Recette"] . '">
                </form>';
                    break;

                default:
                    
                    break;
            }

            ?>
        </section>

        </main>

        <footer>
            <?php include "../module/moduleFooter.php" ?>
        </footer>

        <script src="../script/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
        </script>
</body>

</html>