<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookery_Island Acceuil</title>
    <link rel="shortcut icon" href="Images/Logo.Cookery_Island.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav>
            <a href=""><img src="Images/Logo.Cookery_Island.png" alt=""></a>
            <a href="">Nos recettes</a>
            <a href="">Cours de cuisine</a>
            <a href="">Connexion</a>
            <div class="dropdown">
                <button class="dropbtn"><img class="logoProfil" src="Images/profil.png" alt=""></button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </nav>
        <div class="header">
            <h1>Cookery Island</h1>
        </div>
    </header>
    <main>
        <section class="accueilPremiereSection">
            <div class="accueilPresentation">
                <h2 class="accueilTitreBienvenue">Bienvenue chez Cookery Island</h2>
                <div class="flexContainer">
                    <img class="photoProfil" src="Images/Photo_profil.png" alt="photo de la proprietaire du blog">
                    <p class="accueilTextDescriptionBlog">Presentation du blog rapide
                        Cupcake ipsum dolor sit amet cake bear claw oat cake caramels. Apple pie sweet sweet ice cream tart tootsie roll. Dragée gummi bears pastry shortbread ice cream caramels biscuit apple pie ice cream. Chocolate cake pudding cake muffin tart sugar plum pudding soufflé. Biscuit cupcake macaroon candy bear claw donut</p>
                </div>
            </div>
            <div class="accueilPresentation" id="accueilPortrait">
                <img src="Images/Logo.Cookery_Island.png" alt="">
                <p class="accueilTextDescriptionCookeryIsland">Body Presentation de Cookery Island (type de cuisines, service etc)
                    Cupcake ipsum dolor sit amet cake bear claw oat cake caramels. Apple pie sweet sweet ice cream tart tootsie roll. Dragée gummi bears pastry shortbread ice cream caramels biscuit apple pie ice cream. Chocol</p>
            </div>
        </section>
        <section class="sectionCarte">
            <h2>Nos meilleurs recettes</h2>
            <div class="carteContainer">
                <div class="carte">
                    <img class="carteImageContainer" src="Images/Breakfast.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Facile</p>
                        <p>30 min</p>
                    </div>
                    <h3>Breakfast</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="Images/istockphoto-1183041351-612x612-modified.png" alt="">
                            <img class="icone" src="Images/istockphoto-1183041351-612x612-modified.png" alt="">
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
                <div class="carte">
                    <img class="carteImageContainer" src="Images/Pizza.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Moyen</p>
                        <p>120 min</p>
                    </div>
                    <h3>Pizza</h3>
                    <div class="difficulteTempsRecette">
                        <div class="iconeContainer">
                            <img class="icone" src="Images/iconePlat (2)-modified.png" alt="">
                            <img class="icone" src="Images/iconePlat (2)-modified.png" alt="">

                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
                <div class="carte">
                    <img class="carteImageContainer" src="Images/MilleFeulle.jpg" alt="">
                    <div class="difficulteTempsRecette">
                        <p>Difficile</p>
                        <p>210 min</p>
                    </div>
                    <h3>Mille Feulle</h3>
                    <div class="difficulteTempsRecette">
                        <div>
                            <img class="icone" src="Images/dessert-modified.png" alt="">
                            <img class="icone" src="Images/dessert-modified.png" alt="">
                        </div>
                        <input class="boutonCarte" type="button" value="Voir article">
                    </div>
                </div>
            </div>
            <a class="lienVersRecette" href="">voir plus</a>
        </section>
        <section class="acceuilSectionCours">
            <h2 class="acceuilCoursTitre">Reservez vos places pour nos cours de cuisines</h2>
            <div class="flexContainer">
                <img class="acceuilImageCours" src="Images/coursCuisinerogné.jpg" alt="Cours de cuisine">
                <div class="acceuilTextCours">
                    <p>Liste de style de cuisine disponible
                        Cupcake ipsum dolor sit amet cake bear claw oat cake caramels. Apple pie sweet sweet ice cream tart tootsie roll. Dragée gummi</p>
                    <input class="boutonCarte" type="button" value="Reservez ici">
                </div>
            </div>
        </section>
        <section class="header">
            <h2>Suivez nous sur Instagram</h2><br>
            <a href="">
                <div class="fontLogo"><i class="fa-brands fa-instagram fa-2xl" style="color: #ffffff;"></i></div>
            </a>
        </section>
    </main>
    <footer>
        <img class="logoFooter" src="Images/Logo.Cookery_Island.png" alt="Logo Cookery Island">
        <p>©Cookery_Island's corporation. Tous droits réservés.</p>
    </footer>
</body>

</html>