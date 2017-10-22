<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p class="lead">This page create a LDIF info based in a template using the data users</p>
<div class="row">
    <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Firstname') ?>
                <?= $form->field($model, 'surname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Surname') ?>
                <?= $form->field($model, 'uidnumber')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User uid number') ?>
                <?= $form->field($model, 'moodleid')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Moodle ID') ?>
                <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('UserName') ?>
                <?= $form->field($model, 'magstripe')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Mag Stripe') ?>
                <?= $form->field($model, 'shapass')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('SHA pass') ?>
    </div>
    <div class="col-lg-5">

    </div>

</div>
<div class="row">
        <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
                <?php ActiveForm::end(); ?>
</div>
