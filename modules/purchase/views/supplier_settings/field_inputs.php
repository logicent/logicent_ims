<?php

use app\helpers\SelectableItems;
use logicent\sales\models\CustomerGroup;
use logicent\accounts\models\PriceList;

$this->title = Yii::t('app', 'Supplier Settings');
?>

<div class="ui attached padded segment">
    <?= $form->field($model, 'auto_suggest_supplier_id')->checkbox() ?>

    <div class="two fields">
        <?= $form->field($model, 'default_supplier_group')->dropDownList(
                SelectableItems::get(CustomerGroup::class, $model, [
                    'valueAttribute' => 'id'
                ])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'default_buying_price_list')->dropDownList(
                SelectableItems::get(PriceList::class, $model, [
                    'valueAttribute' => 'id'
                ])
            ) ?>
    </div>
    <?= $form->field($model, 'maintain_same_rate_in_purchase_cycle')->checkbox() ?>
    <?= $form->field($model, 'allow_user_to_edit_price_list_rate_in_transactions')->checkbox() ?>
    <?= $form->field($model, 'hide_suppliers_tax_ID_from_purchase_transaction')->checkbox() ?>
    <?= $form->field($model, 'allow_item_to_be_added_multiple_times_in_a_transactation')->checkbox() ?>
    <?= $form->field($model, 'allow_multiple_purchase_orders_against_a_purchase_invoice')->checkbox() ?>
    <?= $form->field($model, 'require_purchase_order_for_purchase_invoice')->checkbox() ?>
    <?= $form->field($model, 'require_purchase_receipt_for_purchase_invoice')->checkbox() ?>
</div>