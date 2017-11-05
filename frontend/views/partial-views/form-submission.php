<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>

<?php Pjax::begin(); ?>
<?= Html::beginForm(['site/form-submission'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
<?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<?= Html::submitButton('Hash String', ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
<?= Html::endForm() ?>

<?= $stringHash ="" ?>
<h3><?= $stringHash ?></h3>
<?php Pjax::end(); ?>
