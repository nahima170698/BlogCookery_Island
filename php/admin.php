<?php
session_start();
?>
<?php include "BDD/connexionbdd.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <header>
        <?php include "../module/moduleNavBar.php" ?>
        <div class="header">
            <h1>Administrateur</h1>
        </div>
    </header>

    <form method="POST" action="BDD\insertionRecette.php">
        <main class="formConnexion">
            <!-- formulaire de recette-->
            <section class="partieConnexion">
                <h3>Recette</h3>

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

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage1">Premier texte:</label>
                    <textarea class="createCommentaire" name="texte_un" id="" cols="30" rows="10" required></textarea>
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="adminImage1">Deuxieme texte:</label>
                    <textarea class="createCommentaire" name="texte_deux" id="" cols="30" rows="10" required></textarea>
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

            <!-- <section class="partieConnexion">
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
            </section> -->

        </main>
        <input class="boutonFormulaire" type="submit" name="" id="">
    </form>

    <div class="premierePartieBlog">
        <h1>Gestion des articles</h1>
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

    <!-- Modal Fonction Delete-->
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
    <footer>
        <?php
        include "../module/moduleFooter.php";
        ?>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>