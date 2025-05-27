



/*-----------------------------------------------------------------------------------*/
function onHeaderElementsJson(elements) {
    
    const fotografiaDiv = document.querySelector('.prodotti-fotografia');
    const esperienzaDiv = document.querySelector('.prodotti-esperienza');
    const cinemaDiv = document.querySelector('.prodotti-cinematografia');
    if (fotografiaDiv) fotografiaDiv.innerHTML = '';
    if (esperienzaDiv) esperienzaDiv.innerHTML = '';
    if (cinemaDiv) cinemaDiv.innerHTML = '';


    const riprendiDiv = document.querySelector('.prodotti-riprendi');
    const ripreseDiv = document.querySelector('.prodotti-riprese');
    if (riprendiDiv) riprendiDiv.innerHTML = '';
    if (ripreseDiv) ripreseDiv.innerHTML = '';


    const energiaDiv = document.querySelector('.prodotti-energia');
    if (energiaDiv) energiaDiv.innerHTML = '';


    const educazioneDiv = document.querySelector('.prodotti-educazione-fotografia');
    if (educazioneDiv) educazioneDiv.innerHTML = '';


    const serviziFotografiaDiv = document.querySelector('.prodotti-servizi-fotografia');
    if (serviziFotografiaDiv) serviziFotografiaDiv.innerHTML = '';


    const accessoriDroniDiv = document.querySelector('.prodotti-accessori-droni');
    const accessoriPortatiliDiv = document.querySelector('.prodotti-accessori-portatili');
    const accessoriPowerDiv = document.querySelector('.prodotti-accessori-power');
    if (accessoriDroniDiv) accessoriDroniDiv.innerHTML = '';
    if (accessoriPortatiliDiv) accessoriPortatiliDiv.innerHTML = '';
    if (accessoriPowerDiv) accessoriPowerDiv.innerHTML = '';


    const ricondizionatiDroniDiv = document.querySelector('.prodotti-ricondizionati-droni');
    if (ricondizionatiDroniDiv) ricondizionatiDroniDiv.innerHTML = '';


    elements.forEach(element => {
        if (element.categoria === 'Droni con fotocamera') {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            if (element.sotto_categoria === 'Fotografia_area' && fotografiaDiv) {
                fotografiaDiv.appendChild(p);
            } else if (element.sotto_categoria === 'Esperienza' && esperienzaDiv) {
                esperienzaDiv.appendChild(p);
            } else if (element.sotto_categoria === 'Cinematografia' && cinemaDiv) {
                cinemaDiv.appendChild(p);
            }
        }


        if (element.categoria === 'prodotti portatili') {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            if (element.sotto_categoria === 'riprendi' && riprendiDiv) {
                riprendiDiv.appendChild(p);
            } else if (element.sotto_categoria === 'riprese' && ripreseDiv) {
                ripreseDiv.appendChild(p);
            }
        }

        if (element.categoria === 'energia') {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            if (element.sotto_categoria === 'stazione' && energiaDiv) {
                energiaDiv.appendChild(p);
            }
        }


        if (element.categoria === 'Educazione e industria') {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            if (element.sotto_categoria === 'fotografia' && educazioneDiv) {
                educazioneDiv.appendChild(p);
            }
        }


        if (element.categoria === 'Servizi' && element.sotto_categoria === 'fotografia' && serviziFotografiaDiv) {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            serviziFotografiaDiv.appendChild(p);
        }


        if (element.categoria === 'Accessori') {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            if (element.sotto_categoria === 'Droni con fotocamera' && accessoriDroniDiv) {
                accessoriDroniDiv.appendChild(p);
            } else if (element.sotto_categoria === 'prodotti' && accessoriPortatiliDiv) {
                accessoriPortatiliDiv.appendChild(p);
            } else if (element.sotto_categoria === 'power' && accessoriPowerDiv) {
                accessoriPowerDiv.appendChild(p);
            }
        }


        if (element.categoria === 'Ricondizionati' && element.sotto_categoria === 'droni' && ricondizionatiDroniDiv) {
            const p = document.createElement('p');
            const img = document.createElement('img');
            img.src = element.immagine;
            img.alt = '';
            p.appendChild(img);
            p.appendChild(document.createTextNode(' ' + element.nome_prodotto));
            ricondizionatiDroniDiv.appendChild(p);
        }
    });
}

function onHeaderElementsResponse(response) {
    return response.json();
}

function popolaHeaderElements() {
    fetch('api/obtain_header_elements.php?q=1')
        .then(onHeaderElementsResponse)
        .then(onHeaderElementsJson);
}

popolaHeaderElements();















/*-----------------------------------------------------------------------------------*/
function onHeaderFotoJson(fotoArray) {

    const fotoDestraDiv = document.querySelector('.prodotti-foto-destra');
    if (fotoDestraDiv) fotoDestraDiv.innerHTML = '';

    
    const portatiliDestraDiv = document.querySelector('.prodotti-portatili-destra');
    if (portatiliDestraDiv) portatiliDestraDiv.innerHTML = '';

    
    const energiaDestraDiv = document.querySelector('.prodotti-energia-destra');
    if (energiaDestraDiv) energiaDestraDiv.innerHTML = '';

    
    const educazioneDestraDiv = document.querySelector('.prodotti-educazione-destra');
    if (educazioneDestraDiv) educazioneDestraDiv.innerHTML = '';

    
    const serviziDestraDiv = document.querySelector('.prodotti-servizi-destra');
    if (serviziDestraDiv) serviziDestraDiv.innerHTML = '';

    
    const accessoriDestraDiv = document.querySelector('.prodotti-accessori-destra');
    if (accessoriDestraDiv) accessoriDestraDiv.innerHTML = '';

    
    const ricondizionatiDestraDiv = document.querySelector('.prodotti-ricondizionati-destra');
    if (ricondizionatiDestraDiv) ricondizionatiDestraDiv.innerHTML = '';

    fotoArray.forEach(foto => {

        
        if (foto.categoria === 'Droni con fotocamera' && fotoDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            fotoDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'prodotti portatili' && portatiliDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            portatiliDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'energia' && energiaDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            energiaDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'Educazione e industria' && educazioneDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            educazioneDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'Servizi' && serviziDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            serviziDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'Accessori' && accessoriDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            accessoriDestraDiv.appendChild(div);
        }

        
        if (foto.categoria === 'Ricondizionati' && ricondizionatiDestraDiv) {
            const div = document.createElement('div');
            div.className = 'dropdown-right-item';
            const img = document.createElement('img');
            img.src = foto.immagine;
            img.alt = '';
            div.appendChild(img);
            ricondizionatiDestraDiv.appendChild(div);
        }
    });
}

function onHeaderFotoResponse(response) {
    return response.json();
}

function popolaHeaderFoto() {
    fetch('api/obtain_header_foto.php?q=1')
        .then(onHeaderFotoResponse)
        .then(onHeaderFotoJson);
}

popolaHeaderFoto();