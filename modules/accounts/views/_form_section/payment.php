<?php

use yii\helpers\Url;

?>

<?= $this->render('payment/list', ['model' => $model, 'form' => $form]) ?>

<?php
$params = [
    'section' => '#_payment',
    'table' => '#_payment table',
    'addPaymentUrl' => Url::to(['add-item']),
    'deletePaymentUrl' => Url::to(['delete-item']),
];

$this->registerJs(
    "var paymentDoc = "  . \yii\helpers\Json::htmlEncode($params) . ";",
    $this::POS_HEAD,
    'paymentDoc'
);

$this->registerJs($this->render('payment/list.js'));
?>