<?php
use yii\helpers\Html;
?>
<p>Output text after executed the script</p>
<p> LDAP Data Interchange Format (LDIF)</p>
<div class="row">
    <div class="col-lg-5">
        <li><label>First Name</label>: <?= Html::encode($model->firstname) ?></li>
        <li><label>Surname</label>: <?= Html::encode($model->surname) ?></li>
    </div>
    <div class="col-lg-5">
        <li><label>LDIF info</label>: <?= Html::textarea("textarea",$resultTemp,['rows'=>30 , 'cols'=>50]) ?></li>
    </div>
</div>
