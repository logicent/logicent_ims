<?php

use crudle\ext\purchase\models\Supplier;
use crudle\ext\stock\models\PriceList;

?>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'supplier')->dropDownList(Supplier::getListOptions()) ?>

            <?= $form->field($model, 'supplier_name')->textInput(['readonly' => true]) ?>

            <?php $form->field($model, 'lr_date')->textInput() ?>

            <?php $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'supplier_delivery_note')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'instructions')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'address_display')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'taxes_and_charges_added')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'discount_amount')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'is_return')->textInput() ?>

            <?php $form->field($model, 'supplier_address')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'lr_no')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'contact_display')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'terms')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'supplier_warehouse')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'taxes_and_charges_deducted')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'apply_discount_on')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'range')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'in_words')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'additional_discount_percentage')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'return_against')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'contact_mobile')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'bill_no')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'tc_name')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'rejected_warehouse')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'is_subcontracted')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'grand_total')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'rounding_adjustment')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'shipping_address')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'naming_series')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'letter_head')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'shipping_rule')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'total_taxes_and_charges')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'bill_date')->textInput() ?>

            <?php $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'taxes_and_charges')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'per_billed')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'transporter_name')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'total_net_weight')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'shipping_address_display')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'net_total')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'contact_email')->textarea(['rows' => 6]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'posting_date')->textInput(['class' => 'pikaday']) ?>

            <?= $form->field($model, 'posting_time')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'set_posting_time')->checkbox() ?>
        </div>
    </div>
</div>

<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'buying_price_list')->dropDownList([]) ?>
        </div>
    </div>
</div>