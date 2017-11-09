<?php
use yii\helpers\Html;
use app\controllers\ScriptOneUserGeneratorController;
use yii\widgets\ActiveForm;

/* @var $model app\models\DataUser */
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
        <?= Html::a('Send Model', ['site/send', 'model' => $model], ['class' => 'btn btn-success']) ?>
    </p>



    <?php $form = ActiveForm::begin(['action' =>['site/send'], 'id' => 'forum_post', 'method' => 'post']); ?>

        <?= Html::hiddenInput('test', "test") ?>

        <?= $form->field($model, 'hidden1')->hiddenInput(['value'=> "test2"])->label(false) ?>


        <div class="form-group">
            <?= Html::submitButton('Send Model Form', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>


</div>
