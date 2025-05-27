CREATE TABLE if NOT EXISTS users  (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE if NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES prodotti(id) ON DELETE CASCADE
);

/*-------------------------------tabelle header-----------------------------------*/
CREATE TABLE if NOT EXISTS header_elements (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_prodotto VARCHAR(255) NOT NULL,
	immagine VARCHAR(255) NOT NULL,
	categoria VARCHAR(255) NOT NULL,
	sotto_categoria VARCHAR(255) NOT NULL
);
	
CREATE TABLE if NOT EXISTS header_foto(
	id INT AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(255) NOT NULL,
	immagine VARCHAR(255) NOT NULL
);
/*-----------------------------------------------------------------------------------*/

CREATE TABLE if NOT EXISTS prodotti_slider1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_prodotto VARCHAR(255) NOT NULL,
    immagine VARCHAR(255) NOT NULL
);

CREATE TABLE if NOT EXISTS prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_prodotto VARCHAR(255) NOT NULL,
    immagine VARCHAR(255) NOT NULL,
    immagine_sfondo VARCHAR(255) NOT NULL,
	 prezzo DOUBLE NOT NULL,
    descrizione VARCHAR(255) NOT NULL,
    descrizione2 TEXT NOT NULL,
    descrizione3 TEXT NOT NULL,
    descrizione4 TEXT NOT NULL  
);

/*inserimento elementi sinistra in header_elements*//*
INSERT INTO header_elements(nome_prodotto, immagine, categoria, sotto_categoria) VALUES
(' DJI Mavic', 'Immagini/prodotti/DJI Mavic.png', 'Droni con fotocamera', 'Fotografia_area'),
(' DJI Air', 'Immagini/prodotti/DJI Air.png',  'Droni con fotocamera', 'Fotografia_area'),
(' DJI Mini', 'Immagini/prodotti/DJI Mini.png', 'Droni con fotocamera', 'Fotografia_area'),
(' DJI Flip', 'Immagini/prodotti/DJI flip.png', 'Droni con fotocamera', 'Fotografia_area'),
(' DJI Neo', 'Immagini/prodotti/DJI Neo.png', 'Droni con fotocamera', 'Fotografia_area'),
(' DJI Avata', 'Immagini/prodotti/DJI Avata.png', 'Droni con fotocamera', 'Esperienza'),
(' DJI FPV', 'Immagini/prodotti/Imprese.png', 'Droni con fotocamera', 'Esperienza'),
(' Inspire', 'Immagini/prodotti/DJI Inspire.png', 'Droni con fotocamera', 'Cinematografia'),
(' Osmo Pocket','Immagini/prodotti/DJI OsmoPocket.png','prodotti portatili','riprendi'),
(' Osmo Action','Immagini/prodotti/DJI Osmo Action.png','prodotti portatili','riprendi'),
(' Osmo Mobile','Immagini/prodotti/DJI Osmo Mobile.png','prodotti portatili','riprendi'),
(' DJI Mic','Immagini/prodotti/DJI Mic.png','prodotti portatili','riprendi'),
(' Stabilizzatori Ronin','Immagini/prodotti/DJI Stabilizzatori Ronin.png','prodotti portatili','riprese'),
(' Fotocamere cinematografiche Ronin','Immagini/prodotti/DJI Fotocamere cinematografiche Ronin.png','prodotti portatili','riprese'),
(' Accessori professionali','Immagini/prodotti/Accessori professionali.png','prodotti portatili','riprese'),
(' DJI Power','Immagini/prodotti/DJI Power.png','energia','stazione'),
(' Imprese','Immagini/prodotti/Imprese.png','Educazione e industria','fotografia'),
(' Educazione','Immagini/prodotti/Educazione.png','Educazione e industria','fotografia'),
(' DJI Care Refresh','Immagini/servizi/DJI Care Refresh.png','Servizi','fotografia'),
(' DJI Care Pro','Immagini/servizi/DJI Care Pro.png','Servizi','fotografia'),
(' DJI Care Enterprise','Immagini/servizi/DJI Care Enterprise.png','Servizi','fotografia'),
(' License','Immagini/servizi/license.png','Servizi','fotografia'),
(' DJI Mavic','Immagini/prodotti/DJI Mavic.png','Accessori','Droni con fotocamera'),
(' DJI Air','Immagini/prodotti/DJI Air.png','Accessori','Droni con fotocamera'),
(' DJI Mini','Immagini/prodotti/DJI Mini.png','Accessori','Droni con fotocamera'),
(' DJI Flip','Immagini/prodotti/DJI flip.png','Accessori','Droni con fotocamera'),
(' DJI Neo','Immagini/prodotti/DJI Neo.png','Accessori','Droni con fotocamera'),
(' DJI Avata & DJI FPV','Immagini/prodotti/DJI Avata.png','Accessori','Droni con fotocamera'),
(' Osmo Pocket','Immagini/prodotti/DJI OsmoPocket.png','Accessori','prodotti'),
(' Osmo Action','Immagini/prodotti/DJI Osmo Action.png','Accessori','prodotti'),
(' Osmo Mobile','Immagini/prodotti/DJI Osmo Mobile.png','Accessori','prodotti'),
(' Stabilizzatori Ronin','Immagini/prodotti/DJI Stabilizzatori Ronin.png','Accessori','prodotti'),
(' DJI Mic','Immagini/prodotti/DJI Mic.png','Accessori','prodotti'),
(' DJI Power','Immagini/prodotti/DJI Power.png','Accessori','power'),
(' Droni con fotocamera','Immagini/prodotti/DJI Mavic.png','Ricondizionati','droni'),
(' Osmo Pocket','Immagini/prodotti/DJI OsmoPocket.png','Ricondizionati','droni');
*/




/*inserimento foto destra in header_elements*//*
INSERT INTO header_foto(categoria, immagine) VALUES
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/DJI Avata Fly More combo.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/modulo trasmissione.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/DHI Aie 3S.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/modulo trasmissione.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/eliche.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/DHI Maciv 3 Pro cine.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/DJI neo fly more motion.png'),
('Droni con fotocamera', 'Immagini/menu/droni con fotocamera/crystalsky.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/impugnatura.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/unità manuale.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/DJI mic 2 camera adapter.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/DJI Ronin 4d flex.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/impugnatura_ronin.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/osmo pocket 2.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/DJI POCJET 2 creative.png'),
('prodotti portatili','Immagini/menu/Prodotti portatili/kit tracciamento.png'),
('energia','Immagini/menu/energia/caricabatterie auto.png'),
('energia','Immagini/menu/energia/DJI Power 500.png'),
('energia','Immagini/menu/energia/modulo adattatore.png'),
('energia','Immagini/menu/energia/DJI Power 1000 e 3 pannelli.png'),
('energia','Immagini/menu/energia/DJI Power 1000.png'),
('energia','Immagini/menu/energia/pannello solare.png'),
('energia','Immagini/menu/energia/DJI Power extension.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/caricabatterie.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/batteria.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/propellers.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/stazione di ricarica.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/combo matrice 4T.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/DJI terra.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/H20.png'),
('Educazione e industria', 'Immagini/menu/educazione e Industria/matrix 350.png'),
('Servizi', 'Immagini/menu/Servizi/dji flip.png'),
('Servizi', 'Immagini/menu/Servizi/M350.png'),
('Servizi', 'Immagini/menu/Servizi/DjI Mavic.png'),
('Servizi', 'Immagini/menu/Servizi/D-rtk.png'),
('Servizi', 'Immagini/menu/Servizi/sji air 3s.png'),
('Servizi', 'Immagini/menu/Servizi/sji neo.png'),
('Servizi', 'Immagini/menu/Servizi/L2.png'),
('Servizi', 'Immagini/menu/Servizi/zenmuse.png'),
('Accessori', 'Immagini/menu/Accessori/batteria.png'),
('Accessori', 'Immagini/menu/Accessori/batterie.png'),
('Accessori', 'Immagini/menu/Accessori/borsa.png'),
('Accessori', 'Immagini/menu/Accessori/controller.png'),
('Accessori', 'Immagini/menu/Accessori/eliche.png'),
('Accessori', 'Immagini/menu/Accessori/filtri.png'),
('Accessori', 'Immagini/menu/Accessori/fotocamera.png'),
('Accessori', 'Immagini/menu/Accessori/visore.png'),
('Accessori', 'Immagini/menu/Accessori/obiettivo.png'),
('Ricondizionati', 'Immagini/menu/Accessori/visore.png'),
('Ricondizionati', 'Immagini/menu/energia/DJI Power 1000 e 3 pannelli.png'),
('Ricondizionati', 'Immagini/menu/droni con fotocamera/modulo trasmissione.png'),
('Ricondizionati', 'Immagini/menu/droni con fotocamera/DHI Aie 3S.png'),
('Ricondizionati', 'Immagini/menu/Prodotti portatili/osmo pocket 2.png'),
('Ricondizionati', 'Immagini/menu/droni con fotocamera/DJI Avata Fly More combo.png'),
('Ricondizionati', 'Immagini/menu/Prodotti portatili/DJI POCJET 2 creative.png');
*/



/* Inserimento in slider PS.*/
/*
INSERT INTO prodotti_slider1 (nome_prodotto, immagine) VALUES
('DJI Mavic', 'Immagini/prodotti/DJI Mavic.png'),
('DJI Air', 'Immagini/prodotti/DJI Air.png'),
('DJI Mini', 'Immagini/prodotti/DJI Mini.png'),
('DJI Flip', 'Immagini/prodotti/DJI Flip.png'),
('DJI Avata', 'Immagini/prodotti/DJI Avata.png'),
('DJI Neo', 'Immagini/prodotti/DJI Neo.png'),
('DJI Inspire', 'Immagini/prodotti/DJI Inspire.png'),
('Osmo Action', 'Immagini/prodotti/DJI Osmo Action.png'),
('Osmo Pocket', 'Immagini/prodotti/DJI OsmoPocket.png'),
('Osmo Mobile', 'Immagini/prodotti/DJI Osmo Mobile.png'),
('DJI Mic', 'Immagini/prodotti/DJI Mic.png'),
('Stabilizzatori Ronin', 'Immagini/prodotti/DJI Stabilizzatori Ronin.png'),
('Fotocamere cinematografiche Ronin', 'Immagini/prodotti/DJI Fotocamere cinematografiche Ronin.png'),
('Accessori professionali', 'Immagini/prodotti/Accessori professionali.png'),
('DJI Power', 'Immagini/prodotti/DJI Power.png'),
('Imprese', 'Immagini/prodotti/Imprese.png'),
('Educazione', 'Immagini/prodotti/Educazione.png');
*/



/*inseriemento in cosa c'è di nuovo*//*
INSERT INTO prodotti (nome_prodotto, immagine, immagine_sfondo, prezzo, descrizione, descrizione2, descrizione3, descrizione4) VALUES
('DJI RS 4 Mini', 'Immagini/Cosa Nuovo/DJI RS 4 Mini.png', 'Immagini/Cosa Nuovo/DJI RS 4 Mini Sfondo.jpg', 389,'Stabilizzatore leggero e compatto per content creator',  'Blocco automatico degli assi di 2ª generazione: I nuovi blocchi degli accelerano i processi di ripresa, transizione e stoccaggio. Con i bracci degli assi ripiegati è quasi piatto, occupa poco spazio e può essere inserito facilmente in una borsa per un comodo trasporto.', 'Blocco automatico degli assi di 2ª generazione: I nuovi blocchi degli accelerano i processi di ripresa, transizione e stoccaggio. Con i bracci degli assi ripiegati è quasi piatto, occupa poco spazio e può essere inserito facilmente in una borsa per un comodo trasporto.', 'Bilanciamento ottimizzato Teflon™: Precedentemente utilizzati sugli stabilizzatori di punta di DJI, il rivestimento in Teflon™ degli assi riduce attrito per un bilanciamento più fluido.'),
('Osmo Mobile 7P', 'Immagini/Cosa Nuovo/Osmo Mobile 7P.png', 'Immagini/Cosa Nuovo/Osmo Mobile 7P Sfondo.jpg', 159, 'Stabilizzatore di punta per smartphone con tracciamento intelligente', 'Tracciamento nativo con funzionalità di audio e illuminazione integrate : Il nuovo Modulo multifunzione consente di tracciare il soggetto senza DJI Mimo e offre ricezione audio e illuminazione perfetti per scatenare la tua creatività.', 'Solida stabilizzazione a tre assi: Con la stabilizzazione di settima generazione di DJI, la serie Osmo Mobile 7 è compatibile con la maggior parte degli smartphone per riprese fluide e stabili.', 'Apertura e avvio rapidi: Apri lo stabilizzatore per accenderlo. Appena attacchi un telefono abbinato al supporto magnetico, DJI Mimo si avvierà automaticamente per consentirti di effettuare subito riprese.'),
('DJI Flip', 'Immagini/Cosa Nuovo/DJI Flip.png', 'Immagini/Cosa Nuovo/DJI Flip Sfondo.jpg', 439, 'Drone multifunzione con fotocamera per vlog', 'Design compatto, libertà illimitata: Con un peso inferiore a 249 g, DJI Flip pesa quasi quanto una mela. Non richiede formazione né patentino per volare nella maggior parte dei Paesi e aree geografiche.', 'Ultra sicuro, ultra affidabile: Dotato di una paraeliche integrale e pieghevole per un volo sicuro e di un sistema di rilevamento a infrarossi 3D per la frenata automatica anche di notte.', 'La creatività prende il volo istantaneamente: Ti basterà premere il pulsante laterale per selezionare la modalità di ripresa che desideri e Flip si occuperà del resto, catturando automaticamente immagini straordinarie.'),
('DJI O4 Air Unit Pro', 'Immagini/Cosa Nuovo/DJI O4 Air Unit Pro.png', 'Immagini/Cosa Nuovo/DJI O4 Air Unit Pro Sfondo.jpg', 115, 'Trasmissione video digitale FPV FHD (modello di punta)', 'Nuovi livelli di trasmissione, maggiore libertà di volo: La serie O4 Air Unit è doata del sistema di trasmissione O4 con latenza ultra bassa. Con il modello Pro, la distanza di trasmissione può raggiungere i 15 km e il sistema seleziona automaticamente la frequenza ottimale.', 'Immagini fluide e cristalline: La serie O4 Air Unit registra video in 4K/60fps. La codifica H.265 offre una trasmissione a 1080p/100fps per immagini chiare e fluide in tempo reale.', 'Nuova modalità Corsa: velocità estrema, divertimento illimitato: La serie DJI O4 Air Unit presenta una nuova modalità Corsa con una latenza di trasmissione di soli 15 millisecondi e supporta fino a 8 droni da corsa contemporaneamente.'),
('DJI Mic Mini', 'Immagini/Cosa Nuovo/DJI Mic Mini.png', 'Immagini/Cosa Nuovo/DJI Mic Mini Sfondo.jpg', 89, 'Mini microfono senza fili', 'Piccolo, leggero, discreto:Il trasmettitore DJI Mic Mini è compatto e leggero, e pesa solo 10 g, il che lo rende comodo, discreto e indossabile in diversi modi, con attacco magnetico o clip tradizionale.', 'Audio di alta qualità con trasmissione stabile: DJI Mic Mini supporta la registrazione audio omnidirezionale. Il ricevitore si connette a due trasmettitori contemporaneamente. Audio di alta qualità trasmesso da una distanza di 400 metri.', 'Durata 48 ore con custodia: Trasmettitore e ricevitore offrono, rispettivamente, autonomia fino a 11,5 e 10,5 ore, per un totale di 48 ore di uso prolungato con una custodia completamente carica. Ideale per scenari di utilizzo intensivo.'),
('DJI Air 3S', 'Immagini/Cosa Nuovo/DJI AIR 3S.png', 'Immagini/Cosa Nuovo/DJI AIR 3S Sfondo.jpg', 1099,'Drone con doppia fotocamera per fotografia in viaggio',  'Fotocamera principale CMOS 1″: 14 stop gamma dinamica, pixel grandi 3,2μm, formato equivalente 24mm e risoluzione 50MP, cattura paesaggi grandiosi giorno e notte.', 'Teleobiettivo medio da 70 mm: Sensore CMOS 1/1,3″ 48MP, con stesse specifiche video e di colore della fotocamera principale, e in più uno zoom ottico 3x per ritratti ricchi di dettagli.', 'Video HDR 4K/60fps a doppia fotocamera: Usa codifica H.265 con video HDR 4K/60fps, 4K/120fps e modalità di colore D-Log M a 10 bit.'),
('Osmo Action 5 Pro', 'Immagini/Cosa Nuovo/Osmo Action 5 Pro.png', 'Immagini/Cosa Nuovo/Osmo Action 5 Pro Sfondo.jpg', 379, 'l action cam dalla qualità delle immagini rivoluzionaria', 'Potente sensore da 1/1,3″: Action 5 Pro vanta una dimensione pixel equivalente a 2,4 μm, con gamma dinamica elevata di 13,5 stop e un chip ad alte prestazioni da 4 nm.', 'Tracciamento del soggetto: Action 5 Pro rileva con intelligenza la posizione del soggetto e regola inquadratura per mantenerlo sempre al centro. ', '4 ore di autonomia: La durata operativa è stata estesa del 50%. Una batteria singola offre fino a 4 ore di utilizzo. Registra fino a 3,6 ore a -20 °C.'), 
('DJI Neo', 'Immagini/Cosa Nuovo/DJI Neo.png', 'Immagini/Cosa Nuovo/DJI Neo Sfondo.jpg', 179, 'Un drone per vlog nel palmo della tua mano', 'Dalla mano verso il cielo: decollo dal palmo: Con un peso di soli 135 g e paraeliche integrale, Neo decolla facilmente dal palmo della mano ed esegue riprese automaticamente.', 'Al centro della scena con il tracciamento: In bici, sullo skateboard e nelle escursioni, DJI Neo ti segue con facilità mantenendoti sempre al centro di riprese straordinarie.', 'Libera la creatività con i QuickShot: Le modalità di ripresa intelligente di DJI Neo, come Segui, Dronie, Cerchio e tante altre, offrono spunti dinamici per filmati d effetto.'),
('DJI Mini 4K', 'Immagini/Cosa Nuovo/DJI Mini 4k.png', 'Immagini/Cosa Nuovo/DJI Mini 4k Sfondo.jpg', 299, 'Mini Drone con fotocamera', 'Fotografia aerea intuitiva: Pratico e intuitivo, DJI Mini 4K supporta il decollo e latterraggio ad un tocco, il ritorno automatico (RTH) e lo stazionamento di precisione.', 'Meno di 249 g: Nessuna registrazione nella maggior parte dei Paesi e delle regioni. Si adatta a qualsiasi borsa per un trasporto e una creazione senza sforzi.', 'Funzioni intelligenti: La fotocamera con CMOS da 1/2.3” offre video in 4K. Le modalità intelligenti ti consentono di ottenere scatti e panoramiche impressionanti.'),
('DJI Avata 2', 'Immagini/Cosa Nuovo/DJI Avata 2.png', 'Immagini/Cosa Nuovo/DJI Avata 2 Sfondo.jpg', 999, 'Drone FPV', 'Esperienza di volo in FPV: DJI Goggles 3 è dotato di display micro-OLED HD, bassa latenza video e di Real View PiP, per la consapevolezza senza rimuovere i‌‌l visore.', 'ACRO semplificate‌‌: RC Motion 3 consente incredibili acrobazie con una semplice pressione, inclusi 360 in avanti/indietro, rotazioni laterali e drift a 180°.‌‌', 'Riprese ravvicinate ultra grandangolari in 4K: Cattura emozione del volo con video HDR nitidi in 4K/60fps. Goditi un FOV ultra grandangolare da 155° per un volo a bassa quota e ad alta velocità.'),
('DJI RS 4 Pro', 'Immagini/Cosa Nuovo/DJI RS 4 PRO.png', 'Immagini/Cosa Nuovo/DJI RS 4 PRO Sfondo.jpg', 879, 'stabilizzatore di punta espansivo', 'Riprese verticali native di 2ª generazione‌‌: Grazie alla nuova piastra orizzontale dello stabilizzatore, non serviranno accessori aggiuntivi. I videografi potranno passare facilmente alle riprese verticali.', 'Autonomia della batteria di 2,4x‌‌, soluzioni per tutti gli scenari‌: Autonomia estesa fino a 29 ore con l’Impugnatura BG70 ad alta capacità per DJI RS e diverse configurazioni manuali con il protocollo SDK per RS.', 'Supporta motori Dual Focus e Zoom a controllo remoto: Messa a fuoco e zoom precisi grazie all instillazione di due motori per Focus Pro. L unità manuale Focus Pro e il monitor remoto ad alta luminosità consentono un controllo preciso di stabilizzatore e messa a fuoco.');
*/



