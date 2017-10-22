<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Data in DataUser DB';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        = Html::a('Create Country', ['create'], ['class' => 'btn btn-success'])
<!--    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'firstname',
            'surname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
