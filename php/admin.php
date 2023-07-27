<?php
session_start();
var_dump($_SESSION);
?>
<?php include "BDD/connexionbdd.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.Cookery_Island.png" />
    <title>Cookery_Island Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header>
        <?php include "../module/moduleNavBar.php" ?>
        <div class="header">
            <h1>Administrateur</h1>
        </div>
    </header>
    <main>

        <h3>Creation de recette</h3>

        <form method="POST" action="BDD\insertionRecette.php">
            <section class="formConnexion">
                <!-- formulaire de recette-->

                <div class="partieConnexion">

                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminCategorie">Catégorie:</label>
                        <select class="tailleInput" id="adminCategorie" name="categorie" required>
                            <option value="Entrée">Entrée</option>
                            <option selected value="Plats">Plats</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>

                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminLogoCategorie">Logo catégorie:</label>
                        <select class="tailleInput" id="adminLogoCategorie" name="logoCategorie" required>
                            <option value="Images\icone_entrée1.png">Entrée</option>
                            <option selected value="Images/iconePlat (2)-modified.png">Plats</option>
                            <option value="Images\Icone-dessert.png">Dessert</option>
                        </select>
                    </div>

                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminNomRecette">Nom de la recette:</label>
                        <input class="tailleInput" id="adminNomRecette" type="text" placeholder="Nom de la recette" name="nomRecette" required>
                    </div>


                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminTempsPreparation">Temps de préparation:</label>
                        <input class="tailleInput" id="adminTempsPreparation" type="text" placeholder="Temps de préparation" name="tempsPrepa" required>
                    </div>


                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminImage1">Premiere image:</label>
                        <input class="tailleInput" id="adminImage1" type="text" placeholder="Lien vers premiere image" name="image_un" required>
                    </div>

                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminImage2">deuxieme image:</label>
                        <input class="tailleInput" id="adminImage2" type="text" placeholder="Lien vers deuxieme image" name="image_deux" required>
                    </div>
                </div>

                <div class="partieConnexion">
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminImage1">Premier texte:</label>
                        <textarea class="createCommentaire" name="texte_un" id="" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="adminImage1">Deuxieme texte:</label>
                        <textarea class="createCommentaire" name="texte_deux" id="" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="placementLabelFormulaire">
                        <p>Difficulté:</p>
                        <div>
                            <input type="radio" id="Facile" name="difficulte" value="Facile" />
                            <label for="Facile">Facile</label>
                        </div>
                        <div>
                            <input type="radio" id="Moyens" name="difficulte" value="Moyens" checked />
                            <label for="Moyens">Moyens</label>
                        </div>
                        <div>
                            <input type="radio" id="Difficile" value="Difficile" name="difficulte" />
                            <label for="Difficile">Difficile</label>
                        </div>
                    </div>

                </div>

            </section>
            <input class="boutonFormulaire" type="submit" name="" id="">
        </form>

        <div class="premierePartieBlog">
            <h3>Gestion des articles</h3>
        </div>
        <div class="tableWarper">
            <div class="partieAdmin">
                <table>
                    <thead>
                        <th>Nom de la recette:</th>
                        <th>Catégorie:</th>
                        <th>logo catégorie:</th>
                        <th>Temps de preparation :</th>
                        <th>Difficulté:</th>
                        <th>Texte 1:</th>
                        <th>Texte 2 :</th>
                        <th>Lien vers image 1:</th>
                        <th>Lien vers image 2:</th>
                        <th>Action:</th>
                    </thead>
                    <tbody>

                        <!-- TABLEAU DYNAMIQUE ET INTERACTIF -->
                        <?php
                        $recettes = $test->select("recette");
                        foreach ($recettes as $uneDonnees) {
                            echo '
                    <form method="POST" action="BDD/modifRecette.php">
                        <tr>
                            <td><input type="text" class="form-control tailleInput" name="nomRecette" value="' . $uneDonnees['Nom_Recette'] . '" required></td>
                            <td><input type="text" class="form-control tailleInput" name="categorie" value="' . $uneDonnees['Categorie'] . '" required></td>
                            <td><input type="text" class="form-control tailleInput" name="logoCategorie" value="' . $uneDonnees['Categorie_Logo'] . '" required></td>
                            <td><input type="text" class="form-control tailleInput" name="tempsPrepa" value="' . $uneDonnees['Temps_Preparation'] . '" required></td>
                            <td><textarea class="form-control tailleInput" name="texte_un" required>' . $uneDonnees['Texte_Un'] . '</textarea></td>
                            <td><input type="text" class="form-control tailleInput" name="image_un" value="' . $uneDonnees['Image_Un'] . '" required></td>
                            <td><textarea class="form-control tailleInput" name="texte_deux" required>' . $uneDonnees['Texte_Deux'] . '</textarea></td>
                            <td><input type="text" class="form-control tailleInput" name="image_deux" value="' . $uneDonnees['Image_Deux'] . '" required></td>
                            <td><input type="text" class="form-control tailleInput" name="difficulte" value="' . $uneDonnees['Difficulte'] . '" required></td>

                            <td>
                                <button type="submit" class="btn btn-outline-warning">Modif</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#fonctionDelete' . $uneDonnees['ID_Recette'] . '">Suppr</button>
                            </td>
                        </tr>
                        <input type="hidden" name="ID_Recette" value="' . $uneDonnees['ID_Recette'] . '">
                    </form>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Fonction Delete Recette-->
        <?php
        foreach ($recettes as $uneDonnees) {
            echo
            '<form method="POST" action="BDD/deleteRecette.php">
        <div class="modal fade" id="fonctionDelete' . $uneDonnees['ID_Recette'] . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $uneDonnees['ID_Recette'] . '" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel' . $uneDonnees['ID_Recette'] . '">Suppression d article</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Etes vous sur de vouloir effacer la recette: ' . $uneDonnees['Nom_Recette'] . ' ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ID_Recette" value="' . $uneDonnees['ID_Recette'] . '">
    </form>';
        }

        ?>

        <h3>Gestion des ingredients</h3>

        <section class="formConnexion">

            <div class="partieConnexion partieCreate">
                <h3>Ajout d'ingredient a la liste</h3>
                <form action="BDD/insertionIngredient.php" method="POST">
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="ajoutIngredient">Nom du nouvelle ingredient:</label>
                        <input class="tailleInput" id="ajoutIngredient" type="text" placeholder="Nom du nouvelle ingredient" name="Nom_Ingredient" required>
                    </div>
                    <input class="boutonFormulaire" type="submit">
                </form>
            </div>


            <div class="partieConnexion partieCreate">
                <h3>Liaison d'ingredient aux recettes</h3>
                <form action="BDD/liaisonIngredientRecette.php" method="POST">
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="choixRecette">Ajout dans cette recette:</label>
                        <select class="tailleInput" id="choixRecette" name="ID_Recette" required>
                            <?php
                            foreach ($recettes as $uneDonnees) {
                                echo '<option value="' . $uneDonnees['ID_Recette'] . '">' . $uneDonnees['Nom_Recette'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="choixIngredient">Ingredient a ajouter:</label>
                        <select class="tailleInput" id="choixIngredient" name="ID_Ingredient" required>
                            <?php
                            $ingredients = $test->select("ingredient");
                            foreach ($ingredients as $uneDonnees) {
                                echo '<option value="' . $uneDonnees['ID_Ingredient'] . '">' . $uneDonnees['Nom_Ingredient'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="quantité">Quantité:</label>
                        <input class="tailleInput" id="quantité" type="text" placeholder="Quantité de cette ingredient" name="quantite" required>
                    </div>
                    <input class="boutonFormulaire" type="submit">
                </form>

            </div>

        </section>

        <section class="formConnexion">

            <div class="partieConnexion partieDelete">
                <h3>Ajout d'ingredient a la liste</h3>
                <form action="BDD/suppressionIngredient.php" method="POST">
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="suppIngredient">Ingredient a supprimer:</label>
                        <select class="tailleInput" id="suppIngredient" name="ID_Ingredient" required>
                            <?php
                            foreach ($ingredients as $uneDonnees) {
                                echo '<option value="' . $uneDonnees['ID_Ingredient'] . '">' . $uneDonnees['Nom_Ingredient'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input class="boutonFormulaire" type="submit">
                </form>
            </div>

            <div class="partieConnexion partieDelete">
                <h3>Suppression d'ingredient aux recettes</h3>
                <form action="BDD/suppressionIngredientRecette.php" method="POST">
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="choixRecette2">Supprimer dans cette recette:</label>
                        <select class="tailleInput" id="choixRecette2" name="ID_Recette" required>
                            <?php
                            foreach ($recettes as $uneDonnees) {
                                echo '<option value="' . $uneDonnees['ID_Recette'] . '">' . $uneDonnees['Nom_Recette'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="placementLabelFormulaire">
                        <label class="tailleLabel" for="choixIngredient">Ingredient a ajouter:</label>
                        <select class="tailleInput" id="choixIngredient" name="ID_Ingredient" required>
                            <?php
                            foreach ($ingredients as $uneDonnees) {
                                echo '<option value="' . $uneDonnees['ID_Ingredient'] . '">' . $uneDonnees['Nom_Ingredient'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input class="boutonFormulaire" type="submit">
                </form>

            </div>
        </section>



        <!-- <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="ingredient_1">Premier ingrédient:</label>
                    <input class="tailleInput" id="ingredient_1" type="text" placeholder="Premier ingrédient" name="ingredient_un">
                </div> -->
        <footer>
            <?php
            include "../module/moduleFooter.php";
            ?>
        </footer>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>