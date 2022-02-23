<?php

use yii\helpers\Html;
?>
<div class="compact ui small floating dropdown pointing button" style="padding-right: 8.75px;">
    <?= Html::a(Yii::t('app', 'Sale Mode'), null, ['class' => 'item', 'id' => 'sale_mode']) ?>
    &ensp;<i class="down small chevron icon"></i>
    <div class="menu">
<?php
    if ( (bool) $pos_profile->create_sales_quote ) : // Sale_Mode::SalesQuote
        echo Html::a(Yii::t('app', 'Sales Quote'), null, ['class' => 'item', 'id' => 'sales_quote']);
    endif;
    if ( (bool) $pos_profile->create_sales_order ) : // Sale_Mode::SalesOrder
        echo Html::a(Yii::t('app', 'Sales Order'), null, ['class' => 'item', 'id' => 'sales_order']);
    endif;
    if ( (bool) $pos_profile->create_delivery_note ) : // Sale_Mode::DeliveryNote
        echo Html::a(Yii::t('app', 'Delivery Note'), null, ['class' => 'item', 'id' => 'delivery_note']);
    endif;
    if ( (bool) $pos_profile->create_sales_invoice ) : // Sale_Mode::SalesInvoice
        echo Html::a(Yii::t('app', 'Sales Invoice'), null, ['class' => 'item', 'id' => 'sales_invoice']);
    endif; ?>
    </div>
</div>
