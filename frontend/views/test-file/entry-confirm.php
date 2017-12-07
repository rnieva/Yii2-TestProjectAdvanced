<?php
use yii\helpers\Html;
use app\controllers\ScriptOneUserGeneratorController;
use yii\widgets\ActiveForm;

/* @var $model app\models\DataUser */
?>

<p> The file uploaded goes = View A --> Controller A_action1 --> View B --> Controller A_action2</p>

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
        <?= Html::a('Test', ['test-file/entry2', 'name' => $model-> name, 'email' => $model-> email, 'file' => $model->file], ['class' => 'btn btn-success']) ?>
    </p>


    <?php $form = ActiveForm::begin(['action' =>['test-file/entry2'], 'id' => 'forum_post', 'method' => 'post']); ?>

        <?= Html::hiddenInput('test', "test") ?>
    <?= Html::hiddenInput('file', $model->file) ?>

        <?= $form->field($model, 'hidden1')->hiddenInput(['value'=> "test2"])->label(false) ?>


        <div class="form-group">
            <?= Html::submitButton('Send Model Form', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>


</div>
