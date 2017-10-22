<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p class="lead">This page create a LDIF info based in a template using the data users</p>
<p class="lead">Automatic generation of UserName, MagStripe, UserPass, HashPass </p>
<div class="row">

    <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Firstname') ?>
                <?= $form->field($model, 'surname')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User Surname') ?>
                <?= $form->field($model, 'uidnumber')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('User uid number') ?>
                <?= Html::activeCheckbox($model, 'boolmoodleid', ['class' => 'agreement' , 'label' => 'Does user Moodle ID?' ]) ?>
                <?= $form->field($model, 'moodleid')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Moodle ID') ?>
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
