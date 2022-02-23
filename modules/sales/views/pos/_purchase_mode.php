<?php

use yii\helpers\Html;
?>
<div class="compact ui small floating dropdown pointing button" style="padding-right: 8.75px;">
    <?= Html::a(Yii::t('app', 'Purchase Mode'), null, ['class' => 'item', 'id' => 'purchase_mode']) ?>
    &ensp;<i class="down small chevron icon"></i>
    <div class="menu">
<?php
    if ( (bool) $pos_profile->create_purchase_requisition ) : // Purchase_Mode::PurchaseRequisition
        echo Html::a(Yii::t('app', 'Purchase Requisition'), null, ['class' => 'item', 'id' => 'purchase_requisition']);
    endif;
    if ( (bool) $pos_profile->create_purchase_order ) : // Purchase_Mode::PurchaseOrder
        echo Html::a(Yii::t('app', 'Purchase Order'), null, ['class' => 'item', 'id' => 'purchase_order']);
    endif;
    if ( (bool) $pos_profile->create_purchase_receipt ) : // Purchase_Mode::PurchaseReceipt
        echo Html::a(Yii::t('app', 'Purchase Receipt'), null, ['class' => 'item', 'id' => 'purchase_receipt']);
    endif;
    if ( (bool) $pos_profile->create_purchase_invoice ) : // Purchase_Mode::PurchaseInvoice
        echo Html::a(Yii::t('app', 'Purchase Invoice'), null, ['class' => 'item', 'id' => 'purchase_invoice']);
    endif; ?>
    </div>
</div>
