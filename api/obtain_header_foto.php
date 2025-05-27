<?php
require_once '../dbconfiguration.php';

if (!isset($_GET["q"])) {
    echo "Non dovresti essere qui";
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfiguration['host'], $dbconfiguration['user'], $dbconfiguration['password'], $dbconfiguration['name']);

$query = "SELECT * FROM header_foto";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$foto = [];
while ($row = mysqli_fetch_assoc($res)) {
    $foto[] = $row;
}

mysqli_close($conn);

echo json_encode($foto);
?>