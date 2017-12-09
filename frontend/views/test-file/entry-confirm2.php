<?php
use yii\helpers\Html;
use app\controllers\ScriptOneUserGeneratorController;
use yii\widgets\ActiveForm;

/* @var $model app\models\DataUser */
?>

<p> The file uploaded goes = View A --> Controller A_action1 --> View B --> Controller A_action2</p>

<p>You are in the view B</p>
<ul>

    <li><label>Picture</label>: <?= Html::encode($model->file) ?></li>
    <?= Html::img($model->urlFile , ['alt' => 'pic not found', 'width' => '200px', 'height' => '110px']) ?>
    <p></p>
</ul>

