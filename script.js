document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function() {
        // Retirer la classe active de tous les éléments
        document.querySelectorAll('.nav-item').forEach(el => {
            el.classList.remove('active');
        });
        // Ajouter la classe active à l'élément cliqué
        this.classList.add('active');
        
        // Retirer la classe active-red de tous les liens
        document.querySelectorAll('.nav-link').forEach(el => {
            el.classList.remove('active-red');
        });
        // Ajouter active-LINE au lien cliqué
        this.querySelector('.nav-link').classList.add('active-red');
    });
});

// NOS PRODUITS SECTION

let cart = [];
let totalPrice = 0;
let totalItems = 0;

const cartCount = document.getElementById("cart-count");
const cartTotal = document.getElementById("cart-total");
const addCartButtons = document.querySelectorAll(".add-cart");
const cartItems = document.getElementById("cart-items");

addCartButtons.forEach(button => {

    button.addEventListener("click", function(e){

        e.preventDefault();

        const productName = this.dataset.name;
        const productPrice = Number(this.dataset.price);

        // Chercher si le produit existe déjà
        const existingProduct = cart.find(item => item.name === productName);

        if (existingProduct) {

            existingProduct.quantity++;

        } else {

        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1
        });

        }

        totalItems++;
        cartCount.textContent = totalItems;

        totalPrice += productPrice;
        cartTotal.textContent = totalPrice + " DH";

        console.log(cart);
        console.log("Total :", totalPrice);

        displayCart();

    });

});

function displayCart() {

    cartItems.innerHTML = "";

    cart.forEach((item, index) => {

        cartItems.innerHTML += `
            <div class="cart-card">

                <div class="card-body">

                    <h5>${item.name}</h5>

                    <p class="mb-1">
                        Prix : <strong>${item.price} DH</strong>
                    </p>

                    <div class="d-flex align-items-center gap-2 mb-3">

                        <button class="btn btn-outline-danger btn-sm decrease" data-index="${index}">−</button>
                        <span>${item.quantity}</span>

                        <button class="btn btn-outline-success btn-sm increase" data-index="${index}">+</button>

                    </div>

                    <button class="btn btn-danger btn-sm remove-item"
                            data-index="${index}">
                        Supprimer
                    </button>

                </div>

            </div>
        `;

    });

    removeItem();
    increaseQuantity();
    decreaseQuantity();
}
function removeItem() {

    const removeButtons = document.querySelectorAll(".remove-item");

    removeButtons.forEach(button => {

        button.addEventListener("click", function () {

            const index = this.dataset.index;

            totalPrice -= cart[index].price * cart[index].quantity;
            totalItems -= cart[index].quantity;

            cart.splice(index, 1);

            cartCount.textContent = totalItems;
            cartTotal.textContent = totalPrice + " DH";

            displayCart();

        });

    });

}

function increaseQuantity() {

    const buttons = document.querySelectorAll(".increase");

    buttons.forEach(button => {

        button.addEventListener("click", function () {

            const index = this.dataset.index;

            cart[index].quantity++;

            totalItems++;
            totalPrice += cart[index].price;

            cartCount.textContent = totalItems;
            cartTotal.textContent = totalPrice + " DH";

            displayCart();

        });

    });

}

function decreaseQuantity() {

    const buttons = document.querySelectorAll(".decrease");

    buttons.forEach(button => {

        button.addEventListener("click", function () {

            const index = this.dataset.index;

            if (cart[index].quantity > 1) {

                cart[index].quantity--;

                totalItems--;
                totalPrice -= cart[index].price;

            } else {

                totalItems--;
                totalPrice -= cart[index].price;

                cart.splice(index,1);

            }

            cartCount.textContent = totalItems;
            cartTotal.textContent = totalPrice + " DH";

            displayCart();

        });

    });

}