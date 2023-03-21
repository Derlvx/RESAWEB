// Button hide popup
document.querySelector('.popup__content .button--success').addEventListener('click', () => {
    cart.splice(0, cart.length);
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart();
    location.reload();
})

// Cart function

let request = new XMLHttpRequest();
request.open("GET", "./data.json", false);
request.send(null)
var product = JSON.parse(request.responseText);

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

const popCart = () => {
    if (cart.length > 0) {
        $("main .callout").html(`
        <div class="row">
        `);
        cart.forEach((item, i) => {
            $("main .callout .row").append(`
            <div class="card">
                    <section>
                    <img src="${product[item.id - 1].photo}" alt="${product[item.id - 1].name}">
                        <span>
                            <h4>${product[item.id - 1].name}</h4>
                            <p>${product[item.id - 1].rate}$</p>
                        </span>
                    </section>
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
                <button class="removeCartItem" onclick="removeCartItem(${item.id})">&times</button>
            </div>
            `);
        });
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
    else {
        $("main .callout").html(`
    <div class="alert">
        <p>Ooooppsss..... </p>
        <p>You have no items in cart</p>
    </div>
`);
    }
    cart.reduce((accu, item) => accu += item.qty, 0) < 1 ? $(".cartCount sup").css('background', '#a90202').text(cart.reduce((accu, item) => accu += item.qty, 0)) : $(".cartCount sup").css('background', '#5B7561').text(cart.reduce((accu, item) => accu += item.qty, 0));
}
popCart();

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

const removeCartItem = id => {
    getIndex(id) > -1 ? cart.splice(getIndex(id), 1) : '';
    localStorage.setItem('cart', JSON.stringify(cart));
    popCart();
}

const resetCart = () => {
    if (confirm("Empty cart ?")) {
        cart.splice(0, cart.length);
        localStorage.setItem('cart', JSON.stringify(cart));
        popCart();
    }
}

const Checkout = () => {
    const popupEl = document.querySelector(`.js_success-popup`);
    popupEl.classList.toggle('popup--visible');
    console.log('test')
}

// Function pour button de popup
// const addButtonTrigger = el => {
//     el.addEventListener('click', () => {
//             const popupEl = document.querySelector(`.${el.dataset.for}`);
//             popupEl.classList.toggle('popup--visible');
//             console.log('test')
//     });
// };

// Array.from(document.querySelectorAll('button[data-for]')).
//     forEach(addButtonTrigger);

