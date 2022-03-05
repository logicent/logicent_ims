<?php

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price List'), 'url' => ['/accounts/price-list']];
?>

<div class="price-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
