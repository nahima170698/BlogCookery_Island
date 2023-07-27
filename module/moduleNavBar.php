<nav>
            <a href="../index.php"><img src="../Images/Logo.Cookery_Island.png" alt="Logo Cookery Island"></a>
            <a class="lienNav" href="blog.php">Nos recettes</a>
            <a class="lienNav" href="admin.php">Cours de cuisine</a>
            <a class="lienNav" href="connexion.php">Connexion</a>
            <div class="dropdown">
                
            <?php

switch (true) {
    case empty($_SESSION["Role"]):
        echo '<h3>Non connecté</h3>';
        break;
    case ($_SESSION["Role"] == 1):
        echo '
        <div class="dropdown">
            <button class="dropbtn"><img class="logoProfil" src="../Images/profil.png" alt=""></button>
            <div class="dropdown-content">
                <p>' . $_SESSION["idUser"] .'</p>
                <p>' .  $_SESSION["Nom"] .'</p>
                <p>' . $_SESSION["Prenom"] .'</p>
                <p>'. $_SESSION["Role"] .'</p>
                <a class="lienNav" href="admin.php">Cours de cuisine</a>
            </div>
        </div>';
        break;
    case ($_SESSION["Role"] == 2):
        echo '
        <div class="dropdown">
            <button class="dropbtn"><img class="logoProfil" src="../Images/profil.png" alt=""></button>
            <div class="dropdown-content">
                <p>' . $_SESSION["idUser"] .'</p>
                <p>' .  $_SESSION["Nom"] .'</p>
                <p>' . $_SESSION["Prenom"] .'</p>
                <a>Lien vers le kill</a>
            </div>
        </div>';
        break;

    default:
        // Cas par défaut lorsque $_SESSION["Role"] ne correspond à aucun cas précédent.
        break;
}
?>

                <!-- <div class="dropdown-content">
                    <a p>Nos recettes</a>
                    <a p>Link 2</a>
                    <a p>Link 3</a>
                </div> -->
            </div>
            <div class="burger dropdown">
                <button class="dropbtn"><img src="../Images/lines_menu_burger_icon_123889_encorepluspetit.png" alt=""></button>
                <div class="dropdown-content">
                    <a href="blog.php">Nos recettes</a>
                    <a href="">Cours de cuisine</a>
                    <a href="connexion.php">Connexion</a>
                </div>
            </div>
        </nav>

        