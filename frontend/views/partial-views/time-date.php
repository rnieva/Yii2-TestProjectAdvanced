<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use yii\helpers\Url;


$response = "";
?>
<?php Pjax::begin(); ?>
<?= Html::a("Show Time", ['partial-views/time'], ['class' => 'btn btn-lg btn-primary']) ?>
<?= Html::a("Show Date", ['partial-views/date'], ['class' => 'btn btn-lg btn-success']) ?>
    <h1>It's: <?= $response ?></h1>
<?php Pjax::end(); ?>