<?php
require_once '../dbconfiguration.php';
require_once '../authentication.php';

header('Content-Type: application/json');

if (!$userid = checkAuth()) {
    echo json_encode(['success' => false, 'error' => 'Utente non autenticato']);
    exit;
}

$conn = mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'Errore connessione DB']);
    exit;
}

$sql = "SELECT p.id as product_id, p.immagine, p.nome_prodotto, p.prezzo, c.quantity, c.id as idcart
        FROM cart c JOIN prodotti p ON c.product_id = p.id 
        WHERE c.user_id = $userid";
$result = mysqli_query($conn, $sql);

$cartItems = [];
$cartTotal = 0;
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cartItems[] = $row;
        $cartTotal += $row['prezzo'] * $row['quantity'];
    }
}
mysqli_close($conn);

echo json_encode([
    'success' => true,
    'cartItems' => $cartItems,
    'cartTotal' => $cartTotal
]);
?>