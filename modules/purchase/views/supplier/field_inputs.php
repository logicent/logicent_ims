<?php

use app\helpers\SelectableItems;
use logicent\accounts\enums\Type_Party_Sub_Type;
use logicent\purchase\models\SupplierGroup;
use yii\widgets\MaskedInput;
?>
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
        <?= $form->field($model, 'party_type')->dropDownList(Type_Party_Sub_Type::enums()) ?>
        <?= $form->field($model, 'party_group')->dropDownList(
                SelectableItems::get(SupplierGroup::class, $model, [
                    'valueAttribute' => 'id'
                ])
            ) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'party_details')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'tax_Id')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<!-- Currency & Price List -->
<?= $this->render('@system_modules/accounts/views/_form_section/currency_pricelist', ['model' => $model, 'form' => $form]) ?>
<!-- Credit Limit -->
<?= $this->render('@system_modules/accounts/views/_form_field/credit_limit', ['model' => $model, 'form' => $form]) ?>
