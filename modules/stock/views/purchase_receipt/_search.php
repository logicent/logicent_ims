<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="purchase-receipt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'doc_status') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'parent_field') ?>

    <?php // echo $form->field($model, 'parent_doctype') ?>

    <?php // echo $form->field($model, 'idx') ?>

    <?php // echo $form->field($model, 'supplier_name') ?>

    <?php // echo $form->field($model, 'lr_date') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'supplier_delivery_note') ?>

    <?php // echo $form->field($model, 'set_posting_time') ?>

    <?php // echo $form->field($model, 'instructions') ?>

    <?php // echo $form->field($model, 'address_display') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'taxes_and_charges_added') ?>

    <?php // echo $form->field($model, 'discount_amount') ?>

    <?php // echo $form->field($model, 'is_return') ?>

    <?php // echo $form->field($model, 'supplier_address') ?>

    <?php // echo $form->field($model, 'lr_no') ?>

    <?php // echo $form->field($model, 'contact_display') ?>

    <?php // echo $form->field($model, 'supplier') ?>

    <?php // echo $form->field($model, 'buying_price_list') ?>

    <?php // echo $form->field($model, 'terms') ?>

    <?php // echo $form->field($model, 'supplier_warehouse') ?>

    <?php // echo $form->field($model, 'taxes_and_charges_deducted') ?>

    <?php // echo $form->field($model, 'apply_discount_on') ?>

    <?php // echo $form->field($model, 'range') ?>

    <?php // echo $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'in_words') ?>

    <?php // echo $form->field($model, 'additional_discount_percentage') ?>

    <?php // echo $form->field($model, 'return_against') ?>

    <?php // echo $form->field($model, 'contact_mobile') ?>

    <?php // echo $form->field($model, 'posting_time') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'bill_no') ?>

    <?php // echo $form->field($model, 'tc_name') ?>

    <?php // echo $form->field($model, 'rejected_warehouse') ?>

    <?php // echo $form->field($model, 'is_subcontracted') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'grand_total') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'rounding_adjustment') ?>

    <?php // echo $form->field($model, 'shipping_address') ?>

    <?php // echo $form->field($model, 'posting_date') ?>

    <?php // echo $form->field($model, 'naming_series') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'letter_head') ?>

    <?php // echo $form->field($model, 'shipping_rule') ?>

    <?php // echo $form->field($model, 'total_taxes_and_charges') ?>

    <?php // echo $form->field($model, 'bill_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, '_liked_by') ?>

    <?php // echo $form->field($model, 'taxes_and_charges') ?>

    <?php // echo $form->field($model, 'per_billed') ?>

    <?php // echo $form->field($model, 'transporter_name') ?>

    <?php // echo $form->field($model, 'total_net_weight') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'shipping_address_display') ?>

    <?php // echo $form->field($model, 'net_total') ?>

    <?php // echo $form->field($model, 'contact_email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
