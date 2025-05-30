<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldSeat</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&display=swap" rel="stylesheet">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css">
 
    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #cartCount {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: red;
            color: white;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
            line-height: 1;
            text-align: center;
            z-index: 10;
        }
 
        .cart-popup {
            background-color: white;
            width: 500px;
            height: 100%;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
 
        .cart-popup-overlay {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: flex-end;
            align-items: center;
            z-index: 1000;
        }
 
        .videotitle {
            color: black;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, 51%);
            z-index: 1;
            color: white;
            font-size: 3em;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            background-color: #2f2e2eac;
        }
 
        .diapo {
            position: relative;
            overflow: hidden;
        }
 
        #nav-droite,
        #nav-gauche {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 3em;
            cursor: pointer;
            user-select: none;
        }
 
        #nav-droite {
            right: 20px;
        }
 
        #nav-gauche {
            left: 20px;
        }
 
        .elements {
            display: flex;
            transition: transform 1s linear;
        }
 
        .element {
            min-width: 100%;
            position: relative;
        }
 
        .element img {
            width: 100%;
        }
 
        .caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            background-color: rgba(255, 255, 255, 0.4);
            padding: 30px;
        }
 
        .product {
            display: flex;
            margin-bottom: 20px;
        }
 
        .product img {
            width: 200px;
            height: auto;
        }
 
        .product-info {
            margin-left: 20px;
        }
 
        .product-info button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
 
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
 
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
 
        .footer-links {
            margin-bottom: 10px;
        }
 
        .footer-links a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-size: 14px;
        }
 
        .footer-links a:hover {
            text-decoration: underline;
        }
 
        .contact-info {
            font-size: 14px;
        }
 
        .ml2 {
           
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, 51%);
            z-index: 1;
            text-align: center;
            font-weight: 900;
            font-size: 3.5em;
        }
 
        .ml2 .letter {
            display: inline-block;
            line-height: 2em;
            color: rgb(2, 1, 15);
            font-size: 70px;
        }
 
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
 
        .cart-popup h2 {
            margin-bottom: 20px;
        }
 
        .achats {
            background-color: #C8102E;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
 
        .cart-popup a {
            display: block;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
        }
 
        .cart-popup a:hover {
            text-decoration: underline;
        }
 
        .text-introduction {
            box-sizing: border-box;
            border: 2 solid blue;
 
        }
 
        .intro {
            font-family: 'Times New Roman';
 
        }
 
        @media (min-width: 768px) {
            .container-about {
                flex-direction: row;
            }
 
            .ml2 {
                font-weight: 100;
            }
 
            .image-about {
                width: 35%;
            }
 
            .text-about {
                margin-left: 25px;
            }
        }
 
        @media (max-width: 767px) {
 
 
 
            .container-about {
                flex-direction: column;
                text-align: center;
            }
 
            .text-about {
                margin-left: 0;
 
            }
        }
    </style>
</head>
 
<body>
    <div class="navBar">
        <nav class="navbar">
 
            <div class="navbar-left">
                <a href="index.php" class="nav-link">Accueil</a>
                <a href="product.php" class="nav-link">Reservation</a>
                <a href="galerie.php" class="nav-link">Galerie</a>
                <a href="blog.php" class="nav-link">Blog</a>
            </div>
            <div class="navbar-center">
                <span class="logo">GOLDSEAT</span>
            </div>
            <div class="navbar-right">
            <?php
                $email = $_SESSION['email'];
                if(empty($_SESSION['email'])){
                    echo '<a href="connexion.html" class="header__icon header__icon--account link focus-inset small-hide" id="account-link">';
                }else{
                    echo '<a href="parametre.html" class="header__icon header__icon--account link focus-inset small-hide" id="account-link">';
                }
            ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" focusable="false"
                         class="icon icon-account" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12 12.75C8.83 12.75 6.25 10.17 6.25 7C6.25 3.83 8.83 1.25 12 1.25C15.17 1.25 17.75 3.83 17.75 7C17.75 10.17 15.17 12.75 12 12.75ZM12 2.75C9.66 2.75 7.75 4.66 7.75 7C7.75 9.34 9.66 11.25 12 11.25C14.34 11.25 16.25 9.34 16.25 7C16.25 4.66 14.34 2.75 12 2.75Z"
                              fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M20.5901 22.75C20.1801 22.75 19.8401 22.41 19.8401 22C19.8401 18.55 16.3202 15.75 12.0002 15.75C7.68015 15.75 4.16016 18.55 4.16016 22C4.16016 22.41 3.82016 22.75 3.41016 22.75C3.00016 22.75 2.66016 22.41 2.66016 22C2.66016 17.73 6.85015 14.25 12.0002 14.25C17.1502 14.25 21.3401 17.73 21.3401 22C21.3401 22.41 21.0001 22.75 20.5901 22.75Z"
                              fill="currentColor"></path>
                    </svg>
                    <span class="icon-text visually-hidden">Log in</span>
                </a>
           
                
                <a href="listeSouhait.php" class="wishlist-link" title="Favorites">
                    <svg width="24" height="24" class="icon icon-heart" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21.6501C11.69 21.6501 11.39 21.6101 11.14 21.5201C7.32 20.2101 1.25 15.5601 1.25 8.6901C1.25 5.1901 4.08 2.3501 7.56 2.3501C9.25 2.3501 10.83 3.0101 12 4.1901C13.17 3.0101 14.75 2.3501 16.44 2.3501C19.92 2.3501 22.75 5.2001 22.75 8.6901C22.75 15.5701 16.68 20.2101 12.86 21.5201C12.61 21.6101 12.31 21.6501 12 21.6501ZM7.56 3.8501C4.91 3.8501 2.75 6.0201 2.75 8.6901C2.75 15.5201 9.32 19.3201 11.63 20.1101C11.81 20.1701 12.2 20.1701 12.38 20.1101C14.68 19.3201 21.26 15.5301 21.26 8.6901C21.26 6.0201 19.1 3.8501 16.45 3.8501C14.93 3.8501 13.52 4.5601 12.61 5.7901C12.33 6.1701 11.69 6.1701 11.41 5.7901C10.48 4.5501 9.08 3.8501 7.56 3.8501Z"
                            fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Favorites</span>
                    <span class="zemez_wishlist_total zemez_wishlist_total__style not-empty" id="wishlistCount">0</span>
                </a>
                <a class="header__icon header__icon--cart header__icon--cart-empty link focus-inset"
                    id="cart-icon-bubble" role="button" aria-haspopup="dialog">
                    <svg class="icon icon-cart-empty" aria-hidden="true" focusable="false" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.19001 6.37994C5.00001 6.37994 4.8 6.29994 4.66 6.15994C4.37 5.86994 4.37 5.38994 4.66 5.09994L8.29 1.46994C8.58001 1.17994 9.06001 1.17994 9.35001 1.46994C9.64001 1.75994 9.64001 2.23994 9.35001 2.52994L5.72 6.15994C5.57 6.29994 5.38001 6.37994 5.19001 6.37994Z"
                            fill="currentColor"></path>
                        <path
                            d="M18.81 6.37994C18.62 6.37994 18.43 6.30994 18.28 6.15994L14.65 2.52994C14.36 2.23994 14.36 1.75994 14.65 1.46994C14.94 1.17994 15.42 1.17994 15.71 1.46994L19.34 5.09994C19.63 5.38994 19.63 5.86994 19.34 6.15994C19.2 6.29994 19 6.37994 18.81 6.37994Z"
                            fill="currentColor"></path>
                        <path
                            d="M20.21 10.6001C20.14 10.6001 20.07 10.6001 20 10.6001H19.77H4C3.3 10.6101 2.5 10.6101 1.92 10.0301C1.46 9.5801 1.25 8.8801 1.25 7.8501C1.25 5.1001 3.26 5.1001 4.22 5.1001H19.78C20.74 5.1001 22.75 5.1001 22.75 7.8501C22.75 8.8901 22.54 9.5801 22.08 10.0301C21.56 10.5501 20.86 10.6001 20.21 10.6001ZM4.22 9.1001H20.01C20.46 9.1101 20.88 9.1101 21.02 8.9701C21.09 8.9001 21.24 8.6601 21.24 7.8501C21.24 6.7201 20.96 6.6001 19.77 6.6001H4.22C3.03 6.6001 2.75 6.7201 2.75 7.8501C2.75 8.6601 2.91 8.9001 2.97 8.9701C3.11 9.1001 3.54 9.1001 3.98 9.1001H4.22Z"
                            fill="currentColor"></path>
                        <path
                            d="M9.76001 18.3C9.35001 18.3 9.01001 17.96 9.01001 17.55V14C9.01001 13.59 9.35001 13.25 9.76001 13.25C10.17 13.25 10.51 13.59 10.51 14V17.55C10.51 17.97 10.17 18.3 9.76001 18.3Z"
                            fill="currentColor"></path>
                        <path
                            d="M14.36 18.3C13.95 18.3 13.61 17.96 13.61 17.55V14C13.61 13.59 13.95 13.25 14.36 13.25C14.77 13.25 15.11 13.59 15.11 14V17.55C15.11 17.97 14.77 18.3 14.36 18.3Z"
                            fill="currentColor"></path>
                        <path
                            d="M14.89 22.75H8.86C5.28 22.75 4.48 20.62 4.17 18.77L2.76 10.12C2.69 9.71 2.97 9.33 3.38 9.26C3.79 9.19 4.17 9.47 4.24 9.88L5.65 18.52C5.94 20.29 6.54 21.25 8.86 21.25H14.89C17.46 21.25 17.75 20.35 18.08 18.61L19.76 9.86C19.84 9.45 20.23 9.18 20.64 9.27C21.05 9.35 21.31 9.74 21.23 10.15L19.55 18.9C19.16 20.93 18.51 22.75 14.89 22.75Z"
                            fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Sac de magasinage</span>
                    <span id="cartCount">0</span>
                </a>
            </div>
            <div class="menu">
                <img src="img/menu_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="menu">
            </div>
        </nav>
 
    </div>
             
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/course.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/cycliste.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/natation.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
 
    <main>
        <div class="introduction">
            <h1 style="text-align: center; margin-top: 10%;" class="ml2">Bienvenue aux JO 2024 !</h1>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
            <div>
 
 
 
                <style>
                    .container-about {
 
                        display: flex;
 
                        width: x;
 
                        height: 2x;
 
                        margin: 50px auto;
 
                        padding: 20px;
 
                        border: 1px solid #ccc;
 
                        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                       
                        margin-top: 30%;
 
                    }
 
 
 
                    .image-about {
 
                        width: 35%;
 
                        left: 10%;
 
                        box-sizing: border-box;
 
                        position: relative;
 
 
 
                    }
 
 
 
 
                    .text-about {
 
                        flex: 1;
 
                        /* Take the remaining space */
 
                        margin-left: 25%;
 
                        text-align: justify;
 
                        box-sizing: border-box;
 
                        position: relative;
 
                        right: 10%;
 
                    }
                </style>
 
 
 
                <div class="container-about">
 
                    <img src="img/gif.gif" alt="Image" class="image-about">

                    <div class="text-about" id="apropos">

                        <h2 class="intro" style="text-align: center; margin-top: 5%; color: rgb(64, 111, 242);">
 
                            ABOUT US </h2>
                           
 
                        <p class="P" style="line-height: 30px;  margin-top: 10%;"> Nous sommes ravis de vous accueillir
                            sur notre site officiel de réservation de
 
                            billets pour les Jeux Olympiques 2024. Ce site a été spécialement conçu pour vous offrir
 
                            une expérience de réservation fluide et agréable, afin que vous puissiez assister aux
 
                            événements les plus passionnants de cette compétition mondiale.
 
                            Que vous soyez un fan de longue date des Jeux Olympiques ou que vous découvriez cet
 
                            événement pour la première fois, nous avons tout ce dont vous avez besoin pour planifier
 
                            votre visite. Explorez notre calendrier des événements, découvrez les sites
 
                            emblématiques, et réservez vos billets en quelques clics seulement.
 
                            Merci de nous rejoindre pour célébrer l'excellence sportive et l'esprit olympique. Nous
 
                            avons hâte de partager avec vous des moments inoubliables !</p>
 
                    </div>
 
 
                </div>
                <div>
                    <img src="img/deco.png" alt="">
                </div>
                   
             
 
           
 
 
                <div class="main-content">
                    <div uk-filter="target: .js-filter">
                        <br><br>
                        <h1 style="margin-bottom: 10%;"> Actualités du jour</h1>
                        <script>
                            document.querySelectorAll('.openPopup').forEach(button => {
                                button.addEventListener('click', (event) => {
                                    const price = button.getAttribute('data-price');
                                    const imgSrc = button.getAttribute('data-img');
                                    localStorage.setItem('productPrice', price);
                                    localStorage.setItem('productImg', imgSrc);
                                    window.location.href = 'product.html';
                                });
                            });
                            var textWrapper = document.querySelector('.ml2');
                            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
 
                            anime.timeline({ loop: true })
                                .add({
                                    targets: '.ml2 .letter',
                                    scale: [4, 1],
                                    opacity: [0, 1],
                                    translateZ: 0,
                                    easing: "easeOutExpo",
                                    duration: 950,
                                    delay: (el, i) => 70 * i
                                }).add({
                                    targets: '.ml2',
                                    opacity: 0,
                                    duration: 1000,
                                    easing: "easeOutExpo",
                                    delay: 1000
                                });
                        </script>
 
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="img/course.jpg" class="img-fluid rounded-start" alt="Athlète en course">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Course à Pied - 100m</b></h5>
                                        <p class="card-text">La course à pied de 100m est l'une des épreuves les plus
                                            attendues des Jeux Olympiques.
                                            Venez voir les athlètes les plus rapides du monde s'affronter pour la
                                            médaille d'or.&hellip; <a href="https://jo2024-paris.fr/athletisme">Lire
                                                plus</a>
                                        <p class="card-text"><small class="text-body-secondary">Dernière mise à jour il
                                                y a 5 minutes</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
 
                        <div class="card mb-3" style="max-width: 100%;" ;>
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Natation - 200m Papillon</b></h5>
                                        <br> <br>
                                        <p class="card-text">Regardez les meilleurs nageurs du monde concourir dans
                                            l'épreuve de 200m papillon.
                                            Une démonstration impressionnante de force et de technique..&hellip; <a
                                                href="https://olympics.com/fr/paris-2024/sports/natation">Lire plus</a>
                                        <p class="card-text"><small class="text-body-secondary">Dernière mise à jour il
                                                y a 10 minutes</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="img/natation.jpg" class="img-fluid rounded-start" alt="Natation">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="img/rugby.jpg" class="img-fluid rounded-start"
                                        alt="Match de rugby masculin">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Rugby à 7 - Tournoi Masculin</b></h5>
                                        <br><br>
                                        <p class="card-text">Venez assister au tournoi masculin de rugby à 7, une
                                            compétition dynamique et excitante où les meilleures équipes du monde entier
                                            se disputent la suprématie. Le rugby à 7, avec son rythme effréné et ses
                                            matchs courts mais intenses, garantit un spectacle palpitant à chaque
                                            minute. Les joueurs démontrent des compétences incroyables, de la rapidité,
                                            de l'agilité et une endurance impressionnante.
                                            Chaque match est une véritable bataille où chaque essai peut faire la
                                            différence.
                                            Ne manquez pas l'opportunité de voir les stars du rugby à 7 en action,
                                            lutter pour
                                            l'or olympique dans une ambiance électrique.&hellip; <a
                                                href="https://www.lamedecinedusport.com/sports/le-rugby-a-7-du-rugby-haut-debit/">Lire
                                                plus</a>
                                        <p class="card-text"><small class="text-body-secondary">Dernière mise à jour il
                                                y a 2 minutes</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="blog.html">
                                <h1>En savoir plus</h1>
                            </a>
                        </div>
                    </div>
                </div>
               
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="index.php">À propos</a>
                <a href="faq.html">FAQ</a>
                <a href="contact.php">Contact</a>
                <a href="blog.php">Blog</a>
                <a href="mention.html">Mentions légales</a>
                <a href="politique.html">Politique de confidentialité</a>
            </div>
        </div>
    </footer>
 <script src="script_img.js"></script>
      <div class="cart-popup-overlay" id="cartPopup">
        <div class="cart-popup">
              <button class="close-btn" onclick="closePopup()">
                <p>×</p>
              </button>
               <h2>Votre panier</h2>
                <div id="cartItems"></div>
               <button class="achats" onclick="closePopup()">Continuer vos achats</button>
                 <a href="connexion.html">Se connecter pour vérifier plus rapidement.</a>
            </div>
    </div>

    <script src="scriptGeneral.js"></script>
</body>
 
</html>
 