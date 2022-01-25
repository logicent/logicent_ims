<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Purchase Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Order'), 'url' => ['index']];
?>

<div class="purchase-order-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
