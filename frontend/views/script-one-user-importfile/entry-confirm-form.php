<?php
use yii\helpers\Html;
?>
<p>Output text after executed the script</p>
<p> LDAP Data Interchange Format (LDIF)</p>
<div class="row">
    <div class="col-lg-5">
        <li><label>Data imported from</label>: <?= Html::encode($model->file) ?></li>
        <li><label>List of Users</label>:</li>
        <?php foreach ($usersName as &$value): ?>
            <li><label>Name</label>: <?= Html::encode($value) ?></li>
        <?php endforeach; ?>
    </div>
    <div class="col-lg-5">
        <li><label>LDIF info</label>: <?= Html::textarea("model",$model->result,['rows'=>30 , 'cols'=>50]) ?></li>
    </div>
</div>
