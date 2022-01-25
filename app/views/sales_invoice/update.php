<?php

use yii\helpers\Html;

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Invoice'), 'url' => ['index']];
?>

<div class="sales-invoice-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
