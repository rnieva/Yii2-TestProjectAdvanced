<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
<p class="lead">Managing Maps</p>
<p>Map</p>

<!--read params from params-local.php and params.php-->
<?=    Yii::$app->params['apiKeyMaps'] ?>
<p></p>
<?=
$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
$map = new Map([
'center' => $coord,
'zoom' => 14,
]);
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
echo $map->display();
?>

<p></p>




<?=
$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
$map2 = new Map([
    'center' => $coord,
    'zoom' => 14,
]);
// lets use the directions renderer
$home = new LatLng(['lat' => 39.720991014764536, 'lng' => 2.911801719665541]);
$school = new LatLng(['lat' => 39.719456079114956, 'lng' => 2.8979293346405166]);

$directionsRequest = new DirectionsRequest([
    'origin' => $home,
    'destination' => $school,
    'travelMode' => TravelMode::DRIVING
]);
// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map2->getName(),
]);

// Finally the directions service
$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);
// Thats it, append the resulting script to the map
$map2->appendScript($directionsService->getJs());
// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map2->getName()]);
// Append its resulting script
$map2->appendScript($bikeLayer->getJs());


// Display the map
//echo $map2->display();

echo $map2->display(); ?>

<p></p>

<?=

$coord = new LatLng(['lat' => 28.774252, 'lng' => -75.190262]);
$map3 = new Map([
'center' => $coord,
'zoom' => 4,
]);

// Now lets write a polygon
$coords = [
new LatLng(['lat' => 25.774252, 'lng' => -80.190262]),
new LatLng(['lat' => 18.466465, 'lng' => -66.118292]),
new LatLng(['lat' => 32.321384, 'lng' => -64.75737]),
new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
];

$polygon = new Polygon([
'paths' => $coords,
'strokeColor'=> '#FF0000',
'strokeOpacity'=> 0.8,
'strokeWeight'=> 2,
'fillColor'=> '#FF0000',
'fillOpacity'=> 0.35
]);

// Add it now to the map
$map3->addOverlay($polygon);

// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map3->getName()]);

// Append its resulting script
$map3->appendScript($bikeLayer->getJs());

// Display the map -finally :)
echo $map3->display(); ?>


