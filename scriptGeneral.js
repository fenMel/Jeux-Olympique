document.addEventListener("DOMContentLoaded", function() {
    checkUserLoggedIn().then(function(isLoggedIn) {
        var accountLink = document.getElementById('account-link');
        var userMenu = document.getElementById('user-menu');

        if (isLoggedIn) {
            accountLink.style.display = 'none';
            userMenu.classList.add('show');
        }
    });
});

async function checkUserLoggedIn() {
    try {
        let response = await fetch('/api/check-session', {
            method: 'GET',
            credentials: 'include' // Assure que les cookies sont envoyés
        });
        if (response.ok) {
            let result = await response.json();
            return result.isLoggedIn; // Suppose que le serveur renvoie un objet { isLoggedIn: true/false }
        }
    } catch (error) {
        console.error('Error checking user session:', error);
    }
    return false;
}
function openProductDetail(img, price) {
    localStorage.setItem('productImg', img);
    localStorage.setItem('productPrice', price);
    window.location.href = 'product.html';
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
// JavaScript pour afficher et masquer la popup du panier
document.getElementById('cart-icon-bubble').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('cartPopup').style.display = 'flex';
    displayCartItems(); // Afficher les articles du panier lorsque la popup s'ouvre
});

function closePopup() {
    document.getElementById('cartPopup').style.display = 'none';
}

window.onclick = function (event) {
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
function removeFromCart(index) {
    let cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];
    cart.splice(index, 1);
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

const menuHamburger = document.querySelector(".menu")
const navLinks = document.querySelector(".navbar-left")

menuHamburger.addEventListener('click', () => {
    navLinks.classList.toggle('mobile-menu')
})