<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Price List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['module/stock']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price List'), 'url' => ['index']];
?>

<div class="price-list-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
