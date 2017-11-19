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
/* @var $model app\models\Map */
?>
<p>Information:</p>

<ul>
    <li><label>City</label>: <?= Html::encode($model->city) ?></li>
    <li><label>Power</label>: <?= Html::encode($model->power) ?></li>
    <li><label>Kind of Bomb</label>: <?= Html::encode($model->kindbomb) ?></li>
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


$coord = new LatLng(['lat' => $lat, 'lng' => $lng]);

if (!is_null($lat) && !is_null($lng)) {
    $marker = new \dosamigos\google\maps\overlays\Marker([
        'position' => new \dosamigos\google\maps\LatLng([
            'lat' => $lat,
            'lng' => $lng,
        ]),
        'title'    => 'Station Amsterdam',
    ]);
}

// Lets add a marker now
//$marker = new Marker([
//    'position' => $coord,
//    'title' => 'My Home Town',
//]);
//// Provide a shared InfoWindow to the marker
//$marker->attachInfoWindow(
//    new InfoWindow([
//        'content' => '<p>This is my home town</p>'
//    ])
//);

$radio = 1;
switch ($model->power) {
    case 1:
        $radio = ($model->power)*1000;
        break;
    case 2:
        $radio = ($model->power)*2000;
        break;
    case 3:
        $radio = ($model->power)*3000;
        break;
    case 4:
        $radio = ($model->power)*4000;
        break;
    case 5:
        $radio = ($model->power)*5000;
        break;
}

$circle = new \dosamigos\google\maps\overlays\Circle([
    'center' => $coord,
    'strokeColor'=> '#FF0000',
    'strokeOpacity'=> 0.8,
    'strokeWeight'=> 2,
    'fillColor'=> '#FF0000',
    'fillOpacity'=> 0.35,
    'radius' => $radio,
]);

$circle2 = new \dosamigos\google\maps\overlays\Circle([
    'center' => $coord,
    'strokeColor'=> '#1500ff',
    'strokeOpacity'=> 0.8,
    'strokeWeight'=> 2,
    'fillColor'=> '#1500ff',
    'fillOpacity'=> 0.35,
    'radius' => 1000,
]);

// Add it now to the map
$map->addOverlay($circle);
$map->addOverlay($circle2);


$map->addOverlay($marker);

$map->center = $map->getMarkersCenterCoordinates();
$map->zoom = $map->getMarkersFittingZoom() - $model->power;
echo $map->display();

?>
