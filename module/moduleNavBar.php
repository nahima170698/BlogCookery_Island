<nav>
            <a href="../index.php"><img src="../../Images/Logo.Cookery_Island.png" alt="Logo Cookery Island"></a>
            <a class="lienNav" href="blog.php">Nos recettes</a>
            <a class="lienNav" href="">Cours de cuisine</a>
            
                
            <?php

switch (true) {
    case empty($_SESSION["Role"]):
        echo '<a class="lienNav" href="connexion.php">Connexion</a>';

        break;
    case ($_SESSION["Role"] == 1):
        echo '
        <div class="dropdown">
            <button class="dropbtn"><img class="logoProfil" src="../Images/profil.png" alt=""></button>
            <div class="dropdown-content">
            <div class="positionText">
                <h3>' .  $_SESSION["Nom"] .'</h3>
                <h3>'. $_SESSION["Prenom"].'</h3>
            </div>
                <a class="lienNav" href="admin.php">Page admin</a>
                <a href="BDD/sessionKill.php">Déconnexion</a>
            </div>
        </div>';
        break;
    case ($_SESSION["Role"] == 2):
        echo '
        <div class="dropdown">
            <button class="dropbtn"><img class="logoProfil" src="../Images/profil.png" alt=""></button>
            <div class="dropdown-content">
            <div class="positionText">
                <h3>' .  $_SESSION["Nom"] .'</h3>
                <h3>'. $_SESSION["Prenom"].'</h3>
            </div>
                <a href="BDD/sessionKill.php">Déconnexion</a>
            </div>
        </div>';
        break;
    
    default:
        
        break;
}
?>
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

        