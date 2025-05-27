function onResponse(response) {
    console.log("Risposta ricevuta");
    return response.json();
}

function onJson(json) {
    console.log(json);
    if (!json.success) {
        alert("Errore: " + json.error);
    }

    const detailsDiv = document.getElementById('prodotto-details');
    if (detailsDiv) {
        const quantitySpan = detailsDiv.querySelector('.cart-quantity');
        if (quantitySpan && typeof json.quantity !== "undefined") {
            quantitySpan.textContent = json.quantity;
        }
    }
    const removeBtn = detailsDiv.querySelector('.remove-item-btn');
    if (removeBtn) {
        if (json.quantity > 0) {
            removeBtn.disabled = false;
        } else {
            removeBtn.disabled = true;
        }
    }
    if (removeBtn && typeof json.idcart !== "undefined") {
        removeBtn.setAttribute('data-cart-id', json.idcart || '');
    }
    if (typeof aggiornaCartCount === "function") aggiornaCartCount();
}

function aggiungiAlCarrello(event) {
    const bottone = event.currentTarget;
    const productId = bottone.dataset.productId;

    fetch("api/add_to_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            prodotto_id: productId,
            quantity: 1
        })
    })
    .then(onResponse)
    .then(onJson);
}
