<?php
// spotify_token.php
$client_id = '7f6bacba3bd5461983e304f4710f88f6';
$client_secret = 'a8eabd53422f496188eeee5f52f71af9';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
$headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

$token = json_decode($result)->access_token;

$q = isset($_GET['q']) ? $_GET['q'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'album';

$data = http_build_query(array("q" => $q, "type" => $type));
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
$headers = array("Authorization: Bearer ".$token);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

header('Content-Type: application/json');
echo $result;
?>