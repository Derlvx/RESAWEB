// Button de réussite après Checkout
document.querySelector('#extra_form').addEventListener('submit', () => {
    cart.splice(0, cart.length);
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart(); // Remise a 0 du panier ( avec les deux lignes au dessus )
    location.reload();
})

// Connexion des JSON pour le panier

// Le premier JSON sert au panier pour qu'il dispose de tout les items a afficher quoi qu'il arrive
let request = new XMLHttpRequest();
request.open("GET", "./JS/start.json", false);
request.send(null);
var product = JSON.parse(request.responseText);

// Le deuxieme JSON sert a afficher selon les filtres les différents objets
let request2 = new XMLHttpRequest();
request2.open("GET", "./JS/data.json", false);
request2.setRequestHeader('Cache-Control', 'no-cache, no-store, max-age=0');
request2.setRequestHeader('Expires', 'Thu, 1 Jan 1970 00:00:00 GMT');
request2.setRequestHeader('Pragma', 'no-cache');
request2.send(null);
var product2 = JSON.parse(request2.responseText);

// Affichage des produits contenu dans le JSON sous la forme HTML
product2.forEach((item, i) => {
    $('main .container').append(`
    <div class="card">
        <div class="imgContainer" style="background-image : url(${item.photo})" alt="${item.name}"></div>
        <section>
            <h4>${item.name}</h4>
            <p>${item.description}</p>
        </section>
        <h4 class="itemPrice">${item.rate}<span>$</span></h4>
        <button class="addToCart" aria-label="Add to Cart" onclick="addToCart(${item.id})">+</button>
    </div>
    `);
})

let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

const getIndex = id => cart.indexOf(cart.find(item => item.id === id));

// Style du pop up panier
const popCart = () => {
    if (cart.length > 0) {
        $("main .callout").html(`
        <div class="row">
        `);
        cart.forEach((item, i) => {
            $("main .callout .row").append(`
            <div class="card">
                    <section class="card_left">
                    <img src="${product.filter(id => id.id == item.id)[0].photo}" alt="${product.filter(id => id.id == item.id)[0].photo.name}">
                        <span>
                            <h4>${product.filter(id => id.id == item.id)[0].name}</h4>
                            <p>${product.filter(id => id.id == item.id)[0].rate}$</p>
                        </span>
                    </section>

                    <section class="card_right">
                        <section>
                            <p class="calloutSubtext">
                                QTY
                            </p>
                            <p>
                            ${item.qty}
                            </p>
                        </section>
                        <section>
                        <p class="calloutSubtext">
                        TOTAL
                        </p>
                        <p>
                        ${item.qty * product.filter(id => id.id == item.id)[0].rate}$
                        </p>
                        </section>
                    </section>
                <button class="removeCartItem" aria-label="Remove from Cart" onclick="removeCartItem(${item.id})">&times</button>
            </div>
            `);
        });
        // Partie basse du panier
        var popupBillAmount = cart.reduce((accu, item, i) => accu += item.qty * product.filter(id => id.id == item.id)[0].rate, 0);
        document.getElementById('popupBillAmount').innerHTML = popupBillAmount + "$";
        $("main .callout").append(`
        </div>
        <div class="row">
            <section>
                    <h4>Total Bill :</h4>
                    <p class="billAmount">${cart.reduce((accu, item, i) => accu += item.qty * product.filter(id => id.id == item.id)[0].rate, 0)}$</p>
            </section>
            <section>
                <button class="resetCart" aria-label="Clear Cart" onclick="resetCart()"><p>Clear</p></button>
                <button class="Checkout button--success" aria-label="Checkout" data-for="js_success-popup" onclick="Checkout()"><p>Checkout</p></button>
            </section>
        </div>
    `);

    }
    else { // Si panier vide affichage du message d'erreur
        $("main .callout").html(`
    <div class="alert">
        <p>Ooooppsss..... </p>
        <p>You have no items in cart</p>
    </div>
`);
    }
    // Definition du "sup" indiquant le nombre d'objet dans le panier
    cart.reduce((accu, item) => accu += item.qty, 0) < 1 ? $(".cartCount sup").css('background', '#a90202').text(cart.reduce((accu, item) => accu += item.qty, 0)) : $(".cartCount sup").css('background', '#5B7561').text(cart.reduce((accu, item) => accu += item.qty, 0));
}
popCart();

// Fonction pour ajouter dans le panier
const addToCart = id => {
    if (cart.length > 0) {
        getIndex(id) > -1 ? cart[getIndex(id)].qty += 1 : cart.push({ id, qty: 1 });
    }
    else {
        cart.push({ id, qty: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart();
}

// Fonction pour retirer du panier
const removeCartItem = id => {
    getIndex(id) > -1 ? cart.splice(getIndex(id), 1) : '';
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart();
}

// Fonction pour Vider le panier
const resetCart = () => {
    if (confirm("Empty cart ?")) {
        cart.splice(0, cart.length);
        localStorage.setItem('cart', JSON.stringify(cart));
        popCart();
    }
}

// Fonction pour sortir du panier
const Checkout = () => {
    $(window).scrollTop(0);
    const popupEl = document.querySelector(`.js_success-popup`);
    popupEl.classList.toggle('popup--visible');
    document.querySelector('.popup .formViewer').classList.toggle('hide')
    document.querySelector('.popup .formViewer').classList.toggle('show')
    document.querySelector('.callout').classList.toggle('open')
    document.querySelector('body').classList.toggle('overflow')
    // console.log('test')
}

// Affichage du Form checkout
$('#formClose').click(function () {
    const popupEl = document.querySelector(`.js_success-popup`);
    popupEl.classList.toggle('popup--visible');
    document.querySelector('.popup .formViewer').classList.toggle('hide')
    document.querySelector('.popup .formViewer').classList.toggle('show')
    document.querySelector('.callout').classList.toggle('open')
    document.querySelector('body').classList.toggle('overflow')
});

// Au click sur le bouton "send", récupération et insertion des données dans l'attribut action du form
$('.container .full-rounded').click(function () {
    var my_array = cart;
    jsonString = JSON.stringify(my_array);
    var totalCart = document.getElementById("popupBillAmount").innerHTML;
    totalCart = totalCart.substring(0, totalCart.length - 1);
    var url = "insert_extra.php?my_json=" + jsonString + "&total=" + totalCart;
    console.log(url);
    document.querySelector('#extra_form').action = url;
});


