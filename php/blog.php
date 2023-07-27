<?php
session_start();
var_dump($_SESSION);
?>
<?php include "BDD/connexionbdd.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.Cookery_Island.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Cookery_Island Nos recettes</title>
</head>

<header>
    <?php include "../module/moduleNavBar.php" ?>
    <div class="header">
        <h1>Nos recettes</h1>
    </div>
</header>

<body>
    <main>
                    
                    <!-- Partie Entrée -->
        
        <section class="sectionCarte">
            <h2><img class="icone" src="../Images\icone_entrée1.png" alt=""> Nos entrées</h2>
            <div class="carteContainer">
                
                
            <?php
            $Entrée = $test->selectRecette_Categorie("Entrée");
            foreach ($Entrée as $uneDonnees){
            echo '
            <form action="article.php" method="post">
                <div class="carte">
                    <img class="carteImageContainer" src="../'.$uneDonnees["Image_Un"].'" alt="">
                    <div class="difficulteTempsRecette">
                        <p>'.$uneDonnees["Difficulte"].'</p>
                        <p>'.$uneDonnees["Temps_Preparation"].'</p>
                    </div>
                    <h3>'.$uneDonnees["Nom_Recette"].'</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../'.$uneDonnees["Categorie_Logo"].'" alt="">
                        </div>
                        <input class="boutonCarte" type="submit" value="Voir article">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="ID_Recette" value="'.$uneDonnees['ID_Recette'].' required">
                </form>';
            }
            ?>
            </div>
        </section>
    
                      <!-- Partie Plats -->
        
                      <section class="sectionCarte">
            <h2><img class="icone" src="../Images/iconePlat (2)-modified.png" alt=""> Nos plats</h2>
            <div class="carteContainer">
                

            <?php
            $Plats = $test->selectRecette_Categorie("Plats");
            foreach ($Plats as $uneDonnees){
            echo '
            <form action="article.php" method="post">
                <div class="carte">
                    <img class="carteImageContainer" src="../'.$uneDonnees["Image_Un"].'" alt="">
                    <div class="difficulteTempsRecette">
                        <p>'.$uneDonnees["Difficulte"].'</p>
                        <p>'.$uneDonnees["Temps_Preparation"].'</p>
                    </div>
                    <h3>'.$uneDonnees["Nom_Recette"].'</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../'.$uneDonnees["Categorie_Logo"].'" alt="">
                        </div>
                        <input class="boutonCarte" type="submit" value="Voir article">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="ID_Recette" value="'.$uneDonnees['ID_Recette'].' required">
                </form>';
            }
            ?>
            </div>
        </section>

                  <!-- Partie Dessert -->
        
                  <section class="sectionCarte">
            <h2><img class="icone" src="../Images\Icone-dessert.png" alt=""> Nos desserts</h2>
            <div class="carteContainer">
                

            <?php
            $Dessert = $test->selectRecette_Categorie("Dessert");
            foreach ($Dessert as $uneDonnees){
            echo '
            <form action="article.php" method="post">
                <div class="carte">
                    <img class="carteImageContainer" src="../'.$uneDonnees["Image_Un"].'" alt="">
                    <div class="difficulteTempsRecette">
                        <p>'.$uneDonnees["Difficulte"].'</p>
                        <p>'.$uneDonnees["Temps_Preparation"].'</p>
                    </div>
                    <h3>'.$uneDonnees["Nom_Recette"].'</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../'.$uneDonnees["Categorie_Logo"].'" alt="">
                        </div>
                        <input class="boutonCarte" type="submit" value="Voir article">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="ID_Recette" value="'.$uneDonnees['ID_Recette'].' required">
                </form>';
            }
            ?>
        </section>


    </main>
    <footer>

        <?php include "../module/moduleFooter.php" ?>

    </footer>
</body>

</html>