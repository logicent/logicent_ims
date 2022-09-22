<?php

use crudle\ext\stock\modelsPurchaseInvoiceItem;
use crudle\ext\stock\modelsPurchaseOrderItem;
use crudle\ext\stock\modelsSalesInvoiceItem;
use crudle\ext\stock\modelsSalesOrderItem;
use yii\helpers\Html;
use icms\FomanticUI\Elements;


$salesOrderTotalAmountSum = $model->getDocumentItem(SalesOrderItem::class)->sum('total_amount');
$salesOrderCount = $model->getDocumentItem(SalesOrderItem::class)->count();
if ($salesOrderTotalAmountSum > 0)
    $salesOrderTotalAmountSum = "<div class='detail'>" . Yii::$app->formatter->asCurrency($salesOrderTotalAmountSum) . "</div>";

$salesInvoiceTotalAmountSum = $model->getDocumentItem(SalesInvoiceItem::class)->sum('total_amount');
$salesInvoiceCount = $model->getDocumentItem(SalesInvoiceItem::class)->count();
if ($salesInvoiceTotalAmountSum > 0)
    $salesInvoiceTotalAmountSum = "<div class='detail'>" . Yii::$app->formatter->asCurrency($salesInvoiceTotalAmountSum) . "</div>";

$purchaseOrderTotalAmountSum = $model->getDocumentItem(PurchaseOrderItem::class)->sum('total_amount');
$purchaseOrderCount = $model->getDocumentItem(PurchaseOrderItem::class)->count();
if ($purchaseOrderTotalAmountSum > 0)
    $purchaseOrderTotalAmountSum = "<div class='detail'>" . Yii::$app->formatter->asCurrency($purchaseOrderTotalAmountSum) . "</div>";

$purchaseInvoiceTotalAmountSum = $model->getDocumentItem(PurchaseInvoiceItem::class)->sum('total_amount');
$purchaseInvoiceCount = $model->getDocumentItem(PurchaseInvoiceItem::class)->count();
if ($purchaseInvoiceTotalAmountSum > 0)
    $purchaseInvoiceTotalAmountSum = "<div class='detail'>" . Yii::$app->formatter->asCurrency($purchaseInvoiceTotalAmountSum) . "</div>";
?>

<div class="ui secondary top attached padded segment">
    <div class="two fields linked-data">
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Order') . '&ensp;' .
                    Elements::Label($salesOrderCount . $salesOrderTotalAmountSum, ['class' => 'basic']),
                    null
                );
            echo '&ensp;';
            echo Html::a('+', ['sales-order/create', 'item_id' => $model->id],
                        ['title' => 'New Sales Order', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Invoice') . '&ensp;' .
                    Elements::Label($salesInvoiceCount . $salesInvoiceTotalAmountSum, ['class' => 'basic']), 
                    null
            );
            echo '&ensp;';
            echo Html::a('+', ['sales-invoice/create', 'item_id' => $model->id],
                    ['title' => 'New Sales Invoice', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
    </div>
    <div class="two fields linked-data">
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Purchase Order') . '&ensp;' .
                    Elements::Label($purchaseOrderCount . $purchaseOrderTotalAmountSum, ['class' => 'basic']),
                    null
            );
            echo '&ensp;';
            echo Html::a('+', ['purchase-order/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Order', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Purchases Invoice') . '&ensp;' .
                    Elements::Label($purchaseInvoiceCount . $purchaseInvoiceTotalAmountSum, ['class' => 'basic']),
                    null
            );
            echo '&ensp;';
            echo Html::a('+', ['purchase-invoice/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Invoice', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
    </div>
</div>

<?php /* = Menu::widget([
    'vertical' => true,
    'items' => [
        // [
        //     'label' => Elements::input(\yii\helpers\Html::input('text', null, null, ['placeholder' => 'search'])),
        //     'encode' => false
        // ],
        [
            'label' => 'Sales Order' . Elements::label('7'),
            'url' => ['/sales/sales-order'],
            'encode' => false
        ],
    ]
]); */ ?>
