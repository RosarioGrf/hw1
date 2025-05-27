<?php
require_once '../dbconfiguration.php';
require_once '../authentication.php';

header('Content-Type: application/json');

$cartCount = 0;
if ($userid = checkAuth()) {
    $conn = mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);
    if ($conn) {
        $sql = "SELECT SUM(quantity) as totale FROM cart WHERE user_id = $userid";
        $result = mysqli_query($conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $cartCount = (int)$row['totale'];
        }
        mysqli_close($conn);
    }
}
echo json_encode(['cartCount' => $cartCount]);
?>