<?php

use yii\helpers\Html;

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Order'), 'url' => ['/sales/sales-order']];
?>

<div class="sales-order-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
