<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Price List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price List'), 'url' => ['/accounts/price-list']];
?>

<div class="price-list-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
