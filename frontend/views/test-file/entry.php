<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<p> The file uploaded follows this way = View A --> Controller A_action1 --> View B --> Controller A_action2 --> View C</p>
<p>You are in the view A</p>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title[]')->dropDownList(['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss', 'Ms' => 'Ms' ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

