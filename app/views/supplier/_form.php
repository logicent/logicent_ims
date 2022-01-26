<?php

// use app\models\SupplierType;

use app\helpers\SelectableItems;
use app\models\SupplierType;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin( [
    'id' => $model->formName(),
    'enableClientValidation' => false,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
        'data' => [
            'modal_id' => 'modal__supplier'
        ]
    ],
]);

echo $this->render('/_form/_header', ['model' => $model]);
if (!$model->isNewRecord) :
    echo $this->render('_linkedData', ['model' => $model]);
endif ?>
    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'phone_number')->widget(MaskedInput::class, [
                                        'mask' => ['020 999 9999', '0799 999 999', '0199 999 9999'],
                                    ]) ?>
            <?= $form->field($model, 'email_address')->widget(MaskedInput::class, [
                                'clientOptions' => ['alias' =>  'email']
                            ]) ?>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'supplier_type')->dropDownList(
                    SelectableItems::get(SupplierType::class, $model, [
                        'valueAttribute' => 'id'
                    ])
                ) ?>
            <?= $form->field($model, 'tax_Id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'supplier_details')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <!-- Currency & Price List -->
    <?= $this->render('/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>
    <!-- Credit Limit -->
    <?= $this->render('/_form_field/credit_limit', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end();
echo $this->render('/_form/_footer', ['model' => $model]);
