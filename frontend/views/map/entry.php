<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p class="lead">Managing Maps</p>
<p>Map</p>


<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

