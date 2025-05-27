<!-- header.php -->
<?php 
    require_once 'authentication.php';
    $logged = checkAuth() ? 'true' : 'false';

    $conn=mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    mysqli_close($conn);
?>

<head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <script src="index.js" defer></script>
    <script src="header.js" defer></script>
    <title>Footer</title>
  </head>

<header>
    <div id="sfondo_top">
        <div id="top-bar-sopra">
            <span class="left">
                <div class="bar"> 
                    <div class="flex-item">
                        dji.com
                    </div>        
                    <div class="flex-item">
                        App DJI Store
                    </div>
                    <div class="flex-item">
                        Più ▼
                    </div>
                    <div class="flex-item">
                        Solo per un periodo limitato - Scopri questo aggiornamento che prevede la consegna rapida gratuita dal DJI Store!
                    </div>
                </div>
            </span>
            <span class="right">
                <div class="bar">
                    <div class="flex-item">
                        <img src="Immagini\icons\globe.png" alt="globe">
                    </div>
                    <div class="flex-item">
                        Italia (Italiano / € EUR)
                </div>
            </span>
        </div>
    </div>

    <div id="sfondo_bar_sotto">

        <div id="search-bar" class="hidden">
            <div id="search-container">
                <span class ="icon">
                    <img src="Immagini/icons/search.png" alt="">
                </span>
                <input type="text" class="search-input" placeholder="Cerca prodotti...">
                <span id="close-icon">
                    <img src="Immagini/icons/close.png" alt="">
                </span>
            </div>

        </div>

        <div id="top-bar-sotto">
            <span class="left">
                <div class="bar">
                    <div class="menu">
                        <div class="dropdown">
                            <div class="flex-item">
                                <img src="Immagini\icons\menu.png" alt="menu">
                            </div>
                            <div class="dropdown-content">
                                <div class="dropdown-inner">
                                    <div class="dropdown-left">
                                        <h3>solo per un periodo limitato - Scopri questo aggiornamento che prevede la consegna rapida ratuita dal DJI Store</h3>
                                        <div class="dropdown-left-top">
                                            <p>Droni con fotocamera </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Prodotti portatili </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Energia </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Educazione e Industria </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Servizi </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Accessori </p>
                                        </div>
                                        <div class="dropdown-left-top">
                                            <p>Ricondizionati Ufficiali </p>
                                        </div>
                                        <p>dji.com ></p>
                                        <p>App DJI Store ></p>
                                        <p>Guide per l'acquisto ></p>
                                        <p>Credito DJI ></p>
                                        <p> Italia/italiano ></p>
                                    </div>
                                </div>
                            </div>               
                        </div>
                    </div>


                    <a href="index.php">
                        <div id="logo">
                            <img src="Immagini\logo.svg" alt="logo"> <strong>STORE</strong>
                        </div>
                    </a>

                    <div class="dropdown">
                        <div class="flex-item">
                            Droni con fotocamera
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <div class="dropdown-left-top" id="droni-fotografia">
                                            <h3>Fotografia aerea</h3>
                                            <div class="prodotti-fotografia"></div>
                                            <h3>Esperienza di volo immersiva</h3>
                                            <div class="prodotti-esperienza"></div>
                                            <h3>Cinematografia aerea</h3>
                                            <div class="prodotti-cinematografia"></div>
                                        </div>
                                    </div>
                                    <h3>Droni con fotocamera></h3>
                                </div>
        
                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-foto-destra"></div>
                                </div>

                            </div>
                        </div>
                    </div>






                    <div class="dropdown">
                        <div class="flex-item">
                            Prodotti Portatili
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                    <h3>Riprendi i tuoi momenti</h3>
                                    <div class="prodotti-riprendi"></div>
                                    <h3>Riprese professionali</h3>
                                    <div class="prodotti-riprese"></div>
                                
                                    </div>
                                    <h3>Prodotti portatili></h3>
                                </div>
        
                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-portatili-destra"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dropdown">
                        <div class="flex-item">
                            Energia
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <h3>Stazione di alimentazione portatile</h3>
                                        <div class="prodotti-energia"></div>
                                    </div>
                                    <h3>Mostra tutto></h3>
                                </div>

                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-energia-destra"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dropdown">
                        <div class="flex-item">
                            Educazione e Industria
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <h3>Fotografia aerea</h3>
                                            <div class="prodotti-educazione-fotografia"></div>
                                    </div>
                                    <h3>Educazione e Industria></h3>
                                </div>
        
                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex">
                                        <div class="dropdown-right-flex prodotti-educazione-destra"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dropdown">
                        <div class="flex-item">
                            Servizi
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <h3>Fotografia aerea</h3>
                                        <div class="prodotti-servizi-fotografia"></div>
                                    </div>
                                    <h3>Tutti i Servizi></h3>
                                </div>
                                
                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-servizi-destra"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="dropdown">
                        <div class="flex-item">
                            Accessori
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">
                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <h3>Droni con fotocamera</h3>
                                        <div class="prodotti-accessori-droni"></div>
                                        <h3>Prodotti portatili</h3>
                                        <div class="prodotti-accessori-portatili"></div>
                                        <h3>Power station portatile</h3>
                                        <div class="prodotti-accessori-power"></div>
                                    </div>
                                    <h3>Accessori></h3>
                                </div>
        
                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-accessori-destra"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dropdown">
                        <div class="flex-item">
                            Ricondizionati Ufficiali
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-inner">

                                <div class="dropdown-left">
                                    <div class="dropdown-left-top">
                                        <h3>Ricondizionati Ufficiali</h3>
                                            <div class="prodotti-ricondizionati-droni"></div>
                                    </div>
                                    <h3>Ricondizionati Ufficiali></h3>
                                </div>

                                <div class="dropdown-right">
                                    <div class="dropdown-right-flex prodotti-ricondizionati-destra"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        
            <span class="right">
                <div class="show">
                    <div class="bar">
                        <div id="search-icon">
                            <div class="flex-item">
                                <img src="Immagini\icons\search.png" alt="search">
                            </div>
                        </div>
                        <div id="cart" data-cart-count="0">
                            <div class="flex-item">
                                <img src="Immagini\icons\online-shopping.png" alt="cart">
                            </div>
                        </div>
                        <div id="user" data-logged="<?php echo $logged; ?>">
                            <div class="flex-item">
                                <img src="Immagini\icons\user.png" alt="user">
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        </div>

        
        <div class="flex_promo">
            <section class="promo">
                <p class="subtext">
                    Aggiorna il tuo equipaggiamento per la stagione
                </p>
                <h1>
                    FINO AL 29% DI SCONTO
                </h1>
                <p class="description">
                    Scopri regali unici e offerte esclusive nel DJI Store.
                </p>
                <button>
                    Acquista Ora
                </button>
            </section>
        </div>
    </div>
</header>