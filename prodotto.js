function onProdottoResponse(response) {
    return response.json();
}

function onProdottoJson(prodotto) {
    const detailsDiv = document.getElementById('prodotto-details');
    detailsDiv.innerHTML = '';

    if (prodotto.error) {
        detailsDiv.textContent = prodotto.error;
        return;
    }

    const dettagliProdotto = document.createElement('div');
    dettagliProdotto.className = 'dettagli-prodotto';

    const immagineProdottoDiv = document.createElement('div');
    immagineProdottoDiv.className = 'immagine-prodotto';
    immagineProdottoDiv.style.backgroundImage = `url('${prodotto.immagine_sfondo}')`;
    immagineProdottoDiv.style.backgroundSize = 'cover';
    immagineProdottoDiv.style.backgroundPosition = 'center';

    const img = document.createElement('img');
    img.src = prodotto.immagine;
    img.alt = prodotto.nome_prodotto;
    immagineProdottoDiv.appendChild(img);

    const descrizioneDiv = document.createElement('div');
    descrizioneDiv.className = 'descrizione-prodotto';

    const h1 = document.createElement('h1');
    h1.textContent = prodotto.nome_prodotto;
    descrizioneDiv.appendChild(h1);

    const h2 = document.createElement('h2');
    h2.textContent = prodotto.descrizione;
    descrizioneDiv.appendChild(h2);

    const h3_2 = document.createElement('h3');
    h3_2.className = 'caratteristiche_left';
    h3_2.innerHTML = 'Caratteristiche:<br>' + (prodotto.descrizione2 || '');
    descrizioneDiv.appendChild(h3_2);

    const h3_3 = document.createElement('h3');
    h3_3.className = 'caratteristiche_right';
    h3_3.textContent = prodotto.descrizione3 || '';
    descrizioneDiv.appendChild(h3_3);

    const h3_4 = document.createElement('h3');
    h3_4.className = 'caratteristiche_left';
    h3_4.textContent = prodotto.descrizione4 || '';
    descrizioneDiv.appendChild(h3_4);

    const prezzoDiv = document.createElement('div');
    prezzoDiv.className = 'prezzo';
    const strong = document.createElement('strong');
    const prezzoSpan = document.createElement('span');
    prezzoSpan.textContent = Number(prodotto.prezzo).toFixed(2) + ' €';
    strong.appendChild(prezzoSpan);
    prezzoDiv.appendChild(strong);
    descrizioneDiv.appendChild(prezzoDiv);

    const addToCartDiv = document.createElement('div');
    addToCartDiv.className = 'add-to-cart';

    const btnRemove = document.createElement('button');
    btnRemove.className = 'remove-item-btn';
    btnRemove.setAttribute('data-cart-id', prodotto.idcart || '');
    btnRemove.textContent = ' - ';
    if (!prodotto.cart_quantity) btnRemove.disabled = true;

    const spanQuantity = document.createElement('span');
    spanQuantity.className = 'cart-quantity';
    spanQuantity.textContent = prodotto.cart_quantity || 0;

    const btnAdd = document.createElement('button');
    btnAdd.className = 'add-to-cart-btn';
    btnAdd.setAttribute('data-product-id', prodotto.id);
    btnAdd.textContent = ' + ';

    addToCartDiv.appendChild(btnRemove);
    addToCartDiv.appendChild(spanQuantity);
    addToCartDiv.appendChild(btnAdd);

    descrizioneDiv.appendChild(addToCartDiv);

    dettagliProdotto.appendChild(immagineProdottoDiv);
    dettagliProdotto.appendChild(descrizioneDiv);

    detailsDiv.appendChild(dettagliProdotto);

    btnAdd.addEventListener('click', aggiungiAlCarrello);
    btnRemove.addEventListener('click', removeFromCart);
}

function onProdottoError() {
    const detailsDiv = document.getElementById('prodotto-details');
    detailsDiv.innerHTML = "<p>Errore nel caricamento del prodotto.</p>";
}

function popolaProdotto() {
    const detailsDiv = document.getElementById('prodotto-details');
    const productId = detailsDiv.getAttribute('data-product-id');
    if (!productId) {
        detailsDiv.innerHTML = "<p>Prodotto non trovato.</p>";
        return;
    }

    fetch('api/get_prodotto.php?id=' + encodeURIComponent(productId))
        .then(onProdottoResponse)
        .then(onProdottoJson)
        .catch(onProdottoError);
}

document.addEventListener("DOMContentLoaded", popolaProdotto);