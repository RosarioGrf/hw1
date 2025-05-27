<?php
    // weather_api.php
    $apiKey = '7c15ad8a5a0e46a8b62110903251204';

    $lat = isset($_GET['lat']) ? $_GET['lat'] : '';
    $lng = isset($_GET['lng']) ? $_GET['lng'] : '';

    if ($lat === '' || $lng === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Coordinate mancanti']);
        exit;
    }
    $url = "https://api.weatherapi.com/v1/current.json?key=$apiKey&q=$lat,$lng&aqi=no";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    header('Content-Type: application/json');
    echo $result;
?>