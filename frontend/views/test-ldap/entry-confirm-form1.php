<?php
use yii\helpers\Html;
?>
<p>Using LDAP PHP lib</p>
<div class="row">
    <div class="col-lg-5">
        <li><label>First Name</label>: <?= Html::encode($model->firstname) ?></li>
        <li><label>Surname</label>: <?= Html::encode($model->surname) ?></li>
    </div>
</div>

