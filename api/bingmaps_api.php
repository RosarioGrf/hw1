<?php
    // bingmaps_api.php
    if (isset($_GET['city'])){
        $city = urlencode($_GET['city']);

        $bingMapsKey = 'ApwhowTOlOwc6jfo5zPH8klAHAy67rO45yu5zJsA-uaIYH8dMnk7xQHQxPfeFUpF';
        $url = "http://dev.virtualearth.net/REST/v1/Locations?query=$city&key=$bingMapsKey";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        header('Content-Type: application/json');   
        echo $result;
    }
?>