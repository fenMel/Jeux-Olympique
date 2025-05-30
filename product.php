<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>

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

    <style>
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f74545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #fc8d8d;
        }
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .popup.active {
            display: block;
        }
        .popup .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .popup form {
            display: flex;
            flex-direction: column;
        }
        .popup form label {
            margin-top: 10px;
        }
        .popup form input {
            padding: 8px;
            margin-top: 5px;
        }
        .popup form button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .popup form button:hover {
            background-color: #45a049;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .overlay.active {
            display: block;
        }
        
        .navbar {
            position: fixed;
        }

        .product-detail {
            display: flex;
            margin: 100px auto;
            width: 80%;
        }
        .product-detail img {
            width: 400px;
            height: auto;
        }
        .product-info {
            margin-left: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .product-info h2 {
            margin-bottom: 20px;
        }
        .product-info p {
            margin-bottom: 10px;
        }
        .product-info button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .product-info button:hover {
            background-color: #45a049;
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

        .achats{
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
        .cart-item-remove {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
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
        <h1 style="text-align: center; margin-top: 15%;">Reserver vous billets</h1>
    </div>
    <div class="product-detail">
        <img id="productImg" src="" alt="Produit">
        <div class="product-info">
            <h2 id="productTitle">Produit</h2>
            <p>Prix: <span id="productPrice">0.00</span></p>
            <label for="quantity" >Quantité:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10">
            <br>
            <button class="button" onclick="addToWishlist()" data-img="" data-price="">Ajouter aux Favoris</button>
            <br>
            <button id="addToCart" data-img="" data-price="" onclick="addToCart()">Ajouter au Panier</button>
            <br>

            <?php 
                $email = $_SESSION['email'];
                if(!empty( $email)){
                    echo ' <button  id="openPopup" >Payer maintenant</button>';
                }
            ?>
            <!-- <div id="overlay" class="overlay"></div> !-->

            <div id="popup" class="popup">
                <span class="close" id="closePopup">&times;</span>
                <h2>Formulaire de paiement</h2>
                <form action="payment_process.php" method="POST">
                    <input type="hidden" name="form_type" value="payment">
                    <label for="name">Nom du titulaire:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="cardNumber">Numéro de la carte:</label>
                    <input type="text" id="cardNumber" name="cardNumber" required>
                    <label for="expiryDate">Date d'expiration:</label>
                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/AA" required>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>
                    <button type="submit">Payer</button>
                </form>
            </div>

            
        </div>
    </div>

    <div class="main-content">
        <div uk-filter="target: .js-filter">
            <br><br>
            <h1 style=" margin-bottom: 10%;"> Evénement</h1>
            <ul class="uk-navbar-nav">
                <li class="uk-active" uk-filter-control><a href="#">All</a></li>
                <li uk-filter-control="[data-num='1']"><a href="#">FOOTBALL & NATATION</a></li>
                <li uk-filter-control="[data-num='2']"><a href="#">CYCLISTE & Course </a></li>
                <li uk-filter-control="[data-num='3']"><a href="#">RUGBY & Bascket </a></li>
            </ul>
            <ul class="img-gallery-container js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
                <li data-num="1">
                    <img src="img/natationF.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">70€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="70" data-img="img/natationF.jpg" onclick="openProductDetail('img/natationF.jpg', '70')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="1">
                    <img src="img/natation.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">60€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="60" data-img="img/natation.jpg" onclick="openProductDetail('img/natation.jpg', '60')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="1">
                    <img src="img/footF.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">80€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="80" data-img="img/footF.jpg" onclick="openProductDetail('img/footF.jpg', '80')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="2">
                    <img src="img/cyclistGroupe.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">75€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="75" data-img="img/cyclistGroupe.jpg" onclick="openProductDetail('img/cyclistGroupe.jpg', '75')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="2">
                    <img src="img/course.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">70€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="70" data-img="img/course.jpg" onclick="openProductDetail('img/course.jpg', '70')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="1">
                    <img src="img/footH.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">80€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="80" data-img="img/footH.jpg" onclick="openProductDetail('img/footH.jpg', '80')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="3">
                    <img src="img/rugby.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">60€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="60" data-img="img/rugby.jpg" onclick="openProductDetail('img/rugby.jpg', '60')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="3">
                    <img src="img/bascket.jpg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">50€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="50" data-img="img/bascket.jpg" onclick="openProductDetail('img/bascket.jpg', '50')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
                <li data-num="3">
                    <img src="img/R.jpeg" alt="" class="img-gal">
                    <div class="float-gallery-content">
                        <div class="content uk-text-left">
                            <span class="highlight uk-block">Acheter des billets</span>
                            <a href="#">60€</a>
                        </div>
                        <div class="content-btn">
                            <button type="button" class="openPopup" data-price="60" data-img="img/R.jpeg" onclick="openProductDetail('img/R.jpeg', '60')">
                                &#8594;
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function openProductDetail(img, price) {
            localStorage.setItem('productImg', img);
            localStorage.setItem('productPrice', price);
            window.location.href = 'product.php';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const price = localStorage.getItem('productPrice');
            const imgSrc = localStorage.getItem('productImg');
            if (price && imgSrc) {
                document.getElementById('productPrice').textContent = price + '€';
                document.getElementById('productImg').setAttribute('src', imgSrc);

                const addToWishlistButton = document.querySelector('.button[onclick="addToWishlist()"]');
                addToWishlistButton.setAttribute('data-img', imgSrc);
                addToWishlistButton.setAttribute('data-price', price);

                const addToCartButton = document.getElementById('addToCart');
                addToCartButton.setAttribute('data-img', imgSrc);
                addToCartButton.setAttribute('data-price', price);
            }

            // Mettre à jour les compteurs de favoris et de panier
            updateWishlistCount();
            updateCartCount();
        });

        function addToWishlist() {
            const product = {
                image: document.querySelector('.button[onclick="addToWishlist()"]').getAttribute('data-img'),
                price: document.querySelector('.button[onclick="addToWishlist()"]').getAttribute('data-price'),
                quantity: document.getElementById('quantity').value,
                name: 'Produit' // Vous pouvez ajouter un autre attribut data pour le nom si nécessaire
            };
            let wishlist = localStorage.getItem('wishlist');
            wishlist = wishlist ? JSON.parse(wishlist) : [];
            wishlist.push(product);
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            alert('Produit ajouté aux favoris!');

            // Mettre à jour le compteur de favoris
            updateWishlistCount();
        }

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

        function updateWishlistCount() {
            let wishlist = localStorage.getItem('wishlist');
            wishlist = wishlist ? JSON.parse(wishlist) : [];
            const wishlistCountElement = document.getElementById('wishlistCount');
            wishlistCountElement.textContent = wishlist.length;
        }

        function updateCartCount() {
            let cart = localStorage.getItem('cart');
            cart = cart ? JSON.parse(cart) : [];
            const cartCountElement = document.getElementById('cartCount');
            cartCountElement.textContent = cart.length;
        }

        const openPopupButton = document.getElementById('openPopup');
        const closePopupButton = document.getElementById('closePopup');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const paymentForm = document.getElementById('paymentForm');

        openPopupButton.addEventListener('click', () => {
            popup.classList.add('active');
            overlay.classList.add('active');
        });

        closePopupButton.addEventListener('click', () => {
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click', () => {
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });

        paymentForm.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('Paiement effectué avec succès!');
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
    
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

    <div class="cart-popup-overlay" id="cartPopup">
        <div class="cart-popup">
            <button class="close-btn" onclick="closeCartPopup()"><p>×</p></button>
            <h2>Votre panier</h2>
            <div id="cartItems"></div>
            <button class="achats" onclick="closeCartPopup()">Continuer vos achats</button>
            <a href="connexion.html">Se connecter pour vérifier plus rapidement.</a>
        </div>
    </div>

    <script>
        document.getElementById('cart-icon-bubble').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('cartPopup').style.display = 'flex';
            displayCartItems();
        });

        function closeCartPopup() {
            document.getElementById('cartPopup').style.display = 'none';
        }

        window.onclick = function(event) {
            var popup = document.getElementById('cartPopup');
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        }

        function displayCartItems() {
            let cart = localStorage.getItem('cart');
            cart = cart ? JSON.parse(cart) : [];
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

        function removeFromCart(index) {
            let cart = localStorage.getItem('cart');
            cart = cart ? JSON.parse(cart) : [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCartItems();
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
