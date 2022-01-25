<?php

use app\enums\Type_Sale;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<?= Html::activeHiddenInput($pos_receipt, 'saleType', [
        'value' => $pos_receipt->isNewRecord ? $pos_profile->default_sale_type : $pos_receipt->saleType,
        'id' => 'pos__saleType'
    ]) ?>

<table id="cart_summary" class="ui table" style="font-size: 125%">
    <thead>
        <tr class="ui sub header">
            <th class="center aligned text-muted" style="font-weight: 500" colspan="2">
                <span id="cart__header"><?= Yii::t('app', '') ?></span>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <span><?= Yii::t('app', 'Subtotal') ?></span>
            </td>
            <td class="right aligned">
                <span id="cart_net_total"><?= number_format((float) $pos_receipt->net_total, 2) ?></span>
            </td>
        </tr>
        <?php if ((bool) $pos_profile->show_discount) : ?>
        <tr>
            <td>
                <span><?= Yii::t('app', 'Discount') ?></span>
                <span id="discount_rate" class="small"><?= $pos_receipt->discount_percent ?></span>
                <?= Html::activeHiddenInput($pos_receipt, 'discount_percent', ['id' => 'pos__discount_percent']) ?>
            </td>
            <td class="right aligned">
                <?= Html::activeTextInput($pos_receipt, 'discount_amount', ['class' => 'right aligned', 'id' => 'pos__discount_amount']) ?>
            </td>
        </tr>
        <?php endif ?>
        <!-- Loop through applicable sales_tax_charge (name/rate) -->
        <?php foreach ($pos_receipt->taxCharges as $taxCharge) : ?>
        <tr>
            <td>
                <span><?= $taxCharge->id ?></span>
            </td>
            <td class="right aligned">
                <small id="cart_tax_rate" class="text-muted">(<?= $taxCharge->rate ?>%)</small>&nbsp;
                <span id="cart_tax_amount"><?= number_format((float) $pos_receipt->tax_amount, 2) ?></span>
            </td>
        </tr>
        <?php endforeach ?>
        <?php // if ((bool) $pos_profile->show_shipping) : ?>
        <!-- <tr style="display: none">
            <td>
                <span><?php //= Yii::t('app', 'Shipping') ?></span>
            </td>
            <td class="right aligned">
                <span id="shippingFee"><?php //= number_format((float) $pos_receipt->shippingFee, 2) ?></span>
                <span id="shippingTax"><?php //= number_format((float) $pos_receipt->shippingTax, 2) ?></span>
            </td>
        </tr> -->
        <?php // endif ?>
        <tr class="ui sub header" style="font-size: 150%; font-weight: 400; height: 98px" >
            <td style="padding-left: 0.45em">
                <span class="text-muted"><?= Yii::t('app', 'TOTAL') ?></span>
            </td>
            <td style="padding-right: 0.45em; vertical-align: middle" class="right aligned">
                <span id="cart_total_amount"><?= number_format((float) $pos_receipt->total_amount, 2) ?></span>
            </td>
        </tr>
        <?php $display = $pos_profile->default_sale_type == Type_Sale::CreditSale ? 'display: none' : '' ?>
        <tr class="cash-sale__field" style="<?= $display ?>">
            <td>
                <?= Html::a(Html::tag('span', Yii::t('app', 'PAID')) . '&ensp;' . Elements::icon('right small chevron'), '#', ['class' => 'payment-options']) ?>
            </td>
            <td class="right aligned">
                <?= Html::tag('span', number_format((float) $pos_receipt->paid_amount, 2), ['id' => 'cart_paid_amount']) ?>
            </td>
        </tr>
        <tr id="payment_options" class="cash-sale__field" style="display: none;">
            <td colspan="2" style="padding: 0; padding-left: 0.45em">
                <div class="inline-table">
                    <?= $this->render('payment/index', ['pos_receipt_payments' => $pos_receipt_payment]) ?>
                </div>
            </td>
        </tr>
        <!-- show if sale type is Cash -->
        <?php $display = $pos_profile->default_sale_type == Type_Sale::CreditSale ? 'display: none' : '' ?>
        <tr class="cash-sale__field" style="<?= $display ?>">
            <td>
                <span class="text-muted" style="font-weight: 500"><?= Yii::t('app', 'CHANGE') ?></span>
            </td>
            <td class="right aligned text-number">
                <span id="cart_change_amount" style="font-weight: 500">
                    <?= number_format((float) $pos_receipt->change_amount, 2) ?>
                </span>
            </td>
        </tr>
        <!-- show if sale type is Credit -->
        <?php $display = $pos_profile->default_sale_type == Type_Sale::CreditSale ? '': 'display: none' ?>
        <tr class="credit-sale__field" style="<?= $display ?>">
            <td>
                <span class="text-muted" style="font-weight: 500"><?= Yii::t('app', 'BALANCE') ?></span>
            </td>
            <td class="right aligned text-number">
                <span id="cart_balance_amount" style="font-weight: 500">
                    <?= number_format((float) $pos_receipt->balance_amount, 2) ?>
                </span>
            </td>
        </tr>
    </tbody>
</table>