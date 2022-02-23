<?php

use yii\helpers\Html;

$this->title = $model->supplier->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Order'), 'url' => ['index']];
?>

<div class="purchase-order-view">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
