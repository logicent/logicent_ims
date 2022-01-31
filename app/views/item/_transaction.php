<?php

use app\models\PurchaseInvoiceItem;
use app\models\PurchaseOrderItem;
use app\models\SalesInvoiceItem;
use app\models\SalesOrderItem;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;


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
    <div class="ui two column grid linked-data">
        <div class="column item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Order') . '&ensp;' .
                    Elements::Label($salesOrderCount . $salesOrderTotalAmountSum, ['class' => 'basic']),
                    null
                );
            echo '&ensp;';
            echo Html::a(Elements::icon('plus'), ['sales-order/create', 'item_id' => $model->id],
                        ['title' => 'New Sales Order', 'class' => 'compact ui basic tiny icon button right floated']
                ) ?>
        </div>
        <div class="column item">
        <?php
            echo Html::a(Yii::t('app', 'Sales Invoice') . '&ensp;' .
                    Elements::Label($salesInvoiceCount . $salesInvoiceTotalAmountSum, ['class' => 'basic']), 
                    null
            );
            echo '&ensp;';
            echo Html::a(Elements::icon('plus'), ['sales-invoice/create', 'item_id' => $model->id],
                    ['title' => 'New Sales Invoice', 'class' => 'compact ui basic tiny icon button right floated']
                ) ?>
        </div>
    </div>
    <div class="ui two column grid linked-data">
        <div class="column item">
        <?php
            echo Html::a(Yii::t('app', 'Purchase Order') . '&ensp;' .
                        Elements::Label($purchaseOrderCount . $purchaseOrderTotalAmountSum, ['class' => 'basic']),
                        null
                    );
            echo '&ensp;';
            echo Html::a(Elements::icon('plus'), 
                        ['purchase-order/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Order', 'class' => 'compact ui basic tiny icon button right floated']
                    ) ?>
        </div>
        <div class="column item">
        <?php
            echo Html::a(Yii::t('app', 'Purchases Invoice') . '&ensp;' .
                    Elements::Label($purchaseInvoiceCount . $purchaseInvoiceTotalAmountSum, ['class' => 'basic']),
                    null
            );
            echo '&ensp;';
            echo Html::a(Elements::icon('plus'), ['purchase-invoice/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Invoice', 'class' => 'compact ui basic tiny icon button right floated']
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
