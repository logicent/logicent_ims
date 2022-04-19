<?php

use yii\helpers\Html;

$isReadonly = $this->context->isReadonly();
?>
<!-- Reference Info -->
<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'status') ?>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'naming_series')->dropDownList([
                        'ACC-SINV-.YYYY.-' => 'ACC-SINV-.YYYY.-',
                        'ACC-SINV-RET-.YYYY.-' => 'ACC-SINV-RET-.YYYY.-',
                    ],
                    ['maxlength' => true, 'disabled' => $isReadonly]
                ) ?>
            <?= $this->render('@system_modules/sales/views/_form_field/customer', ['model' => $model, 'form' => $form]) ?>
            <?= $form->field($model, 'po_no')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field($model, 'is_pos')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
            <?php /*= $this->render('@app_main/views/dropdown', [
                    'model' => $model,
                    'form' => $form,
                    'attribute' => 'pos_profile_id',
                    'listModelClass' => PosProfile::class,
                    'valueAttribute' => 'id'
                ]) */ ?>
            <?php //= $form->field($model, 'is_debit_note')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
            <?= $form->field($model, 'is_return')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
            <?php /*= $this->render('@app_main/views/dropdown', [
                    'model' => $model,
                    'form' => $form,
                    'attribute' => 'return_against_id',
                    'listModelClass' => SalesInvoice::class,
                    'valueAttribute' => 'id'
                ]) */ ?>
        </div>
        <div class="column">
            <?= $this->render('@app_main/views/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'posting_date']) ?>
            <?php // $this->render('@app_main/views/time_input', ['model' => $model, 'form' => $form, 'attribute' => 'posting_time']) ?>
            <?= $this->render('@app_main/views/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'due_date']) ?>
            <?= $this->render('@app_main/views/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'po_date']) ?>
        </div>
    </div>
</div>

<!-- Currency & Price List -->
<?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

<!-- Item table & Document totals -->
<?= $this->render('@system_modules/accounts/views/_form_section/item', ['model' => $model, 'form' => $form]) ?>

<!-- Payment table -->
<?= $this->render('@system_modules/accounts/views/_form_section/payment', ['model' => $model, 'form' => $form]) ?>