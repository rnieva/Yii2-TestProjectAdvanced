<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p class="lead">Test view to try different partial view</p>

<div class="row">

    <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= Html::textInput('text', value)->label('Text')  ?>
            <?= Html::textInput("name", $value) ?>
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
