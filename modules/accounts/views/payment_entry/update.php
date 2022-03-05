<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Entry'), 'url' => ['/accounts/payment-entry']];
?>

<div class="payment-entry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
