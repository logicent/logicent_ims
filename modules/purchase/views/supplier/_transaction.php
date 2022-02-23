<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;


$sumTotalAmount_PO = $model->getPurchaseOrder()->sum('total_amount');
$count_PO = $model->getPurchaseOrder()->count();
if ($sumTotalAmount_PO > 0)
    $sumTotalAmount_PO = "<div class='detail'>" . Yii::$app->formatter->asCurrency($sumTotalAmount_PO) . "</div>";

$sumTotalAmount_PI = $model->getPurchaseInvoice()->sum('total_amount');
$count_PI = $model->getPurchaseInvoice()->count();
if ($sumTotalAmount_PI > 0)
    $sumTotalAmount_PI = "<div class='detail'>" . Yii::$app->formatter->asCurrency($sumTotalAmount_PI) . "</div>";
?>

<div class="ui secondary top attached padded segment">
    <div class="two fields linked-data">
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Purchase Order') . '&ensp;' .
                    Elements::Label($count_PO . $sumTotalAmount_PO, ['class' => 'basic']),
                    ['purchase-order/index', 'PurchaseOrderSearch' => ['supplier.name' => $model->name]]
                );
            echo '&ensp;';
            echo Html::a('+', ['purchase-order/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Order', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
        <div class="field item">
        <?php
            echo Html::a(Yii::t('app', 'Purchase Invoice') . '&ensp;' .
                    Elements::Label($count_PI . $sumTotalAmount_PI, ['class' => 'basic']),
                    ['purchase-invoice/index', 'PurchaseInvoiceSearch' => ['supplier.name' => $model->name]]
                );
            echo '&ensp;';
            echo Html::a('+', ['purchase-invoice/create', 'item_id' => $model->id],
                        ['title' => 'New Purchase Invoice', 'style' => 'font-size: 180%; vertical-align: middle']
                ) ?>
        </div>
    </div>
</div>