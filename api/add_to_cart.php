<?php
    header('Content-Type: application/json');

    require_once '../dbconfiguration.php';
    require_once '../authentication.php';

    if (!$userid = checkAuth()) {
        echo json_encode(['success' => false, 'error' => 'Utente non autenticato']);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['prodotto_id']) || !isset($data['quantity'])) {
        echo json_encode(['success' => false, 'error' => 'Dati mancanti']);
        exit;
    }

    $prodotto_id = (int)$data['prodotto_id'];
    $quantity = (int)$data['quantity'];

    $conn = mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']
    );

    if (!$conn) {
        echo json_encode(['success' => false, 'error' => 'Errore connessione DB']);
        exit;
    }

    $check = "SELECT * FROM cart WHERE user_id = $userid AND product_id = $prodotto_id";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $update = "UPDATE cart SET quantity = quantity + $quantity WHERE user_id = $userid AND product_id = $prodotto_id";
        $esito = mysqli_query($conn, $update);
    } else {
        $insert = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($userid, $prodotto_id, $quantity)";
        $esito = mysqli_query($conn, $insert);
    }

    if ($esito) {
        $sql = "SELECT id, quantity FROM cart WHERE user_id = $userid AND product_id = $prodotto_id";
        $res = mysqli_query($conn, $sql);
        $new_quantity = 0;
        $idcart = null;
        if ($row = mysqli_fetch_assoc($res)) {
            $new_quantity = (int)$row['quantity'];
            $idcart = (int)$row['id'];
        }
        echo json_encode(['success' => true, 'quantity' => $new_quantity, 'idcart' => $idcart]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Errore nella query']);
    }

    mysqli_close($conn);
?>