<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>

    <header>
        <?php include "../module/moduleNavBar.php" ?>
        <div class="header">
            <h1>Administrateur</h1>
        </div>
    </header>

    <form method="post" action="">
        <main class="formConnexion">
            <!-- formulaire de recette-->
            <section class="partieConnexion">
                <h3>Recette</h3>
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminNomRecette">Nom de la recette:</label>
                    <input class="tailleInput" id="adminNomRecette" type="text" placeholder="Nom de la recette" name="nomRecette" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminCategorie">Catégorie:</label>
                    <input class="tailleInput" id="adminCategorie" type="text" placeholder="Catégorie" name="categorie" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminLogoCategorie">Logo catégorie:</label>
                    <input class="tailleInput" id="adminLogoCategorie" type="text" placeholder="Logo Catégorie" name="logoCategorie" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminTempsPreparation">Temps de préparation:</label>
                    <input class="tailleInput" id="adminTempsPreparation" type="text" placeholder="Temps de préparation" name="tempsPrepa" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminDifficulte">Difficulté:</label>
                    <input class="tailleInput" id="adminDifficulte" type="text" placeholder="Difficulté" name="difficulte" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage1">Premiere image:</label>
                    <textarea class="createCommentaire" name="texte_un" id="" cols="30" rows="10" required></textarea>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage1">Premiere image:</label>
                    <textarea class="createCommentaire" name="texte_un" id="" cols="30" rows="10" required></textarea>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage1">Premiere image:</label>
                    <input class="tailleInput" id="adminImage1" type="text" placeholder="Lien vers premiere image" name="image_un" required>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage2">deuxieme image:</label>
                    <input class="tailleInput" id="adminImage2" type="text" placeholder="Lien vers deuxieme image" name="image_deux" required>
                </div>
            </section>

            <!-- Partie ingredient -->

            <section class="partieConnexion">
                <h3>Ingredients</h3>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_1">Premier ingrédient:</label>
                    <input class="tailleInput" id="ingredient_1" type="text" placeholder="Premier ingrédient" name="ingredient_un">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_2">Deuxieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_2" type="text" placeholder="Deuxieme ingrédient" name="ingredient_deux">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_3">Troisieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_3" type="text" placeholder="Troisieme ingrédient" name="ingredient_trois">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_4">Quatrieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_4" type="text" placeholder="Quatrieme ingrédient" name="ingredient_quatre">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_5">Cinquieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_5" type="text" placeholder="Cinquieme ingrédient" name="ingredient_cinq">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_6">Sixieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_6" type="text" placeholder="Sixieme ingrédient" name="ingredient_six">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_7">Septieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_7" type="text" placeholder="Septieme ingrédient" name="ingredient_sept">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_8">Huitieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_8" type="text" placeholder="Huitieme ingrédient" name="ingredient_huit">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_9">Neuvieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_9" type="text" placeholder="Neuvieme ingrédient" name="ingredient_neuf">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_10">Dixieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_10" type="text" placeholder="Dixieme ingrédient" name="ingredient_dix">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_11">Onzieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_11" type="text" placeholder="Onzieme ingrédient" name="ingredient_onze">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_12">Douzieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_12" type="text" placeholder="Douzieme ingrédient" name="ingredient_douze">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_13">Treizieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_13" type="text" placeholder="Treizieme ingrédient" name="ingredient_treize">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_14">Quatorzieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_14" type="text" placeholder="Quatorzieme ingrédient" name="ingredient_quatorze">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_15">Quinzieme ingrédient:</label>
                    <input class="tailleInput" id="ingredient_15" type="text" placeholder="Quinzieme ingrédient" name="ingredient_quinze">
                </div>
            </section>
            
        </main>
        <input class="boutonFormulaire" type="submit" name="" id="">
    </form>


    <footer>
        <?php
        include "../module/moduleFooter.php";
        ?>
    </footer>






</body>

</html>