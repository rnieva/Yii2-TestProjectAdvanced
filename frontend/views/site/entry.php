<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(); ?>



    <?=  $form->field($model, 'title[]')->dropDownList(['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss', 'Ms' => 'Ms' ]); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'userform'])->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

