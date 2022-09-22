<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\accounts\models\ExpenseType;
use crudle\ext\accounts\models\PaymentMethod;
use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;
?>

<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'id') ?>
    <?= Html::activeHiddenInput($model, 'currency') ?>
    <div class="two fields">
        <?= $form->field($model, 'type')->dropDownList(
                SelectableItems::get(ExpenseType::class, $model, [
                    'valueAttribute' => 'id'
                ])
            ) ?>
        <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'payee')->textInput(['maxlength' => true]) ?>
        <?= $this->render('@app_main/views/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'date']) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'payment_method')->dropDownList(
                SelectableItems::get(PaymentMethod::class, $model, [
                    'valueAttribute' => 'id',
                    'filters' => ['inactive' => false]
                ])
        ) ?>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true, 'style' => 'text-align: right']) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'narration')->textarea(['rows' => 3, 'maxlength' => true]) ?>
    </div>
</div>
