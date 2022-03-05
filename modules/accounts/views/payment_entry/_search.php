<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

?>

<div class="payment-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
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

    <?php // echo $form->field($model, 'naming_series') ?>

    <?php // echo $form->field($model, 'reference_no') ?>

    <?php // echo $form->field($model, 'paid_to') ?>

    <?php // echo $form->field($model, 'base_paid_amount') ?>

    <?php // echo $form->field($model, 'reference_date') ?>

    <?php // echo $form->field($model, 'unallocated_amount') ?>

    <?php // echo $form->field($model, 'allocate_payment_amount') ?>

    <?php // echo $form->field($model, 'mode_of_payment') ?>

    <?php // echo $form->field($model, 'target_exchange_rate') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'party_type') ?>

    <?php // echo $form->field($model, 'total_allocated_amount') ?>

    <?php // echo $form->field($model, 'amended_from') ?>

    <?php // echo $form->field($model, 'base_total_allocated_amount') ?>

    <?php // echo $form->field($model, 'party') ?>

    <?php // echo $form->field($model, 'base_received_amount') ?>

    <?php // echo $form->field($model, 'source_exchange_rate') ?>

    <?php // echo $form->field($model, 'clearance_date') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, '_assign') ?>

    <?php // echo $form->field($model, 'paid_from') ?>

    <?php // echo $form->field($model, 'party_balance') ?>

    <?php // echo $form->field($model, 'party_name') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'subscription') ?>

    <?php // echo $form->field($model, 'paid_to_account_currency') ?>

    <?php // echo $form->field($model, 'paid_from_account_balance') ?>

    <?php // echo $form->field($model, 'paid_from_account_currency') ?>

    <?php // echo $form->field($model, 'paid_to_account_balance') ?>

    <?php // echo $form->field($model, 'paid_amount') ?>

    <?php // echo $form->field($model, 'received_amount') ?>

    <?php // echo $form->field($model, 'project') ?>

    <?php // echo $form->field($model, 'payment_type') ?>

    <?php // echo $form->field($model, 'difference_amount') ?>

    <?php // echo $form->field($model, 'posting_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
