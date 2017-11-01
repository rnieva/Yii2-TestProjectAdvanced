<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


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

</div>
<div class="row">

</div>





<script type="text/javascript">
    $("#emailTo").click(function(){
        $.get("/PartialViews/View3", function(){$("#emailToContent").html();}
    });
</script>



