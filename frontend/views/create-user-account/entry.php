<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p class="lead">Create a new user account</p>
<p>Create FileMaker record</p>
<p>Create POS account</p>
<p>Create user in PASS</p>
<p>Create user in LDAP</p>
<p>Create user in AD</p>



<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

