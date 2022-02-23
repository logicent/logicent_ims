<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Item Price');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['module/stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Price'), 'url' => ['index']];
?>

<div class="item-price-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
