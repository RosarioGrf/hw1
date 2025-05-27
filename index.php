<!--ROSARIO MARCO GRIFASI 1000045535-->
<!--HTML Pagina principale DJI STORE-->

<?php
    require_once 'authentication.php';

    /*php per slider*/
    $conn=mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($conn);

?>

<html>
    <head>
        
        <title>DJI STORE</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="index.js" defer></script>
        <script src="api/add_to_cart.js" defer></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php require_once 'header.php'; ?>


        <articole>
            <div class="slider-container">
                <button id="arrow-left" class="arrow left">
                    <img src="Immagini\icons\arrow-left.png" alt="left-arrow">
                </button>

                <div id="slider"></div>

                <button id="arrow-right" class="arrow right">
                    <img src="Immagini\icons\arrow-right.png" alt="right-arrow">
                </button>
            </div>

        </articole>
            

    
        <article id="sfondo_top">
            <div class="article_margin">
                    <div class="article_title">
                        <br><br>
                        Cosa c'è di nuovo
                    </div>

                    <div class="article_element">
                        <div>
                            <button id="arrow-left-card" class="arrow left">
                                <img src="Immagini\icons\arrow-left.png" alt="left-arrow">
                            </button>
                            <div id="cards_container"></div>

                            <button id="arrow-right-card" class="arrow right">
                                <img src="Immagini\icons\arrow-right.png" alt="right-arrow">
                            </button>
                        </div>
                    </div>





                    
                    <div class="article_title">
                        Perchè acquistare sul DJI Store
                    </div>

                    <div class="flex_container_info">
                        <div class="flex_column">
                            <div class="item_info_center"   data-title="Premio in credito DJI" 
                                                            data-text="1% di premio in credito DJI sul valore pagato, che può essere utilizzato per ridurre gli importi degli ordini futuri nella stessa unità di valuta." 
                                                            data-extra="Scopri di più">
                                <div class="item_info">
                                    <h3>1% di premio in Credito DJI</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\1 di premio.jpg" alt="DJI Credit">
                                </div>
                            </div>

                            <div class="item_info_center"   data-title="Consegna rapida gratuita" 
                                                            data-text="Per un periodo limitato - Non perdere l’occasione! Scopri questo aggiornamento che prevede la consegna rapida gratuita dal DJI Store! Questa offerta a tempo limitato è disponibile per gli articoli in stock. La consegna rapida non è disponibile per gli indirizzi nelle isole. Gli ordini con indirizzi nelle isole o contenenti più di 2 batterie verranno spediti tramite metodi di consegna standard.">
                                <div class="item_info" >
                                    <h3>Consegna rapida gratuita</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\consegna rapida.jpg" alt="Fast Delivery">
                                </div>
                            </div>
                        </div>
                        <div class="flex_column">
                            <div class="item_info_center"   data-title="Resi entro max 30 giorni" 
                                                            data-text="Acquisti convenienti con resi e sostituzioni pratici."
                                                            data-extra="Scopri di più">
                                <div class="item_info">
                                    <h3>Resi entro 14 giorni</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\14 giorni.jpg" alt="Fast Delivery">
                                </div>
                            </div>
                            <div class="item_info_center"   data-title="Un esperto DJI può aiutarti a scegliere"
                                                            data-text="Fornisce un esclusivo servizio clienti individuale per domande e risposte complete e supporto tecnico professionale."
                                                            data-extra="Contattaci">
                                <div class="item_info">
                                    <h3>Aiuto da un esperto DJI</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\aiuto da un esperto DJI.jpg" alt="DJI Expert">
                                </div>
                            </div>
                        </div>
                        <div class="flex_column">
                            <div class="item_info_center"   data-title="Spedizione gratuita" 
                                                            data-text="Approfitta della spedizione gratuita su tutti gli ordini.">
                                <div class="item_info">
                                    <h3>Spedizione gratuita</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\spedizione gratuita.jpg" alt="Free Delivery">
                                </div>
                            </div>
                            <div class="item_info_center"   data-title="Ricondizionati Ufficiali" 
                                                            data-text="Risparmia il 20% sui prodotti ricondizionati ufficiali di DJI e usufruisci della stessa garanzia dei prodotti nuovi di zecca." 
                                                            data-extra="Scopri di più">
                                <div class="item_info">
                                    <h3>Ricondizionati Ufficiali</h3>
                                    <img src="Immagini/perchè acquistare sul DJI Store/ricondizionati ufficiali.png" alt="Refurbished DJI">
                                </div>
                            </div>
                        </div>
                        <div class="flex_column">
                            <div class="item_info_center"   data-title="Gamma completa di accessori ufficiali" 
                                                            data-text="È disponibile un'ampia gamma di accessori realizzati da DJI per ottenere il massimo da droni, fotocamere e stabilizzatori DJI." 
                                                            data-extra="Trova i tuoi accessori">
                                <div class="item_info">
                                    <h3>Accessori ufficiali</h3>
                                    <img src="Immagini\perchè acquistare sul DJI Store\accessori ufficiali.jpg" alt="DJI Accessories">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="article_title">
                        Droni con fotocamera
                    </div>

                    <div class="video-banner">
                        <video autoplay muted playsinline class="background-video">
                            <source src="Video\Droni con fotocamera.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <img class="background-img" src="Immagini\Droni con fotocamera\video img sostituzione.jpg" alt="img sostituzione">

                        <div class="overlay">
                            <button class="restart-button"> 
                                <img src="Immagini\icons\rotate-left.png" alt="replay">
                            </button>
                        </div>

                        <div class="content">
                            <p>Nuova</p>
                            <h1>DJI Flip</h1>
                            <p>Drone multifunzione con fotocamera per vlog</p>
                            <p class="price">A partire da 439 €</p><br><br>
                            <button>Acquista</button>
                        </div>
                    </div>


                    


                    <div class="flex_container_info">
                        <div class="flex_container_info" id="droni_fotocamera_container">

                            <div class="flex_column">
                                <div class="item_product">
                                    <h4>Scopri di più</h4>
                                    <h3>
                                        Droni con fotocamera <br><br>
                                        <img src="Immagini\icons\next.png" alt="next">
                                    </h3>
                                    <img src="Immagini\Droni con fotocamera\droni con fotocamera.png" alt="Droni con fotocamera">
                                </div>
                                <div class="item_product_center">
                                    <div class="item_product">
                                        <h3>
                                            Tutti gli accessori
                                            <img src="Immagini\icons\next.png" alt="next">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>







 

                    <div class="article_title">
                        Portatili · Registrazione quotidiana
                    </div>

                    <div class="video-banner">
                        <video autoplay muted playsinline class="background-video">
                            <source src="Video\Registrazione quotidiana.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>

                        <img class="background-img" src="Immagini\portatili registrazione quotidiana\registrazione quodidiana foto.jpg" alt="img sostituzione">

                        <div class="overlay">
                            <button class="restart-button">
                                <img src="Immagini\icons\rotate-left.png" alt="replay">
                            </button>
                        </div>

                        <div class="content">
                            <p>Nuova</p>
                            <h1>Osmo Mobile 7P</h1>
                            <p>stabilizzatore di punta per smartphone con tracciamento</p>
                            <p class="price">A partire da 159 €</p><br><br>
                            <button>Acquista</button>
                        </div>
                    </div>



                    <div class="flex_container_info">
                        <div class="flex_container_info" id="droni_portatili_quotidiana_container">
                       
                            <div class="flex_column">
                                <div class="item_product">
                                    <h4>Guide per l'acquisto</h4>
                                    <h3>
                                        Come Scegliere un dispositivo portatile<br><br>
                                        <img src="Immagini\icons\next.png" alt="next">
                                    </h3>
                                    <img src="Immagini\portatili registrazione quotidiana\Guide per l'acquisto.png" alt="Guide per l'acquisto">
                                </div>
                                <div class="item_product_center">
                                    <div class="item_product">
                                        <h3>
                                            Tutti gli accessori
                                            <img src="Immagini\icons\next.png" alt="next">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    
                    <div class="foto_fullwidth_article">
                        <img src="Immagini\Droni con fotocamera\ricondizionati.jpg" alt="ricondizionati ufficiali">
                    </div>



                    <div class="article_title">
                        Portatili · Riprese professionali
                    </div>

                    <div class="video-banner">
                        <video autoplay muted playsinline class="background-video">
                            <source src="Video\Riprese professionali.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>

                        <img class="background-img" src="Immagini\portatili riprese professionali\riprese professionali foto.jpg" alt="img sostituzione">

                        <div class="overlay">
                            <button class="restart-button">
                                <img src="Immagini\icons\rotate-left.png" alt="replay">
                            </button>
                        </div>

                        <div class="content">
                            <p>Nuova</p>
                            <h1>DJI Rs 4 Mini</h1>
                            <p>stabilizzatore leggero e compatto per content creator</p>
                            <p class="price">A partire da 389 €</p><br><br>
                            <button>Acquista</button>
                        </div>
                    </div>

                    
                    <div class="flex_container_info">
                        <div class="flex_container_info" id="droni_portatili_professionale_container">

                            <div class="flex_column">
                                <div class="item_product">
                                    <h4>Guide per l'acquisto</h4>
                                    <h3>
                                        Come Scegliere un dispositivo portatile<br><br>
                                        <img src="Immagini\icons\next.png" alt="next">
                                    </h3>
                                    <img src="Immagini\portatili riprese professionali\Guide per l'acquisto.png" alt="Guide per l'acquisto">
                                </div>
                                <div class="item_product_center">
                                    <div class="item_product">
                                        <h3>
                                            Tutti gli accessori
                                            <img src="Immagini\icons\next.png" alt="next">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="article_title">
                        Servizi
                    </div>

                    <div class="flex_container_info">
                        <div class="flex_container_info" id="servizi_container">

                            <div class="flex_column">
                                <div class="item_product">
                                    <h4>Scopri di più</h4>
                                    <h3>
                                        Info sui Servizi di DJI<br><br>
                                        <img src="Immagini\icons\next.png" alt="next">
                                    </h3>
                                    <img src="Immagini\servizi\Info sui servizi di DJI.png" alt="Info sui servizi">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="article_title">
                        Educazione e Industria
                    </div>

                    <div class="slider-container-2">
                        <div id="slider-2" class="slider-2">
                          <div class="card-2" style="background-image: url('Immagini/educazione e industria/imprese.jpg')">
                            <h2>Imprese</h2>
                            <p>Soluzioni industriali smart basate su droni</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/educazione e industria/educazione.jpg')">
                            <h2>Educazione</h2>
                            <p>Soluzioni per programmazioni didattiche</p>
                          </div>
                        </div>
                    </div>












                    <div class="article_title">
                        Playbook sui droni con fotocamera
                    </div>

                    <div class="slider-container-2">
                        <button class="arrow-2 left-2">
                            <img src="Immagini\icons\arrow-left.png" alt="left-arrow">
                        </button>

                        <div class="slider-2">
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/Unboxing di DJI Neo.jpg')">
                            <h2>Unboxing di DJI Neo</h2>
                            <p>il drone palmare per vlog pronto per ogni avventura</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/10 accessori TOP per DJI Mini.png')">
                            <h2>10 accessori TOP per DJI Mini</h2>
                            <p>Ottieni il MASSIMO dal tuo DJI Mini</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Mini 4 pro vs. Mini 3 Pro.jpg')">
                            <h2>DJI Mini 4 Pro vs. Mini 3 Pro</h2>
                            <p>Cosa c'è di nuovo?</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/Mini 4 pro un aggiornamento stellare.jpg')">
                            <h2>Mini 4 Pro: un Aggiornamento stellare!</h2>
                            <p>Potenzia Mini 4 Pro con volo in FPV</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Air 3 vs Air 2S vs Mini 3 Pro.jpg')">
                            <h2>DJI Air 3 vs. Air 2S vs. Mini 3 Pro</h2>
                            <p>Quale Scegliere?</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/La serie Mavix 3 e mini 3 pro supportano FPV.jpg')">
                            <h2>La serie Mavic 3 e Mavic 3 Pro supportano FPV</h2>
                            <p>Voli Immersivi emozionanti</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/Mavic 3 pro scatti robotici Epici.jpg')">
                            <h2>Mavic 3 Pro: SCATTI ROBOTICI EPICI</h2>
                            <p>Mavic 3 Pro X Stephane Couchoud</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Inspire 3 illumina la notte.jpg')">
                            <h2>DJI Inspire 3: Illumina la notte</h2>
                            <p>Un video mozzafiato mostra l'impossibile</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Mavic 3 Pro vs. Mavic 3 vs. Mavic 3.jpg')">
                            <h2>DJI Mavic 3 Pro vs. Mavic 3 vs. Mavic 3 Classico</h2>
                            <p>Quale Scegliere?</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Mini 3 Unboxing & Highlights.jpg')">
                            <h2>DJI Mini 3 Unboxing & Highlights</h2>
                            <p>Dietro il design di Mini 3</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook sui droni con fotocamera/DJI Mini 3 vs DJI Mini 2.png')">
                            <h2>DJI Mini 3 vs. DJI Mini 2</h2>
                            <p>Scopri di più su come le funzioni di Mini 3 rendono la creazione di contenuti un gioco da ragazzi.</p>
                          </div>
                        </div>
                        <button class="arrow-2 right-2">
                            <img src="Immagini\icons\arrow-right.png" alt="right-arrow">
                        </button>
                    </div>




















                    <div class="article_title">
                        Playbook sui fotocamere e stabilizzatori
                    </div>

                    <div class="slider-container-2">
                        <button class="arrow-2 left-2">
                            <img src="Immagini\icons\arrow-left.png" alt="left-arrow">
                        </button>

                        <div class="slider-2">
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/DJI Mic 2 compatibilita estrema.jpg')">
                            <h2>DJI Mic 2: compatibilità estrema</h2>
                            <p>federltà audia senza rivali, risultati ottimizzati</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/Un radioso Benvenuto al 2024.png')">
                            <h2>Un radioso Benvenuto al 2024</h2>
                            <p>Arte esposiva presentata da Cai Guo-Qiang</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/Hai bisogno di uno stabilizzatore')">
                            <h2>Hai bisogno di uno stabilizzatore?</h2>
                            <p>Una Guida per aiutarti a scegliere</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/DJI RS 3 Mini unboxing e highlights.jpg')">
                            <h2>DJI RS 3 Mini: unboxing e highlights</h2>
                            <p>Scopri cosa puoi fare con una stabilizzazione ancora più fluida</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/A 10 bit con Action 3.jpg')">
                            <h2>A 10 con Action 3</h2>
                            <p>Abbiamo anche aggiunto le funzioni 4K HDR, Timecode e molto altro</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/4 aggiornamenti per Osmo Action 3.jpg')">
                            <h2>4 aggiornamenti per Osmo Action 3</h2>
                            <p>Per ogni scenario estremo</p>
                          </div>
                          <div class="card-2" style="background-image: url('Immagini/playbook su fotocamere e stabilizzatori/Crea come un pro in 3 passaggi.jpg')">
                            <h2>Crea come un pro in 3 passaggi</h2>
                            <p>Scatena la tua creatività</p>
                          </div>
                        </div>
                        <button class="arrow-2 right-2">
                            <img src="Immagini\icons\arrow-right.png" alt="right-arrow">
                        </button>
                    </div>




                    <div class="article_title">
                        Preparati al Volo: Previsioni per Ogni Avventura
                        <div class="container-map">
                            <div id="weather-box">
                                <p>Caricamento meteo...</p>
                            </div>
                        </div>
                    </div>


                    <div class="article_title">
                        <div class="album-app">
                            <section id="album-container">
                                <h1>
                                    <img src="Immagini\icons\spotify.png" alt="music icon">
                                    Vola con la Musica: La Tua Colonna Sonora in Cielo
                                </h1>
                                <form id="search-form">
                                    <textarea id="album" placeholder="Cerca un album..."></textarea>
                                    <button type="submit">Cerca</button>
                                </form>
                                <section id="album-view"></section>
                            </section>
                        </div>                         
                    </div>

                </div>
            </div>

        </article>

    <?php require_once 'footer.php'; ?>
        
    </body>
</html>