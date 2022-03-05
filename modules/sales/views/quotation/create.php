<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Quotation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotation'), 'url' => ['/sales/quotation']];
?>

<div class="sales-quote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
