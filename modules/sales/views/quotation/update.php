<?php

use yii\helpers\Html;

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotation'), 'url' => ['/sales/quotation']];
?>

<div class="sales-quote-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
