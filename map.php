<?php

$apiKey = "AIzaSyAyQ82qFwVf-NBxuKyOanc64Ks-d55Xcfk";
$address = "1600 Amphitheatre Parkway, Mountain View, CA"; // Example address

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $apiKey;

$response = file_get_contents($url);
$data = json_decode($response);

if ($data->status == "OK") {
    $latitude = $data->results[0]->geometry->location->lat;
    $longitude = $data->results[0]->geometry->location->lng;
    // Display the location on a map
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Location Map</title>
        <script src='https://maps.googleapis.com/maps/api/js?key=$apiKey'></script>
        <script>
            function initMap() {
                var latitude = $latitude;
                var longitude = $longitude;
                var location = {lat: latitude, lng: longitude};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: location
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        </script>
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <h1>Location Map</h1>
        <div id='map'></div>
        <script>
            initMap();
        </script>
    </body>
    </html>";
} else {
    echo "Error: Unable to retrieve location data.";
}

?>