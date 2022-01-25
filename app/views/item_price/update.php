<?php

use yii\helpers\Html;

$this->title = $model->item->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Price'), 'url' => ['index']];
?>

<div class="item-price-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
