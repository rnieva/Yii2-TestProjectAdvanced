<?php
use yii\helpers\Html;
use app\controllers\ScriptOneUserGeneratorController;
use yii\widgets\ActiveForm;

/* @var $model app\models\DataUser */
?>

<p> The file uploaded follows this way = View A --> Controller A_action1 --> View B --> Controller A_action2 --> View C</p>
<p>You are in the view B</p>
<p>You have entered the following information:</p>

<ul>
    <li><label>Title</label>: <?= Html::encode($model->title) ?></li>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
    <li><label>Picture</label>: <?= Html::encode($model->file) ?></li>
    <?= Html::img('uploads/'.$model->file , ['alt' => 'pic not found', 'width' => '200px', 'height' => '110px']) ?>
    <p></p>
</ul>
<p> Test go to controller</p>
<div class="row">
    <p>
        <?= Html::a('Test', ['test-file/entry3', 'name' => $model-> name, 'email' => $model-> email, 'urlFile' => $model->urlFile], ['class' => 'btn btn-success']) ?>
    </p>


    <?php $form = ActiveForm::begin(['action' =>['test-file/entry2'], 'id' => 'forum_post', 'method' => 'post']); ?>

        <?= $form->field($model, 'name')->hiddenInput(['value'=> $model-> name])->label(false) ?>
        <?= $form->field($model, 'file')->hiddenInput(['value'=> $model-> file])->label(false) ?>

    <div class="form-group">
            <?= Html::submitButton('Send Model Form', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>


</div>
