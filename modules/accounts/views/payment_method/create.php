<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Payment Method');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Method'), 'url' => ['index']];
?>

<div class="payment-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
