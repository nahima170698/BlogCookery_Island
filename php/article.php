<?php include "BDD/connexionbdd.php" ?>

<?php 
 if(isset($_POST['ID_Recette'])){
    $Recette = $test->selectArticle_ID($_POST['ID_Recette']);
}else{ $Recette = $test->selectArticle_ID(1);}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.Cookery_Island.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo 'Cookery_Island '.$Recette[0]["Nom_Recette"].''?></title>
</head>

<body>
    
    <header>
        <?php include "../module/moduleNavBar.php"  ?>
    
    <?php
    echo '
        <div class="header">
            <h1>'.$Recette[0]["Nom_Recette"].'</h1>
        </div>
    </header>
    
    <main>
        
        <!-- Partie premiere image -->
        
        <section class="articleImageRecetteContainer" id="image1">
            <img class="articleImageRecette" src="../'.$Recette[0]["Image_Un"].'" alt="Les minis burger">
        </section>
        
        <!-- Partie ingredients -->
        
        <section class="articleIngredientContainer" id="ingredient">
            <ul class="placementIngredient">
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
                <li>
                    <p>Une quantité d un ingredient</P>
                </li>
            </ul>
        </section>

        <!-- Partie premier champ de texte -->

        <section class="articleTextContainer" id="text1">
            <p>'.$Recette[0]["Texte_Un"].'</p>
        </section>

        <!-- Partie deuxieme image -->

        <section class="articleImageRecetteContainer" id="image2">
            <img class="articleImageRecette" src="../'.$Recette[0]["Image_Deux"].'" alt="Les minis burger">
        </section>
        
        <!-- Partie deuxieme champ de texte -->

        <section class="articleTextContainer" id="text2">
            <p>'.$Recette[0]["Texte_Deux"].'</p>
        </section>';
        ?>
        <section class="commentaire" id="commentaire">
            <h2>Commentaire</h2>
            <div class="commentaireUnique">
                <p class="bold">Pseudo</p>
                <p>Cupcake ipsum dolor sit fruitcake muffin. Sweet bonbon candy powder
                    cheesecake muffin sesame snaps jujubes. Muffin macaroon cheesec
                    cookie souffl peacute; cookie cheesecake lollipop candy canes.
                    Halvah cotton candy sesame snaps chocolate bar. Suga
                </p>
            </div>
            <div class="commentaireUnique">
                <p class="bold">Pseudo</p>
                <p>Cupcake ipsum dolor sit fruitcake muffin. Sweet bonbon candy powder
                    cheesecake muffin sesame snaps jujubes. Muffin macaroon cheesec
                    cookie souffl peacute; cookie cheesecake lollipop candy canes.
                    Halvah cotton candy sesame snaps chocolate bar. Suga
                </p>
            </div>
            <div class="commentaireUnique">
                <p class="bold">Pseudo</p>
                <p>Cupcake ipsum dolor sit fruitcake muffin. Sweet bonbon candy powder
                    cheesecake muffin sesame snaps jujubes. Muffin macaroon cheesec
                    cookie souffl peacute; cookie cheesecake lollipop candy canes.
                    Halvah cotton candy sesame snaps chocolate bar. Suga
                </p>
            </div>
            <div class="commentaireUnique">
                <p class="bold">Pseudo</p>
                <p>Cupcake ipsum dolor sit fruitcake muffin. Sweet bonbon candy powder
                    cheesecake muffin sesame snaps jujubes. Muffin macaroon cheesec
                    cookie souffl peacute; cookie cheesecake lollipop candy canes.
                    Halvah cotton candy sesame snaps chocolate bar. Suga
                </p>
            </div>
            <div class="commentaireUnique">
                <p class="bold">Pseudo</p>
                <p>Cupcake ipsum dolor sit fruitcake muffin. Sweet bonbon candy powder
                    cheesecake muffin sesame snaps jujubes. Muffin macaroon cheesec
                    cookie souffl peacute; cookie cheesecake lollipop candy canes.
                    Halvah cotton candy sesame snaps chocolate bar. Suga
                </p>
            </div>
        </section>
        
        <section class="ajoutCommentaire">
            <h3>Ajoutez un commentaire</h3>
            <form action="">
                <textarea class="createCommentaire" name="" id="" cols="30" rows="10"></textarea>
                <input class="createCommentaireBouton" type="submit" value="Poster">
            </form>

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