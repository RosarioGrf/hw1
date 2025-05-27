function onRemoveResponse(response) {
    return response.json();
}

function onRemoveJson(json) {
    const detailsDiv = document.getElementById('prodotto-details');
    if (detailsDiv) {
        const quantitySpan = detailsDiv.querySelector('.cart-quantity');
        if (quantitySpan) quantitySpan.textContent = json.quantity || 0;

        const removeBtn = detailsDiv.querySelector('.remove-item-btn');
        if (removeBtn) {
            removeBtn.setAttribute('data-cart-id', json.idcart || '');
            if (!json.idcart || json.quantity === 0) removeBtn.disabled = true;
            else removeBtn.disabled = false;
        }
        return;
    }

    if (window.lastRemoveBtn) {
        const row = window.lastRemoveBtn.closest('tr');
        if (row) {
            const quantitySpan = row.querySelector('.cart-quantity');
            if (quantitySpan) quantitySpan.textContent = json.quantity || 0;

            window.lastRemoveBtn.setAttribute('data-cart-id', json.idcart || '');
            if (!json.idcart || json.quantity === 0) window.lastRemoveBtn.disabled = true;
            else window.lastRemoveBtn.disabled = false;

            if (json.quantity === 0) row.remove();
        }
        
        aggiornaCartQuantity();
        if (typeof aggiornaCartCount === "function") aggiornaCartCount();
        window.lastRemoveBtn = null;
    }
}

function onRemoveError() {
    alert('Errore di rete');
}

function removeFromCart(event) {
    const button = event.currentTarget;
    const cartId = button.getAttribute('data-cart-id');
    if (!cartId) {
        alert('Errore: ID carrello mancante');
        return;
    }
    window.lastRemoveBtn = button;
    fetch('api/remove_from_cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ cart_id: cartId })
    })
    .then(onRemoveResponse)
    .then(onRemoveJson)
    .catch(onRemoveError);
}
