<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Data Users</h1>
<ul>
    <?php foreach ($datausers as $datauser): ?>
        <li>
            <?= Html::encode("{$datauser->firstname} ({$datauser->surname})") ?>:
            <?= $datauser->username ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
