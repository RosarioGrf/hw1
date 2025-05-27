function onCartResponse(response) {
    return response.json();
}

function onCartJson(json) {

    const tbody = document.getElementById('cart-products');
    const totalElem = document.getElementById('cart-total');
    tbody.innerHTML = '';
    let totale = 0;

    if (!json.success || !json.cartItems || json.cartItems.length === 0) {
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.colSpan = 5;
        td.style.textAlign = 'center';
        td.textContent = 'Il tuo carrello è vuoto.';
        tr.appendChild(td);
        tbody.appendChild(tr);
        if (totalElem) totalElem.textContent = '0.00 €';
        return;
    }

    json.cartItems.forEach(item => {
        totale += item.prezzo * item.quantity;
        const tr = document.createElement('tr');


        const tdProdotto = document.createElement('td');
        const img = document.createElement('img');
        img.src = item.immagine;
        img.alt = item.nome_prodotto;
        const pNome = document.createElement('p');
        pNome.textContent = item.nome_prodotto;
        tdProdotto.appendChild(img);
        tdProdotto.appendChild(pNome);


        const tdPrezzo = document.createElement('td');
        tdPrezzo.textContent = Number(item.prezzo).toFixed(2) + ' €';


        const tdQuantita = document.createElement('td');
        const spanQuantita = document.createElement('span');
        spanQuantita.className = 'cart-quantity';
        spanQuantita.textContent = item.quantity;
        tdQuantita.appendChild(spanQuantita);


        const tdTotale = document.createElement('td');
        tdTotale.textContent = Number(item.prezzo * item.quantity).toFixed(2) + ' €';


        const tdAzioni = document.createElement('td');
        const divAzioni = document.createElement('div');
        divAzioni.className = 'quantity-controls';

        const btnRemove = document.createElement('button');
        btnRemove.className = 'remove-item-btn';
        btnRemove.setAttribute('data-cart-id', item.idcart);
        btnRemove.textContent = '-';

        const btnAdd = document.createElement('button');
        btnAdd.className = 'add-to-cart-btn';
        btnAdd.setAttribute('data-product-id', item.product_id);
        btnAdd.textContent = '+';

        divAzioni.appendChild(btnRemove);
        divAzioni.appendChild(btnAdd);
        tdAzioni.appendChild(divAzioni);


        tr.appendChild(tdProdotto);
        tr.appendChild(tdPrezzo);
        tr.appendChild(tdQuantita);
        tr.appendChild(tdTotale);
        tr.appendChild(tdAzioni);

        tbody.appendChild(tr);

        btnAdd.addEventListener('click', function() {
            fetch('api/add_to_cart.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    prodotto_id: item.product_id,
                    quantity: 1
                })
            })
            .then(onCartResponse)
            .then(() => aggiornaCarrello());
        });

        btnRemove.addEventListener('click', function() {
            fetch('api/remove_from_cart.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    cart_id: item.idcart
                })
            })
            .then(onCartResponse)
            .then(() => aggiornaCarrello());
        });
    });

    if (totalElem) totalElem.textContent = totale.toFixed(2) + ' €';
}

function aggiornaCarrello() {
    fetch('api/get_cart.php')
        .then(onCartResponse)
        .then(onCartJson);
}

aggiornaCarrello();