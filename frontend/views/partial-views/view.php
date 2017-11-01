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



<?php Pjax::begin(['enablePushState' => false]); ?>
<?= Html::a('', ['partial-views/upvote'], ['class' => 'btn btn-lg btn-warning glyphicon glyphicon-arrow-up']) ?>
<?= Html::a('', ['partial-views/downvote'], ['class' => 'btn btn-lg btn-primary glyphicon glyphicon-arrow-down']) ?>
<h1><?= Yii::$app->session->get('votes', 0) ?></h1>
<?php Pjax::end(); ?>


<?php Pjax::begin(); ?>
<?= Html::a("Show Time", ['partial-views/time'], ['class' => 'btn btn-lg btn-primary']) ?>
<?= Html::a("Show Date", ['partial-views/date'], ['class' => 'btn btn-lg btn-success']) ?>
<h1>It's: <?= $response ?></h1>
<?php Pjax::end(); ?>



<script type="text/javascript">
    $("#test").click(function(){
        $.get("partial-views/view3", function(){$("#test").html();}
    });
</script>



