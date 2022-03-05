<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'New Payment Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Entry'), 'url' => ['/accounts/payment-entry']];

?>

<div class="payment-entry-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
