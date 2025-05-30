<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Blog.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/b142587a1e.js" crossorigin="anonymous"></script>
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
        .navbar {
            position: fixed;
        }
        .diapo {
            position: relative;
            overflow: hidden;
        }

        #nav-droite, #nav-gauche {
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
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .cart-popup {
            background-color: white;
            width: 500px;
            height: 100%;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
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
        .item-button-container {
            text-align: right;
            margin-top: 10px;
        }
        .item-button-container button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .item-button-container button:hover {
            background-color: red;
            color: white;
        }
        
        
    .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .cart-item img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .cart-item-info {
            flex: 1;
        }
.menu{
    padding-right:90% ;
    padding-top: 1%;
    position: absolute;
    display: none;
}
.mobile-menu{
    margin-left: 0;;
}

@media  (max-width: 797px){
    .navbar {
        height: 42px;
        position: sticky;
    }
    
    .navbar-left{
        position: absolute;
        display: flex;
        flex-direction: column;    
        background-color: rgba(149, 149, 149, 0.3);
        top :0;
        width: 30%;
        height: 100vh;
        justify-content: center;
        backdrop-filter:blur(7px);
         margin-left: -150%;
    }
   .navbar-left.mobile-menu{
    margin-right: 560px;
    }
    .navbar .nav-link{
        color: #000000a4;
        font-size:25px;
    }
   
    .navbar-center{
        position: absolute;
        display: flex;
        flex-direction: column;    
        margin-bottom: 4px;
        margin-right: 60%;
        width: 1%;
        height: 100vh;
        justify-content: center;
        padding-bottom: 785px;
        padding-left: 200px;
    }
    .navbar-right{
        position: absolute;
        display: flex;
        flex-direction: row;    
        margin-bottom: 4px;
        margin-left: 80%;
        width: 15%;
        height: 3.5vh;
        justify-content: center;
    }
    
    .menu {
        display: block;
        margin-bottom: 5px;
        
    }
    .logo{
        margin-right: 150px;
    }
}

@media  (max-width: 697px){
    .navbar-left.mobile-menu{
    margin-right: 460px;
    }
}


    </style>
</head>
<body>
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
<div>
    <!-- main content -->
    <main>
        <div class="section">
            <span class="et_pb_section_video_bg">
                <video class="video_pc" loop="loop" autoplay="" playsinline="" muted="" data-keepplaying="" alt="Agence de communication et marketing dans le Val d’Oise">
                    <source type="video/mp4" src="img/blog1.mp4">
                </video>
                <h1 class="videotitle">Les Tournois Olympiques : Un Spectacle de Sport et de Détermination</h1>
            </span>
        </div>
    </main>
    
<main class="grid">
    <article>
        <img class="preview-image" src="img/rugby.jpg">
        <h1 class="entry-title">Rugby à 7 - Un Mélange de Vitesse et de Force</h1>
        <p class="entry-preview">
            Tournoi Masculin
            Le rugby à 7 est un sport dynamique et intense, et le tournoi masculin est l'un des événements les plus attendus des Jeux Olympiques. Les meilleures équipes du monde entier se réunissent pour s'affronter dans des matchs courts mais palpitants. Le rythme effréné du rugby à 7, associé à l'agilité et à la puissance des joueurs, garantit un spectacle captivant. Chaque essai peut faire la différence dans ces affrontements intenses, où les compétences individuelles et la stratégie d'équipe sont mises à l'épreuve. Ne manquez pas l'opportunité de voir les stars du rugby à 7 en action, lutter pour l'or olympique dans une ambiance électrique.&hellip; <a href="https://www.lamedecinedusport.com/sports/le-rugby-a-7-du-rugby-haut-debit/">Lire plus</a>
        </p>
    </article>
    <article>
        <img class="preview-image" src="img/CyclistRue.jpg">
        <h1 class="entry-title">Cyclisme sur Route - L'Épreuve d'Endurance Ultime</h1>
        <p class="entry-preview">
            La course de cyclisme sur route est l'une des épreuves les plus ardues des Jeux Olympiques. Les cyclistes doivent faire preuve d'une endurance exceptionnelle, d'une stratégie acérée et d'une volonté de fer pour parcourir des kilomètres sur des terrains variés. Des montées ardues aux descentes rapides, chaque segment de la course teste les limites physiques et mentales des participants. Les fans de cyclisme apprécieront la tactique d'équipe, les échappées audacieuses et les sprints finaux qui peuvent changer le cours de la compétition en un instant. Venez vivre l'excitation de cette épreuve mythique et encouragez les athlètes qui repoussent les frontières de l'exploit humain.&hellip; <a href="https://www.msn.com/fr-fr/sport/other/jo-2024-cyclisme-l-%C3%A9quatorien-richard-carapaz-%C3%A9cart%C3%A9-de-la-s%C3%A9lection-ne-d%C3%A9fendra-pas-son-titre-sur-route/ar-BB1n9qrS?ocid=feedsansarticle">Lire plus</a>
        </p>
    </article>
    <article>
        <img class="preview-image" src="img/bascket.jpg">
        <h1 class="entry-title">Basketball - La Quête de la Gloire</h1>
        <p class="entry-preview">
            L'impact de l'IA sera aussi massif que l'impact d'Internet et de la transformation numérique au cours des 30 dernières années. De plus, dans 30 ans, une génération numérique sera aux commandes de la politique, de l'économie, des affaires et du domaine social, habituée à obtenir des informations par le biais de canaux numériques. Si l'humanité parvient à établir des règles du jeu acceptables qui minimisent les risques associés à l'intelligence artificielle, chacun d'entre nous pourrait avoir un assistant numérique personnel sans lequel nous ne pourrions pas nous passer, tout comme nous ne pouvons actuellement pas nous passer de téléphone. &hellip; <a href="https://jo2024-paris.fr/basketball">Lire plus</a>
        </p>
    </article>
    <article>
        <img class="preview-image" src="img/footF.jpg">
        <h1 class="entry-title">Football - La Bataille pour la Suprématie</h1>
        <p class="entry-preview">
            Le tournoi de football aux Jeux Olympiques est un événement où chaque match est une véritable bataille pour la gloire. Les équipes, composées de jeunes talents et de stars établies, s'affrontent avec passion et détermination pour décrocher la médaille d'or. Chaque rencontre est remplie de moments de suspense, de stratégies élaborées et de performances individuelles exceptionnelles. Les fans peuvent s'attendre à des buts spectaculaires, des arrêts incroyables et des passes millimétrées. Ne manquez pas l'opportunité de vivre l'intensité et l'émotion du football olympique, où chaque match est une nouvelle page de l'histoire sportive qui s'écrit sous vos yeux. &hellip; <a href="https://www.ouest-france.fr/jeux-olympiques/jo-2024-football-la-liste-de-lespagne-sans-lamine-yamal-mais-avec-pau-cubarsi-et-fermin-lopez-380c86dc-33a7-11ef-8462-4d5d263c07bc">Lire plus</a>
        </p>
    </article>
    <article>
        <img class="preview-image" src="img/natationF.jpg">
        <h1 class="entry-title">Natation - La Grâce et la Puissance dans l'Eau</h1>
        <p class="entry-preview">
            100m Papillon
            La course de 100m papillon est l'une des épreuves les plus spectaculaires de la natation olympique. Les nageurs doivent faire preuve d'une technique impeccable et d'une puissance incroyable pour traverser la piscine à une vitesse fulgurante. Chaque mouvement compte, et les marges de victoire sont souvent très étroites. Les spectateurs peuvent s'attendre à une compétition féroce où les meilleurs nageurs du monde donneront tout pour décrocher l'or.
            200m Nage Libre
            Le 200m nage libre est une épreuve qui combine endurance et vitesse. Les nageurs doivent gérer leur énergie tout au long des quatre longueurs de piscine, ce qui en fait une course stratégique autant que physique. Les fans pourront voir des virages précis et des accélérations impressionnantes alors que les athlètes se battent pour la première place. C'est une épreuve où chaque seconde compte et où les champions se distinguent par leur détermination et leur technique raffinée.
            Relais 4x100m
            Le relais 4x100m est toujours un moment fort des compétitions de natation, mettant en valeur la cohésion d'équipe et la vitesse. Chaque nageur doit donner le meilleur de lui-même, car une seule erreur peut coûter la victoire à toute l'équipe. Les transitions rapides et les performances individuelles exceptionnelles sont au cœur de cette épreuve, offrant aux spectateurs un spectacle palpitant jusqu'à la dernière touche. C'est une course où l'esprit d'équipe et l'excellence individuelle se rencontrent pour créer des moments inoubliables.
            &hellip; <a href="https://www.nationalgeographic.fr/sciences/sante-sport-forme-physique-la-natation-une-activite-physique-aux-bienfaits-incomparables">Lire plus</a>
        </p>
    </article>
    <article>
        <img class="preview-image" src="img/footH.jpg">
        <h1 class="entry-title">Première Mi-Temps</h1>
        <p class="entry-preview">
            Le coup d'envoi est donné par l'Équipe A, qui commence immédiatement à imprimer un rythme rapide au match. Dès la 5e minute, l'attaquant vedette de l'Équipe A, connu pour sa vitesse fulgurante, réalise une percée spectaculaire, dribblant deux défenseurs avant de décocher une frappe puissante vers le but. Le gardien de l'Équipe B plonge de tout son long et parvient à détourner le ballon d'une main ferme, déclenchant les acclamations du public.
            L'Équipe B ne tarde pas à réagir. À la 15e minute, leur milieu de terrain orchestrateur effectue une passe millimétrée qui traverse la défense adverse, trouvant leur attaquant en position idéale. Ce dernier tente une volée audacieuse, mais le ballon s'écrase sur la barre transversale, laissant les supporters de l'Équipe B en haleine.
            À la 30e minute, l'Équipe A ouvre enfin le score. Sur un corner bien exécuté, le défenseur central s'élève au-dessus de tout le monde et place une tête imparable dans le coin supérieur du but. 1-0 pour l'Équipe A ! La foule est en délire. &hellip; <a href="https://rmcsport.bfmtv.com/replay-emissions/rothen-regale/fin-des-premieres-mi-temps-26-06_EN-202406260902.html">Lire plus</a>
        </p>
    </article>
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
<style>
    .icon-style {
        display: flex;
        justify-content: center;
        gap: 15px;
        font-size: 24px;
    }
</style>
<script src="script_img.js"></script>
<div class="cart-popup-overlay" id="cartPopup">
    <div class="cart-popup">
        <button class="close-btn" onclick="closePopup()"><p>×</p></button>
        <h2>Votre panier</h2>
        <div id="cartItems"></div>
        <button class="achats" onclick="closePopup()">Continuer vos achats</button>
        <a href="connexion.html">Se connecter pour vérifier plus rapidement.</a>
    </div>
</div>
<script>
    // JavaScript pour afficher et masquer la popup du panier
    document.getElementById('cart-icon-bubble').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('cartPopup').style.display = 'flex';
        displayCartItems(); // Afficher les articles du panier lorsque la popup s'ouvre
    });

    function closePopup() {
        document.getElementById('cartPopup').style.display = 'none';
    }

    window.onclick = function(event) {
        var popup = document.getElementById('cartPopup');
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }

    // Function to update wishlist count
    function updateWishlistCount() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        document.getElementById('wishlistCount').textContent = wishlist.length;
    }

    // Update wishlist count on page load
    document.addEventListener('DOMContentLoaded', updateWishlistCount);

    // Function to update cart count
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById('cartCount').textContent = cart.length;
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);

    // Function to display cart items
    function displayCartItems() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cartItems');
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Votre panier est vide.</p>';
            return;
        }

        cart.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('cart-item');
                itemElement.innerHTML = `
                    <img src="${item.image}" alt="Produit">
                    <div class="cart-item-info">
                        <p>${item.name}</p>
                        <p>Prix: ${item.price}€</p>
                        <p>Quantité: ${item.quantity}</p>
                    </div>
                    <button class="cart-item-remove" onclick="removeFromCart(${index})">Supprimer</button>
                `;
                cartItemsContainer.appendChild(itemElement);
            });
    }

    // Function to remove item from cart
    function removeFromCart(productName) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.name !== productName);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCartItems();
        updateCartCount();
    }

    // Function to add item to cart
    function addToCart() {
        const product = {
            image: document.getElementById('addToCart').getAttribute('data-img'),
            price: document.getElementById('addToCart').getAttribute('data-price'),
            quantity: document.getElementById('quantity').value,
            name: 'Produit' // Vous pouvez ajouter un autre attribut data pour le nom si nécessaire
        };
        let cart = localStorage.getItem('cart');
        cart = cart ? JSON.parse(cart) : [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Produit ajouté au panier!');

        // Mettre à jour le compteur du panier
        updateCartCount();
    }
</script>
<script>
    const menuHamburger = document.querySelector(".menu")
    const navLinks = document.querySelector(".navbar-left")

    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    })
</script>
</body>
</html>
