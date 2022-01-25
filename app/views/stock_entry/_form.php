<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin( [
    'id' => $model->formName(),
    // 'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>
    <div class="ui attached padded segment">

        <?= Html::activeHiddenInput($model, 'title') ?>
        <?= Html::activeHiddenInput($model, 'doc_status') ?>
        <?= Html::activeHiddenInput($model, 'delivery_note_no') ?>
        <?= Html::activeHiddenInput($model, 'naming_series') ?>
        <?= Html::activeHiddenInput($model, 'customer') ?>
        <?= Html::activeHiddenInput($model, 'customer_name') ?>
        <?= Html::activeHiddenInput($model, 'customer_address') ?>
        <?= Html::activeHiddenInput($model, 'supplier') ?>
        <?= Html::activeHiddenInput($model, 'supplier_name') ?>
        <?= Html::activeHiddenInput($model, 'purchase_order') ?>
        <?= Html::activeHiddenInput($model, 'address_display') ?>
        <?= Html::activeHiddenInput($model, 'credit_note') ?>
        <?= Html::activeHiddenInput($model, 'sales_invoice_no') ?>
        <?= Html::activeHiddenInput($model, 'project') ?>
        <?= Html::activeHiddenInput($model, 'production_order') ?>

        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'purpose')->dropDownList([

                ]) ?>
                <?= $form->field($model, 'from_warehouse')->dropDownList([
                    
                ]) ?>
                <?= $form->field($model, 'to_warehouse')->dropDownList([
                    
                ]) ?>
            </div>

            <div class="column">
                <?= $form->field($model, 'posting_date')->textInput(['class' => 'pikaday']) ?>
                <?= $form->field($model, 'posting_time')->textInput(['readonly' => true, 'class' => 'pikatime']) ?>
                <?= $form->field($model, 'set_posting_time')->checkbox() ?>
            </div>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'total_amount')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'total_additional_costs')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
            </div>

            <div class="column ui transparent input">
                <?= $form->field($model, 'total_incoming_value')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'total_outgoing_value')->textInput(['readonly' => true]) ?>
                <?= $form->field($model, 'value_difference')->textInput(['readonly' => true]) ?>
            </div>        
        </div>
    </div>

<?php ActiveForm::end() ?>

<?= $this->render('/_form/_footer', ['model' => $model]) ?>
