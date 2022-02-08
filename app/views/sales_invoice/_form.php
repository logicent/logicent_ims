<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$isReadonly = $this->context->isReadonly;

$form = ActiveForm::begin( [
    'id' => $model->formName(),
    'enableClientValidation' => false,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>
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
                <?= $this->render('/_form_field/customer', ['model' => $model, 'form' => $form]) ?>
                <?= $form->field($model, 'po_no')->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
                <?= $form->field($model, 'is_pos')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
                <?php /*= $this->render('/_form_field/dropdown', [
                        'model' => $model,
                        'form' => $form,
                        'attribute' => 'pos_profile_id',
                        'listModelClass' => PosProfile::class,
                        'valueAttribute' => 'id'
                    ]) */ ?>
                <?php //= $form->field($model, 'is_debit_note')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
                <?= $form->field($model, 'is_return')->checkbox(['class' => $isReadonly ? 'read-only' : '']) ?>
                <?php /*= $this->render('/_form_field/dropdown', [
                        'model' => $model,
                        'form' => $form,
                        'attribute' => 'return_against_id',
                        'listModelClass' => SalesInvoice::class,
                        'valueAttribute' => 'id'
                    ]) */ ?>
            </div>
            <div class="column">
                <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'posting_date']) ?>
                <?php // $this->render('/_form_field/time_input', ['model' => $model, 'form' => $form, 'attribute' => 'posting_time']) ?>
                <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'due_date']) ?>
                <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'po_date']) ?>
            </div>
        </div>
    </div>

    <!-- Currency & Price List -->
    <?= $this->render('/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>

    <!-- Item table & Document totals -->
    <?= $this->render('/_form_section/item', ['model' => $model, 'form' => $form]) ?>

    <!-- Payment table -->
    <?= $this->render('/_form_section/payment', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end() ?>

<!-- Comments -->
<?= $this->render('/_form/_footer', ['model' => $model]) ?>