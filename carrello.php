<?php
    require_once 'authentication.php';
    require_once 'dbconfiguration.php';

    if (!$userid = checkAuth()) {
        header("Location: index.php");
        exit;
    }

    $conn = new mysqli($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Il mio carrello</title>
  <link rel="stylesheet" href="carrello.css">
  <script src="carrello.js" defer></script>
  <script src="api/add_to_cart.js" defer></script>
  <script src="api/remove_from_cart.js" defer></script>
</head>
<body>
    <?php require_once 'header.php'; ?>
        <div class="cart-container">
            <h1>Il mio carrello</h1>
            <div class="cart-items">
                <table>
                    <thead>
                        <tr>
                            <th>Prodotto</th>
                            <th>Prezzo</th>
                            <th>Quantità</th>
                            <th>Totale</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody id="cart-products">
                        
                    </tbody>
                </table>
            </div>
            

            <div class="cart-summary">
                <div class="summary-content">
                    <div class="summary-left">
                        <div class="info-box">
                            <p>📄 Sconta l'1% su ogni acquisto in credito DJI: più acquisti, più guadagni.</p>
                            <a href="#">Scopri di più sul credito DJI ></a>
                        </div>
                        <div class="info-box">
                            <p>🏷️ Hai un codice coupon?</p>
                            <p>Procedi con il pagamento per poter usufruire di coupon e crediti DJI.</p>
                        </div>
                    </div>

                    <div class="summary-right">
                        <div class="total">
                            <span>IMPORTO TOTALE:</span>
                            <strong id="cart-total">0.00 €</strong>
                            <p class="shipping">Spedizione: <span class="free">Gratis</span></p>
                        </div>

                        <div class="cart-actions">
                            <button class="continue">Continua gli acquisti</button>
                            <button class="paypal">PayPal Paga adesso</button>
                            <button class="checkout">Vai alla cassa</button>
                        </div>
                    </div>
                </div>
                <div class="summary-footer">
                    <p>Hai bisogno di aiuto? Contattaci per assistenza.</p>
                    <a href="#">Contattaci ></a>
                </div>
            </div>
        </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>
