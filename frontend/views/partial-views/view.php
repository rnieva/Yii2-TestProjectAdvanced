<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use yii\helpers\Url;


$response = "";
?>
<p class="lead">Test view to try different partial view</p>

<div class="row">

    <div class="col-lg-5">
        <p></p>
        <?= Html::a('View1', ['partial-views/view1', 'username' => "view1"], ['class' => 'btn btn-success', 'id' => 'view1'] ) ?>
        <p></p>
        <?= Html::a('View2', ['partial-views/view2', 'username' => "view2"], ['class' => 'btn btn-success']) ?>
        <p></p>
        <?= Html::a('View3', ['partial-views/view3', 'username' => "view3"], ['class' => 'btn btn-success']) ?>
        <p></p>
        <?= Html::a('View4', ['partial-views/view4', 'username' => "view4"], ['class' => 'btn btn-success']) ?>
        <p></p>
    </div>
    <div class="col-lg-5">

    </div>

</div>
<div class="row">
    <?=$this->render('view1.php')?>
</div>
<div class="row">
    <?=$this->render('view2.php')?>
</div>
<div class="row">
    <div id="test"></div>
</div>
<div class="row">
    <div id="view4"></div>
</div>



<?php Pjax::begin() ?>

<?= Html::a(
    'View4',
    Url::to(['partial-views/view4','id'=>"23"]),
    ['data-pjax'=> '#view4'] //data-pjax'=> '#view4 no esta funcionando
) ?>

<?php Pjax::end(); ?>



<?php Pjax::begin(); ?>
<?= Html::beginForm(['partial-views/form-submission'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
<?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<?= Html::submitButton('Hash String', ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
<?= Html::endForm() ?>
<?= $stringHash ="" ?>
<h3><?= $stringHash ?></h3>
<?php Pjax::end(); ?>




<script type="text/javascript">
    $("#test").click(function(){
        $.get("partial-views/view3", function(){$("#test").html();}
    });
</script>


<div id="partial"></div>
<button type="button" id="load-partial" />

<script type="text/javascript">
    $('#load-partial').click(function(){
    $('#partial').load('/partial-views/view3');
    });
</script>