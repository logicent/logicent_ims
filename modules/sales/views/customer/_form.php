<?php

use logicent\accounts\enums\Type_Party_Sub_Type;
use app\helpers\SelectableItems;
use logicent\sales\models\CustomerGroup;
use yii\widgets\MaskedInput;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$form = ActiveForm::begin( [
    'id' => $model->formName(),
    'enableClientValidation' => false,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
        'data' => [
            'modal_id' => 'modal__customer'
        ]
    ],
]);

echo $this->render('///_form/_header', ['model' => $model]);
if (!$model->isNewRecord) :
    echo $this->render('_transaction', ['model' => $model]);
endif ?>
    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'phone_number')->widget(MaskedInput::class, [
                        'mask' => ['020 999 9999', '0799 999 999', '0199 999 9999'],
                    ]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'inactive')->checkbox(['style' => 'min-height: 42px;'])->label('&nbsp;') ?>
                <?= $form->field($model, 'email_address')->widget(MaskedInput::class, [
                        'clientOptions' => ['alias' =>  'email']
                    ]) ?>
            </div>
        </div>
    </div>
    <div class="ui attached padded segment">
        <div class="ui two column stackable grid">
            <div class="column">
                <?= $form->field($model, 'party_group')->dropDownList(
                        SelectableItems::get(CustomerGroup::class, $model, [
                            'valueAttribute' => 'id'
                        ])
                    ) ?>
                <?= $form->field($model, 'party_details')->textarea(['rows' => 3]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'party_type')->dropDownList(Type_Party_Sub_Type::enums()) ?>
                <?= $form->field($model, 'tax_Id')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <!-- Currency & Price List -->
    <?= $this->render('///_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>
    <!-- Credit Limit -->
    <?= $this->render('///_form_field/credit_limit', ['model' => $model, 'form' => $form]) ?>

<?php ActiveForm::end();
echo $this->render('///_form/_footer', ['model' => $model]);
