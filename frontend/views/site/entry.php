<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>


<!-- begin(
        [
        'action' => '/login',
        'options' => [
        'class' => 'userform'
        ]
        ]
      );-->




    <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

