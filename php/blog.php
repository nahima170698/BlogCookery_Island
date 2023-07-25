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
            <h2><img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt=""> Nos entrées</h2>
            <div class="carteContainer">
                
                
            <?php
            $Entrée = $test->selectRecette_Categorie("Entrée");
            foreach ($Entrée as $uneDonnees){
            echo '
                <div class="carte">
                    <img class="carteImageContainer" src="'.$uneDonnees["Image_Un"].'" alt="">
                    <div class="difficulteTempsRecette">
                        <p>'.$uneDonnees["Difficulte"].'</p>
                        <p>'.$uneDonnees["Temps_Preparation"].'</p>
                    </div>
                    <h3>'.$uneDonnees["Nom_Recette"].'</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="'.$uneDonnees["Categorie_Logo"].'" alt="">
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
                ';
            }
            ?>
            
            </div>
        
        
        </section>
    
                      <!-- Partie Plat -->
        
                      <section class="sectionCarte">
            <h2><img class="icone" src="../Images/iconePlat (2)-modified.png" alt=""> Nos plats</h2>
            <div class="carteContainer">
                

                
                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Breakfast.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Facile</p>
                        <p>30 min</p>
                    </div>
                    <h3>Breakfast</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>Recette francaise</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Pizza.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Moyen</p>
                        <p>120 min</p>
                    </div>
                    <h3>Pizza</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>recette réunionnaise</p>

                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/MilleFeulle.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Difficile</p>
                        <p>210 min</p>
                    </div>
                    <h3>Mille Feulle</h3>
                    <div class="difficulteTempsRecette">
                        <div>
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>recette indienne</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Breakfast.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Facile</p>
                        <p>30 min</p>
                    </div>
                    <h3>Breakfast</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>Recette francaise</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Pizza.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Moyen</p>
                        <p>120 min</p>
                    </div>
                    <h3>Pizza</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/iconePlat (2)-modified.png" alt="">
                            <p>recette réunionnaise</p>

                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
                
                <div class="carte">
                    <img class="carteImageContainer" src="../Images/MilleFeulle.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Difficile</p>
                        <p>210 min</p>
                    </div>
                    <h3>Mille Feulle</h3>
                    <div class="difficulteTempsRecette">
                        <div>
                            <img class="icone" src="../Images/dessert-modified.png" alt="">
                            <p>recette indienne</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
            
            </div>
        
        </section>

                  <!-- Partie Dessert -->
        
                  <section class="sectionCarte">
            <h2><img class="icone" src="../Images/dessert-modified.png" alt=""> Nos desserts</h2>
            <div class="carteContainer">
                

                
                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Breakfast.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Facile</p>
                        <p>30 min</p>
                    </div>
                    <h3>Breakfast</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>Recette francaise</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Pizza.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Moyen</p>
                        <p>120 min</p>
                    </div>
                    <h3>Pizza</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>recette réunionnaise</p>

                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/MilleFeulle.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Difficile</p>
                        <p>210 min</p>
                    </div>
                    <h3>Mille Feulle</h3>
                    <div class="difficulteTempsRecette">
                        <div>
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>recette indienne</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Breakfast.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Facile</p>
                        <p>30 min</p>
                    </div>
                    <h3>Breakfast</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <p>Recette francaise</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>

                <div class="carte">
                    <img class="carteImageContainer" src="../Images/Pizza.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Moyen</p>
                        <p>120 min</p>
                    </div>
                    <h3>Pizza</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="../Images/iconePlat (2)-modified.png" alt="">
                            <p>recette réunionnaise</p>

                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
                
                <div class="carte">
                    <img class="carteImageContainer" src="../Images/MilleFeulle.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Difficile</p>
                        <p>210 min</p>
                    </div>
                    <h3>Mille Feulle</h3>
                    <div class="difficulteTempsRecette">
                        <div>
                            <img class="icone" src="../Images/dessert-modified.png" alt="">
                            <p>recette indienne</p>
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
            
            </div>
        
        </section>


    </main>
    <footer>

        <?php include "../module/moduleFooter.php" ?>

    </footer>
</body>

</html>