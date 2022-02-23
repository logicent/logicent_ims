<?php

use yii\helpers\Html;

$this->title = $model->supplier_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Invoice'), 'url' => ['index']];
?>

<div class="purchase-invoice-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
