<?php

use yii\helpers\Html;


$this->title = 'Update Data Users: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Data Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
