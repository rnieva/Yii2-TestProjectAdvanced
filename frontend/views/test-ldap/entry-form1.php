<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<p class="lead">This page testing LDAP PHP lib</p>
<div class="row">

    <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Firstname') ?>
                <?= $form->field($model, 'surname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Surname') ?>
                <?= $form->field($model, 'uidnumber')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User uid number') ?>
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
