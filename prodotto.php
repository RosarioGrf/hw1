<?php 
    include 'authentication.php';
  
    if (!checkAuth()) {
        header('Location: login.php');
        exit;
    }

    $conn=mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prodotto.css">
    <script src="api/add_to_cart.js" defer></script>
    <script src="api/remove_from_cart.js" defer></script>
    <script src="prodotto.js" defer></script>
    <title>Dettagli Prodotto</title>
</head>
<body>
    <?php require_once 'header.php'; ?>
    <div class="contenuto">
        <div id="prodotto-details" data-product-id="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
            <div class="dettagli-prodotto">
                <div class="immagine-prodotto" id="immagine-prodotto"></div>
                <div class="descrizione-prodotto">
                    <h1 id="nome-prodotto"></h1>
                    <h2 id="descrizione-prodotto"></h2>
                    <h3 class="caratteristiche_left" id="caratteristiche2"></h3>
                    <h3 class="caratteristiche_right" id="caratteristiche3"></h3>
                    <h3 class="caratteristiche_left" id="caratteristiche4"></h3>
                    <div class="prezzo">
                        <strong><span id="prezzo-prodotto"></span></strong>
                    </div>
                    <div class="add-to-cart">
                        <button class="remove-item-btn" id="remove-btn" disabled> - </button>
                        <span class="cart-quantity" id="cart-quantity"><?php echo $cart_quantity; ?></span>
                        <button class="add-to-cart-btn" id="add-btn"> + </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>