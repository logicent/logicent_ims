<?php

use app\helpers\SelectableItems;
use app\models\ExpenseType;
use app\models\PaymentMethod;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]) ?>

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
            <?= $this->render('/_form_field/date_input', ['model' => $model, 'form' => $form, 'attribute' => 'date']) ?>
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

<?php ActiveForm::end();
echo $this->render('/_form/_footer', ['model' => $model]);
