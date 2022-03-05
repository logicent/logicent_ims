<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Sales Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Order'), 'url' => ['/sales/sales-order']];
?>

<div class="sales-order-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
