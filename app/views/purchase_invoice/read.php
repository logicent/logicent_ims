<?php

use yii\helpers\Html;

$this->title = $model->supplier->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Invoice'), 'url' => ['index']];
?>

<div class="purchase-invoice-view">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
