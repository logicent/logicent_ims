<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Branch');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Branch'), 'url' => ['/accounts/branch']];
?>

<div class="branch-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
