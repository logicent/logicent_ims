<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Payment Method');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Method'), 'url' => ['/accounts/payment-method']];
?>

<div class="payment-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
