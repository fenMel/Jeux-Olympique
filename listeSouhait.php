<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Liste de souhaits</title>
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
        .wishlist_page {
            padding: 20px;
        }
        .wishlist__block-empty {
            text-align: center;
            margin-top: 50px;
        }
        .wishlist__block-empty .empty-icon {
            font-size: 100px;
            color: #C8102E;
            display: block;
            margin: 0 auto;
            width: 50px;
            height: 50px;
        }
        .wishlist__block-empty .h5 {
            margin-top: 20%;
            margin-bottom: 20%;
            font-size: 18px;
        }
        .wishlist__block-empty .button {
            margin-top: 100px;
            padding: 10px 20px;
            background-color: #C8102E;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .wishlist__block-empty .button:hover {
            background-color: #a90c26;
        }
        .wishlist-products {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .wishlist-product {
            width: 60%;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .wishlist-product img {
            width: 20%;
            margin-right: 20px;
        }
        .wishlist-product h3, 
        .wishlist-product p, 
        .wishlist-product button {
            margin: 0 20px; /* Add margin to each item */
        }
        .remove-btn {
            background: none;
            border: 1px solid red;
            color: red;
            font-size: 14px;
            cursor: pointer;
            border-radius: 12px;
            padding: 5px 10px;
        }
        h1 {
            text-align: center;
            margin-top: 5%;
        }
        .button {
            margin-top: 50%;
            margin-bottom: 50%;
        }
        h5 {
            margin-bottom: 30%;
        }
        svg {
            overflow: visible;
        }
        svg path#line {
            fill: none;
            stroke: #e00000;
            stroke-width: 2;
            stroke-linecap: butt;
            stroke-linejoin: round;
            stroke-miterlimit: 4;
            stroke-dasharray: none;
            stroke-opacity: 1;
            stroke-dasharray: 1;
            stroke-dashoffset: 1;
            animation: dash 4s linear infinite;
        }
        svg path#heart {
            transform-origin: 50% 50%;
            animation: blink 4s linear infinite;
        }
        @keyframes dash {
            0% {
                stroke-dashoffset: 1;
            }
            80% {
                stroke-dashoffset: 0;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes blink {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            60% {
                opacity: 0;
                transform: scale(0);
            }
            70% {
                opacity: 1;
                transform: scale(1.2);
            }
            75% {
                opacity: 1;
                transform: scale(1.0);
            }
            80% {
                opacity: 1;
                transform: scale(1.2);
            }
            85% {
                opacity: 1;
                transform: scale(1.0);
            }
            100% {
                opacity: 0;
                transform: scale(1.0);
            }
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
        .cart-popup {
            background-color: white;
            width: 500px;
            height: 100%;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
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
    <div class="page-width wishlist_page wishlist-empty" template-wishlist-page-js="">
        <h1 class="section_heading center">Liste de souhaits</h1>
        <div class="product-grid-container mt-3 mt-md-5" id="ProductGridContainer">
            <div class="wishlist__block-empty">
                <span class="empty-icon" style="margin-bottom: 5%;">
                    <svg width="50" height="50" class="icon icon-heart" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21.6501C11.69 21.6501 11.39 21.6101 11.14 21.5201C7.32 20.2101 1.25 15.5601 1.25 8.6901C1.25 5.1901 4.08 2.3501 7.56 2.3501C9.25 2.3501 10.83 3.0101 12 4.1901C13.17 3.0101 14.75 2.3501 16.44 2.3501C19.92 2.3501 22.75 5.2001 22.75 8.6901C22.75 15.5701 16.68 20.2101 12.86 21.5201C12.61 21.6101 12.31 21.6501 12 21.6501ZM7.56 3.8501C4.91 3.8501 2.75 6.0201 2.75 8.6901C2.75 15.5201 9.32 19.3201 11.63 20.1101C11.81 20.1701 12.2 20.1701 12.38 20.1101C14.68 19.3201 21.26 15.5301 21.26 8.6901C21.26 6.0201 19.1 3.8501 16.45 3.8501C14.93 3.8501 13.52 4.5601 12.61 5.7901C12.33 6.1701 11.69 6.1701 11.41 5.7901C10.48 4.5501 9.08 3.8501 7.56 3.8501Z" fill="currentColor"></path>
                    </svg> 
                </span>
                <span class="h5" style="margin-bottom: 20%;">Aucun produit ajouté à la liste de souhaits</span> <br> <br><br>
                <a href="index.php" class="button button--primary mt-3" >Continuer vos achats</a>
            </div>
            <div data-id="template--15268529340521__main" class="grid grid--2-col-tablet-down grid--4-col-desktop loaded" template-wishlist-js=""></div>
        </div>
    </div>
    <div id="wishlistProducts" class="wishlist-products"></div>
    <div class="cart-popup-overlay" id="cartPopup">
        <div class="cart-popup">
            <button class="close-btn" onclick="closePopup()"><p>×</p></button>
            <h2>Votre panier</h2>
            <div id="cartItems"></div>
            <button class="achats" onclick="closePopup()">Continuer vos achats</button>
            <a href="connexion.html">Se connecter pour vérifier plus rapidement.</a>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" id="svg5" version="1.1" viewBox="0 0 502.98 108.61" >
        <path id="heart" d="M213.35 29.43c19.41-15.19 33.68 10.86 37.73 18.82-.28-13.61 11.64-40.98 25.94-34.01 32.3 15.74-15.88 83.8-26.4 81.76-13.24-9-51.35-53.3-37.27-66.57Z" style="fill:#ff9999;stroke:#ff9999;stroke-width:1.5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"/>
        <path  pathLength="1" id="line" d="M5.32 78.13c.96-.01 5-8.5 5.54-8.54.58-.05 6.1 8.51 7.1 8.51 3.66 0 9.29.06 10.71.05 2.53-.01 4.82-72.88 4.82-72.88l4.76 97.28 3.97-24.45 20.45-.22C64 77.86 77.1 63.66 78.36 63.8c1.31.15 6.68 14.08 7.94 14.07 2.3-.03 33.32.04 35.76.02.96 0 5-8.5 5.53-8.53.59-.05 6.1 8.51 7.1 8.5 3.66 0 9.3.07 10.72.06 2.53-.02 4.81-72.89 4.81-72.89l4.77 97.28 3.97-24.44s83.34-3.33 74.69 7.67c-8.65 11-45.3-42.94-31.65-53.58 25.6-19.96 49.96 36.94 40.26 36.5-12.2-.53 1.8-62.32 23.41-51.7 32.24 15.86-17.56 84.92-26.4 81.77-5.73-2.05-.68-21.68 31.4-26.58 26.65-6.42 29.5 2.35 52.62 7.11 2.53-.02 4.82-72.89 4.82-72.89l4.76 97.28 3.97-24.44 20.45-.23c1.31-.02 14.41-14.22 15.68-14.07 1.32.15 6.7 14.08 7.95 14.07 2.29-.03 33.32.04 35.76.02.95 0 5-8.5 5.53-8.54.58-.04 6.1 8.52 7.1 8.52 3.66 0 9.3.06 10.72.05 2.53-.02 4.81-72.89 4.81-72.89l4.77 97.28 3.97-24.44 20.45-.23c1.31-.01 14.41-14.22 15.68-14.07 1.32.16 6.69 14.09 7.94 14.07" />
      </svg>
</body>
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

<script>
   // Variable globale pour suivre le nombre de favoris
   let wishlistCount = 0;

   function updateWishlistCount() {
       // Mettre à jour l'affichage du nombre de favoris
       document.getElementById('wishlistCount').textContent = wishlistCount;
       localStorage.setItem('wishlistCount', wishlistCount); // Enregistrer dans localStorage
   }

   function addToWishlist() {
       const product = {
           image: localStorage.getItem('productImg'),
           name: 'Produit',
           price: localStorage.getItem('productPrice'),
           quantity: document.getElementById('quantity').value
       };
       let wishlist = localStorage.getItem('wishlist');
       wishlist = wishlist ? JSON.parse(wishlist) : [];
       wishlist.push(product);
       localStorage.setItem('wishlist', JSON.stringify(wishlist));

       // Incrémenter le compteur de favoris
       wishlistCount++;
       updateWishlistCount();

       alert('Produit ajouté aux favoris!');
   }

   function displayWishlist() {
       let wishlist = localStorage.getItem('wishlist');
       wishlist = wishlist ? JSON.parse(wishlist) : [];
       const wishlistProductsContainer = document.getElementById('wishlistProducts');
       wishlistProductsContainer.innerHTML = '';
       if (wishlist.length > 0) {
           wishlist.forEach((product, index) => {
               const productDiv = document.createElement('div');
               productDiv.className = 'wishlist-product';
               productDiv.innerHTML = `
                   <img src="${product.image}" alt="${product.name}">
                   <h3>${product.name}</h3>
                   <p>Prix: ${product.price}€</p>
                   <p>Quantité: ${product.quantity}</p>
                   <button class="remove-btn" onclick="removeFromWishlist(${index})">Supprimer</button>
               `;
               wishlistProductsContainer.appendChild(productDiv);
           });
           document.querySelector('.wishlist__block-empty').style.display = 'none';
       } else {
           document.querySelector('.wishlist__block-empty').style.display = 'block';
       }
   }

   function removeFromWishlist(index) {
       let wishlist = localStorage.getItem('wishlist');
       wishlist = wishlist ? JSON.parse(wishlist) : [];
       wishlist.splice(index, 1);
       localStorage.setItem('wishlist', JSON.stringify(wishlist));

       // Décrémenter le compteur de favoris
       wishlistCount--;
       updateWishlistCount();

       displayWishlist();
   }

   // Initialiser le compteur de favoris depuis localStorage
   document.addEventListener('DOMContentLoaded', () => {
       const wishlist = localStorage.getItem('wishlist');
       wishlistCount = wishlist ? JSON.parse(wishlist).length : 0;
       updateWishlistCount();
   });

   // Exécuter la fonction displayWishlist lorsque la page est chargée
   window.onload = displayWishlist;

</script>

<script>
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

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        document.getElementById('cartCount').textContent = cart.length;
    }

    document.addEventListener('DOMContentLoaded', updateCartCount);

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
            itemElement.className = 'cart-item';
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

    function addToCart() {
        const product = {
            image: document.getElementById('addToCart').getAttribute('data-img'),
            price: document.getElementById('addToCart').getAttribute('data-price'),
            quantity: document.getElementById('quantity').value,
            name: 'Produit'
        };
        let cart = localStorage.getItem('cart');
        cart = cart ? JSON.parse(cart) : [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Produit ajouté au panier!');

        updateCartCount();
    }

    function removeFromCart(index) {
        let cart = localStorage.getItem('cart');
        cart = cart ? JSON.parse(cart) : [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));

        updateCartCount();
        displayCartItems();
    }
</script>
<script>
    const menuHamburger = document.querySelector(".menu")
    const navLinks = document.querySelector(".navbar-left")

    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    })
</script>
</html>
