<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Tax Charge');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Tax Charge'), 'url' => ['/accounts/purchase-tax-charge']];
?>

<div class="tax-charge-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
