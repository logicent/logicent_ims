<?php

use logicent\accounts\enums\Type_Party_Sub_Type;
use app\helpers\SelectableItems;
use logicent\sales\models\CustomerGroup;
use yii\widgets\MaskedInput;
?>
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
<?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>
<!-- Credit Limit -->
<?= $this->render('@system_modules/accounts/views/_form_field/credit_limit', ['model' => $model, 'form' => $form]) ?>
