<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Document</title>
</head>
<body>
    
    <header>
    
    <?php include "../module/moduleNavBar.php"  ?>
    <div class="header">
        <h1>Connexion</h1>
    </div>
        
    </header>
    
    <main class="formConnexion">
        <!-- formulaire de connexion -->
        <section class="partieConnexion">
            <h3>Connectez-vous</h3>
            <form action="">
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="connexionUtilisateur">Utilisateur:</label>
                    <input class="tailleInput" id="connexionUtilisateur" type="text" name= "identifiant" placeholder="Utilisateur">
                </div>
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="connexionMotDePasse">Mot de passe:</label>
                    <input class="tailleInput" id="connexionMotDePasse" type="text" name="mdp" placeholder="Mot de passe">
                </div>

                <input class="boutonFormulaire" type="submit" name="" id="">

            </form>
        </section>

        <!-- Partie inscription -->
        
        <section class="partieConnexion">
            <h3>Inscrivez-vous</h3>
            <form action="BDD/insertionusers.php" method="POST">

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionNom">Nom:</label>
                    <input class="tailleInput" id="inscriptionNom" type="text" placeholder="Nom">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPrenom">Prenom:</label>
                    <input class="tailleInput" id="inscriptionPrenom" type="text" placeholder="Prenom">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionAdresseMail">Adresse email:</label>
                    <input class="tailleInput" id="inscriptionAdresseMail" type="text" placeholder="AdresseMail">
                </div>             
                
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPseudo">Pseudo:</label>
                    <input class="tailleInput" id="inscriptionPseudo" type="text" placeholder="Pseudo">
                </div>
                
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionMotDePasse">Mot de passe:</label>
                    <input class="tailleInput" id="inscriptionMotDePasse" type="text" placeholder="Mot de passe">
                </div>

                <input type="hidden" name="ID_Role" value="2">

                <input class="boutonFormulaire" type="submit" id="">

            </form>
        </section>
    </main>
    <footer>
        <?php include "../module/moduleFooter.php" ?>
    </footer>
    
    








    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" 
     integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>
</html>