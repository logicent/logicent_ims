<?php

use yii\helpers\Html;

$this->title = $model->supplier_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Invoice'), 'url' => ['/accounts/purchase-invoice']];
?>

<div class="purchase-invoice-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
