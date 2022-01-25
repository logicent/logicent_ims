<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui secondary top attached padded segment">
    <div class="two fields linked-data">
        <div class="field item">
            <?= Html::a(Yii::t('app', 'Purchase Order') . '&ensp;' .
                        Elements::Label($model->getPurchaseOrder()->count(), ['class' => 'basic']), 
                        ['purchase-order/index', 'PurchaseOrderSearch' => ['supplier.name' => $model->name]]
                ) ?>
        </div>
        <div class="field item">
            <?= Html::a(Yii::t('app', 'Purchase Invoice') . '&ensp;' .
                        Elements::Label($model->getPurchaseInvoice()->count(), ['class' => 'basic']), 
                        ['purchase-invoice/index', 'PurchaseInvoiceSearch' => ['supplier.name' => $model->name]]
                ) ?>
        </div>
    </div>
</div>