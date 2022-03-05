<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Receipts'), 'url' => ['index']];
?>

<div class="purchase-receipt-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
