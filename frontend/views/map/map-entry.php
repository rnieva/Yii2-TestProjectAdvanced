<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'city')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Into the City') ?>
<?= $form->field($model, 'power[]')->dropDownList(['5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1' ])->label('Power') ?>


<div class="form-group">
    <?= Html::submitButton('Shoot', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

