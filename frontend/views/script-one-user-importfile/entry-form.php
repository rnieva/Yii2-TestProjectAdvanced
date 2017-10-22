<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<p class="lead">This page create a LDIF info based in a template using the data users imported from a file or paste in the text area</p>
<p> File Format: Username - tab - FirstName - tab - Surname - tab - Magstripe - tab - MoodleID - tab - UidNUmber - tab - SHAPassword</p>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-9">
        <?= $form->field($model, 'file')->fileInput() ?>

        <?= $form->field($model, 'datausers')->textarea(['rows'=>10 , 'cols'=>100])->label('Data Users') ?>
    </div>

</div>
<div class="row">
        <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
                <?php ActiveForm::end(); ?>
</div>
