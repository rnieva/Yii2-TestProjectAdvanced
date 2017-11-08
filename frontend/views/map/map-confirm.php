<?php
use yii\helpers\Html;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use dosamigos\google\maps\LatLng;
?>
<p>Information:</p>

<ul>
    <li><label>City</label>: <?= Html::encode($model->city) ?></li>
    <li><label>Power</label>: <?= Html::encode($model->power) ?></li>
</ul>

<?=
$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
]);

$geo_coding_client = new \dosamigos\google\maps\services\GeocodingClient();
//$lookup_response = $geo_coding_client->lookup([
//    'address' => 'Stationsplein, 1012 AB Amsterdam',
//    'region'  => 'Netherlands',
//]);
$lookup_response = $geo_coding_client->lookup([
    'address' => $model->city,
]);
$lat = isset($lookup_response->results[0]->geometry->location->lat) ? $lookup_response->results[0]->geometry->location->lat : null;
$lng = isset($lookup_response->results[0]->geometry->location->lng) ? $lookup_response->results[0]->geometry->location->lng : null;

//if (!is_null($lat) && !is_null($lng)) {
//    $marker = new \dosamigos\google\maps\overlays\Marker([
//        'position' => new \dosamigos\google\maps\LatLng([
//            'lat' => $lat,
//            'lng' => $lng,
//        ]),
//        'title'    => 'Station Amsterdam',
//    ]);
//}

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
]);
// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>This is my home town</p>'
    ])
);
$circle = new \dosamigos\google\maps\overlays\Circle([
    'center' => $coord,
    'strokeColor'=> '#FF0000',
    'strokeOpacity'=> 0.8,
    'strokeWeight'=> 2,
    'fillColor'=> '#FF0000',
    'fillOpacity'=> 0.35
]);


// Add it now to the map
$map->addOverlay($circle);


//$map->addOverlay($marker);
// Display the map
//echo $map->display();
$map->center = $map->getMarkersCenterCoordinates();
$map->zoom = $map->getMarkersFittingZoom() - 1;
echo $map->display();

?>
