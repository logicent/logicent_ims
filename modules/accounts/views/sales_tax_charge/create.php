<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Sales Tax Charge');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Tax Charge'), 'url' => ['/accounts/sales-tax-charge']];
?>

<div class="tax-charge-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
