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
$map->addOverlay($marker);
// Display the map
//echo $map->display();
echo $map->display();

?>
