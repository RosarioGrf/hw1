/* ROSARIO MARCO GRIFASI 1000045535 */
/* JS Pagina principale DJI STORE */

/*-----------------------------------------------------------------------------------------------------*/
function OnHover() {
    const sfondo = document.querySelector("#top-bar-sotto");
    sfondo.classList.add("hovered");
    sfondo.classList.remove("unhovered");
}

function OnUnhover() {
    const sfondo = document.querySelector("#top-bar-sotto");
    sfondo.classList.add("unhovered");
    sfondo.classList.remove("hovered");
}

const flex_item= document.querySelectorAll(".dropdown");
for (let item of flex_item) {
    item.addEventListener("mouseover", OnHover);
    item.addEventListener("mouseout", OnUnhover); 
}


function visualizeSearchBar(){
    const menu = document.querySelector("#top-bar-sotto");
    const searchBar = document.querySelector("#search-bar");

    menu.classList.add("hidden");
    searchBar.classList.remove("hidden");
}

function visualizeMenu(){
    const menu = document.querySelector("#top-bar-sotto");
    const searchBar = document.querySelector("#search-bar");

    menu.classList.remove("hidden");
    searchBar.classList.add("hidden");
}

const searchIcon = document.querySelector("#search-icon");
const closeIcon = document.querySelector("#close-icon");
searchIcon.addEventListener("click", visualizeSearchBar);
closeIcon.addEventListener("click", visualizeMenu);






/*-----------------------------------------------------------------------------------------------------*/
function onCartQuantityResponse(response) {
    return response.json();
}

function onCartQuantityJson(json) {
    // Aggiorna solo la .cart-quantity dell'header (presumibilmente la prima o quella con un id specifico)
    const headerCartQuantity = document.querySelector('header .cart-quantity');
    if (headerCartQuantity) {
        headerCartQuantity.textContent = json.cartCount || 0;
    }
}

function aggiornaCartQuantity() {
    fetch('api/cart_count.php')
        .then(onCartQuantityResponse)
        .then(onCartQuantityJson);
}

aggiornaCartQuantity();











/*-----------------------------------------------------------------------------------------------------*/
function onCartCountResponse(response) {
    return response.json();
}

function onCartCountJson(json, tooltip) {
    const cartCount = parseInt(json.cartCount) || 0;

    if (cartCount > 0) {
        const goToCartBtn = document.createElement("a");
        goToCartBtn.href = "carrello.php";
        goToCartBtn.textContent = "Vai al carrello (" + cartCount + ")";
        goToCartBtn.classList.add("blue-button-user");
        tooltip.appendChild(goToCartBtn);
    } else {
        tooltip.appendChild(document.createTextNode("Il tuo carrello è vuoto"));
    }
}

function visualizeCart(event) {
    let tooltip = document.querySelector("#cart-tooltip");
    if (!tooltip) {
        tooltip = document.createElement("div");
        tooltip.id = "cart-tooltip";
    }
    tooltip.innerHTML = "";

    fetch('api/cart_count.php')
        .then(onCartCountResponse)
        .then(json => onCartCountJson(json, tooltip));

    event.currentTarget.appendChild(tooltip);

    const cartImage = event.currentTarget.querySelector("img");
    if (cartImage) {
        cartImage.src = "Immagini/icons/shopping-cart.png";
    }
}

function hideCartTooltip(event) {
    const tooltip = document.querySelector("#cart-tooltip");
    if (tooltip) {
        tooltip.remove();
    }

    const cartImage = event.currentTarget.querySelector("img");
    if (cartImage) {
        cartImage.src = "Immagini/icons/online-shopping.png";
    }
}

const cart = document.querySelector("#cart");
cart.addEventListener("mouseenter", visualizeCart);
cart.addEventListener("mouseleave", hideCartTooltip);







/*-----------------------------------------------------------------------------------------------------*/
function visualizeUser(event) {
    let tooltip = document.querySelector("#user-tooltip");
    if (!tooltip) {
        tooltip = document.createElement("div");
        tooltip.id = "user-tooltip";
    }

    tooltip.innerHTML = "";

    const islogged = event.currentTarget.getAttribute("data-logged") === "true";

    if (!islogged) {
        const loginBtn = document.createElement("a");
        loginBtn.href = "login.php";
        loginBtn.textContent = "Accedi | Registrati";
        loginBtn.classList.add("blue-button-user");


        tooltip.appendChild(loginBtn);
    }else{
        const profileBtn = document.createElement("a");
        profileBtn.href = "profile.php";
        profileBtn.textContent = "Profilo";
        profileBtn.classList.add("blue-button-user");   

        const logoutBtn = document.createElement("a");
        logoutBtn.href = "logout.php";
        logoutBtn.textContent = "Logout";
        logoutBtn.classList.add("logout-button-user");

        tooltip.appendChild(profileBtn);
        tooltip.appendChild(logoutBtn);
    }
    
    event.currentTarget.appendChild(tooltip);

    const userImage = event.currentTarget.querySelector("img");
    if (userImage) {
        userImage.src = "Immagini/icons/user-shape.png";
    }
}


function hideUserTooltip(event) {
    const tooltip = document.querySelector("#user-tooltip");
    if (tooltip) {
        tooltip.remove();
    }

    const userImage = event.currentTarget.querySelector("img");
    if (userImage) {
        userImage.src = "Immagini/icons/user.png";
    }
}

const user = document.querySelector("#user");
user.addEventListener("mouseenter", visualizeUser);
user.addEventListener("mouseleave", hideUserTooltip);









/*-----------------------------------------------------------------------------------------------------*/
function scrollSlider_left(){
    const slider = document.querySelector("#slider");
    slider.scrollLeft -= 300;
}

function scrollSlider_right(){
    const slider = document.querySelector("#slider");
    slider.scrollLeft += 300;
}

const leftArrow = document.querySelector("#arrow-left");
const rightArrow = document.querySelector("#arrow-right");
leftArrow.addEventListener("click", scrollSlider_left);
rightArrow.addEventListener("click", scrollSlider_right);








/*-----------------------------------------------------------------------------------------------------*/
function onSliderElementsJson(elements) {
    const slider = document.getElementById('slider');
    slider.innerHTML = '';
    elements.forEach(prodotto => {
        const item = document.createElement('div');
        item.className = 'item';
        const img = document.createElement('img');
        img.src = prodotto.immagine;
        img.alt = prodotto.nome_prodotto;
        const p = document.createElement('p');
        p.textContent = prodotto.nome_prodotto;
        item.appendChild(img);
        item.appendChild(p);
        slider.appendChild(item);
    });
}

function onSliderElementsResponse(response) {
    return response.json();
}

function popolaSlider() {
    fetch('api/obtain_slider_elements.php?q=1')
        .then(onSliderElementsResponse)
        .then(onSliderElementsJson);
}

document.addEventListener("DOMContentLoaded", popolaSlider);












/*-----------------------------------------------------------------------------------------------------*/
function scrollSlider_cards_left(){
    const card_container = document.querySelector("#cards_container");
    card_container.scrollTo({
        left: card_container.scrollLeft - 400,
        behavior: "smooth"
    });
}

function scrollSlider_cards_right(){
    const card_container = document.querySelector("#cards_container");
    card_container.scrollTo({
        left: card_container.scrollLeft + 400,
        behavior: "smooth"
    });
}

const leftArrow_cards = document.querySelector("#arrow-left-card");
const rightArrow_cards = document.querySelector("#arrow-right-card");
leftArrow_cards.addEventListener("click", scrollSlider_cards_left);
rightArrow_cards.addEventListener("click", scrollSlider_cards_right);





/*-----------------------------------------------------------------------------------------------------*/
function RiempiCosaNuovo(prodotto, container){
    const card = document.createElement('div');
    card.className = 'card';

    const link = document.createElement('a');
    link.href = "prodotto.php?id=" + prodotto.id;

    const background = document.createElement('div');
    background.className = 'background';
    background.style.backgroundImage = "url('" + prodotto.immagine_sfondo + "')";
    link.appendChild(background);

    const img = document.createElement('img');
    img.className = 'product';
    img.src = prodotto.immagine;
    img.alt = prodotto.nome_prodotto;
    link.appendChild(img);

    card.appendChild(link);

    const info = document.createElement('div');
    info.className = 'info';

    const h2 = document.createElement('h2');
    h2.textContent = prodotto.nome_prodotto;
    info.appendChild(h2);

    const p = document.createElement('p');
    p.textContent = prodotto.descrizione;
    info.appendChild(p);

    const info2 = document.createElement('div');
    info2.className = 'info2';

    const span = document.createElement('span');
    span.textContent = "A partire da " + prodotto.prezzo + " €";
    info2.appendChild(span);

    const button = document.createElement('button');
    button.className = 'add-to-cart-btn';
    button.setAttribute('data-product-id', prodotto.id);
    button.textContent = 'Acquista';
    info2.appendChild(button);

    info.appendChild(info2);
    card.appendChild(info);

    container.appendChild(card);
}



function RiempiProdotti4elementi(prodotto, container){
    const flexColumn = document.createElement('div');
    flexColumn.className = 'flex_column';

    const itemProduct = document.createElement('div');
    itemProduct.className = 'item_product';


    const link = document.createElement('a');
    link.href = "prodotto.php?id=" + prodotto.id;

    const img = document.createElement('img');
    img.src = prodotto.immagine;
    img.alt = prodotto.nome_prodotto;
    link.appendChild(img);

    itemProduct.appendChild(link);

    if (prodotto.sottotitolo) {
        const h4 = document.createElement('h4');
        h4.textContent = prodotto.sottotitolo;
        itemProduct.appendChild(h4);
    }

    const h3 = document.createElement('h3');
    h3.textContent = prodotto.nome_prodotto;
    itemProduct.appendChild(h3);

    const p = document.createElement('p');
    p.className = 'price';
    p.textContent = "A partire da " + prodotto.prezzo + " €";
    itemProduct.appendChild(p);

    const button = document.createElement('button');
    button.className = 'add-to-cart-btn';
    button.setAttribute('data-product-id', prodotto.id);
    button.textContent = 'Acquista';
    itemProduct.appendChild(button);

    flexColumn.appendChild(itemProduct);
    container.appendChild(flexColumn);
}



function onPopolaProdottiJson(elements) {
    const container = document.getElementById('cards_container');
    container.innerHTML = '';

    const droniContainer = document.getElementById('droni_fotocamera_container');
    let droniCount = 0;

    const portatiliContainer = document.getElementById('droni_portatili_quotidiana_container');
    let portatiliCount = 0;

    const portatiliProfessionaliContainer = document.getElementById('droni_portatili_professionale_container');
    let portatiliProfessionaliCount = 0;

    const serviziContainer = document.getElementById('servizi_container');
    let serviziCount = 0;

    elements.forEach(prodotto => {
        if (prodotto.type == "cosanuovo" ){
            RiempiCosaNuovo(prodotto, container);
        }

        if (prodotto.type === "droni_fotocamera" && droniCount < 4) {
             RiempiProdotti4elementi(prodotto, droniContainer);

            droniCount++;
            }

        if (prodotto.type == "portatili_quotidiana" && portatiliCount < 4){
            RiempiProdotti4elementi(prodotto, portatiliContainer);
            portatiliCount++;

        }

        if (prodotto.type == "portatili_professionali" && portatiliProfessionaliCount < 4){
            RiempiProdotti4elementi(prodotto, portatiliProfessionaliContainer);

            portatiliCount++;
        }

        if (prodotto.type == "Servizi" && serviziCount < 4){
            RiempiProdotti4elementi(prodotto, serviziContainer);

            serviziCount++;

        }
    });
}

function onPopolaProdottiResponse(response) {
    return response.json();
}

function PopolaProdotti() {
    fetch('api/obtain_prodotti.php?q=1')
        .then(onPopolaProdottiResponse)
        .then(onPopolaProdottiJson);
}

document.addEventListener("DOMContentLoaded", PopolaProdotti);






/*-----------------------------------------------------------------------------------------------------*/
function closeModal() {
    const modalOverlay = document.querySelector(".modal-overlay");
    if (modalOverlay) {
        modalOverlay.remove();
        document.body.classList.remove("modal-open");
    }
}

function stopPropagation(event) {
    event.stopPropagation();
}

function showmodal(event) {
    console.log("showmodal");
    const itemInfo = event.currentTarget;

    const modalOverlay = document.createElement("div");
    modalOverlay.classList.add("modal-overlay");

    const modalContent = document.createElement("div");
    modalContent.classList.add("modal-content");

    const closeButton = document.createElement("button");
    closeButton.classList.add("close-btn");
    closeButton.textContent = "x";

    const modalTitle = document.createElement("h2");
    modalTitle.classList.add("modalTitle");

    const modalText = document.createElement("p");
    modalText.classList.add("modalText");

    const modalExtra = document.createElement("a");
    modalExtra.classList.add("modalExtra");

    modalContent.appendChild(closeButton);
    modalContent.appendChild(modalTitle);
    modalContent.appendChild(modalText);
    modalContent.appendChild(modalExtra);
    modalOverlay.appendChild(modalContent);
    document.body.appendChild(modalOverlay);

    modalTitle.textContent = itemInfo.dataset.title;
    modalText.textContent = itemInfo.dataset.text;
    modalExtra.textContent = itemInfo.dataset.extra;

    modalOverlay.style.display = "flex";

    document.body.classList.add("modal-open");

    closeButton.addEventListener("click", closeModal);
    modalOverlay.addEventListener("click", closeModal);
    modalContent.addEventListener("click", stopPropagation);
}

const modals = document.querySelectorAll(".item_info_center");
for (let modal of modals) {
    modal.addEventListener("click", showmodal);
}



/*-----------------------------------------------------------------------------------------------------*/
function FromVideoToImg(event) {
    const container = event.currentTarget.closest(".video-banner");
    const img = container.querySelector("img");
    const video = container.querySelector("video");

    video.style.display = "none";
    img.style.display = "block";
}

const videos=document.querySelectorAll(".video-banner video");
for (let video of videos) {
    video.addEventListener("ended", FromVideoToImg);
}

function FromImgToVideo(event) {
    const container = event.currentTarget.closest(".video-banner");
    const img = container.querySelector("img");
    const video = container.querySelector("video");

    img.style.display = "none";
    video.style.display = "block";
    video.play();
}

const buttons = document.querySelectorAll(".video-banner .restart-button");
for (let button of buttons) {
    button.addEventListener("click", FromImgToVideo);
}










  
/*-----------------------------------------------------------------------------------------------------*/  
function scrollSlider_left2(slider){
    slider.scrollLeft -= 300;
}

function scrollSlider_right2(slider){
    slider.scrollLeft += 300;
}

const sliderContainers = document.querySelectorAll('.slider-container-2');
for (const container of sliderContainers) {
    const slider = container.querySelector('.slider-2');
    const leftArrow = container.querySelector('.arrow-2.left-2');
    const rightArrow = container.querySelector('.arrow-2.right-2');

    if (!slider || !leftArrow || !rightArrow) continue;

    leftArrow.addEventListener('click', () => scrollSlider_left2(slider));
    rightArrow.addEventListener('click', () => scrollSlider_right2(slider));
}













/*-----------------------------------------------------------------------------------------------------*/
const cityName = 'Catania';

function onWeatherJson(json){
    const container = document.querySelector('#weather-box');
    container.innerHTML = '';
  
    if (json && json.current) {
        console.log('Dati meteo ricevuti:', json);
        const title = document.createElement('h2');
        title.textContent = 'Meteo per la tua zona';
  
        const location = document.createElement('p');
        location.textContent = `Luogo: ${json.location.name}, ${json.location.region}, ${json.location.country}`; //località

        const temp = document.createElement('p');
        temp.textContent = 'Temperatura: ' + json.current.temp_c + '°C';
  
        const condition = document.createElement('p');
        condition.textContent = 'Condizione: ' + json.current.condition.text; 
  
        const icon = document.createElement('img');
        icon.src = 'https:' + json.current.condition.icon;
        icon.alt = json.current.condition.text;

        const humidity = document.createElement('p');
        humidity.textContent = 'Umidità: ' + json.current.humidity + '%'; 

        const windvelocity = document.createElement('p');
        windvelocity.textContent = 'Velocità del Vento: ' + json.current.wind_kph + ' km/h'; 

        const advisory = document.createElement('p');
        const wind = json.current.wind_kph;
        const visibility = json.current.vis_km; 
        const precipitation = json.current.precip_mm;
        if (precipitation > 30 || wind > 25 || visibility < 3) {
            advisory.textContent = '⚠️ Condizioni non ideali per il volo del drone.';
            advisory.style.color = 'red';
        } else if (wind > 15) {
            advisory.textContent = '🔶 Attenzione: vento moderato, vola con cautela.';
            advisory.style.color = 'orange';
        } else {
            advisory.textContent = '✅ Buone condizioni per far volare il drone.';
            advisory.style.color = 'green';
        }

        const updated = document.createElement('h4');
        updated.textContent = 'Ultimo aggiornamento: ' + json.current.last_updated;


        container.appendChild(title);
        container.appendChild(location);
        container.appendChild(temp);
        container.appendChild(condition);
        container.appendChild(humidity);
        container.appendChild(windvelocity);
        container.appendChild(advisory);
        container.appendChild(icon);
        container.appendChild(updated);
    } else {
        container.innerHTML = '<p>Dati meteo non disponibili.</p>';
    }
}

function onWeatherResponse(response) {
    return response.json();
}

function fetchWeatherData(lat, lng) {
    fetch(`api/weather_api.php?lat=${lat}&lng=${lng}`)
        .then(onWeatherResponse)
        .then(onWeatherJson);
  }
  

/*-----------------------------------------------------------------------------------------------------*/
function onGeoJson(json) {
console.log('Coordinate ricevute');

const resources = json.resourceSets[0].resources;

if (resources.length > 0) {
    const coords = resources[0].point.coordinates;
    const lat = coords[0];
    const lng = coords[1];
    console.log('Coordinate:', lat, lng);
    fetchWeatherData(lat, lng);
} else {
    console.error('Coordinate non trovate');
}
}


function onGeoResponse(response) {
console.log('Risposta coordinate ricevuta');
return response.json();
}


function fetchCoordinates(event) {
    if (event) {
        event.preventDefault();
    }
    console.log('Richiesta coordinate per:');
    fetch('api/bingmaps_api.php?city=' + encodeURIComponent(cityName))
        .then(onGeoResponse)
        .then(onGeoJson);
}

fetchCoordinates();










    


/*-----------------------------------------------------------------------------------------------------*/
function onJsonSpotify(json) {
    console.log("JSON ricevuto");
    console.log(json);
    const library = document.querySelector("#album-view");
    library.innerHTML = "";
    const results = json.albums.items;
    let num_results = results.length;
    if (num_results > 9) num_results = 9;
    for (let i = 0; i < num_results; i++) {
        const album_data = results[i];
        const title = album_data.name;
        const selected_image = album_data.images[0].url;
        const album = document.createElement("div");
        album.classList.add("album");
        const img = document.createElement("img");
        img.src = selected_image;
        const caption = document.createElement("span");
        caption.textContent = title;
        album.appendChild(img);
        album.appendChild(caption);
        library.appendChild(album);
    }
}
        
function onResponseSpotify(response) {
    console.log("Risposta ricevuta");
    return response.json();
}
        
function search(event) {
    event.preventDefault();
    const album_input = document.querySelector("#album");
    const album_value = encodeURIComponent(album_input.value);
    console.log("Eseguo ricerca: " + album_value);

    fetch("api/spotify_token.php?q=" + album_value + "&type=album")
        .then(onResponseSpotify)
        .then(onJsonSpotify);
}     

let form = document.querySelector("form");
form. addEventListener("submit", search);
console.log(form);