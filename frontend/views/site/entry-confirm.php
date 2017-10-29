<?php
use yii\helpers\Html;
use app\controllers\ScriptOneUserGeneratorController;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Title</label>: <?= Html::encode($model->title) ?></li>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>
<p> Test go to controller</p>
<div class="row">
    <p>
        <?= Html::a('Test', ['manage-db/index', 'name' => $model-> name, 'email' => $model-> email], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Test2', ['script-one-user-generator/entry'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Test3', ['ScripOneUserGenerator/Entry'], ['class' => 'btn btn-success']) ?>
    </p>
<!--    --><?//= Yii::$app->runAction('ScripOneUserGenerator/Entry') ?>
<!--    --><?//= ScriptOneUserGeneratorController::actionEntry(); ?>
</div>
