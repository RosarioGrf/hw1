<?php
    require_once '../dbconfiguration.php';
    require_once '../authentication.php';

    if (!isset($_GET['id'])) {
        echo "Non dovresti essere qui";
        exit;
    }

    $id = (int)$_GET['id'];
    $conn = mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
    if (!$conn) {
        echo json_encode(['error' => 'Connessione fallita']);
        exit;
    }

    $sql = "SELECT * FROM prodotti WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        $cart_quantity = 0;
        $idcart = null;
        $userid = checkAuth();
        if ($userid) {
            $sql_cart = "SELECT quantity, id as idcart FROM cart WHERE user_id = $userid AND product_id = $id";
            $res_cart = mysqli_query($conn, $sql_cart);
            if ($row_cart = mysqli_fetch_assoc($res_cart)) {
                $cart_quantity = $row_cart['quantity'];
                $idcart = $row_cart['idcart'];
            }
        }
        $row['cart_quantity'] = $cart_quantity;
        $row['idcart'] = $idcart;
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Prodotto non trovato']);
    }
    mysqli_close($conn);
?>