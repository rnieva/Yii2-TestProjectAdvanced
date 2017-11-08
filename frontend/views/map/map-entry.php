<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'city')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Into the City') ?>
<?= $form->field($model, 'power')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Into the Power') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

