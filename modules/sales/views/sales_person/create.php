<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Sales Person');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Person'), 'url' => ['/sales/sales-person']];
?>

<div class="sales-person-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
