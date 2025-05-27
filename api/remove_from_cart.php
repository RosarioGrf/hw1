<?php
header('Content-Type: application/json');
require_once '../dbconfiguration.php';
require_once '../authentication.php';

if (!$userid = checkAuth()) {
    echo json_encode(['success' => false, 'error' => 'Utente non autenticato']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cart_id'])) {
    echo json_encode(['success' => false, 'error' => 'ID carrello mancante']);
    exit;
}

$cart_id = (int)$data['cart_id'];

$conn = mysqli_connect( $dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']
);

if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'Errore connessione DB']);
    exit;
}

$check = "SELECT quantity FROM cart WHERE id = $cart_id AND user_id = $userid";
$result = mysqli_query($conn, $check);

if ($row = mysqli_fetch_assoc($result)) {
    if ($row['quantity'] > 1) {
        $update = "UPDATE cart SET quantity = quantity - 1 WHERE id = $cart_id AND user_id = $userid";
        $esito = mysqli_query($conn, $update);
        $new_quantity = $row['quantity'] - 1;
        $new_idcart = $cart_id;
    } else {
        $delete = "DELETE FROM cart WHERE id = $cart_id AND user_id = $userid";
        $esito = mysqli_query($conn, $delete);
        $new_quantity = 0;
        $new_idcart = null;
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Elemento non trovato']);
    mysqli_close($conn);
    exit;
}

if ($esito) {
    echo json_encode([
        'success' => true,
        'quantity' => $new_quantity,
        'idcart' => $new_idcart
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Errore nella query']);
}

mysqli_close($conn);
?>