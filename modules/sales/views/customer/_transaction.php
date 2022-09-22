<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$count_SO = $model->getSalesOrder()->count();
$sumTotalAmount_SO = $model->getSalesOrder()->sum('total_amount');
if ($sumTotalAmount_SO > 0)
    $sumTotalAmount_SO = Yii::$app->formatter->asCurrency($sumTotalAmount_SO);

$count_SI = $model->getSalesInvoice()->count();
$sumTotalAmount_SI = $model->getSalesInvoice()->sum('total_amount');
if ($sumTotalAmount_SI > 0)
    $sumTotalAmount_SI = Yii::$app->formatter->asCurrency($sumTotalAmount_SI);
?>

<div class="ui secondary top attached padded segment">
    <div class="two fields linked-data">
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Order') . '&ensp;' .
                    Elements::Label($count_SO . $sumTotalAmount_SO, ['class' => 'basic']),
                    ['sales-order/index', 'SalesOrderSearch' => ['customer_name' => $model->name]]
                );
            echo '&ensp;';
            echo Html::a('+', ['sales-order/create', 'item_id' => $model->id],
                        ['title' => 'New Sales Order', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Invoice') . '&ensp;' .
                    Elements::Label($count_SI . $sumTotalAmount_SI, ['class' => 'basic']),
                    ['sales-invoice/index', 'SalesInvoiceSearch' => ['customer_name' => $model->name]]
                );
            echo '&ensp;';
            echo Html::a('+', ['sales-invoice/create', 'item_id' => $model->id],
                        ['title' => 'New Sales Invoice', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
    </div>
</div>