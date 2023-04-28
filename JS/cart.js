// Button de réussite après Checkout
document.querySelector('.popup__content .button--success').addEventListener('click', () => {
    cart.splice(0, cart.length);
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart(); // Remise a 0 du panier ( avec les deux lignes au dessus)
    location.reload();
})

// Connexion du JSON pour le panier
let request = new XMLHttpRequest();
request.open("GET", "./JS/data.json", false);
request.send(null);
var product = JSON.parse(request.responseText);

// Affichage des produits contenu dans le JSON sous la forme HTML
product.forEach((item, i) => {
    $('main .container').append(`
    <div class="card">
        <div class="imgContainer" style="background-image : url(${item.photo})" alt="${item.name}"></div>
        <section>
            <h4>${item.name}</h4>
            <p>${item.description}</p>
        </section>
        <p class="itemPrice">${item.rate}<span>$</span></p>
        <button class="addToCart" onclick="addToCart(${item.id})">+</button>
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
                    <img src="${product[item.id - 1].photo}" alt="${product[item.id - 1].name}">
                        <span>
                            <h4>${product[item.id - 1].name}</h4>
                            <p>${product[item.id - 1].rate}$</p>
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
                        ${item.qty * product[item.id - 1].rate}$
                        </p>
                        </section>
                    </section>
                <button class="removeCartItem" onclick="removeCartItem(${item.id})">&times</button>
            </div>
            `);
        });
        // Partie basse du panier
        var popupBillAmount = cart.reduce((accu, item, i) => accu += item.qty * product[item.id - 1].rate, 0);
        document.getElementById('popupBillAmount').innerHTML = popupBillAmount + "$";
        $("main .callout").append(`
        </div>
        <div class="row">
            <section>
                    <h4>Total Bill :</h4>
                    <p class="billAmount">${cart.reduce((accu, item, i) => accu += item.qty * product[item.id - 1].rate, 0)}$</p>
            </section>
            <section>
                <button class="resetCart" onclick="resetCart()"><p>Clear</p></button>
                <button class="Checkout button--success" data-for="js_success-popup" onclick="Checkout()"><p>Checkout</p></button>
            </section>
        </div>
    `);

    }
    else { // Sinon affichage d'un message d'erreur
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
    const popupEl = document.querySelector(`.js_success-popup`);
    popupEl.classList.toggle('popup--visible');
    document.querySelector('.popup .formViewer').classList.toggle('hide')
    document.querySelector('.popup .formViewer').classList.toggle('show')
    document.querySelector('.callout').classList.toggle('open')
    document.querySelector('body').classList.toggle('overflow')
    // console.log('test')
}

$('#formClose').click(function () {
    const popupEl = document.querySelector(`.js_success-popup`);
    popupEl.classList.toggle('popup--visible');
    document.querySelector('.popup .formViewer').classList.toggle('hide')
    document.querySelector('.popup .formViewer').classList.toggle('show')
    document.querySelector('.callout').classList.toggle('open')
    document.querySelector('body').classList.toggle('overflow')
});

$('.container .full-rounded').click(function(){
    document.querySelector('.popup .formViewer').classList.toggle('hide')
    document.querySelector('.popup .formViewer').classList.toggle('show')
    document.querySelector('.popup__content').classList.toggle('hide')
    document.querySelector('.popup__content').classList.toggle('show')
});

