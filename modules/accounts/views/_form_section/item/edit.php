<?php

use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);

echo $this->render('/_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= Html::activeHiddenInput($model, 'id') ?>
            <?= $form->field($model, 'item_id')->textInput([
                    'maxlength' => true,
                    // 'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][item_id]"] : $model->item_id
                ]) ?>
            <?= $form->field($model, 'barcode')->textInput([
                    'maxlength' => true,
                    // 'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][barcode]"] : $model->barcode
                ]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'rows' => 3]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'quantity')->textInput([
                    'maxlength' => true,
                    'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][quantity]"] : $model->quantity
                ]) ?>
            <?= $form->field($model, 'item_uom')->textInput([
                    'maxlength' => true,
                    'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][item_uom]"] : $model->item_uom
                ]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'unit_price')->textInput([
                    'maxlength' => true,
                    'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][unit_price]"] : $model->unit_price
                ]) ?>
            <?= $form->field($model, 'total_amount')->textInput([
                    'maxlength' => true,
                    'value' => $model->isNewRecord || !is_null($formData) ? $formData[$modelClass . "[$rowId][total_amount]"] : $model->total_amount
                ]) ?>
        </div>
    </div>

<?php ActiveForm::end();
$this->registerJs($this->render('/_form/_modal_submit.js'));
